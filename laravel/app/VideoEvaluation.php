<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoEvaluation extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'video_evaluation';

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
        'confidence_score',
        'communication_score',
        'fun_factor_score',
        'connection_score',
        'understanding_score',
        'bonus_score',
        'video_evaluation_score',
        'confidence_notes',
        'communication_notes',
        'fun_factor_notes',
        'connection_notes',
        'understanding_notes',
        'bonus_notes',
        'confidence_evaluator',
        'communication_evaluator',
        'fun_factor_evaluator',
        'connection_evaluator',
        'understanding_evaluator',
        'bonus_evaluator',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password', 'remember_token'];
}
