<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\User;
use Google\Service\CloudSourceRepositories\Repo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use tidy;

class UserController extends Controller
{
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

    // return view('email.template', ['title' => $data['title'], 'content' => $data['content']]);

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

  public function deactivate(Request $request)
  {
    $user = User::find($request->id);
    $user->status = 'non-active';
    $user->save();

    return redirect()->back()->with('success', 'Berhasil menonaktifkan akun!');
  }

  public function activate(Request $request)
  {
    $user = User::find($request->id);
    $user->status = 'active';
    $user->save();

    return redirect()->back()->with('success', 'Berhasil mengaktifkan akun!');
  }

  public function delete(Request $request)
  {
    $user = User::find($request->id);
    $user->delete();
    return redirect()->back()->with('success', 'Berhasil menghapus akun!');
  }
}
