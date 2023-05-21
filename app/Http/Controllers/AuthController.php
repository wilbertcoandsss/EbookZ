<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function login(Request $req){
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()){
            return back()->withErrors($validator);
        }

        $credentials = [
            'email' => $req->email,
            'password' => $req->password
        ];

        if($req->remember){
            Cookie::queue('mycookie', $req->email, 50);
        }

        if(Auth::attempt($credentials)){
            return redirect('/');
        }

        return back()->withErrors([
            'notmatch' => 'Your credentials are invalid',
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
