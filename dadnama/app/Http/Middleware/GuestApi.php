<?php

namespace App\Http\Middleware;

use App\Packages\Auth\Model\ApiToken;
use Closure;

class GuestApi
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

        $api_gkey=$request->header('Apigkey');
        $api=new ApiToken();
        if($api->checkKey($api_gkey)){
            return $next($request);
        }else{
            return response(['error'=>true,'status'=>207],405);
        }

    }
}
