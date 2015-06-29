<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferenceResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reference_responses', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('resume_id');
            $table->string('reference_name');
            $table->string('performance');
            $table->string('attitude');
            $table->string('dependability');
            $table->string('team_player');
            $table->string('learning_speed');
            $table->string('flexibility');
            $table->string('creativity');
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
        Schema::drop('reference_responses');
    }
}
