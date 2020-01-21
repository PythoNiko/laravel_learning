@extends('master_layout')

@section('title')
    PHP Learning
@endsection

@section('heading')
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

    <h1><b>API's</b></h1>
    <?php
        echo "<h2><b>GET</b></h2>";
        ######################################
        #                GET                 #
        ######################################
        $url = 'www.google.com';

        //create a new cURL resource
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL request with all previous settings
        $response = curl_exec($ch);

        $info = curl_getinfo($ch);

        // Close cURL session
        curl_close($ch);

        echo $info["http_code"] . "<br>";

        if($info["http_code"] == 200){
            echo "Response Code: " . $info["http_code"] . ". Success!";
        } else {
            echo "Response Code: " . $info["http_code"] . ". Error!";
        }
        echo "<br><br>";

        echo "<h2><b>POST</b></h2>";
        ######################################
        #               POST                 #
        ######################################
        $url = 'http://dummy.restapiexample.com/api/v1/create';

        $post_data = array(
            'name'  =>'New User 123',
            'salary'=>'65000',
            'age'   => '33'
        );

        //create a new cURL resource
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        // Execute cURL request with all previous settings
        $response = curl_exec($ch);

        if($response === FALSE){
            echo "CURL ERROR: " . curl_error($ch);
        }

        $info = curl_getinfo($ch);

        // Close cURL session
        curl_close($ch);

        echo $info["http_code"] . "<br>";

        if($info["http_code"] == 200){
            echo "Response Code: " . $info["http_code"] . ". Success!";
        } else {
            echo "Response Code: " . $info["http_code"] . ". Error!";
        }
        echo "<br><br>";

    ?>
@endsection
