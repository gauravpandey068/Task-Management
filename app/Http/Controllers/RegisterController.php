<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){
        //validate data
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
        ]);
        //create user
        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);
        //login user
        auth()->attempt($request->only(['email', 'password']));
        //redirect
        return redirect()->route('home');
    }
}
