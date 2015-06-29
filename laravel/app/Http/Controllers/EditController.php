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
     * landing page for user
     *
     * @param  request  $request
     * @return Response
     */
    public function login(Request $request) {

        $username = $request->input('username');
        $pass = $request->input('password');


        if (Auth::attempt(['username' => $username, 'password' => $pass])) {

            $users = DB::table('users')->where('username', $username)->first();

            return redirect()->route('dashboard', ['name' => $users->first_name, 'user' => $users->user_type]);
        } else {
            return view('auth/login');
        }
    }

    /**
     * For Submitting and Editing a Job
     *
     * @param  request  $request
     * @return Response
     */
    public function editJob(Request $request) {

        $user_id = $request->user()->id;
        $company = $request->input('company');
        $website = $request->input('website');
        $location = $request->input('location');
        $logo = $request->input('location');
        $job_title = $request->input('job_title');
        $job_type = $request->input('job_type');
        $job_category = $request->input('job_category');
        $job_description = $request->input('job_description');
        $job_video_link = $request->input('job_video_link');





        DB::table('job')->insert(
                [
                    'user_id' => $user_id,
                    'company' => $company,
                    'website' => $website,
                    'location' => $location,
                    'logo' => $logo,
                    'job_title' => $job_title,
                    'job_type' => $job_type,
                    'job_category' => $job_category,
                    'job_description' => $job_description,
                    'job_video_link' => $job_video_link
                ]
        );
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
        $resume_photo_save = $resume_photo->move('uploads\\' . $user_id, $resume_photo->getClientOriginalName());
        $resume_doc_save = $resume_doc->move('uploads\\' . $user_id, $resume_doc->getClientOriginalName());
        $additional_doc_save = $additional_doc->move('uploads\\' . $user_id, $additional_doc->getClientOriginalName());


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

            echo $message;
        } else {

            //For Uploads


            DB::table('resume')->where('user_id', $user_id)->update([
                'resume_photo' => $resume_photo_save->getPathname()
            ]);



            DB::table('resume')->where('user_id', $user_id)->update([
                'resume_doc' => $resume_doc_save->getPathname()
            ]);



            DB::table('resume')->where('user_id', $user_id)->update([
                'additional_doc' => $additional_doc_save->getPathname()
            ]);


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
                'overall_average' => $overall_average,
                'transcripts' => $transcripts,
                'degree' => $degree,
                'institution' => $institution,
                'year_issued' => $year_issued,
                'skills' => $skills,
                'interview_video_link' => $interview_video_link
            ]);

            $message = "Updated Resume";

            echo $message;
        }
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

        //return redirect()->route('edit-resume-form')->with($resume);
    }

}

//End Controller
