<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard', ['title' => 'Dashboard']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('frontend.beranda'));
    }

    public function pilih_konselor()
    {
        return view('user.pilih-konselor', ['title' => 'Pilih Konselor']);
    }
}
