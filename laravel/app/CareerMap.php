<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CareerMap extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'career_map';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['user_id',
        'employment',
        'company',
        'position',
        'start_date',
        'end_date',
        'job_type',
        'city',
        'country',
        'reason_for_leaving',
        'salary_type',
        'starting_salary',
        'final_salary',
        'reference_name',
        'reference_email',
        'reference_phone_number',
        'reference_position',
        'notes'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password', 'remember_token'];
}
