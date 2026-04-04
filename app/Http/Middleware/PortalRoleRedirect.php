<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class PortalRoleRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return redirect('/admin');
            } elseif ($user->hasRole('instructor') || $user->hasRole('teacher')) {
                if (!$request->is('teacher*')) {
                    return redirect('/teacher');
                }
            } elseif ($user->hasRole('student') || $user->hasRole('parent')) {
                if (!$request->is('portal*')) {
                    return redirect('/portal');
                }
            }
        }

        return $next($request);
    }
}
