<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StaffMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->role !== 'staff') {
            return redirect('/login')->with('error', 'Akses ditolak. Hanya staff yang dapat mengakses halaman ini.');
        }
        return $next($request);
    }
}
