<?php

namespace App\Http\Controllers\auth;
use App\Models\User;
use Validator;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function setupProfile(Request $request)
    {
        $user = Auth::user();
        
        // Check if the user is authenticated
        if (!$user) {
            return response()->json(["message" => 'Not Authorized'], 401);
        }

        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'image' => 'nullable|mimes:png,jpg,webp|max:2048',
            'dob' => 'required|date',
            'gender' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Update user information
        $user->username = $request->username;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->dob;

        // Handle profile picture upload
        if ($request->hasFile('image')) {
            // Store image and get the path
            $path = $request->file('image')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        // Save the user
        $user->save();

        return response()->json(["message" => 'Profile updated successfully', "user" => $user], 200);
    }
}

