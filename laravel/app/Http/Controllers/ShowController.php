<?php

namespace App\Http\Controllers;

use DB;
use Storage;
use App\User;
use App\CareerMap;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class ShowController extends Controller {

    /**
     * For Handling what data to show on the dashboard
     * @param Request $request
     * @return type
     * 
     */
    public function show(Request $request) {

        $user_id = $request->user()->id;

        $users = DB::table('users')->where('id', $user_id)->first();

        //For Jobseeker
        if ($users->user_type == "Jobseeker") {

            //$resume = DB::table('resume')->where('user_id', $user_id)->first();
            $resume = DB::table('resume')->join('users', function($join) {
                                        $join->on('users.id', '=', 'resume.user_id');
                                        })
                                     ->select('users.first_name', 'users.last_name', 'resume.*')
                                     ->where('users.id', $user_id)
                                     ->first();
            
                                        
            $career_map = DB::table('career_map')->where('user_id',$user_id)->get();                                        

            return view('dashboard', ['name' => $users->first_name, 'user' => $users->user_type, 'resume' => $resume,'career_map' => $career_map]);
        }

        //For Employer
        if ($users->user_type == "Employer") {

            $resume = DB::table('resume')->join('users', 'users.id', '=', 'resume.user_id')
                    ->select('users.first_name', 'users.last_name', 'resume.*')
                    ->get();


            $job_map = array();

            foreach ($resume as $resumes) {
                $job_map['resume_id'] = $resumes->id;
                $job_map['job_id'] = DB::table('job_map')->where('resume_id', $resumes->id)->pluck('job_id');
                $job_map['job_name'] = DB::table('job')->where('id', $job_map['job_id'])->pluck('job_title');
                $job_map['count'] = DB::table('job_map')->where('resume_id', $resumes->id)->count();
                
            }

            $job = DB::table('job')->where('user_id', $user_id)->get();



            return view('dashboard', ['name' => $users->first_name, 'user' => $users->user_type, 'job' => $job, 'resume' => $resume, 'job_map' => $job_map]);
        }
    }

    /**
     * For Handling what resume data to show on the dashboard
     * @param Request $request
     * @return type
     * 
     */
    public function viewResume(Request $request,$id) {

        //Get the Id of current logged in user
        $user_id = $request->user()->id;
        
        //get the user type and Name
        $users = DB::table('users')->where('id', $user_id)->first();
        
        //Get the resume data with list item's resume_id
        $resume = DB::table('resume')->join('users', function($join) {
                                        $join->on('users.id', '=', 'resume.user_id');
                                        })
                                     ->select('users.first_name', 'users.last_name', 'resume.*')
                                     ->where('resume.id', $id)
                                     ->first();
                                        
       //Get the career map data with list item's resume_id          
        $career_map = DB::table('career_map')->where('user_id',$id)->get();                                                                          
        
        //Return resume using data above
        return view('templates/show/resume', ['name' => $users->first_name, 'user' => $users->user_type,'resume' => $resume,'career_map' => $career_map]);
    }
    
    /**
     * For Handling what job data to show on the dashboard
     * @param Request $request
     * @return type
     * 
     */
    public function viewJob(Request $request,$id) {
        
         //Get the Id of current logged in user
        $user_id = $request->user()->id;
        
        //get the user type and Name
        $users = DB::table('users')->where('id', $user_id)->first();
        
        $job = DB::table('job')->where('user_id',$user_id)->first();
        
        return view('templates/show/job', ['name' => $users->first_name, 'user' => $users->user_type,'job' => $job]);
    }
    
}
