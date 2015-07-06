<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferenceResponse extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reference_responses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * 
     * 
     */
    protected $fillable = [
        'resume_id',
        'reference_name',
        'performance',
        'attitude',
        'dependability',
        'team_player',
        'learning_speed',
        'flexibility',
        'creativity'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password', 'remember_token'];
}
