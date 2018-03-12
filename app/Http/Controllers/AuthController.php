<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use JWTAuth;
use Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;
class AuthController extends Controller
{
    public function authenticatelogin(Request $request)
    {   
        Log::info("authenticate login");
        try {
            $token = JWTAuth::attempt($request->only('email', 'password'));
        } catch (JWTException $e) {
            return response()->json([
                'error' => 'Could not authenticate',
            ], 500);
        }

        if (!$token) {
            return response()->json([
                'error' => 'Could not authenticate',
            ], 401);
        } else {
            $userdata  = [];
            $tokendata = [];
            $userdata  = $request->user();
            $tokendata = $token;
            return Response::json([
                'userdata' => $userdata,
                'token'    => $tokendata,
            ]);
        }
    }
}
