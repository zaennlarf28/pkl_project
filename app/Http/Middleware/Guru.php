<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Guru
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Anggap role guru adalah isAdmin = 2, 3, atau 4
        if (Auth::check() && in_array(Auth::user()->isAdmin, [2, 3, 4])) {
            return $next($request);
        }

        return abort(403, 'Akses hanya untuk guru.');
    }
}
