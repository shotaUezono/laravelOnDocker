<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Log;

use Closure;

class Cors
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
    	$response = $next($request);
    	Log::error("ojfodjfodijfadiofjaodif");
    	//三項演算子 A ? B:C AがtrueならB, falseならCｗ実行
    	//$http_origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : "";
	    $response
	        ->header("Access-Control-Allow-Origin" , "http://localhost")
    	    ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
    	    ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
    	//}
        //return $next($request);
        return $response;
    }
}
