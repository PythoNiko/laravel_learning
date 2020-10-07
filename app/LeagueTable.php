<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeagueTable extends Model
{
    public $timestamps = false;

    /**
     * Table that the model represents
     *
     * @var string
     */
    protected $table = 'league_table';

    /**
     * Mass assignable variables
     *
     * @var string[] $fillable
     */
    protected $fillable = [
        'rank',
        'name',
        'matches_played',
        'won',
        'drawn',
        'lost',
        'goal_diff',
        'points'
    ];
}
