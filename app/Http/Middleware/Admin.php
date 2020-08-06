<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        //check if session exits and if user has adin role
        $this->auth=auth()->user()? (auth()->user()->role == 0) : false;

        // pass request if auth is valid
        if($this->auth === true)
          return $next($request);
        //redirect to login route with a flash message
        return redirect()->route('login')->with('error', 'Access denied. Login to continue.');


    }
}
