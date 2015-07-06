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
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password', 'remember_token'];

    public function user(){
        return $this->belongsTo('App\User', 'id', 'user_id');
    }
}
