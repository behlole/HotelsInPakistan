<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarOprsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_oprs', function (Blueprint $table) {
             $table->uuid('id');
             $table->primary('id');
            $table->string('caropr_name')->nullable();
            $table->string('yourRole')->nullable();
            $table->string('altcontact')->nullable();
            $table->string('contact')->nullable();
            $table->string('landline')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('facebookPage')->nullable();
            $table->string('address')->nullable();
            $table->string('address_2')->nullable();
            $table->string('google_map_addrs')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('details')->nullable();
            $table->string('country')->nullable();
            $table->string('uploadHeaderPhoto')->nullable();
            $table->string('car_opr_status')->nullable();
            $table->string('car_opr_folder')->nullable();
             $table->integer('reviews_count')->nullable();
            $table->integer('reviews_stars')->nullable();
              $table->decimal('reviews_stars_avg')->nullable();
            $table->char('uid',40);
          
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
        Schema::dropIfExists('car_oprs');
    }
}
