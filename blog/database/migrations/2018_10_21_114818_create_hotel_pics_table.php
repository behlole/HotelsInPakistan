<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelPicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_pics', function (Blueprint $table) {
            $table->uuid('id');
             $table->primary('id');
            $table->string('main_header')->nullable();
             $table->string('foldername')->nullable();
            
          
            $table->char('room_id',40)->nullable();
            $table->char('hotel_id',40)->nullable();
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
        Schema::dropIfExists('hotel_pics');
    }
}
