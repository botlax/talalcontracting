<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ourteam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name',150);
            $table->text('description');
            $table->text('description2')->nullable();
            $table->text('description3')->nullable();
            $table->string('position',100);
            $table->string('photo',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('team');
    }
}
