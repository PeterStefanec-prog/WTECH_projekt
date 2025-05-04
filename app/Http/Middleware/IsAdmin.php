<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ak je prihlaseny a is_admin = true, pokracujeme dalej
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Inak Forbidden
        abort(403, 'Nemáte dostatočné oprávnenie.');
    }
}
