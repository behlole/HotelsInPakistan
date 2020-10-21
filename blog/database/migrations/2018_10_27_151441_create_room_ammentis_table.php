<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomAmmentisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_ammentis', function (Blueprint $table) {
           $table->uuid('id');
             $table->primary('id');
          
            $table->string('selected_options')->nullable();
            $table->char('facilty_main_id',40)->nullable();

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
        Schema::dropIfExists('room_ammentis');
    }
}
