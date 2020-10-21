<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
             $table->uuid('id');
             $table->primary('id');
          
            $table->string('des_pic')->nullable();
            $table->integer('des_status')->nullable();
             $table->integer('des_city')->nullable();
             $table->string('title')->nullable();
          
            $table->string('ads_folder')->nullable();
        
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
        Schema::dropIfExists('destinations');
    }
}
