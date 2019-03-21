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
  /*  public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        if ($user && $user->admin == true) {
            return $next($request);
          }      
        return redirect('index');
    } */
}
