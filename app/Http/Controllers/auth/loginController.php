<?php

namespace App\Http\Controllers\auth;
use App\Models\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::User();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'message'=>'sucess',
                'id'=>$user->id,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], 200);
        }
        else{
            return response()->json([
                "message"=>"Invalid Email or Password"
            ]);
    }
}
}
