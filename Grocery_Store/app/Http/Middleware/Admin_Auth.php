<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin_Auth
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
        if ($request->session()->has('ADMIN_LOGIN')) {
            // $request->session()->put('ADMIN_LOGIN',true);
            // $request->session()->put('ADMIN_ID',$result['0']->id);
            // return view('admin.dashboard');
          } else {
             $request->session()->flash('error','Please Enter the valid login Details !!');
             return redirect('admin');
          }
        return $next($request);
    }
}
