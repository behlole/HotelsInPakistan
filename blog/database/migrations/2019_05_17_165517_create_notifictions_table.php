<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifictions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hotel_id')->nullable();
            $table->string('home_id')->nullable();
            $table->string('res_id')->nullable();
            $table->string('car_agency_id')->nullable();
            $table->string('room_id')->nullable();
            $table->string('cars_id')->nullable();
            $table->string('notifictions_text')->nullable();
            $table->string('notifictions_type')->nullable();
            $table->string('notifictions_status')->nullable();
            $table->string('uid')->nullable();
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
        Schema::dropIfExists('notifictions');
    }
}
