<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_reviews', function (Blueprint $table) {
            $table->uuid('id');
             $table->primary('id');

            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->integer('rattings')->nullable();
            $table->string('coments')->nullable();
            $table->string('email')->nullable();
            $table->char('agency_id',40)->nullable();
           
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
        Schema::dropIfExists('car_reviews');
    }
}
