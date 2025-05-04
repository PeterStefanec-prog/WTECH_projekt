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
        // 1) Je vobec prihlaseny? - ak neni chod na login
        if (! Auth::check()) {
            return redirect()->route('login');
        }
        // 2) Je admin?
        if (! Auth::user()->is_admin) {
            abort(403, 'Nemáte oprávnenie.');
        }
        // Ak ano, pusti ho dalej
        return $next($request);
    }
}
