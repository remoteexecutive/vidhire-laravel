<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_evaluation', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('employer_id');
            $table->bigInteger('resume_id');
            $table->string('confidence_score');
            $table->string('communication_score');
            $table->string('fun_factor_score');
            $table->string('connection_score');
            $table->string('understanding_score');
            $table->string('bonus_score');
            $table->string('video_evaluation_score');
            $table->string('confidence_notes');
            $table->string('communication_notes');
            $table->string('fun_factor_notes');
            $table->string('connection_notes');
            $table->string('understanding_notes');
            $table->string('bonus_notes');
            $table->string('confidence_evaluator');
            $table->string('communication_evaluator');
            $table->string('fun_factor_evaluator');
            $table->string('connection_evaluator');
            $table->string('understanding_evaluator');
            $table->string('bonus_evaluator');
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
        Schema::drop('video_evaluation');
    }
}
