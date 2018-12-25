<?php

namespace App\Http\Middleware;


use Closure;

class UserApi
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

        $api_gkey = $request->header('Apigkey');
        $user = token()->get($api_gkey);
        if ($user) {
            session()->put('user', $user->user);
            return $next($request);
        }
        return response(['error' => true, 'errors' => ['token hse expire']], 404);
    }
}
