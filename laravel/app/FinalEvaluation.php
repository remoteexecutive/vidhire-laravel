<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalEvaluation extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'final_evaluation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * 
     * 
     */
    protected $fillable = [
        'employer_id',
        'resume_id',
        'skills_score',
        'education_score',
        'career_map_score',
        'references_score',
        'video_interview_score',
        'tests_score',
        'positive_adjustments_score',
        'final_evaluation_score',
        'skills_notes',
        'education_notes',
        'career_map_notes',
        'references_notes',
        'video_interview_notes',
        'tests_notes',
        'positive_adjustments_notes',
        'skills_evaluator',
        'education_evaluator',
        'career_map_evaluator',
        'references_evaluator',
        'video_interview_evaluator',
        'tests_evaluator',
        'positive_adjustments_evaluator'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password', 'remember_token'];
}
