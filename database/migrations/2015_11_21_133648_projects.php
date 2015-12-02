<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Projects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name',100);
            $table->text('description');
            $table->string('client',100);
            $table->string('consultant',100);
            $table->enum('status',['ongoing','completed'])->default('ongoing');
            $table->timestamp('start_date');
            $table->timestamp('completion_date');
        });

        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')
                  ->references('id')->on('projects')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->index('project_id');
        });

        Schema::create('location', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')
                  ->references('id')->on('projects')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->index('project_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('location');

        Schema::drop('photos');

        Schema::drop('projects');
    }
}
