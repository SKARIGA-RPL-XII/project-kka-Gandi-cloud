<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class logincontroller extends Controller{
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required', // ini diisi nama
    ]);

    $user = User::where('email', trim($request->email))->first();

    if (!$user) {
        return back()->with('error', 'Email tidak ditemukan');
    }

    // cek nama (sebagai password)
    if (strtolower(trim($request->password)) !== strtolower($user->name)) {
        return back()->with('error', 'Nama tidak sesuai');
    }

    if (!$user->is_active) {
        return back()->with('error', 'Akun nonaktif');
    }

    Auth::login($user);
    $request->session()->regenerate();

    // tetap pakai first_login
    if ($user->first_login) {
        return redirect('/change-password');
    }

    return redirect('/dashboard');
}
}