<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * The bare domain ("/") always permanently redirects to the primary-market
 * (Russian) version. Search engine crawlers must never be sent to another
 * language based on browser headers or sessions.
 */
class RedirectRootToPrimaryLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isMethod('GET') && $request->path() === '/') {
            return redirect('/ru', 301);
        }

        return $next($request);
    }
}
