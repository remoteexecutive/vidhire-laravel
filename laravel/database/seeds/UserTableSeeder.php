<?php

use Illuminate\Database\Seeder;
use App\CareerMap;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //For Test Jobseeker
        DB::table('users')->insert([
            'username' => 'testjobseeker',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'jobseeker@gmail.com',
            'user_type' => 'Jobseeker',
            'password' => bcrypt('(radio5)')
        ]);
        
        //For Test Employer
        DB::table('users')->insert([
            'username' => 'testemployer',
            'first_name' => 'Tom',
            'last_name' => 'Coghill',
            'email' => 'coghill.tom@gmail.com',
            'user_type' => 'Employer',
            'password' => bcrypt('(radio5)')
        ]);
        
        $jobseeker_id = DB::table('users')->where('username', 'testjobseeker')->pluck('id');
        
        $employer_id = DB::table('users')->where('username', 'testemployer')->pluck('id');
        
        DB::table('resume')->insert(
                        [
                            'user_id' => $jobseeker_id,
                            'rate' => '',
                            'currency' => '',
                            'location' => '',
                            'email' => '',
                            'phone' => '',
                            'mobile' => '',
                            'skype' => '',
                            'resume_photo' => '',
                            'resume_doc' => '',
                            'additional_doc' => '',
                            'overall_average' => '',
                            'transcripts' => '',
                            'degree' => '',
                            'institution' => '',
                            'year_issued' => '',
                            'skills' => '',
                            'interview_video_link' => ''
                        ]
                );
        
        //Most Recent Job
         CareerMap::create([
                'user_id' => $jobseeker_id,
                'employment' => 'Most Recent',
                'company' => '',
                'position' => '',
                'start_date' => '',
                'end_date' => '',
                'job_type' => '',
                'city' => '',
                'country' => '',
                'reason_for_leaving' => '',
                'salary_type' => '',
                'starting_salary' => '',
                'final_salary' => '',
                'reference_name' => '',
                'reference_email' => '',
                'reference_phone_number' => '',
                'reference_position' => '',
                'notes' => ''
            ]);
         
         //2nd Recent Job
         CareerMap::create([
                'user_id' => $jobseeker_id,
                'employment' => '2nd Most Recent',
                'company' => '',
                'position' => '',
                'start_date' => '',
                'end_date' => '',
                'job_type' => '',
                'city' => '',
                'country' => '',
                'reason_for_leaving' => '',
                'salary_type' => '',
                'starting_salary' => '',
                'final_salary' => '',
                'reference_name' => '',
                'reference_email' => '',
                'reference_phone_number' => '',
                'reference_position' => '',
                'notes' => ''
            ]);
         
          //2nd Recent Job
         CareerMap::create([
                'user_id' => $jobseeker_id,
                'employment' => '3rd Most Recent',
                'company' => '',
                'position' => '',
                'start_date' => '',
                'end_date' => '',
                'job_type' => '',
                'city' => '',
                'country' => '',
                'reason_for_leaving' => '',
                'salary_type' => '',
                'starting_salary' => '',
                'final_salary' => '',
                'reference_name' => '',
                'reference_email' => '',
                'reference_phone_number' => '',
                'reference_position' => '',
                'notes' => ''
            ]);
        
        DB::table('job')->insert(
                [
                    'user_id' => $employer_id,
                    'company' => 'Hirefit',
                    'website' => 'hirefit.co',
                    'location' => 'Ontario, Canada',
                    'logo' => '',
                    'job_title' => 'Programmer',
                    'job_type' => 'Full Time',
                    'job_category' => 'PHP',
                    'job_description' => 'PHP Programmer',
                    'job_video_link' => ''
                ]
        );
      
    }
}
