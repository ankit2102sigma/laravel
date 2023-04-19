<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class TaskController extends Controller
{
    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $task = new Tasks();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    public function index()
    {
        $tasks = Tasks::all();
        return view('index', compact('tasks'));
    }

}
