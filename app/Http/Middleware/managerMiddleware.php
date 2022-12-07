<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class managerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //return $next($request);
        if(!$request->session()->get('usertype'))
        {
            return redirect()->route('login');
        }
        else if($request->session()->get('usertype')=='admin')
        {
            return redirect()->route('admin.home');
        }
        else if($request->session()->get('usertype')=='staff')
        {
            return redirect()->route('staff.home');
        }
        else if($request->session()->get('usertype')=='customer')
        {
            return redirect()->route('customer.home');
        }
        else
        {
            return $next($request);
        }
    }
}
