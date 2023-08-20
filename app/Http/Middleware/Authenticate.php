<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!auth("web")->check()) {
            return route('login');
        }
        if (request()->route()->getName() == "checkout") {
            toastr()->warning('You are not Customer', 'Log in Or Register as Customer');

            return route('home');
        };

        if (!$request->expectsJson()) {

            toastr()->error('Unknown User! 😴', 'Login as Customer');
            return route('home');
        }
    }
}
