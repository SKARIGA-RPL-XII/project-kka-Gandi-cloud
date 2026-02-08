<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->role !== 'customer') {
            return redirect('/login')->with('error', 'Akses ditolak. Hanya customer yang dapat mengakses halaman ini.');
        }
        return $next($request);
    }
}
