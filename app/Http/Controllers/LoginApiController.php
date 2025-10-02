<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginApiController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validate input
        $credentials = $request->validate([ //credentials = أوراق اعتماد
             'email' => 'required|email',
             'password' => 'required|string',
        ]);

        // 2. Attempt login
        //Attempt to authenticate the user with the provided credentials.
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid email or password'
            ], 401);
        }

        //create token for users
        return response()->json([
            'user'=> auth()->user(), //returns the currently logged-in user (from the database).
            'token'=>auth()->user()->createToken('auth_token')->plainTextToken, //(createToken('auth_token') → creates a new API token for the user using Laravel Sanctum.) //'auth_token' just name
            'status'=> 'success',
        ],200);


    }
}
