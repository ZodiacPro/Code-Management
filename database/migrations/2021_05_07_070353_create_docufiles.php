<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocufiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docufiles', function (Blueprint $table) {
            $table->string('docu_id_code')->primary();
            $table->string('filename');
            $table->string('docu_title');
            $table->date('date_uploaded');
            $table->boolean('token_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docufiles');
    }
}
