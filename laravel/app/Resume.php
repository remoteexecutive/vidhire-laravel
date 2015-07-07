<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'resume';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'rate',
        'currency',
        'location',
        'latlng',
        'email',
        'phone',
        'mobile',
        'skype',
        'overall_average',
        'transcripts',
        'degree',
        'institution',
        'year_issued',
        'skills',
        'interview_video_link'
    ];

    /**
     * A Resume is associated with 1 User 
     ***/
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    /**
     * One Resume Status Entry for One Resume
     */
    public function resumeStatus() {
        return $this->hasOne('App\ResumeStatus');
    }
    
    /**
     * A Resume has 3 Career Map entries
     * (Most Recent, 2nd Most Recent, Third Most Recent)
     * using the user_id
     * @var user_id
     */
    public function careerMap() {
        return $this->hasMany('App\CareerMap','user_id');
    }
    /**
     * A Resume has 1 Video Evaluation
     */
    public function videoEvaluation() {
        return $this->hasOne('App\VideoEvaluation');
    }
    
    /**
     * A Resume has 1 Final Evaluation
     */
    public function finalEvaluation() {
        return $this->hasOne('App\FinalEvaluation');
    }
    /**
     * A Resume has 1 Reference Response Entry
     */
    public function referenceResponse() {
        return $this->hasOne('App\ReferenceResponse');
    }
}
