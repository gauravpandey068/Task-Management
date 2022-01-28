<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home.home');
    }
    public function store(Request $request){
        //validate the data
        $this->validate($request,[
            'task'=> 'required|max:255',
        ]);
        //store the data
        Task::create([
            'task'=>$request->task,
        ]);
        //redirect to the home page
        return redirect()->route('home');
    }
}
