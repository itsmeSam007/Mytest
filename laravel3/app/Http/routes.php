<?php

use App\Task;
use Illuminate\Http\Request;

/**
 * Display All Tasks
 */
Route::get('/', function () {
   $value = Session::get('User');
		//$value = session('User');
	if($value > 0)
		return redirect()->action('UsersController@index');
	else
		return view('auth.login');
	
	
	//return redirect()->action('UsersController@index');
	
	/* $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks
    ]); */
});
/* SOUMEN START WRITTNING ROUTING CODE HERE ON 10122015*/
Route::get('contact',function(){
	return view('/contact');
});

Route::get('home',function(){
	if(Auth::guest()){
		Session::flush(); 
		$value = Session::get('User');
		return redirect('/');//->route('auth/login');
	}
	else{
		//Auth::user()->id;exit;
		Session::put('User',Auth::user()->id);
		
		$value = Session::get('User');
		$value = session('User');
		
		return redirect()->action('UsersController@index');
	}
});

Route::get('aboutus',function(){
	return view('/help');
});

Route::resource('user', 'UsersController');

/* SOUMEN START WRITTNING ROUTING CODE HERE ON 10122015*/
/**
 * Add A New Task
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

/**
 * Delete An Existing Task
 */
Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();

    return redirect('/');
});


/* FOR LOGIN AND LOGOUT FUNCTION IN LARAVEL 5.1 */
// Authentication routes...
//Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('auth/login', [ 'as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('course/create',['as'=>'CourseCreate','uses'=>'CourseController@create']);
Route::post('course/store',['as'=>'CourseStore','uses'=>'CourseController@store']);
Route::get('course/index',['as'=>'CourseIndex','uses'=>'CourseController@index']);
Route::get('/delete',array('as'=>'del','uses'=>'UsersController@delete'));
/*
Route::get('auth/logout', 'Auth\AuthController@getLogout');
*/
/*
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
*/
// Registration routes...



Route::controllers([
   'password' => 'Auth\PasswordController',
]);
/* FOR LOGIN AND LOGOUT FUNCTION IN LARAVEL 5.1 */