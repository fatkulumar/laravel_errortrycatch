<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}
