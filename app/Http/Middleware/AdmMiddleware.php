<?php

namespace App\Middleware;

use Closure;
use App\User;
use Illuminate\Contracts\Auth\Guard;

class AdmMiddleware
{

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $this->auth->user();
        if(!($user->isadmin === 79)){
           return redirect('login');

        }
        return $next($request);
    }
}
