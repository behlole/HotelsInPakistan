<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resads', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('ads_name')->unique();
            $table->string('ads_pic')->nullable();
            $table->integer('ads_status_for_resturants')->nullable();
            $table->string('ads_company')->nullable();
            $table->string('ads_result_page_res')->nullable();
            $table->string('ads_folder')->nullable();

            $table->integer('ads_status_for_home')->nullable();
            $table->string('ads_result_page_home')->nullable();
            $table->integer('ads_status_for_hotel')->nullable();
            $table->string('ads_result_page_hotel')->nullable();
            $table->integer('ads_status_for_cars')->nullable();
            $table->string('ads_result_page_cars')->nullable();

            
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
        Schema::dropIfExists('resads');
    }
}
