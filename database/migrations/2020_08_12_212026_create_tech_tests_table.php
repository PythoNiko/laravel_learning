<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('county');
            $table->string('country');
            $table->string('town');
            $table->string('description');
            $table->string('full_details_url');
            $table->string('displayable_address');
            $table->string('image_url');
            $table->string('thumbnail_url');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longtitude', 10, 7);
            $table->tinyInteger('num_of_bedrooms');
            $table->tinyInteger('num_of_bathrooms');
            $table->decimal('price', 8, 2);
            $table->string('property_type');
            $table->string('for_sale_rent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
