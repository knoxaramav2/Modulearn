<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLevelColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Add difficulty column
        Schema::table('contents', function(Blueprint $table){
            $table->integer('difficulty')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop difficulty column
        Schema::table('contents', function(Blueprint $table){
            $table->dropColumn('difficulty');
        });
    }
}
