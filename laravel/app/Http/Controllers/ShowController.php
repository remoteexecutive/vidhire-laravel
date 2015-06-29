<?php 
namespace App\Http\Controllers;

use DB;
use Storage;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;

class ShowController extends Controller {

    
    public function showResume(Request $request) {
        
        $user_id = $request->user()->id;
        
        $resume = DB::table('resume')->where('user_id', $user_id)->first();
        
        return view('templates/show/resume', ['resume' => $resume]);
    }
    
}