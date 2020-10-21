<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restlists', function (Blueprint $table) {
         
           $table->uuid('id');
           $table->primary('id');
           $table->string('restaurant_name')->nullable();
           $table->string('google_map_address')->nullable();
           $table->string('contact')->nullable();
           $table->string('alt_contact')->nullable();
           $table->string('landline')->nullable();
           $table->string('restaurant_email')->nullable();
           $table->string('restaurant_website')->nullable();
           $table->string('fb_page')->nullable();
           $table->string('addr_1')->nullable();
           $table->string('lat')->nullable();
           $table->string('long')->nullable();
           $table->string('street')->nullable();
           $table->longtext('details')->nullable();
           $table->string('city')->nullable();
           $table->integer('reviews_count')->nullable();
           $table->integer('reviews_stars')->nullable();
           $table->string('hotel_status')->nullable();
           $table->string('hot_status')->nullable();
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
        Schema::dropIfExists('restlists');
    }
}
