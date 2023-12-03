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
    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->user();
    
        if (!$user || !in_array($user->rol, $roles)) {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }
    
        return $next($request);
    }
}
