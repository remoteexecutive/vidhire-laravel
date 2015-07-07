<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumeStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('resume_id');
            $table->bigInteger('job_id');
            $table->string('tracking')->default('Standard Tracked');
            $table->string('references')->default('Check Reference');
            $table->string('video_interview')->default('No Video');
            $table->string('flags')->default('Check For Red Flags');
            $table->string('evaluation')->default('Evaluate');
            $table->string('rating')->default('Pick');
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
        Schema::drop('resume_statuses');
    }
}
