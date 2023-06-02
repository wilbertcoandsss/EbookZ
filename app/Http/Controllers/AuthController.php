<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function register(Request $req)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'gender' => 'required',
            'dob' => 'required|date|before:-13 years'
        ];

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
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

    public function login(Request $req)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $credentials = [
            'email' => $req->email,
            'password' => $req->password
        ];

        if ($req->remember) {
            Cookie::queue('mycookie', $req->email, 50);
        }

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {
                return redirect('adminpage');
            } else {
                return redirect('/');
            }
        }

        return back()->withErrors([
            'notmatch' => 'Your credentials are invalid',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function updateProfileAdmin(Request $req, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email',
        ];

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        User::where('id', $req->id)->update([
            'name' => $req->name,
            'email' => $req->email
        ]);

        return redirect('/profileAdmin')->with('message', 'Profile Updated succesfully!');
    }

    public function updateProfileCustomer(Request $req, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email',
        ];

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        User::where('id', $req->id)->update([
            'name' => $req->name,
            'email' => $req->email
        ]);

        return redirect('/profileCustomer')->with('message', 'Profile Updated succesfully!');
    }

    public function updateAccountAdmin(Request $req, $id){
        $rules = [
            'confirm_pw' => 'required|same:new_pw',
            'old_pw' => 'required',
            'new_pw' => 'required'
        ];

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $data = $req->all();

        $user = User::find($id);

        if(!Hash::check($data['old_pw'], $user->password)){
            return back()->withErrors([
                'old_pw' => 'Old password didnt match',
            ]);
       }

       User::where('id', $req->id)->update([
            'password' => bcrypt($req->new_pw)
       ]);

       return redirect('/profileAdmin')->with('message', 'Account Updated succesfully!');
    }


    public function updateAccountCustomer(Request $req, $id){
        $rules = [
            'confirm_pw' => 'required|same:new_pw',
            'old_pw' => 'required',
            'new_pw' => 'required'
        ];

        $validator = Validator::make($req->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $data = $req->all();

        $user = User::find($id);

        if(!Hash::check($data['old_pw'], $user->password)){
            return back()->withErrors([
                'old_pw' => 'Old password didnt match',
            ]);
       }

       User::where('id', $req->id)->update([
            'password' => bcrypt($req->new_pw)
       ]);

       return redirect('/profileCustomer')->with('message', 'Account Updated succesfully!');
    }
}
