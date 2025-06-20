<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckJwtToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        if (!session()->has('jwt_token')) {
            return redirect('/login');
        }
        if ($role !== null && session('role') !== $role) {
            return redirect()->route('dashboard')->withErrors(['login_error' => 'Anda tidak memiliki akses ke halaman ini.']);
        }
        return $next($request);
    }
}
