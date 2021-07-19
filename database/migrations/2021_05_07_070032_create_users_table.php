<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            //Foreign for User level ID
            $table->unsignedBigInteger('user_level_id');
            $table->foreign('user_level_id')->references('user_level_id')->on('user_level');
            //Foreign for Department ID
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('department_id')->on('department');
            //Foreign for Designation ID
            $table->unsignedBigInteger('designation_id');
            $table->foreign('designation_id')->references('designation_id')->on('designation');
            //


            $table->string('user_image_name')->nullable();
            $table->rememberToken();
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
