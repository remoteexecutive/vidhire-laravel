<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id');
            $table->string('company');
            $table->string('website');
            $table->string('location');
            $table->string('logo');
            $table->string('job_title');
            $table->string('job_type');
            $table->string('job_category');
            $table->string('job_description');
            $table->string('job_video_link');
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
        Schema::drop('job');
    }
}
