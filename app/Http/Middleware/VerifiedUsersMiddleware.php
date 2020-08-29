<?php

namespace App\Http\Middleware;

use Closure;

class VerifiedUsersMiddleware
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
        if (auth()->user()->awaiting_approval != 'verified') {
            return redirect()->back()->with('error', 'Please verify your account or wait for your proof of payment to be confirmed in other to have full access of your dashboard');
        } else {
            return $next($request);
        }
    }
}
