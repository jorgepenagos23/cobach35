<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\AutenticateExeption;
use Laravel\Sanctum\Sanctum;
use Laravel\Sanctum\PersonalAccessToken;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user instanceof \App\Models\User) {
                $token = $user->createToken(Auth::id())->plainTextToken;

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
     
        Auth::logout();
        $request->session()->invalidate();
    
        return response()->json(['message' => 'Sesión cerrada y token eliminado '],200);
    }




    public function revokeAllTokens()
    {
        PersonalAccessToken::where('id', '>', 0)->delete();
        
        return response()->json(['message' => 'Todos los tokens han sido revocados']);
    }
}
