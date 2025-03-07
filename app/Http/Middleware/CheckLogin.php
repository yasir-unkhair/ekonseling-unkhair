<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth()->check()) {
            alert()->error('Error', 'Silahkan login terlebih dahulu.');
            return redirect(route('frontend.berenda'));
        }

        if (!Auth()->user()->is_active) {
            auth()->logout();
            alert()->error('Error', 'Akun belum diaktifkan!');
            return redirect(route('frontend.berenda'));
        }

        return $next($request);
    }
}
