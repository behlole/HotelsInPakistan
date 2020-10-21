<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {

        
           $table->uuid('id');
             $table->primary('id');
          $table->string('custom_name')->nullable();
          $table->string('smookin_policy');
          $table->string('no_of_rooms');
          $table->string('room_size');
          $table->string('room_unit');
          $table->string('option_1')->nullable();
          $table->integer('option_1no')->nullable();
          $table->string('option_2')->nullable();
          $table->integer('option_2no')->nullable();
          $table->string('option_3')->nullable();
          $table->integer('option_3no')->nullable();
          $table->integer('total_people')->nullable();
          $table->integer('room_price_night');
          $table->string('discount_cond')->nullable();
          $table->string('discount')->nullable();
          $table->string('suite_apartments')->nullable();
          $table->integer('bedrooms')->nullable();
          $table->integer('living_rooms')->nullable();
          $table->integer('bathrooms')->nullable();
          $table->char('hotel_id',40)->nullable();
          $table->integer('room_status');

          $table->char('room_name_id',40);
     
          $table->integer('ammenties')->nullable();
          
          $table->integer('photos')->nullable();
    

          
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
        Schema::dropIfExists('rooms');
    }
}
