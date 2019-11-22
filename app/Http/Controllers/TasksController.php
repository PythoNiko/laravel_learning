<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(){
        $tasks = Task::all();
        $first_task = Task::all()->first()->id;
        return view("tasks.index", compact(
            'tasks',
            'first_task'));
    }

    public function create(){
        return view("tasks.create");
    }

    public function store(){
        $task = new Task();

        $task->name = request('title');
        $task->description = request('description');

        $task->save();

        return redirect('/tasks');
    }

    public function show(){
        // code here
    }

    public function edit($id){
        $tasks = Task::find($id);
        return view("tasks.edit", compact("tasks"));
    }

    public function update(){
        // code here
    }

    public function destroy(){
        // code here
    }


}
