<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ads_name')->nullable();
            $table->string('ads_pic')->nullable();
            $table->integer('ads_status')->nullable();
            $table->string('ads_company')->nullable();
            $table->string('ads_folder')->nullable();
            $table->string('ads_url')->nullable();
            $table->integer('hotel')->nullable();
            $table->integer('home')->nullable();
            $table->integer('car')->nullable();
            $table->integer('restaurant')->nullable();
            $table->integer('single')->nullable();
            $table->integer('result')->nullable();
            $table->integer('all')->nullable();
            $table->string('allign')->nullable();
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
        Schema::dropIfExists('listing_ads');
    }
}
