<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocurequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docurequest', function (Blueprint $table) {
            $table->unsignedBigInteger('docu_request_id')->primary();
            $table->date('request_date');
            $table->date('date_effectivity');
            $table->string('request_description');
            //Foreign user_id
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            //
            //Foreign Docu_id_code
            $table->string('docu_id_code');
            $table->foreign('docu_id_code')->references('docu_id_code')->on('docufiles');
            //
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docurequest');
    }
}
