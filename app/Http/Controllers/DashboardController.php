<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function dashboard(Request $request)
  {
    if (!session()->has('user')) {
      return redirect('/perusahaan/login')->with('not_login', 'Login Terlebih Dahulu!');
    }

    $role = session('user')->role;

    return view('dashboard', ['role' => $role]);
  }
}
