<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Applicants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('resume',50);
            $table->string('firstname',50);
            $table->string('lastname',50);
            $table->string('country',50);
            $table->string('email',50);
            $table->string('mobile',50);
            $table->text('coverletter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('applicants');
    }
}
