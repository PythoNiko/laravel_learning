<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeagueUpdateFlag extends Model
{
    /**
     * Table that the model represents
     *
     * @var string
     */
    protected $table = 'league_update_flag';

    /**
     * Mass assignable variables
     *
     * @var string[] $fillable
     */
    protected $fillable = [
        'last_update'
    ];
}
