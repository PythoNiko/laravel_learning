@extends('master_layout')

@section('title')
    PHP Learning
@endsection

@section('content')

    <?php
        class Task{

            public $testString = "This is to test object's public access...";
            private $num = 5;
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

            public function addFive($secondNum){
                $answer = $this->num + $secondNum;
                return $answer;
            }
        }

        // new task object
        $task = new Task('Go to the store');

        // complete the task
        $task->complete();

        // should return true(1)
        if($task->isComplete()){
            echo "Task is complete";
        } else{
            echo "Task is not complete";
        }

        echo $task->isComplete() . "<br><br>";
        echo $task->testString . "<br><br>";
        echo $task->addFive(10) . "<br><br>";
    ?>

@endsection
