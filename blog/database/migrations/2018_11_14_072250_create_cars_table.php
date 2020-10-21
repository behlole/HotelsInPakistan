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
            $table->uuid('id');
             $table->primary('id');
            $table->string('car_title')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('year')->nullable();
            $table->string('no_of_cars')->nullable();
            $table->string('transmission_type')->nullable();
            $table->string('fuel')->nullable();
            $table->integer('passengers')->nullable();
            $table->string('ac')->nullable();
            $table->string('car_pic')->nullable();
            $table->string('car_folder')->nullable();
            $table->char('car_opr_id',40)->nullable();
            $table->char('uid',40)->nullable();
            $table->string('details')->nullable();
            $table->string('car_status')->nullable();
             $table->integer('car_price')->nullable();
            $table->integer('bags')->nullable();
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
        Schema::dropIfExists('cars');
    }
}
