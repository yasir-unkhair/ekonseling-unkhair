<?php

namespace App\Http\Controllers\Konselor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('konselor.dashboard', ['title' => 'Dashboard']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('frontend.beranda'));
    }
}
