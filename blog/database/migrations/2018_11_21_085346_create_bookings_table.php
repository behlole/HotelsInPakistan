<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
           $table->uuid('id');
             $table->primary('id');
            $table->string('check_in')->nullable();
            $table->string('check_out')->nullable();
            $table->integer('total_days')->nullable();
            $table->integer('total_price')->nullable();
            $table->string('street_line_1')->nullable();
            $table->string('street_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('postal')->nullable();
            $table->char('room_id',40)->nullable(); 
            $table->char('home_id',40)->nullable();
            $table->char('car_id',40)->nullable();
            $table->char('user_id',40)->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
