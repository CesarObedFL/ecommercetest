<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ApiLoginRequest;
use App\User;

class AuthController extends Controller
{
    public function signup(UserRequest $request) 
    {
    	$user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password)
                ]);
        return response()->json(['message' => __('user_created')], 201);
    }

    public function login(ApiLoginRequest $request)
    {
    	if(!auth()->attempt($request->all())) {
    		return response()->json(['message' => __('credentials.invalid')], 401);
    	}

    	$accessToken = auth()->user()->createToken('authToken')->accessToken;
    	return response()->json([
    			'user' => auth()->user(), 
    			'access_token' => $accessToken,
    			'token_type' => 'Bearer'
    		]);
    }

    public function logout(Request $request)
    {
    	$request->user()->token()->revoke();
        return response()->json(['message' => __('log.logout')]);
    }
}
