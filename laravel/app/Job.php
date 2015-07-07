<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'job';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'company',
        'website',
        'location',
        'logo',
        'job_title',
        'job_type',
        'job_category',
        'job_description',
        'job_video_link'
    ];

    /**
     * A Job belongs to One User if He/She
     * is an Employer
     */
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    /**
     * A Job can be mapped to many Resumes
     */
    public function resume() {
        return $this->hasMany('App\Resume');
    }
    
}
