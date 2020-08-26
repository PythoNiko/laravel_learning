<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataLoaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_loader', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('data_loaded')->default(0);
            $table->timestamps();
        });

        DB::table('data_loader')->insert([
            ['data_loaded' => 0]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_loader');
    }
}
