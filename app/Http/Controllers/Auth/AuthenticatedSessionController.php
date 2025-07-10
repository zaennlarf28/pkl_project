<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirect berdasarkan isAdmin
            if (in_array($user->isAdmin, [2, 3, 4])) {
                return redirect()->intended('/guru');
            } elseif ($user->isAdmin == 1) {
                return redirect()->intended('/admin');
            } elseif ($user->isAdmin == 0) {
                return redirect()->intended('/murid');
            }

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}
