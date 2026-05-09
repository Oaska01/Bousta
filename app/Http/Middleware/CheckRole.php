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
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role ): Response
    {
        // Auth::check to see if the user is logged in
        // if (Auth::check() || Auth::user() -> role != 'admin')
        //     abort(403);
        if (!$request->user() || $request->user()->role !== $role) {
            abort(403, 'Unauthorized.');
        }
        return $next($request);
    }
}
