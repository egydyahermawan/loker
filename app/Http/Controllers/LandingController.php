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
  public function lowonganlanding()
  {
      // Logic to fetch data or perform operations for the About page
      return view('lowonganlanding');
  }
  public function newslanding()
  {
      // Logic to fetch data or perform operations for the About page
      return view('newslanding');
  }
  public function contactlanding()
  {
      // Logic to fetch data or perform operations for the About page
      return view('contactlanding');
  }
  public function detaillowongan()
  {
      // Logic to fetch data or perform operations for the About page
      return view('detaillowongan');
  }
  public function detailnews()
  {
      // Logic to fetch data or perform operations for the About page
      return view('detailnews');
  }
}
