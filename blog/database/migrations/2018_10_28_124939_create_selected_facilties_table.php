<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSelectedFaciltiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selected_facilties', function (Blueprint $table) {
             $table->uuid('id');
             $table->primary('id');
          
            $table->longtext('selected_options')->nullable();
            $table->char('facilty_main_id',40)->nullable();
        


            $table->char('hotel_id',40)->nullable();
            $table->char('room_id',40)->nullable();
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
        Schema::dropIfExists('selected_facilties');
    }
}
