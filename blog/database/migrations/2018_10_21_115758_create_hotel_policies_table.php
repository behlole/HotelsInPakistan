<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelPoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_policies', function (Blueprint $table) {
          
         $table->uuid('id');
             $table->primary('id');
            $table->string('c_text')->nullable();
            $table->string('check_inForm')->nullable();
            $table->string('check_inTo')->nullable();
             $table->string('check_OutForm')->nullable();
            $table->string('check_OutTo')->nullable();
            $table->string('accommodate_children')->nullable();
            $table->string('allow_pets')->nullable();
          
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
        Schema::dropIfExists('hotel_policies');
    }
}
