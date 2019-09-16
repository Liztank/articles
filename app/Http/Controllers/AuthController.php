<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class AuthController extends Controller
{
    /**
     * Resgister new user.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|max:55',
            'email'=>'email|required|unique:users',
            'password'=>'required|confirmed'
        ]);

        $data['password']= bcrypt($request->password);
        
        $user = User::create($data);
        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user'=>$user,'access_token'=>$accessToken]);
    }

    /**
     * Validate user.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $data = $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);

        if(!auth()->attempt($data)){
            return response().json(['message'=>'Invalid credentials'],401);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user'=>auth()->user(),'access_token'=>$accessToken]);
    }

    
}
