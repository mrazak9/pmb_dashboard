<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Periksa apakah pengguna masuk
        if (Auth::check()) {
            // Periksa apakah pengguna memiliki peran yang diperlukan
            foreach ($roles as $role) {
                if (Auth::user()->role == $role) {
                    return $next($request);
                }
            }
        }

        // Jika pengguna tidak memiliki peran yang sesuai, arahkan mereka ke halaman lain atau kembalikan respon yang sesuai
        return redirect('/')->with('error', 'Unauthorized.');
    }
}
