<?php

namespace app\Http\Controllers;

use Session;
use app\Course;
use Validator;
//use User;

use Illuminate\Http\Request;

use app\Http\Requests;
use app\Http\Controllers\Controller;
//use app\Http\Controllers\User;

class CourseController extends Controller
{
    //
		public function index(){
			$course = Course::all();
			//return $users; 
			return view('course.show')->with('course',$course);
		}		
	
		public function create(){
			return view('course.create');
		}
		
		public function store(Request $request){
			//dd($request);
			
			$value = Session::get('User');
			$value = session('User');
			
			//print_r($value);
			//echo $value;exit;
			
			$inputs = $request->all();
			
			
			$validator = Validator::make($inputs, [
            'course_name' => 'required'            
        ]);

        if ($validator->fails()) {
            return redirect('course/create')
                        ->withErrors($validator)
                        ->withInput();
        }		
		//$user = User::create($inputs);
		
		Course::create([
            'course_name' => $inputs['course_name'],
            'user_id' => $value            
        ]);
		
		
		//return redirect()->route('CourseIndex'); // THIS IS ONE WAY TO REDIRECT THE PAGE ....
		return redirect()->action('CourseController@index'); // THIS IS SECOND WAY TO REDIRECT THE PAGE....
			
			
			
		}
}
