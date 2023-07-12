<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('loggeed') && ($request->path() != '/' && $request->path() != 'login/register')) {
            return redirect('/')->with('fail', 'Vous devez être connecté pour accéder à cette page.');
        }
    
        if (session()->has('loggeed') && ($request->path() == '/' || $request->path() == 'login/register')) {
            return back();
        }
        return $next($request);

    }
}


