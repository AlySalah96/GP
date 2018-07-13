<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\courses;

class courseController extends Controller
{
    //
	public function insert_course_info(Request $request)
    {
        $name=$request->input('name');
        $course=new courses;
        $course->name=$name;
		$course->startDate=$request->input('startDate');
		$course->expiredDate=$request->input('expiredDate');
		$course->description=$request->input('description');
		$course->school_name=$request->input('school_name');
        $course->id_student=$request->input('id_student');
		$course->id_examiner=$request->input('id_examiner');
		$course->save();
        return back();
		
		
		
    }
}
