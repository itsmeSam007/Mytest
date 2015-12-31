<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
	protected $table = 'course';	
	protected $fillable = ['course_name', 'user_id'];
	
	//protected $hidden = ['password', 'remember_token'];
}
