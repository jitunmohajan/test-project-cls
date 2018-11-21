<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Redirect;
class isLoggedin
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
        if(!Session::has('userid')){
            //return redirect()->route('login');
            //return view('login');
            return redirect('login');
        }
        return $next($request);
    }
}
