<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareerMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_map', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id');
            $table->string('employment');
            $table->string('company');
            $table->string('position');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('job_type');
            $table->string('city');
            $table->string('country');
            $table->string('reason_for_leaving');
            $table->string('salary_type');
            $table->string('starting_salary');
            $table->string('final_salary');
            $table->string('reference_name');
            $table->string('reference_email');
            $table->string('reference_phone_number');
            $table->string('reference_position');
            $table->string('notes');
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
        Schema::drop('career_map');
    }
}
