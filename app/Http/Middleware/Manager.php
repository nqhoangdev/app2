<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;


use Closure;

class Manager
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
        if (!Auth::check()) {
            return redirect(action('Auth\AuthController@getLogin'));
        } else {
            $user = Auth::user();
            if($user->hasRole('manager')){
                return $next($request);
            }
            else {
                redirect(home)->with('status', 'You are not authorized to access Admin section!');
            }
        }
        return $next($request);
    }
}
