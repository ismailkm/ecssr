<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Student;
use Auth;
use JWTAuth;

class LoginController extends Controller
{

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->error("Please provide both email and password for login.", 422);
        }

        if (! $token = Auth::guard('api')->attempt($validator->validated())) {
            return response()->error("You are not authorized to access.", 401);
        }

        return $this->createNewToken($token);
    }

    /**
      * Log the user out (Invalidate the token).
      *
      * @return \Illuminate\Http\JsonResponse
      */
     public function logout(Request $request) {
         Auth::guard('api')->logout();
         return response()->success('User is successfully signed out');
     }

     /**
      * Refresh a token.
      *
      * @return \Illuminate\Http\JsonResponse
      */
     public function refresh() {
         return $this->createNewToken(Auth::guard('api')->refresh());
     }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        $data = array_merge(Auth::guard('api')->user()->only(['id', 'name', 'email']), ['access_token' => $token]);
        return response()->success("Welcome back.", 200, $data);
    }
}
