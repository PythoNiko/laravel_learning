<?php

namespace App\Http\Controllers;

use App\Helpers;
use App\Property;
use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    // Calls from db, and returns data to view
    public function index()
    {
        $tasks = Task::all();
        $first_task = Task::all()->first()->id;
        $last_task = Task::all()->last()->id;
        $current_url = url()->current();

        // The pluck method retrieves all of the values for a given key:
        $plucked_tasks = $tasks->pluck('name');

        return view("tasks.index", compact(
            'tasks',
            'first_task',
            'last_task',
            'current_url',
            'plucked_tasks'
        ));
    }

    public function create()
    {
        return view("tasks.create");
    }

    // Stores data into db
    public function store()
    {
        $task = new Task();
        $task->name = request('title');
        $task->description = request('description');

        $task->save();

        return redirect('/tasks');

        // test for upload repo to new laptop switchover
    }

    public function show()
    {
        // code here
    }

    public function edit($id)
    {
        $tasks = Task::find($id);
        return view("tasks.edit", compact("tasks"));
    }

    public function update(Request $request, Property $property)
    {
        // code here
    }

    public function destroy()
    {
        // code here
    }
}
