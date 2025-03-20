<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticatedByRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    // public function handle(Request $request, Closure $next, $guards)
    // {
    //     if (Auth::check()) {
    //         $user = Auth::user();

    //         if ($user->role === 'admin') {
    //             return redirect()->route('filament.admin.pages.dashboard');
    //         } elseif ($user->role === 'user') {
    //             return redirect()->route('dashboard');
    //         } elseif ($user->role === 'petugas') {
    //             return redirect()->route('filament..pages.dashboard');
    //         }

    //     }

    //     return $next($request);
    // }
}
