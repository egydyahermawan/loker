<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  public function login_perusahaan_page()
  {
    if (session()->has('user')) {
      return redirect('/dashboard');
    }

    return view('login_perusahaan');
  }

  public function login_admin_page()
  {
    if (session()->has('user')) {
      return redirect('/dashboard');
    }

    return view('login_admin');
  }

  public function login(Request $request)
  {
    $validator = Validator::make(
      $request->all(),
      [
        'username' => 'required|string',
        'password' => 'required|string|min:8|regex:/^(?=.*[0-9])/',
      ],
      ['password.regex' => 'The password must have a minimum of 8 characters and contain numbers in it.']
    );

    if ($validator->fails()) {
      return redirect()
        ->back()
        ->withErrors($validator)
        ->withInput();
    }

    if (Auth::attempt(['username' => $request->get('username'), 'password' => $request->get('password')])) {
      $user = Auth::user();

      if ($user->status == 'pending') {
        return redirect()
          ->back()
          ->with('status', 'pending')
          ->with(
            'message',
            'Mohon maaf, akun anda belum diaktifasi oleh Admin. Silahkan tunggu informasi aktifasi akun di email!'
          );
      } elseif ($user->status == 'reject') {
        return redirect()
          ->back()
          ->with('status', 'reject')
          ->with('message', 'Mohon maaf, aktifasi akun anda ditolak oleh Admin!');
      } elseif ($user->status == 'non-active') {
        return redirect()
          ->back()
          ->with('status', 'non-active')
          ->with('message', 'Mohon maaf, akun anda telah dinonaktifkan Admin!');
      }

      $request->session()->put('user', $user);

      return redirect('/dashboard')->with('success', 'Login Berhasil! Selamat datang!');
    } else {
      return redirect()
        ->back()
        ->with('error', 'Login gagal. Periksa kembali username dan password!')
        ->withInput();
    }
  }

  public function register_page()
  {
    if (session()->has('user')) {
      $user = session('user');
      if ($user->role == 'admin_perusahaan') {
        return redirect('/perusahaan/dashboard');
      } else {
        return redirect('/admin/dashboard');
      }
    }

    return view('register');
  }

  public function register(Request $request)
  {
    $validator = Validator::make(
      $request->all(),
      [
        'nama' => 'required|string',
        'alamat' => 'required|string',
        'email' => 'required|string',
        'telp' => 'required',
        'jenis' => 'required',
        'username' => 'required|string|unique:users,username',
        'password' => 'required|confirmed|min:8|regex:/^(?=.*[0-9])/',
      ],
      ['password.regex' => 'The password must have a minimum of 8 characters and contain numbers in it.']
    );

    if ($validator->fails()) {
      return redirect()
        ->back()
        ->withErrors($validator)
        ->withInput();
    }

    $json_data = [
      'nama_perusahaan' => $request->get('nama'),
      'alamat_perusahaan' => $request->get('alamat'),
      'email_perusahaan' => $request->get('email'),
      'telp_perusahaan' => $request->get('telp'),
      'jenis_perusahaan' => $request->get('jenis'),
    ];

    User::create([
      'username' => $request->get('username'),
      'password' => Hash::make($request->get('password')),
      'info' => json_encode($json_data),
      'role' => 'admin_perusahaan',
      'status' => 'pending',
    ]);

    return redirect()
      ->back()
      ->with(
        'success',
        'Registrasi berhasil! Status akun anda masih pending. Cek email anda secara berkala untuk pemberitahuan aktifasi akun!'
      );
  }

  public function logout(Request $request)
  {
    $role = session('user')->role;
    $request->session()->flush();

    if ($role == 'superadmin') {
      return redirect('/admin/login');
    } else {
      return redirect('/perusahaan/login');
    }
  }

  public function dashboard(Request $request)
  {
    if (!session()->has('user')) {
      return redirect('/perusahaan/login')->with('not_login', 'Login Terlebih Dahulu!');
    }

    $role = session('user')->role;

    return view('dashboard', ['role' => $role]);
  }

  public function approval_akun_page(Request $request)
  {
    if (!session()->has('user')) {
      return redirect('/admin/login')->with('not_login', 'Login Terlebih Dahulu!');
    }

    if (session('user')->role != 'superadmin') {
      return redirect('/perusahaan/dashboard')->with('unauthorized', 'Tidak memiliki hak akses!');
    }

    $perusahaan = User::where('status', '=', 'pending')->get();
    foreach ($perusahaan as $p) {
      $p->info = json_decode($p->info);
    }

    return view('approval_akun', ['perusahaan' => $perusahaan]);
  }

  public function reject_akun(Request $request)
  {
    $user = User::where('id', '=', $request->id)->first();
    $user->status = 'reject';
    $user->save();
    $data = [
      'title' => 'Aktifasi Ditolak!',
      'content' =>
      'Mohon maaf, akun yang anda daftarkan tidak dapat diaktivasi oleh Admin. Silahkan lakukan pendaftaran ulang dengan data yang valid!',
    ];

    $email_to = json_decode($user->info)->email_perusahaan;
    Mail::to($email_to)->send(new Email($data));

    return redirect()
      ->back()
      ->with('success', 'Reject Akun ' . $user->username . ' berhasil!');
  }

  public function approve_akun(Request $request)
  {
    $user = User::where('id', '=', $request->id)->first();
    $user->status = 'active';
    $user->save();
    $data = [
      'title' => 'Aktifasi Diterima!',
      'content' => 'Selamat, akun yang anda daftarkan telah diaktivasi oleh Admin. Silahkan login kedalam sistem!',
    ];

    $email_to = json_decode($user->info)->email_perusahaan;
    Mail::to($email_to)->send(new Email($data));

    return redirect()
      ->back()
      ->with('success', 'Approve Akun ' . $user->username . ' berhasil!');
  }

  public function daftar_akun_page(Request $request)
  {
    if (!session()->has('user')) {
      return redirect('/admin/login')->with('not_login', 'Login Terlebih Dahulu!');
    }

    if (session('user')->role != 'superadmin') {
      return redirect('/perusahaan/dashboard')->with('unauthorized', 'Tidak memiliki hak akses!');
    }

    $perusahaan = User::where('role', 'admin_perusahaan')
      ->where('status', '!=', 'pending')
      ->get();
    foreach ($perusahaan as $p) {
      $p->info = json_decode($p->info);
    }

    return view('daftar_akun', ['perusahaan' => $perusahaan]);
  }
}
