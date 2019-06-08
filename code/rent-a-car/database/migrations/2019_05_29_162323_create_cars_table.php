<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->double('price');
            $table->string('image_path');
            $table->timestamps();
            $table->string('model');
            $table->string('fuel');
            $table->integer('numberOfPassengers');
            $table->boolean('airCondition');
            $table->integer('doors');
            $table->string('transmission');
            $table->string('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
