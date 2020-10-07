<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeagueTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('league_table', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('rank');
            $table->string('name');
            $table->tinyInteger('matches_played');
            $table->tinyInteger('won');
            $table->tinyInteger('drawn');
            $table->tinyInteger('lost');
            $table->tinyInteger('goal_diff');
            $table->tinyInteger('points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('league_table');
    }
}
