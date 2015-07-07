<?php

namespace App\Http\Controllers;

use DB;
use Storage;
use App\User;
use App\CareerMap;
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

        $job_title = $request->input('job_title');
        $job_type = $request->input('job_type');
        $job_category = $request->input('job_category');
        $job_description = $request->input('job_description');
        $job_video_link = $request->input('job_video_link');

        //User Message
        $message;

        //For File Upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logo_save = $logo->move('uploads\\' . $user_id, $logo->getClientOriginalName());
            $logo_path = $logo_save->getPathname();
        } else {
            $logo_path = "";
        }

        DB::table('job')->insert(
                [
                    'user_id' => $user_id,
                    'company' => $company,
                    'website' => $website,
                    'location' => $location,
                    'logo' => $logo_path,
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

        //For File Upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logo_save = $logo->move('uploads\\' . $user_id, $logo->getClientOriginalName());
            $logo_path = $logo_save->getPathname();
        } else {
            $logo_path = DB::table('job')->where('id', $job_id)->pluck('logo');
        }


        DB::table('job')->where('id', $job_id)
                ->where('user_id', $user_id)
                ->update(
                        [
                            'company' => $company,
                            'website' => $website,
                            'location' => $location,
                            'logo' => $logo_path,
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

        $overall_average = $request->input('overall_average');
        $transcripts = $request->input('transcripts');
        $degree = $request->input('degree');
        $institution = $request->input('institution');
        $year_issued = $request->input('year_issued');
        $skills = $request->input('skills');
        $interview_video_link = $request->input('interview_video_link');

        $employment_1 = $request->input('career_map_employment_1');
        $company_1 = $request->input('career_map_company_1');
        $position_1 = $request->input('career_map_position_1');
        $start_date_1 = $request->input('career_map_start_date_1');
        $end_date_1 = $request->input('career_map_end_date_1');
        $job_type_1 = $request->input('career_map_job_type_1');
        $city_1 = $request->input('career_map_city_1');
        $country_1 = $request->input('career_map_country_1');
        $reason_for_leaving_1 = $request->input('career_map_reason_for_leaving_1');
        $salary_type_1 = $request->input('career_map_salary_type_1');
        $starting_salary_1 = $request->input('career_map_starting_salary_1');
        $final_salary_1 = $request->input('career_map_final_salary_1');
        $reference_name_1 = $request->input('career_map_reference_name_1');
        $reference_email_1 = $request->input('career_map_reference_email_1');
        $reference_phone_number_1 = $request->input('career_map_reference_phone_number_1');
        $reference_position_1 = $request->input('career_map_reference_position_1');
        $notes_1 = $request->input('career_map_reference_notes_1');

        $employment_2 = $request->input('career_map_employment_2');
        $company_2 = $request->input('career_map_company_2');
        $position_2 = $request->input('career_map_position_2');
        $start_date_2 = $request->input('career_map_start_date_2');
        $end_date_2 = $request->input('career_map_end_date_2');
        $job_type_2 = $request->input('career_map_job_type_2');
        $city_2 = $request->input('career_map_city_2');
        $country_2 = $request->input('career_map_country_2');
        $reason_for_leaving_2 = $request->input('career_map_reason_for_leaving_2');
        $salary_type_2 = $request->input('career_map_salary_type_2');
        $starting_salary_2 = $request->input('career_map_starting_salary_2');
        $final_salary_2 = $request->input('career_map_final_salary_2');
        $reference_name_2 = $request->input('career_map_reference_name_2');
        $reference_email_2 = $request->input('career_map_reference_email_2');
        $reference_phone_number_2 = $request->input('career_map_reference_phone_number_2');
        $reference_position_2 = $request->input('career_map_reference_position_2');
        $notes_2 = $request->input('career_map_reference_notes_2');

        $employment_3 = $request->input('career_map_employment_3');
        $company_3 = $request->input('career_map_company_3');
        $position_3 = $request->input('career_map_position_3');
        $start_date_3 = $request->input('career_map_start_date_3');
        $end_date_3 = $request->input('career_map_end_date_3');
        $job_type_3 = $request->input('career_map_job_type_3');
        $city_3 = $request->input('career_map_city_3');
        $country_3 = $request->input('career_map_country_3');
        $reason_for_leaving_3 = $request->input('career_map_reason_for_leaving_3');
        $salary_type_3 = $request->input('career_map_salary_type_3');
        $starting_salary_3 = $request->input('career_map_starting_salary_3');
        $final_salary_3 = $request->input('career_map_final_salary_3');
        $reference_name_3 = $request->input('career_map_reference_name_3');
        $reference_email_3 = $request->input('career_map_reference_email_3');
        $reference_phone_number_3 = $request->input('career_map_reference_phone_number_3');
        $reference_position_3 = $request->input('career_map_reference_position_3');
        $notes_3 = $request->input('career_map_reference_notes_3');



        //For File Uploads

        if ($request->hasFile('resume_photo')) {
            $resume_photo = $request->file('resume_photo');
            $resume_photo_save = $resume_photo->move('uploads\\' . $user_id, $resume_photo->getClientOriginalName());
            $resume_photo_path = $resume_photo_save->getPathname();
        } else {
            $resume_photo_path = DB::table('resume')->where('user_id', $user_id)->pluck('resume_photo');
        }

        if ($request->hasFile('resume_doc')) {
            $resume_doc = $request->file('resume_doc');
            $resume_doc_save = $resume_doc->move('uploads\\' . $user_id, $resume_doc->getClientOriginalName());
            $resume_doc_path = $resume_doc_save->getPathname();
        } else {
            $resume_doc_path = DB::table('resume')->where('user_id', $user_id)->pluck('resume_doc');
        }

        if ($request->hasFile('additional_doc')) {
            $additional_doc = $request->file('additional_doc');
            $additional_doc_save = $additional_doc->move('uploads\\' . $user_id, $additional_doc->getClientOriginalName());
            $additional_doc_path = $additional_doc_save->getPathname();
        } else {
            $additional_doc_path = DB::table('resume')->where('user_id', $user_id)->pluck('additional_doc');
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
                        'resume_photo' => $resume_photo_path,
                        'resume_doc' => $resume_doc_path,
                        'additional_doc' => $additional_doc_path,
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
                'resume_photo' => $resume_photo_path,
                'resume_doc' => $resume_doc_path,
                'additional_doc' => $additional_doc_path,
                'overall_average' => $overall_average,
                'transcripts' => $transcripts,
                'degree' => $degree,
                'institution' => $institution,
                'year_issued' => $year_issued,
                'skills' => $skills,
                'interview_video_link' => $interview_video_link
            ]);

            $message = "Updated Resume";
        }

        //Insert Career Map Data

        $this->editCareerMap($user_id, $employment_1, $company_1, $position_1, $start_date_1, $end_date_1, $job_type_1, $city_1, $country_1, $reason_for_leaving_1, $salary_type_1, $starting_salary_1, $final_salary_1, $reference_name_1, $reference_email_1, $reference_phone_number_1, $reference_position_1, $notes_1);

        $this->editCareerMap($user_id, $employment_2, $company_2, $position_2, $start_date_2, $end_date_2, $job_type_2, $city_2, $country_2, $reason_for_leaving_2, $salary_type_2, $starting_salary_2, $final_salary_2, $reference_name_2, $reference_email_2, $reference_phone_number_2, $reference_position_2, $notes_2);

        $this->editCareerMap($user_id, $employment_3, $company_3, $position_3, $start_date_3, $end_date_3, $job_type_3, $city_3, $country_3, $reason_for_leaving_3, $salary_type_3, $starting_salary_3, $final_salary_3, $reference_name_3, $reference_email_3, $reference_phone_number_3, $reference_position_3, $notes_3);

        return $message;
    }

    /**
     * For Submitting and Editing the Career Map
     *
     * @param  request  $request
     * @return Response
     */
    public function editCareerMap($user_id, $employment, $company, $position, $start_date, $end_date, $job_type, $city, $country, $reason_for_leaving, $salary_type, $starting_salary, $final_salary, $reference_name, $reference_email, $reference_phone_number, $reference_position, $notes) {

        $career_map = DB::table('career_map')->select(DB::raw('count(*) as user_count'))
                ->where('user_id', $user_id)
                ->where('employment', $employment)
                ->first();


        if ($career_map->user_count == 0) {

            CareerMap::create([
                'user_id' => $user_id,
                'employment' => $employment,
                'company' => $company,
                'position' => $position,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'job_type' => $job_type,
                'city' => $city,
                'country' => $country,
                'reason_for_leaving' => $reason_for_leaving,
                'salary_type' => $salary_type,
                'starting_salary' => $starting_salary,
                'final_salary' => $final_salary,
                'reference_name' => $reference_name,
                'reference_email' => $reference_email,
                'reference_phone_number' => $reference_phone_number,
                'reference_position' => $reference_position,
                'notes' => $notes
            ]);
        } else {

            CareerMap::where('user_id', $user_id)
                    ->where('employment', $employment)
                    ->update([
                        'company' => $company,
                        'position' => $position,
                        'start_date' => $start_date,
                        'end_date' => $end_date,
                        'job_type' => $job_type,
                        'city' => $city,
                        'country' => $country,
                        'reason_for_leaving' => $reason_for_leaving,
                        'salary_type' => $salary_type,
                        'starting_salary' => $starting_salary,
                        'final_salary' => $final_salary,
                        'reference_name' => $reference_name,
                        'reference_email' => $reference_email,
                        'reference_phone_number' => $reference_phone_number,
                        'reference_position' => $reference_position,
                        'notes' => $notes
            ]);
        } //end if

        return true;
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
        
        DB::table('resume_statuses')->insert([
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
    public function unlinkFromJob(Request $request, $resume_id, $job_id) {

        //$job_id = $request->input('job_id');
        //$resume_id = $request->input('resume_id');

        DB::table('job_map')->where('resume_id', $resume_id)
                ->where('job_id', $job_id)
                ->delete();
        
        DB::table('resume_statuses')->where('resume_id', $resume_id)
                ->where('job_id', $job_id)
                ->delete();

        $message = "Unlinked User from Job";

        return $message;
    }

    /**
     * Toggle Resume Status
     *
     * @param  string $resume_id
     * @param  string $job_id
     * @param  string $field_name
     * @param  string $toggled_data
     * @return true
     */
    public function toggleResumeStatus($resume_id,$job_id,$field_name,$toggled_data) {
        
        DB::table('resume_statuses')->update(
                    [
                       $field_name => $toggled_data
                    ]
            )->where('resume_id', $resume_id)
             ->where('job_id', $job_id);
        
        return true;
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

        $career_map = DB::table('career_map')->where('user_id',$user_id)->get();
        
        return view('templates/forms/editResumeForm', ['resume' => $resume,'career_map' => $career_map,'count' => 1 ]);
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
    public function getInviteToJob(Request $request, $id) {

        $user_id = $request->user()->id;

        $job = DB::table('job')->where('user_id', $user_id)->get();

        return view('templates/forms/inviteJobForm', ['resume_id' => $id, 'job' => $job]);
    }

}

//End Controller
