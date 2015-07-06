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
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password', 'remember_token'];

    public function user(){
        return $this->belongsTo('User', 'id', 'user_id');
    }

    public function jobMap(){
        return $this->hasOne('JobMap','resume_id', 'id');
    }

    public function resumeStatus(){
        return $this->hasOne('ResumeStatus', 'resume_id', 'id');
    }
}
