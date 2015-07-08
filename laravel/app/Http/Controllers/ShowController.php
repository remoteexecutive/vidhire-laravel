<?php

namespace App\Http\Controllers;

use App\User;
use App\Resume;
use App\ResumeStatus;
use App\CareerMap;
use App\Job;
use App\JobMap;
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

        //Get logged in User
        $user_id = $request->user()->id;

        $users = User::find($user_id);

        //For Jobseeker
        if ($users->user_type == "Jobseeker") {

            //Get the Resume with User details
            $resume = User::with('resume')->find($user_id);

            //Get Career Map Associated with Resume
            $career_map = CareerMap::where('user_id', $user_id)->get();

            return view('dashboard', ['name' => $users->first_name, 'user' => $users->user_type, 'resume' => $resume, 'career_map' => $career_map]);
        }

        //For Employer
        if ($users->user_type == "Employer") {

            //Get all Resumes of all jobseekers
            $resume = User::where('user_type', 'Jobseeker')
                    ->with('resume')
                    ->get();

            //initialize the arrays for resume statuses and job map
            $job_map = array();
            $resume_statuses = array();

            foreach ($resume as $resumes) {
                //Get the Job Map data and the number of resumes per job
                $job_map['resume_id'] = $resumes->id;
                $job_map['job_id'] = JobMap::where('resume_id', $resumes->id)->pluck('job_id');
                $job_map['job_name'] = Job::where('id', $job_map['job_id'])->pluck('job_title');
                $job_map['count'] = JobMap::where('resume_id', $resumes->id)->count();

                //Get the resume statuses mapped to the resume if user is invited to a job
                $resume_statuses['resume_id'] = $resumes->id;
                $resume_statuses['job_id'] = ResumeStatus::where('resume_id', $resumes->id)->pluck('job_id');
                $resume_statuses['tracking'] = ResumeStatus::where('resume_id', $resumes->id)->pluck('tracking');
                $resume_statuses['references'] = ResumeStatus::where('resume_id', $resumes->id)->pluck('references');
                $resume_statuses['video_interview'] = ResumeStatus::where('resume_id', $resumes->id)->pluck('video_interview');
                $resume_statuses['flags'] = ResumeStatus::where('resume_id', $resumes->id)->pluck('flags');
                $resume_statuses['evaluation'] = ResumeStatus::where('resume_id', $resumes->id)->pluck('evaluation');
                $resume_statuses['rating'] = ResumeStatus::where('resume_id', $resumes->id)->pluck('rating');
            }

            //Get all jobs associated with the User
            $job = Job::where('user_id', $user_id)->get();

            return view('dashboard', ['name' => $users->first_name, 'user' => $users->user_type, 'job' => $job, 'resume' => $resume, 'job_map' => $job_map, 'resume_statuses' => $resume_statuses]);
        }
    }

    /**
     * For Handling what resume data to show on the dashboard
     * @param Request $request
     * @return type
     * 
     */
    public function viewResume(Request $request, $id) {

        //Get the Id of current logged in user
        $user_id = $request->user()->id;

        //get the user type and Name
        $users = User::find($user_id);

        //Get the resume data with list item's resume_id
        $resume = User::with('resume')->where('user_type', 'Jobseeker')->find($id);

        //initialize the arrays for resume statuses and job map
        $resume_statuses = ResumeStatus::where('resume_id',$id)->first();
        

        //Get the career map data with list item's user_id          
        $career_map = CareerMap::where('user_id', $id)->get();

        //Get job user is linked to
        $job_map_count = JobMap::where('resume_id', $id)->count();

        //If there is no job mapped to user, get resume without query to job map
        if ($job_map_count == 0) {

            //Return resume using data above
            return view('templates/show/resume', ['name' => $users->first_name, 'user' => $users->user_type, 'resume' => $resume, 'career_map' => $career_map]);
        } else {

            $job_id = JobMap::where('resume_id', $id)->pluck('job_id');

            //Return resume using data above
            return view('templates/show/resume', ['name' => $users->first_name, 'user' => $users->user_type, 'resume' => $resume, 'career_map' => $career_map, 'job_id' => $job_id,'resume_statuses' => $resume_statuses]);
        }
    }

    /**
     * For Handling what job data to show on the dashboard
     * @param Request $request
     * @return type
     * 
     */
    public function viewJob(Request $request, $id) {

        //Get the Id of current logged in user
        $user_id = $request->user()->id;

        //get the user type and Name
        $users = User::find($user_id);

        //Get the Job
        $job = Job::find($id);

        return view('templates/show/job', ['name' => $users->first_name, 'user' => $users->user_type, 'job' => $job]);
    }

}
