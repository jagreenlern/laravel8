<?php

namespace App\Http\Middleware;

use Closure;

class InstallerMiddleware
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

        if(!\App\HorizontCMS::isInstalled() && !$request->is(\Config::get('horizontcms.backend_prefix').'/install*')){
            
            \Auth::logout();
            return redirect(\Config::get('horizontcms.backend_prefix').'/install');

        }else if(\App\HorizontCMS::isInstalled() && $request->is(\Config::get('horizontcms.backend_prefix').'/install*')){

            return redirect(\Config::get('horizontcms.backend_prefix').'/login');
        }


        return $next($request);
    }
}
