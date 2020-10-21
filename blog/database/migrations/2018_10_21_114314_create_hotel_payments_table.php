<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_payments', function (Blueprint $table) {
          $table->uuid('id');
             $table->primary('id');
         $table->string('cards')->nullable();
         $table->string('city_taxs')->nullable();
         $table->string('pchk')->nullable();


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
        Schema::dropIfExists('hotel_payments');
    }
}
