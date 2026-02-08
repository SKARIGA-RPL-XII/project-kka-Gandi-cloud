<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return redirect('/login')->with('error', 'Akses ditolak. Hanya admin yang dapat mengakses halaman ini.');
        }
        return $next($request);
    }
}
