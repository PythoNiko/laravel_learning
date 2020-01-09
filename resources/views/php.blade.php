@extends('master_layout')

@section('title')
    PHP Learning
@endsection

@section('content')

    <?php
        class Task{

            protected $description;
            protected $completed = false;

            // constructor
            public function __construct($description){
                $this->description = $description;
            }

            public function isComplete(){
                return $this->completed;
            }

            public function complete(){
                $this->completed = true;
            }
        }

        // new task object
        $task = new Task('Go to the store');

        // complete the task
        $task->complete();

        // should return true(1)
        echo $task->isComplete();
    ?>

@endsection
