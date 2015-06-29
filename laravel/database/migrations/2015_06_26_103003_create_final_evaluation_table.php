<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_evaluation', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('employer_id');
            $table->bigInteger('resume_id');
            $table->string('skills_score');
            $table->string('education_score');
            $table->string('career_map_score');
            $table->string('references_score');
            $table->string('video_interview_score');
            $table->string('tests_score');
            $table->string('positive_adjustments_score');
            $table->string('final_evaluation_score');
            $table->string('skills_notes');
            $table->string('education_notes');
            $table->string('career_map_notes');
            $table->string('references_notes');
            $table->string('video_interview_notes');
            $table->string('tests_notes');
            $table->string('positive_adjustments_notes');
            $table->string('skills_evaluator');
            $table->string('education_evaluator');
            $table->string('career_map_evaluator');
            $table->string('references_evaluator');
            $table->string('video_interview_evaluator');
            $table->string('tests_evaluator');
            $table->string('positive_adjustments_evaluator');
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
        Schema::drop('final_evaluation');
    }
}
