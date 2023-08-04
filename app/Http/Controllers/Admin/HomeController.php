<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:8",

        ], [
            "required" => "Please enter full information.",
            "min"=>"Please enter at least :min characters.",
            "email" => "Please enter a valid email address.",
        ]);

        $credentials =[
            'email'=> $request->email,
            'password'=> $request->password,
            'level'=> [Constant::user_level_host,Constant::user_level_admin],
        ];
            $remember = $request->remember;
        if (Auth::attempt($credentials,$remember)) {
            return redirect()->intended('admin');
        } else {
            return back()->with('notification', 'ERROR: Email or password is wrong');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('admin/login');
    }

}
