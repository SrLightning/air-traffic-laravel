<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), User::$rules);

        if ($validator->fails()) 
            return collect([
                'status' => 1, 
                'error' => true, 
                'message' => $validator->errors(), ]); 
        

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']), ]);
            
        
        $token = $user->createToken('auth_token')->plainTextToken;

        return collect([
            'status' => 200,
            'access_token' => $token,
            'token_type' => 'Bearer', ]);
    }

    public function logIn(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
            return collect([
                'status' => 401,
                'message' => 'Invalid login credentials', ]);
        
        $user = User::where('email', '=', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;
        
        return collect([
            'status' => 200,
            'access_token' => $token,
            'token_type' => 'Bearer', ]);
    }
}
