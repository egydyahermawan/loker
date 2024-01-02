<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Lowongan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  public function dashboard(Request $request)
  {
    if (!session()->has('user')) {
      return redirect('/perusahaan/login')->with('not_login', 'Login Terlebih Dahulu!');
    }

    $role = session('user')->role;
    $year = $request->query('year');

    if (!$year) {
      $year = Carbon::now()->year;
    }

    $data['year'] = Lowongan::select(DB::raw('YEAR(created_at) as year'))
      ->groupBy(DB::raw('YEAR(created_at)'))
      ->pluck('year')
      ->toArray();

    foreach ($data['year'] as $i => $val) {
      $data['year'][$i] = strval($val);
    }


    if (!in_array(Carbon::now()->year, $data['year'])) {
      array_push($data['year'], strval(Carbon::now()->year));
    }

    if ($role == 'superadmin') {
      $data['perusahaan_aktif'] = User::where('role', 'admin_perusahaan')->where('status', 'active')->count();
      $data['berita'] = Blog::count();
      $data['lowongan_buka'] = Lowongan::where('status', 'available')->count();
      $data['lowongan_tutup'] = Lowongan::where('status', 'unavailable')->count();
      $data['lowongan_data'] = Lowongan::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
        ->whereYear('created_at', $year)
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->get();

      foreach ($data['lowongan_data'] as $d) {
        $d['year'] = $year;
      }
    } else {
      $data['lowongan_buka'] = Lowongan::where('status', 'available')->where('id_perusahaan', session('user')->id)->count();
      $data['lowongan_tutup'] = Lowongan::where('status', 'unavailable')->where('id_perusahaan', session('user')->id)->count();
      $data['lowongan_data'] = Lowongan::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
        ->whereYear('created_at', $year)
        ->where('id_perusahaan', session('user')->id)
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->get();
    }

    // dd($data);

    return view('dashboard', ['role' => $role, 'data' => $data]);
  }
}
