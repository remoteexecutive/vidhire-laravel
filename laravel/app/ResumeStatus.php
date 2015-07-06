<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeStatus extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'resume_statuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'resume_id',
        'employer_id',
        'job_id',
        'tracking',
        'references',
        'video_interview',
        'flags',
        'evaluation',
        'rating'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password', 'remember_token'];

    public function resume(){
        return $this->belongsTo('App\Resume', 'id', 'resume_id');
    }
}
