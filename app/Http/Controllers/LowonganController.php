<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LowonganController extends Controller
{
  public function tambah(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'title' => 'required|string',
      'description' => 'required|string',
      'status' => 'required|string',
      'slot' => 'required|string',
      'open' => 'required|date',
      'closed' => 'required|date',
      'image_file' => 'required|file|mimes:jpeg,png,pdf|max:2048'
    ]);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $lowongan = $request->all();
    $lowongan['slot'] = (int)$lowongan['slot'];
    $lowongan['id_perusahaan'] = (int)$lowongan['id_perusahaan'];

    if ($request->file('image_file')->isValid()) {
      $extension = $request->file('image_file')->getClientOriginalExtension();
      $date_upload = date('H-i-Y');

      $file_name = session('user')->username . '_lowongan-kerja_' . $date_upload . '.' . $extension;
      $path = $request->file('image_file')->storeAs('uploads/lowongan', $file_name, 'public');
      $lowongan['image'] = $path;

      if (Lowongan::create($lowongan)) {
        return redirect('/lowongan')->with('success', 'Lowongan berhasil disimpan!');
      } else {
        return redirect()->back()->with('fail', 'Lowongan gagal disimpan!')->withInput();
      }
    } else {
      return redirect()->back()->with('fail', 'Lowongan gagal disimpan!')->withInput();
    }
  }

  public function lowongan_page(Request $request)
  {
    if (!session()->has('user')) {
      return redirect('/perusahaan/login')->with('not_login', 'Login Terlebih Dahulu!');
    }

    $lowongan = Lowongan::all();

    if (session('user')->role != 'superadmin') {
      $lowongan = $lowongan->where('id_perusahaan', session('user')->id);
    }

    return view('lowongan', ['role' => session('user')->role, 'lowongan' => $lowongan]);
  }

  public function buka_lowongan_page(Request $request)
  {
    if (!session()->has('user')) {
      return redirect('/perusahaan/login')->with('not_login', 'Login Terlebih Dahulu!');
    }

    if (session('user')->role == 'superadmin') {
      return redirect('/dashboard')->with('unauthorized', 'Tidak memiliki hak akses!');
    }

    return view('buka_lowongan', ['role' => session('user')->role]);
  }

  public function edit_lowongan_page(Request $request, $id)
  {
    if (!session()->has('user')) {
      return redirect('/perusahaan/login')->with('not_login', 'Login Terlebih Dahulu!');
    }

    if (session('user')->role == 'superadmin') {
      return redirect('/dashboard')->with('unauthorized', 'Tidak memiliki hak akses!');
    }

    $lowongan = Lowongan::where('id', $id)->first();

    return view('edit_lowongan', ['role' => session('user')->role, 'lowongan' => $lowongan]);
  }

  public function update(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'title' => 'required|string',
      'description' => 'required|string',
      'status' => 'required|string',
      'slot' => 'required|string',
      'open' => 'required|date',
      'closed' => 'required|date',
      'image_file' => 'file|mimes:jpeg,png,pdf|max:2048'
    ]);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $lowongan = Lowongan::find($request->id);

    if ($request->hasFile('image_file')) {
      Storage::delete('public/' . $lowongan->image);
      $extension = $request->file('image_file')->getClientOriginalExtension();
      $date_upload = date('H-i-Y');

      $file_name = session('user')->username . '_lowongan-kerja_' . $date_upload . '.' . $extension;
      $path = $request->file('image_file')->storeAs('uploads/lowongan', $file_name, 'public');
      $lowongan['image'] = $path;
    }

    $lowongan->update($request->all());

    return redirect('/lowongan')->with('success', 'Berhasil mengedit lowongan!');
  }

  public function delete($id)
  {
    $lowongan = Lowongan::find($id);

    if ($lowongan->image) {
      Storage::delete('public/' . $lowongan->image);
    }

    $lowongan->delete();

    return redirect()->back()->with('success', 'Berhasil menghapus lowongan!');
  }
}
