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

    public function profile()
    {
        return view('user.profile', ['title' => 'Profil Saya']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('frontend.beranda'));
    }
}
