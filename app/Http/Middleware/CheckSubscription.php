<?php

namespace App\Http\Middleware;

use App\Models\Client;
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
        $client = Client::where('user_id', $request->user()->id)->first();
        if (! $request->user()->isSubscribed() && $request->user()->role == 'Client') {
            // Redirect to a subscription page or return a 403 error
            return redirect('/client/settings/subscription')->with('inline_error', 'Your account is not subscribe, please subscribe to use all the features of this application.');
        }

        if(isset($client) && $request->user()->isSubscribed() && $client->name == '') {
            return redirect('/client/settings/company')->with('inline_error', 'Please add a salon name so that your products and services will be viewable by other customers.');
        }
    
        return $next($request);
    }
}
