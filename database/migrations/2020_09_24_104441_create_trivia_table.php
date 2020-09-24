<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriviaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trivia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('question');
            $table->text('answer');
            $table->timestamps();
        });

        DB::table('trivia')->insert([
            ['question' => 'What’s the difference between the include() and require() functions?',
                'answer' => 'They both include a specific file but on require the process exits with a fatal error if
                            the file can’t be included, while include statement may still pass and jump to the next
                            step in the execution.'],
            ['question' => 'How can we get the IP address of the client?',
                'answer' => '$_SERVER["REMOTE_ADDR"]; is the easiest solution, but you can write x line scripts for
                            this question.'],
            ['question' => 'What’s the difference between unset() and unlink()',
                'answer' => 'unset() sets a variable to “undefined” while unlink() deletes a file we pass to it
                            from the file system.'],
            ['question' => 'What are the main error types in PHP and how do they differ?',
                'answer' => 'Notices – Simple, non-critical errors that are occurred during the script execution.
                            An example of a Notice would be accessing an undefined variable.
                            Warnings – more important errors than Notices, however the scripts continue
                            the execution. An example would be include() a file that does not exist.
                            Fatal – this type of error causes a termination of the script execution when it
                            occurs. An example of a Fatal error would be accessing a property of a non-existent object
                            or require() a non-existent file.'],
            ['question' => 'What are Traits?',
                'answer' => 'Traits are a mechanism that allows you to create reusable code in languages like PHP
                            where multiple inheritance is not supported. A Trait cannot be instantiated on its own.'],
            ['question' => 'Can the value of a constant change during the script’s execution?',
                'answer' => 'No, the value of a constant cannot be changed once it’s declared during the
                            PHP execution.'],
            ['question' => 'Can you extend a Final defined class?',
                'answer' => 'No, you cannot extend a Final defined class. A Final class or method declaration prevents
                            child class or method overriding.'],
            ['question' => 'What are the __construct() and __destruct() methods in a PHP class?',
                'answer' => 'All objects in PHP have Constructor and Destructor methods built-in. The Constructor
                            method is called immediately after a new instance of the class is being created,
                            and it’s used to initialize class properties. The Destructor method takes no parameters.'],
            ['question' => 'How we can get the number of elements in an array?',
                'answer' => 'The count() function is used to return the number of elements in an array.'],
            ['question' => 'The value of the variable input is a string 1,2,3,4,5,6,7. How would you get the sum of
                            the integers contained inside input?',
                'answer' => 'array_sum(explode(",",$input));'],
            ['question' => 'What are the 3 scope levels available in PHP and how would you define them?',
                'answer' => 'Private, Public, Protected'],
            ['question' => 'What are getters and setters and why are they important?',
                'answer' => 'Getters and setters are methods used to declare or obtain the values of variables,
                            usually private ones. They are important because it allows for a central location that
                            is able to handle data prior to declaring it or returning it to the developer. Within a
                            getter or setter one is able to consistently handle data that will eventually be passed
                            into a variable or additional functions. An example of this would be a user’s name.
                            If a setter is not being used and the developer is just declaring the $userName variable
                            by hand, you could end up with results as such: "kevin", "KEVIN", "KeViN", "", etc.
                            With a setter, the developer can not only adjust the value, for example,
                            ucfirst($userName), but can also handle situations where the data is not valid such as
                            the example where "" is passed. The same applies to a getter – when the data is being
                            returned, it can be modifyed the results to include strtoupper($userName) for proper
                            formatting further up the chain.']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trivia');
    }
}
