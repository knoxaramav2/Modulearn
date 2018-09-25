<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependency', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dependent')->unsigned();
            $table->integer('depends')->unsigned();
        });

        Schema::table('dependency', function (Blueprint $table){
            $table->foreign('dependent')->references('id')->on('content');
            $table->foreign('depends')->references('id')->on('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dependency');
    }
}
