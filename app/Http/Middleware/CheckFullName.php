<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class CheckFullName
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
        $exceptions = ["profile","/logout"];
        if (Auth::check() && empty(Auth::user()->fullName()) && !in_array($request->path(),$exceptions) ) {
            $output = '<small>'.
                '<div class="col-md-6 col-md-offset-3 fade in text-center mt-20 clearfix simplebox alert alert-danger" id="flash_message">'.
                '<i class="fa fa-warning"></i> ' .
                '<strong>Please fill your full name for visibility in your ads</strong>' .
                '</div>' .
                '<div class="clearfix"></div>' .
                '</small>';
            Session::flash('flash_message', $output);
            return redirect('/profile');
        }
        return $next($request);
    }
}
