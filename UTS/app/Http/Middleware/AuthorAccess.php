<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthorAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Cek apakah pengguna login dan role adalah 'author'
        if (Auth::check() && Auth::user()->role === 'author') {
            return $next($request);
        }

        // Jika pengguna tidak memiliki akses, redirect atau beri pesan error
        return redirect('/')->withErrors('Anda tidak memiliki akses ke halaman author.');
    }
}
