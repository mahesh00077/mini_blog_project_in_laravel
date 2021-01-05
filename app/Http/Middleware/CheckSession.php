<?php

namespace App\Http\Middleware;

use Session;
use Closure;

class CheckSession
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
        $UID = Session::get('UID');
        // $USRS = Session::get('USERS');
        if ($UID == '') {
            return redirect(url('admin-login'))->with('error', 'Your Session expired please login again!!..');
        }
        // die;
        return $next($request);
    }
}