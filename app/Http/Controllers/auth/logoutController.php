<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class logoutController extends Controller
{
    public function logout(Request $request){
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response()->json(
            [
                "message"=>"Successfully Logout"
            ]
            );

    }
}
