<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Skills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text('skill');
            $table->integer('position_id')->unsigned();
            $table->foreign('position_id')
                  ->references('id')->on('positions')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->index('position_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('skills');
    }
}
