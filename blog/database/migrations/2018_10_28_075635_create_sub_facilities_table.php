<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_facilities', function (Blueprint $table) {
         $table->uuid('id');
             $table->primary('id');
            $table->string('name')->nullable();
             $table->string('sub_icon')->nullable();
            $table->string('option1')->nullable();
            $table->string('option2')->nullable();
         
            $table->char('parent_id',40)->nullable();
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
        Schema::dropIfExists('sub_facilities');
    }
}
