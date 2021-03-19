<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function login(Request $request){

        //validate
        $validator = Validator::make($request->all(), [
            'email'=>['required', 'email'],
            'password'=>['required'],
        ]);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()], 401);
        }


        $user = User::where('email', $request->input('email'))->first();

        if($user && Hash::check($request->password, $user->password)){


            $user->tokens()->delete();

            $response = [
                'user'=>$user,
                'token' => $user->createToken('token')->plainTextToken,
            ];

            return response()->json(['data'=>$response], 200);
        }else{
            return response()->json(['message'=>'wrong user credentials'], 401);
        }
    }

    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'name'=>['required', 'max:60', 'string'],
            'email'=>['required', 'email'],
            'type'=>['required', 'string', 'regex:(admin|user)'],
            'password'=>['required'],
        ]);

        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()], 401);
        }

        try {
            $user = new User($validator->validated());
            $user->password = Hash::make($user->password);
            $user->save();
            return response()->json(['message'=>'user was created', 'user'=>$user], 200);
        }catch (\Exception $e){
            return response()->json(['errors' => $e->getMessage()], 201);
        }

    }

    public function logout(Request $request){

        try {
            $request->user()->currentAccessToken()->delete();
            return response()->json(['message'=>'logged out successfully'], 200);
        }catch (\Exception $e){
            return response()->json(['errors'=>$e->getMessage()], 500);
        }
    }
}
