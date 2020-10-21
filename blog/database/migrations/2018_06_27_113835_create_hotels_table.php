<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('hotels', function (Blueprint $table) {

        $table->uuid('id');
             $table->primary('id');
       $table->string('hotel_name')->nullable();
       $table->string('yourRole')->nullable();
       $table->string('altcontact')->nullable();
       $table->string('contact')->nullable();
       $table->string('landline')->nullable();
       $table->string('email')->nullable();
       $table->string('website')->nullable();
       $table->string('facebookPage')->nullable();
       $table->string('address')->nullable();
       $table->integer('price_avg')->nullable();
       $table->string('google_map_addrs')->nullable();
       $table->string('street')->nullable();
       $table->string('city')->nullable();
       $table->longtext('details')->nullable();
       $table->string('country')->nullable();
       $table->string('uploadHeaderPhoto')->nullable();
       $table->string('hotel_folder_name')->nullable();
       $table->string('hotel_status')->nullable();
       $table->integer('features')->nullable();
       $table->integer('ammenties')->nullable();
       $table->integer('policies')->nullable();
       $table->integer('photos')->nullable();
       $table->integer('payments')->nullable();
       $table->integer('recomnds')->nullable();
       $table->integer('top_distinations')->nullable();
       $table->string('lat')->nullable();
       $table->string('long')->nullable();
       $table->integer('reviews_count')->nullable();
       $table->integer('reviews_stars')->nullable();
       $table->decimal('reviews_stars_avg')->nullable();
       $table->integer('hot_listing')->nullable();
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
      Schema::dropIfExists('hotels');
    }
  }
