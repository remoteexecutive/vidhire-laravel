<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id');
            $table->bigInteger('rate');
            $table->string('currency');
            $table->string('location');
            $table->string('latlng');
            $table->string('email');
            $table->string('phone');
            $table->string('mobile');
            $table->string('skype');
            $table->string('resume_photo');
            $table->string('resume_doc');
            $table->string('additional_doc');
            $table->string('overall_average');
            $table->string('transcripts');
            $table->string('degree');
            $table->string('institution');
            $table->string('year_issued');
            $table->string('skills');
            $table->string('interview_video_link');
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
        Schema::drop('resume');
    }
}
