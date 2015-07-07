<?php

namespace App\Http\Controllers;

use App\User;
use App\CareerMap;
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

            return redirect()->route('dashboard');
            
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Register user 
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
 
        //Create a new User
        $user = new User([
            'username' => $username,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'user_type' => $user_type,
            'password' => bcrypt($pass)
        ]);
            
        $user->save();
        
        if (Auth::attempt(['username' => $username, 'password' => $pass])) {

            if ($user_type == 'Jobseeker') {

                //Upon Registration, Add a blank Resume
                $resume = $user->resume()->create(['user_id' => $user->id]);
                $resume->save();
                //Save the Career Map
                $resume->careerMap()->saveMany([
                    new CareerMap(['employment' => 'Most Recent']),
                    new CareerMap(['employment' => '2nd Most Recent']),
                    new CareerMap(['employment' => '3rd Most Recent'])
                ]);
                
            }
            
            return redirect()->route('dashboard', ['name' => $user->first_name, 'user' => $user->user_type]);
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
