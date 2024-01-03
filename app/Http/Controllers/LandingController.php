<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Lowongan;
use Illuminate\Http\Request;

class LandingController extends Controller
{
  public function landing()
  {
    $lowongan = Lowongan::where('status', 'available')->take(9)->orderBy('updated_at', 'desc')->get()->toArray();
    $berita = Blog::latest()->orderBy('updated_at', 'desc')->get()->toArray();

    $data['berita_utama'] = $berita[0];
    $data['berita'] = array_slice($berita, 1);
    $data['lowongan'] = array_chunk($lowongan, 3);

    // dd($data);

    return view('landing', ['data' => $data]);
  }

  public function daftar_lowongan(Request $request)
  {
    $lowongan = Lowongan::orderBy('updated_at', 'desc')->get();
    $berita = Blog::orderBy('updated_at', 'desc')->take(5)->get();

    return view('lowonganlanding', ['lowongan' => $lowongan, 'berita' => $berita]);
  }

  public function daftar_berita()
  {
    $berita = Blog::orderBy('updated_at', 'desc')->get()->toArray();
    $berita_utama = $berita[0];
    $berita = array_slice($berita, 1);

    return view('newslanding', ['berita_utama' => $berita_utama, 'berita' => $berita]);
  }

  public function contact()
  {

    return view('contactlanding');
  }

  public function detaillowongan(Request $request, $id)
  {
    $lowongan = Lowongan::find($id);

    return view('detaillowongan', ['lowongan' => $lowongan]);
  }

  public function detailnews(Request $request, $id)
  {
    $berita = Blog::find($id);
    $berita_list = Blog::where('id', '!=', $id)->get()->toArray();

    return view('detailnews', ['berita' => $berita, 'others' => $berita_list]);
  }
}
