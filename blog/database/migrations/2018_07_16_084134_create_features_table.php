<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
          
          $table->uuid('id');
             $table->primary('id');
            
            $table->string('net_options');
            $table->string('range');
            $table->string('internet_type');
            $table->string('internet_charges');
            $table->string('parking_opt');
            $table->string('reservetion');
            $table->string('parking_type');
            $table->string('parking_site');
            $table->string('parking_charges');
            $table->string('language',4000);
            $table->string('selected_facility_array',4000);
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
        Schema::dropIfExists('features');
    }
}
