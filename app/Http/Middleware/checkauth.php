<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class checkauth
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
       $user = Session::get('user');
       $url = $request->url();
       if($user || strpos($url,"login")!== false || strpos($url,"resetuser")!== false|| strpos($url,"resetpass")!== false)
        return $next($request);
        else
        return redirect()->intended('/login');
    }
}
