<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DashboardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if($user->role == 'customer' || $user->role == 'admin'){
          return redirect()->route('MyAccountPage');
        }


        if($user->role == 'tech'){
          return redirect()->route('TechMyAccount');
        }
        return $next($request);
    }
}
