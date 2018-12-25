<?php

namespace App\Http\Middleware;

use App\Packages\Tools\Smip\Smip;
use Closure;


class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        @session_start();
//        $_SESSION['locale'] = 'fa';
        app()->setlocale("fa");
        return $next($request);


        if($request->header('Locale')){
            $_SESSION['locale'] = $request->header('Locale');
            app()->setlocale($request->header('Locale'));
            return $next($request);
        }
        try {

            if (empty($_SESSION['locale'])) {
                $smip = new Smip();
                $sm = $smip->getIp();
                if ($sm->country_code == "IR") {
                    $_SESSION['locale'] = 'fa';
                }
            }
        } catch (\Exception $e) {
            $_SESSION['locale'] = 'en';
        }
        try {
            if ($_SESSION['locale']) {
                app()->setlocale($_SESSION['locale']);
            }
        } catch (\Exception $e) {
            $_SESSION['locale'] = 'en';
            app()->setlocale(session('locale'));
        }

        return $next($request);
    }
}
