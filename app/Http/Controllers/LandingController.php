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
}
