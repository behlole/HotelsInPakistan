<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

   
    /**
     * Run the migrations.
     *
     * @return void

     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id');
             
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            
            $table->string('type')->nullable();
            $table->string('master_admin')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('user_status')->nullable();
            $table->rememberToken();
            $table->primary('id');
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
        Schema::dropIfExists('users');
    }
}
