<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user()->isSubscribed()) {
            // Redirect to a subscription page or return a 403 error
            return redirect('/client/settings/subscription')->with('inline_error', 'Your account is not subscribe, please subscribe to use all the features of this application.');
        }
    
        return $next($request);
    }
}
