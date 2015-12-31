<?php

namespace app\Http\Controllers;


//use DB;
use Input;
use Auth;
use app\User;
use Validator;
use Excel;
use Illuminate\Http\Request;

use app\Http\Requests;
use app\Http\Controllers\Controller;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		/*	.................... PDF WORK FOR APPLICATION ......................	*/
			$pdf = \App::make('dompdf.wrapper');
			$pdf->loadHTML('<h1>Hello world</h1>
							<p>This is my first pdf file creation...</p>
			');
			return $pdf->stream();//IT WILL DISPLAY THE PDF FILE IN BROWSER...........
			//return $pdf->download(); IT WILL DOWNLOAD THE FILE AS A PDF FORMAT...
		/*	.................... PDF WORK FOR APPLICATION ......................	*/
		
		
		/* 	EXCEL WORK WILL START HERE ..............................................................................
		
		
		Excel::create('First Page',function($excel)
		{
			$excel->sheet('Sheetname',function($sheet){
				//$sheet->mergeCells('A1:C1');
				//$sheet->setBorder('A1:F1','thin');
			
				$data = array(
                array('Name', 'Age','Sex','Nationality','Religion','Language','Qualification'),
                array('Soumen', 'data2', 300, 400, 500, 0, 100),
                array('Rahul', 'data2', 300, 400, 500, 0, 100),
                array('Sachin', 'data2', 300, 400, 500, 0, 100),
                array('Sourav', 'data2', 300, 400, 500, 0, 100),
                array('Yuvi', 'data2', 300, 400, 500, 0, 100),
                array('Mahi', 'data2', 300, 400, 500, 0, 100)
				);
           // ));
				$sheet->fromArray($data,null,'A1',false,false);
				});
		})->download('xlsx'); 
		
		
		/*	*/
		/* 	EXCEL WORK WILL START HERE .............................................................................. */
		
		//STEP ONE FOR FETCHING DATA : --------------
        $users = User::all();
		//return $users; 
		return view('user.show')->with('users',$users);
		
		//STEP TWO FOR FETCHING DATA :---------------
		/*
		$users = DB::table('users')->get();
        return view('user.index', ['users' => $users]);
		*/
		
		//$user = DB::table('users')->where('name', 'John')->first();  echo $user->name;  ------------RETRIEVING DATA FROM THE DB
		//$email = DB::table('users')->where('name', 'John')->value('email');       ------------RETRIEVING DATA FROM THE DB
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		/* if (Auth::check()) {
		$user = Auth::user();
		return $user->id;
		// The user is logged in...
		return view('user.create');
		}   */      
		//return redirect('auth/login');  ONE WAY...........
		//return redirect()->route('login'); // SECOND WAY .................
		
		return view('user.create');
		
		
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//dd($request); THROUGH THIS YOU CAN SEE THE POST ALONG WITH ALL THE DATA IN JSON FORMAT
		//STEP ONE FOR STORING DATA INTO THE TABLE ------------------------
		/*
		DB::table('users')->insert([
			['email' => 'taylor@example.com', 'votes' => 0],
			['email' => 'dayle@example.com', 'votes' => 0]
		]);
		*/
		//STEP TWO FOR STORING DATA INTO THE TABLE ----------------------------	
		/*
		$user = new User;
		$user->username = $rquest->user_name;
		$user->email = $rquest->user_email;
		$user->password = $rquest->pwd;
		$user->is_admin = 0;
		$user->gender = $request->gender;
		$user->save();
		*/
		//STEP THREE FOR STORING DATA INTO THE TABLE --------------------------
		$inputs = $request->all();		
		$validator = Validator::make($inputs, [
            'username' => 'required',
            'email' => 'required|email',
			'password' => 'required|confirmed',
			'password_confirmation' => 'required',
			'image' => 'required|mimes:png,jpeg,jpg'
        ]);

        if ($validator->fails()) {
            return redirect('user/create')
                        ->withErrors($validator)
                        ->withInput();
        }		
		//$user = User::create($inputs);
		
		/*
		$destinationPath = base_path().'/public/images/';
		$filename = $inputs->file('image')->getClientOriginalExtension();
		$request->file('image')->move($destinationPath, $fileName);
		*/
		
		if (Input::file('image')->isValid()) {
		  $destinationPath = base_path().'/public/images/';
		  $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
		  $fileName = rand(11111,99999).'.'.$extension; // renameing image
		  Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
      // sending back with message
      /* 	Session::flash('success', 'Upload successfully'); 
		return Redirect::to('upload'); */
			if (Input::hasFile('image')) { 
					User::create([
					'username' => $inputs['username'],
					'email' => $inputs['email'],
					'password' => bcrypt($inputs['password']),
					'gender' => $inputs['gender'],
					'image' => $fileName,
					'is_admin' =>1
				]);
			}
		}	
		
		//return redirect()->route('user.index'); // THIS IS ONE WAY TO REDIRECT THE PAGE ....
		//return redirect()->action('UsersController@index'); // THIS IS SECOND WAY TO REDIRECT THE PAGE....
		return view('auth.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return view('user.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id); // 	FIRST WAY TO FETCH DATA FROM TABLE ...................
		$user = User::where('id',$id)->first(); //  SECOND WAY TO FETCH DATA FROM TABLE ..............
		return view('user.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		//THIS IS ONE WAY TO UPDATE TABLE .....................
       /*
	   $user = User::find($id); // 
	   $user->username = $request->username;
	   $user->email = $request->email;   
	   $user->gender = $request->gender;   
	   $user->save();
	   
	  return redirect()->action('UsersController@index');
	  */
	  //THIS IS SECOND WAY TO UPDATE TABLE ....................
	  
	  //File::delete($filename);
	  
		$input = $request->all();
		$data = User::findorfail($id);
		$data->update($input);
		
		if (Input::hasFile('image')) { 	
		
			if (Input::file('image')->isValid()) {
				$destinationPath = base_path().'/public/images/';
				$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
				$fileName = rand(11111,99999).'.'.$extension; // renameing image	

				$file_input = $request->image_name;	

					if($file_input){
					unlink(public_path('images/'.$file_input));	
					}

				Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
				
				$user = User::find($id); 
				$user->image = $fileName;	   
				$user->save();
			}				
		}
		return redirect('user'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		//THIS IS ONE WAY TO DELETE DATA FROM TABLE ........................
		User::destroy($id);
		return redirect()->action('UsersController@index');
		
		//THIS IS SECOND WAY TO DELETE DATA FROM TABLE......................
		$data = User::findorfail($id);
		$data->delete();
	  
		return redirect('user'); 
		
    }
	
	/* 	..............  EXRTA FUNCTION FOR DELETING THE DATA FROM THE DB USING AZAX CALL .....................*/
	
	public function delete(Request $request){
		
		$id = $request->id;
		User::Where('Id',$id)->delete();
		return response()->json(array('sms' => 'deleted already'));
		
	}
	/*
		<script type="text/javascript">
		$(.delete).live('click',function(){
			var dataId = {id:$(this).data('id')};
			$.ajax({
				type:'GET',
				url:'{!!URL::route('del')!!}' // del define in routing like Route::get('/delete',array('as'=>'del','uses'=>'UsersController@delete'));
				async:false,
				data:dataId,
				success:function(data){
					alert(data.sms);
				}
			
			});
			$(this).parent().parent().remove();
		});
		</script>
	*/
	
	
	
	/* 	..............  EXRTA FUNCTION FOR DELETING THE DATA FROM THE DB USING AZAX CALL .....................*/
}
