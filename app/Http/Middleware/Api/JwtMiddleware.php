<?php

namespace App\Http\Middleware\Api;

use Closure;
use JWTAuth;
use Exception;
use Illuminate\Http\Request;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      try {
           $user = JWTAuth::parseToken()->authenticate();
       } catch (Exception $e) {
           if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
              return response()->error("Token is Invalid.", 500);
           }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
               return response()->error("Token is Expired.", 401);
           }else{
             return response()->error("Authorization Token not found.", 401);
           }
       }
       return $next($request);
    }
}
