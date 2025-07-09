<?php
namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Guru
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->isAdmin == 2) {
            return $next($request);
        } else {
            return abort(403, 'Akses hanya untuk guru.');
        }
    }
}
