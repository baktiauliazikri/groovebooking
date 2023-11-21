<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$levels)
    {
        // Pastikan pengguna telah login
        if (!Auth::check()) {
            return redirect('login');
        }

        // Ambil level pengguna
        $userLevel = Auth::user()->level;

        // Periksa apakah level pengguna ada dalam daftar yang diizinkan
        if (in_array($userLevel, $levels)) {
            return $next($request);
        }

        // Jika level tidak sesuai, arahkan ke halaman yang sesuai
        return redirect('/')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}
