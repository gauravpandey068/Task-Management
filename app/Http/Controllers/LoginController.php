<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('auth.login');
    }
    public function store(Request $request){
        //validate data
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
        //login user
        if(!auth()->attempt($request->only(['email', 'password']))){
            return back()->with('status', 'Invalid Credentials');
        }
        //redirect
        return redirect()->route('home');
    }
    public function logout(Request $request){
        //logout
        auth()->logout();
        return redirect('/');
    }
}
