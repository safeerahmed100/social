<?php

namespace App\Http\Controllers\auth;
use Auth;
use App\Models\User;

use Hash;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class signupController extends Controller
{
    public function index(){
        return view('auth.signup');
    }

    public function signup(Request $request){
      
        $validate = Validator::make($request->all(),[
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            "email"=>'required|email|unique:users',
            "password" =>"required|min:8"
        ]);
        
        if(!$validate->fails()){
               
            
        $user = new User();
        $isAlreadyUser = $user::Where('email',$request->email)->first();
        if(!$isAlreadyUser){
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }
    else{
        return response()->json(['error' => 'Unauthenticated'], 401);
    }
}
        else{
            return back()->with(['fail' => 'User Already Exists']);
        }
    
    

        
    }
}
