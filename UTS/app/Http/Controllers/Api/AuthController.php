<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse{
        $request->validate([
            'email' => 'required|email|max:225',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message'=> 'The Provided credentials are incorrect'
            ], 401);
        }
        $token = $user->createToken($user->name, 'Auth-Token')->plainTextToken;

        return response()->json([
            'message' => 'Login succesful',
            'token_type' => 'Bearer',
            'token' => $token,
            'role' => $user->role
        ], 200);
    }

    public function register(Request $request): JsonResponse{
        $request->validate([
            'name => required|string|max: 225',
            'email' => 'required|email|unique:users,email| max:225',
            'password' => 'required|string|min:6',
            'role' => 'required|string|in:author,registered_user',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make( $request->password),
            'role' => $request->role
        ]);

        if ($user){
            $token = $user->createToken($user->name, ['*'])->plainTextToken;

            return response()->json([
                'message' => 'Registration succesful',
                'token_type' => 'Bearer',
                'token' => $token
            ], 200);

        } else {

            return response()->json([
                'message' => 'Something went wrong! while registration',
            ], 500);
        }
    }


    // public function blog(Request $request){
    //     if($request->user){
    //         return response()->json([
    //             'message' => 'Blog Fetched',
    //             'data' => $request->user()
    //         ], 200);

    //     } else {
    //         return response()->json([
    //             'message' => 'Not Autentichated',
    //         ], 401);
    //     }
    // }
}
