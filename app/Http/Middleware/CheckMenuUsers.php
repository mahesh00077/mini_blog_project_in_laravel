<?php

namespace App\Http\Middleware;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Session;
use Closure;

class CheckMenuUsers
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
        $POST = Session::get('USERS');
        /* echo $CAT = Session::get('CAT');
        echo $TAG = Session::get('TAG');
        echo $USERS = Session::get('USERS');
        echo $UROLE = Session::get('UROLE');
        if ($USERS != '1') {
            // die('aa');
            return redirect('admin/dashboard');
        } else {
            return $next($request);
        } */
        if ($POST != '1') {
            // die('aa');
            return redirect('admin/dashboard')->with('error', 'Sorry you dont have permission');
        } else {
            return $next($request);
        }
    }
}