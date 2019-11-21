<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(){
        $tasks = Task::all();

        return view("tasks.index", compact('tasks'));
    }

    public function create(){
        return view("tasks.create");
    }

    public function store(){
        $task = new Task();

        $task->name = request('title');

        $task->save();

        return redirect('/tasks');
    }
}
