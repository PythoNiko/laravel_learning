<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ToDo: Validation and error handling
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid');
            $table->string('county');
            $table->string('country');
            $table->string('town');
            $table->string('description');
            $table->string('full_details_url');
            $table->string('displayable_address');
            $table->string('image_url')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longtitude', 10, 7)->nullable();
            $table->tinyInteger('num_of_bedrooms');
            $table->tinyInteger('num_of_bathrooms');
            $table->decimal('price', 10, 2);
            $table->string('property_type');
            $table->string('for_sale_rent');
            $table->timestamps();
            $table->softDeletes();
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
