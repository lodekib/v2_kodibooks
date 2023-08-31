<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->hasRole('Manager')) {
                return redirect()->route('filament.manager.pages.dashboard');
            } else if (Auth::user()->hasRole('Super Admin')) {
                return redirect()->route('filament.admin.pages.dashboard');
            }
        }
        return $next($request);
    }
}
