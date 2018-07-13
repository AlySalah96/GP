<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\exams ;
class creatingExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }
    public function insert_exam_info()
    {
             exams::create([
            'name'       =>request('name'),
            'startTime'  =>request('startTime'),
            'endtime'    =>request('endtime'),            
            'startDate'  =>request('startDate'),            
            'endDate'    =>request('endDate'),
            'period'     =>request('period'),
            'exam_grade' =>request('exam_grade'),
          'num_of_questions'   =>request('num_of_questions'),
          'id_examiner'  =>request('id_examiner'),
            'id_course'  =>request('id_course')
             ]);
             ////////////////to make exam id hidden////////////////////////////////////
             $allExams=exams::all();
            //return redirect('exam_questions') ;
            return view('exam_questions',['allExams'=>$allExams]); 
             //////////////// end to make exam id hidden////////////////////////////////////

    }

    public function retrieve_exams()
    {
        //$exams =DB::table('exams')->get();
        $allExams=exams::all();
        return View('HomePageStudent',['allExams'=>$allExams]); 
        //return redirect('showExams',['allExams'=>$allExams]); 
       // return view('HomePageStudent')->withexams($exams); 

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
