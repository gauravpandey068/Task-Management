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
        $tasks = auth()->user()->task()->orderBy('created_at', 'desc')->paginate(5);
        return view('home.home', [
            'tasks' => $tasks
        ]);
    }

    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, [
            'task' => 'required|max:255',
        ]);
        //store the data
        $request->user()->task()->create([
            'task' => $request->task,
        ]);
        //redirect to the home page
        return redirect()->route('home');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('home');
    }

    public function edit(Task $task)
    {
        return view('home.edit', [
            'task' => $task
        ]);
    }
    public function update(Request $request, Task $task)
    {
        $this->validate($request, [
            'task' => 'required|max:255',
        ]);
        $task->task = $request->task;
        $task->save();
        return redirect()->route('home');
    }
}
