<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trivia extends Model
{
    /**
     * Table that the model represents
     *
     * @var string
     */
    protected $table = 'trivia';

    /**
     * Mass assignable variables
     *
     * @var string[] $fillable
     */
    protected $fillable = [
        'question',
        'answer'
    ];
}
