<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\AutenticateExeption;

class LoginController extends Controller
{
    public function authenticate(Request $request)

    {

        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            if ($user instanceof \App\Models\User) {
                $token = $user->createToken(Auth::id())->plainTextToken;
                dump($token);

                return response()->json([
                    'status' => 'success',
                    'access_token' => $token,
                     'user' => $user,

                ]);
            }
        }
        throw new AutenticateExeption;
    }
    
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Cierre de sesión exitoso'], 200);
    }
}
