<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        if(User::where('email', $request->email)->first())
        {
            return response([
                'message' => 'EmailId Already Exists',
                'status' => 'failed'
            ], 200);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken($request->email)->plainTextToken;

        return response([
            'token' => $token,
            'message' => 'User Registered Successfully',
            'status' => 'success'
        ], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if($user && Hash::check($request->password, $user->password))
        {
            $token = $user->createToken($request->email)->plainTextToken;

            return response([
                'token' => $token,
                'message' => 'User LoggedIn Successfully',
                'status' => 'success'
            ], 200);
        }

        return response([
            'message' => 'The Provided Credenitals Are Incorrect',
            'status' => 'failed'
        ], 401);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'User LogOut Successfully',
            'status' => 'success'
        ], 200);
    }

    public function logged_user()
    {
        $loggedUser = auth()->user();
        return response([
            'user' => $loggedUser,
            'message' => 'Logged User Data',
            'status' => 'success'
        ], 200);
    }

    public function changed_password(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $loggedUser = auth()->user();
        $loggedUser->password = Hash::make($request->password);
        $loggedUser->save();
        return response([
            'message' => 'Password Changed Successfully',
            'status' => 'success'
        ], 200);
    }
}