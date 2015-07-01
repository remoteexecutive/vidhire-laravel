<?php

namespace App\Http\Controllers;

use DB;
use Storage;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class EditController extends Controller {

    /**
     * For Submitting a Job
     *
     * @param  request  $request
     * @return Response
     */
    public function submitJob(Request $request) {

        $user_id = $request->user()->id;
        $company = $request->input('company');
        $website = $request->input('website');
        $location = $request->input('location');
        $logo = $request->file('logo');
        $job_title = $request->input('job_title');
        $job_type = $request->input('job_type');
        $job_category = $request->input('job_category');
        $job_description = $request->input('job_description');
        $job_video_link = $request->input('job_video_link');

        //User Message
        $message;

         //For File Upload
        $logo_save = $logo->move('uploads\\' . $user_id, $logo->getClientOriginalName());
        
        DB::table('job')->insert(
                [
                    'user_id' => $user_id,
                    'company' => $company,
                    'website' => $website,
                    'location' => $location,
                    'logo' => $logo_save->getPathname(),
                    'job_title' => $job_title,
                    'job_type' => $job_type,
                    'job_category' => $job_category,
                    'job_description' => $job_description,
                    'job_video_link' => $job_video_link
                ]
        );

        $message = "Job Added";

        return $message;
    }

    public function editJob(Request $request) {

        $user_id = $request->user()->id;
        $job_id = $request->input('job_id');
        $company = $request->input('company');
        $website = $request->input('website');
        $location = $request->input('location');
        $logo = $request->file('logo');
        $job_title = $request->input('job_title');
        $job_type = $request->input('job_type');
        $job_category = $request->input('job_category');
        $job_description = $request->input('job_description');
        $job_video_link = $request->input('job_video_link');

        //For File Upload
        $logo_save = $logo->move('uploads\\' . $user_id, $logo->getClientOriginalName());


        DB::table('job')->where('id', $job_id)
                ->where('user_id', $user_id)
                ->update(
                        [
                            'company' => $company,
                            'website' => $website,
                            'location' => $location,
                            'logo' => $logo_save->getPathname(),
                            'job_title' => $job_title,
                            'job_type' => $job_type,
                            'job_category' => $job_category,
                            'job_description' => $job_description,
                            'job_video_link' => $job_video_link
                        ]
        );


        $message = "Updated Job";

        return $message;
    }

    /**
     * For Submitting and Editing a Resume
     *
     * @param  request  $request
     * @return Response
     */
    public function editResume(Request $request) {

        $user_id = $request->user()->id;
        $rate = $request->input('rate');
        $currency = $request->input('currency');
        $location = $request->input('location');
        $latlang = $request->input('latlng');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $mobile = $request->input('mobile');
        $skype = $request->input('skype');
        $resume_photo = $request->file('resume_photo');
        $resume_doc = $request->file('resume_doc');
        $additional_doc = $request->file('additional_doc');
        $overall_average = $request->input('overall_average');
        $transcripts = $request->input('transcripts');
        $degree = $request->input('degree');
        $institution = $request->input('institution');
        $year_issued = $request->input('year_issued');
        $skills = $request->input('skills');
        $interview_video_link = $request->input('interview_video_link');

        //For File Uploads
        if ($resume_photo->isFile()) {
            $resume_photo_save = $resume_photo->move('uploads\\' . $user_id, $resume_photo->getClientOriginalName());
        }

        if ($resume_doc->isFile()) {
            $resume_doc_save = $resume_doc->move('uploads\\' . $user_id, $resume_doc->getClientOriginalName());
        }
        if ($additional_doc->isFile()) {
            $additional_doc_save = $additional_doc->move('uploads\\' . $user_id, $additional_doc->getClientOriginalName());
        }

        //User Message
        $message;


        $resume = DB::table('resume')->select(DB::raw('count(*) as user_count'))->where('user_id', $user_id)->first();

        if ($resume->user_count == 0) {

            //Insert
            DB::table('resume')->insert(
                    [
                        'user_id' => $user_id,
                        'rate' => $rate,
                        'currency' => $currency,
                        'location' => $location,
                        'latlng' => $latlang,
                        'email' => $email,
                        'phone' => $phone,
                        'mobile' => $mobile,
                        'skype' => $skype,
                        'resume_photo' => $resume_photo->getPathname(),
                        'resume_doc' => $resume_doc,
                        'additional_doc' => $additional_doc,
                        'overall_average' => $overall_average,
                        'transcripts' => $transcripts,
                        'degree' => $degree,
                        'institution' => $institution,
                        'year_issued' => $year_issued,
                        'skills' => $skills,
                        'interview_video_link' => $interview_video_link
                    ]
            );

            $message = "Added Resume";

            return $message;
        } else {

            //For Uploads
            //Update
            DB::table('resume')->where('user_id', $user_id)->update([
                'rate' => $rate,
                'currency' => $currency,
                'location' => $location,
                'latlng' => $latlang,
                'email' => $email,
                'phone' => $phone,
                'mobile' => $mobile,
                'skype' => $skype,
                'resume_photo' => $resume_photo_save->getPathname(),
                'resume_doc' => $resume_doc_save->getPathname(),
                'additional_doc' => $additional_doc_save->getPathname(),
                'overall_average' => $overall_average,
                'transcripts' => $transcripts,
                'degree' => $degree,
                'institution' => $institution,
                'year_issued' => $year_issued,
                'skills' => $skills,
                'interview_video_link' => $interview_video_link
            ]);

            $message = "Updated Resume";

            return $message;
        }
    }
    /**
     * Invite a Jobseeker to a Job
     *
     * @param  request  $request
     * @return Response
     */
    public function inviteToJob(Request $request) {
        
        $job_id = $request->input('job_id');
        $resume_id = $request->input('resume_id');
        //Message
        $message = "User Invited";
        
        DB::table('job_map')->insert([
            'job_id' => $job_id,
            'resume_id' => $resume_id
        ]);
        
        return $message;
        
    }
     /**
     * Unlink User from Job
     *
     * @param  request  $request
     * @return Response
     */
    public function unlinkFromJob(Request $request,$resume_id,$job_id) {
        
        //$job_id = $request->input('job_id');
        //$resume_id = $request->input('resume_id');
        
        DB::table('job_map')->where('resume_id',$resume_id)
                            ->where('job_id',$job_id)
                            ->delete();
        
        $message = "Unlinked User from Job";
        
        return $message;
        
    }
    
    
    /**
     * Get the Resume
     *
     * @param  request  $request
     * @return Response
     */
    public function getResume(Request $request) {

        $user_id = $request->user()->id;

        $resume = DB::table('resume')->where('user_id', $user_id)->get();

        return view('templates/forms/editResumeForm', ['resume' => $resume]);
    }

    /**
     * Get Edit Job Form with data
     * @param Request $request
     * @param $id
     * @return templates/forms/editJobForm.blade.php
     * 
     */
    public function getJob(Request $request, $id) {

        //Get the Id of current logged in user
        $user_id = $request->user()->id;

        if ($id == 0) {

            $job = DB::table('job')->where('id', 0)->first();

            return view('templates/forms/editJobForm');
        } else {
            $job = DB::table('job')->where('user_id', $user_id)
                    ->where('id', $id)
                    ->first();

            return view('templates/forms/editJobForm', ['job' => $job]);
        }
    }
    
    /**
     * Get the Invite to Job Form
     * @param Request $request
     * @param $id
     * @return templates/forms/editJobForm.blade.php
     * 
     */
    public function getInviteToJob(Request $request,$id) {
        
         $user_id = $request->user()->id;
        
         $job = DB::table('job')->where('user_id', $user_id)->get();
        
        return view('templates/forms/inviteJobForm',['resume_id' => $id,'job' => $job]);
    }
    
    
}//End Controller
