<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features_lists', function (Blueprint $table) {
           
           
            $table->uuid('id');
             $table->primary('id');
            
            $table->string('features_name');
            $table->string('yesoption')->nullable();
            $table->string('nooption')->nullable();
          
       
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
        Schema::dropIfExists('features_lists');
    }
}
