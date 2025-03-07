<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', ['title' => 'Dashboard']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('frontend.beranda'));
    }
}
