<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $userRole = auth()->user()?->role;

        if (!in_array($userRole, $roles)) {
            // abort(401, 'Can not access this route');
            return to_route("dashboard.$userRole", $userRole);
        }

        return $next($request);
    }
}