<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'api_token' => Str::random(20),
        ]);

        $this->mailSender($data,$data->email);
        return response()->json([
            'status' => 'success',
            'message'=> 'Pendaftaran Akun Berhasil',
            'data' => $data
        ]);
    }

    private function mailSender($user,$email)
    {
        $data = [
            'name' => $user->name,
            'token' => $user->api_token,
        ];

        Mail::send('token', compact('data'), function ($message) use($email) {
            $message->to($email);
            $message->subject('Token API');
        });
    }
}
