<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeagueUpdateFlagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('league_update_flag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('last_update')->default(Carbon::now());
        });

        DB::table('league_update_flag')->insert([
            ['last_update' => Carbon::now()]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('league_update_flag');
    }
}
