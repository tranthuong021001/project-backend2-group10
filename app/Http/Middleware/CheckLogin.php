<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        $user = $request->username;
        $pass = $request->password;
        if($user == "thuong" && $pass == "123"){
           return $next($request);
        }
        return redirect("/");
    }
}
