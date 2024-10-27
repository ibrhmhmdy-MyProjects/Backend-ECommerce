<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{
    public function Register(Request $request){
        $validate = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
    
        if($validate->fails()){
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials',
                'errors' => $validate->errors()
            ], 422);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'User created Successfully',
            'data' => $user
        ],200);
    }

    public function login(Request $request){
        $validate = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
    
        if($validate->fails()){
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials',
                'errors' => $validate->errors()
            ], 422);
        }
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials'
            ], 401);
        }
    
        $access_token = \bin2hex(\random_bytes(32));
        $user->update(['access_token' => $access_token]);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
            'access_token' => $access_token
        ], 200);
    }
}
