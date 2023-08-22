<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validation=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8',
            'passwordConfirmation'=>'required|same:password'
        ]);
        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        try {
            $user=User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            return response()->json([
                'status'=>true,
                'message'=>'Success Register',
                'data'=>$user
            ], 200);
        } catch (\Throwable $th) {
            return response()->json(['status'=>false,'message'=>$th->getMessage()], 422);
        }
    }
    public function login(Request $request)
    {
        $validation=Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }
        $user=User::whereEmail($request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status'=>false,
                'message'=>'These credentials do not match our records.'
            ], 404);
        }
        return response()->json([
            'status'=>true,
            'message'=>'Success Login',
            'data'=>$user,
            'token'=>$user->createToken('ApiToken')->plainTextToken
        ], 200);
    }
    public function logout()
    {
        Auth::logout();
            return response()->json([
                'status'    => true
            ], 200);
    }
}
