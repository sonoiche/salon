<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Client;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckClientName
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $client = Client::where('user_id', $request->user()->id)->first();
        if($request->user()->role == 'Client' && isset($client->name) && $client->name == '') {
            // Redirect to a subscription page or return a 403 error
            return redirect('/client/settings/company')->with('inline_error', 'Please set up your salon first.');
        }
        
        return $next($request);
    }
}
