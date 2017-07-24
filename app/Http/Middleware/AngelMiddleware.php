<?php
/**
 * Created by PhpStorm.
 * User: Miigaa
 * Date: 7/9/2017
 * Time: 3:00 PM
 */

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class AngelMiddleware
{
    public function handle($request, Closure $next)
    {
        if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'angel')
            return $next($request);
        else
            return redirect('/');
    }
}