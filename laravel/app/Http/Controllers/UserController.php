<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class UserController extends Controller {

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

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

            //$users = DB::table('users')->where('username', $username)->first();
            
            //return redirect()->route('dashboard', ['name' => $users->first_name, 'user' => $users->user_type]);
            //return view('dashboard',['name' => $users->first_name, 'user' => $users->user_type,'resume' => $resume]);
            //return redirect()->route('dashboard',['name' => $users->first_name, 'user' => $users->user_type]);
            return redirect()->route('dashboard');
            
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * register user 
     * 
     * @param request $request
     * */
    public function register(Request $request) {

        $username = $request->input('username');
        $pass = $request->input('password');
        $email = $request->input('email');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $user_type = $request->input('user_type');

        User::create([
            'username' => $username,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'user_type' => $user_type,
            'password' => bcrypt($pass)
        ]);

        if (Auth::attempt(['username' => $username, 'password' => $pass])) {

            $users = DB::table('users')->where('username', $username)->first();

            if ($user_type == 'Jobseeker') {

                //Upon Registration, 
                DB::table('resume')->insert(
                        [
                            'user_id' => $request->user()->id,
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
            }
            
            return redirect()->route('dashboard', ['name' => $users->first_name, 'user' => $users->user_type]);
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'username' => 'required|max:255|unique:users',
                    'password' => 'required|confirmed|min:3',
        ]);
    }

}
