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

    public function job(){
        return $this->belongsTo('Job','id', 'job_id');
    }

    public function resume(){
        return $this->belongsTo('Resume', 'id', 'resume_id');
    }
}
