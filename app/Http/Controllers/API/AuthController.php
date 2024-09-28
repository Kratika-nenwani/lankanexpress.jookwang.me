<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    public function emaillogin(Request $request): Response
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response(['message' => $validator->errors()], 401);
        }

        // Retrieve user by email
        $user = User::where('email', $request->input('email'))->first();

        // Generate a new token for the user
        if($user){
            $token = $user->createToken('lanka-express')->plainTextToken;
            $user->token = $token;
            $user->save();
            Auth::login($user);
        }else{
            return response([
                'message' => 'User not found',
            ], 401);
        }
        // Return user details along with token
        return response([
            'user' => $user,
            'token' => $token,
        ], 200);
    }


    public function login(Request $request): Response
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return Response(['message' => $validator->errors()], 401);
        }
        if (Auth::attempt($request->all())) {
            $user = Auth::user();
            $token = $user->createToken('mk-network')->plainTextToken;
            $user->token = $token;
            $user->save();
            return response(['user' => $user], 200);
        }
        return response(['message' => 'email or password wrong'], 401);
    }


    public function save_token(Request $request){
        $request->validate([
            'fcmtoken' => 'required'
        ]);
        $user = User::find(Auth::user()->id);
        $user->device_token = $request->fcmtoken;
        $user->save();
        return response()->json([
            'success' => true    
        ]);
    }


    public function userDetails(Request $request): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $token = $user->token; // Retrieve the stored token

            return response([
                'data' => $user,
            ], 200);
        }

        return response(['data' => 'Unauthorized'], 401);
    }

    public function logout(): Response
    {
        $user = Auth::user();
        $user->token = null;
        $user->currentAccessToken()->delete();
        $user->save();

        return Response(['data' => 'User Logout successfully.'], 200);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'country'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = User::where('email', $request->email)->first();
        if($user){
            return response([
                'message' => 'User already exist!'    
            ], 401);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'dob' => $request->dob,
            'gender' => $request->gender,
             'country' => $request->country,
        ]);
        if(Auth::attempt(['email' => $user->email, 'password' => $request->password])){
            $user = Auth::user();
            $token = $user->createToken('mk-network')->plainTextToken;
            $user->token = $token;
            $user->save();
            return response(['message' => 'Registered Successfully!', 'user' => $user], 200);
        }
        else{
            return response([
                'message' => 'Please try after sometime!'    
            ]);
        }
    }



    // public function updateprofile(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         // 'name' => 'required',
    //         // 'email' => 'required',
    //         // 'phone' => 'required',

    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     $user = Auth::user();

    //     // Update user details
    //     $user->name = $request->input('name');
    //     $user->email = $request->input('email');
    //     $user->phone = $request->input('phone');
    //     $user->dob = $request->input('dob');
    //     $user->gender = $request->input('gender');
    //     $user->country = $request->input('country');

    //     $user->save();
        
    //     return response()->json([
    //         'message' => 'Profile updated successfully!',
    //         'user' => $user,
    //     ], 200);
    // }
    
    
   public function updateprofile(Request $request)
{
    // Validate the incoming request
    $validated = $request->validate([
        
        
        // 'phone' => 'nullable',
        // 'dob' => 'nullable',
        // 'gender' => 'nullable',
        // 'country' => 'nullable',
    ]);

    // Retrieve the authenticated user
    $user = Auth::user();
    
    if ($request->has('name')) {
        $user->name = $request->input('name');
    }
    
     if ($request->has('phone')) {
        $user->phone = $request->input('phone');
    }
    
    if ($request->has('dob')) {
        $user->dob = $request->input('dob');
    }
    if ($request->has('gender')) {
        $user->gender = $request->input('gender');
    }
    if ($request->has('country')) {
        $user->country = $request->input('country');
    }

    // Save the updated user
    $user->save();

    // Return a success response
    return response()->json([
        'message' => 'Profile updated successfully!',
        'user' => $user,
    ], 200);
}

}
