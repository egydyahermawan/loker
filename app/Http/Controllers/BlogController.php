<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
  public function index(Request $request)
  {
    if (!session()->has('user')) {
      return redirect('/admin/login')->with('not_login', 'Login Terlebih Dahulu!');
    }

    $role = session('user')->role;
    $berita = Blog::all();

    return view('berita', ['role' => $role, 'berita' => $berita]);
  }

  public function tambah_page(Request $request)
  {
    if (!session()->has('user')) {
      return redirect('/admin/login')->with('not_login', 'Login Terlebih Dahulu!');
    }

    $role = session('user')->role;

    return view('berita_tambah', ['role' => $role]);
  }

  public function create(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'title' => 'required|string',
      'content' => 'required|string',
      'image_file' => 'required|file|mimes:jpeg,png,pdf|max:2048'
    ]);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $berita = $request->all();

    if ($request->file('image_file')->isValid()) {
      $extension = $request->file('image_file')->getClientOriginalExtension();
      $date_upload = date('H-i-Y');

      $file_name = 'berita_' . $date_upload . '.' . $extension;
      $path = $request->file('image_file')->storeAs('uploads/berita', $file_name, 'public');
      $berita['image'] = $path;

      if (Blog::create($berita)) {
        return redirect('/berita')->with('success', 'Berita berhasil disimpan!');
      } else {
        return redirect()->back()->with('fail', 'Berita gagal disimpan!')->withInput();
      }
    } else {
      return redirect()->back()->with('fail', 'Berita gagal disimpan!')->withInput();
    }
  }

  public function edit_page(Request $request, $id)
  {
    if (!session()->has('user')) {
      return redirect('/admin/login')->with('not_login', 'Login Terlebih Dahulu!');
    }

    $role = session('user')->role;
    $berita = Blog::find($id);

    return view('berita_edit', ['role' => $role, 'berita' => $berita]);
  }

  public function update(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'title' => 'required|string',
      'content' => 'required|string',
      'image_file' => 'file|mimes:jpeg,png,pdf|max:2048'
    ]);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    }

    $berita = Blog::find($request->id);

    if ($request->hasFile('image_file')) {
      Storage::delete('public/' . $berita->image);
      $extension = $request->file('image_file')->getClientOriginalExtension();
      $date_upload = date('H-i-Y');

      $file_name = 'berita_' . $date_upload . '.' . $extension;
      $path = $request->file('image_file')->storeAs('uploads/berita', $file_name, 'public');
      $berita['image'] = $path;
    }

    $berita->update($request->all());

    return redirect('/berita')->with('success', 'Berhasil mengedit berita!');
  }

  public function destroy($id)
  {
    $berita = Blog::find($id);

    if ($berita->image) {
      Storage::delete('public/' . $berita->image);
    }

    $berita->delete();

    return redirect()->back()->with('success', 'Berhasil menghapus berita!');
  }
}
