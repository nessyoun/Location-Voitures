<?php

namespace App\Http\Middleware;

use Closure;

class CommertialMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->hasRole('admin')||auth()->user()->hasRole('commercial')) {
            return $next($request);
        }
    
        return redirect('/home'); // Redirigez vers la page d'accueil ou une autre page de votre choix en cas de non-autorisation.
    }
}
