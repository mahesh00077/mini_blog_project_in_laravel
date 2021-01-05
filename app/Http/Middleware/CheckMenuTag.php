<?php

namespace App\Http\Middleware;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Session;
use Closure;

class CheckMenuTag
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
        $POST = Session::get('TAG');

        if ($POST != '1') {
            // die('aa');
            return redirect('admin/dashboard');
        } else {
            return $next($request);
        }
    }
}