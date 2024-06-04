<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Mail\Message;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PasswordResetController extends Controller
{
    public function send_reset_password_email(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $email = $request->email;

        $user = User::where('email', $email)->first();
        if(!$user)
        {
            return response([
                'message' => 'Email Doesnot Exist',
                'status' => 'failed',
            ], 404);
        }

        $token = Str::random(60);

        PasswordReset::create([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        Mail::send('reset', ['token' => $token], function(Message $message) use($email){
            $message->subject('Reset Your Password');
            $message->to($email);
        });

        return response([
            'message' => 'Password Reset Email Sent ... Check Your Email',
            'status' => 'success',
        ], 200);
    }

    public function reset(Request $request, $token)
    {

        $formatted = Carbon::now()->subMinutes(1)->toDateTimeString();
        PasswordReset::where('created_at', '<=', $formatted)->delete();

        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $passwordReset = PasswordReset::where('token', $token)->first();
        if(!$passwordReset)
        {
            return response([
                'message' => 'Token Is Invalid Or Expired',
                'status' => 'failed',
            ], 404);
        }

        $user = User::where('email', $passwordReset->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        PasswordReset::where('email', $user->email)->delete();
        return response([
            'message' => 'Password Reset Successfully',
            'status' => 'success',
        ], 200);
    }
}