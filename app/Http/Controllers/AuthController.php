<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function register(Request $req){
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'gender' => 'required',
            'dob' => 'required|date|before:-13 years'
        ];

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()){
            return back()->withErrors($validator);
        }


        User::insert([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'gender' => $req->gender,
            'dob' => $req->dob,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect('/');
    }

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
