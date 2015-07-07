<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobMap extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'job_map';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_id',
        'resume_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password', 'remember_token'];
     /**
     * A Job Mapping belongs to a Resume and a Job
     */
    
    public function jobMap() {
        return $this->hasManyThrough('App\Resume','App\Job','resume_id','job_id');
    }
}
