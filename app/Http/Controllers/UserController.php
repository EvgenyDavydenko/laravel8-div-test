<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        // validation
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed"
        ]);

        // create data
        $u = new User();

        $u->name = $request->name;
        $u->email = $request->email;
        $u->password = Hash::make($request->password);

        $u->save();

        // send response
        return response()->json([
            "status" => true,
            "message" => "User registered succesfully"
        ]);
    }

    public function login(Request $request){
        // validation
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        // check user
        $u = User::where("email", "=", $request->email)->first();

        if(isset($u->id)){

            if(Hash::check($request->password, $u->password)){

                // create a token
                $token = $u->createToken("auth_token")->plainTextToken;

                /// send a response
                return response()->json([
                    "status" => true,
                    "message" => "User logged in successfully",
                    "access_token" => $token
                ]);
            }else{

                return response()->json([
                    "status" => false,
                    "message" => "Password didn't match"
                ], 404);
            }
        }else{

            return response()->json([
                "status" => false,
                "message" => "User not found"
            ], 404);
        }
    }

    public function profile(){
        return response()->json([
            "status" => true,
            "message" => "User Profile information",
            "data" => auth()->user()
        ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json([
            "status" => 1,
            "message" => "User logged out successfully"
        ]);
    }
}
