<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\codeQuestions ;
use App\exams ; 
use DB;
use App\questions;
class creatingQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function insert_question_info()
    {
        								
        codeQuestions::create([
            'content'  =>request('content'),
           /* 'test_case1'  =>request('test_case1'),
            'test_case1_result' =>request('test_case1_result'),            
            'test_case2'  =>request('test_case2'),            
            'test_case2_result'    =>request('test_case2_result'),
            'test_case3'     =>request('test_case3'),
            'test_case3_result'   =>request('test_case3_result'),
           // 'student_answer'  =>request('student_answer'),*/
            'degree'  =>request('degree'),
            'language'  =>request('language'),
            'type'  =>request('type'),
             'id_exam' =>request('id_exam')
             ]);

            ////////////////to make exam id hidden////////////////////////////////////
             $allExams=exams::all();
             return view('exam_questions',['allExams'=>$allExams]); 
             ///////////////////////////////////////
           // return redirect('exam_questions') ;
            
    }  
/////////////////////////start testing///////////////////////////////////
   public function x(Request $request)
    {
       return view('layout.testing');
    }
    
    
    public function all_questions(Request $request)
    {
     $all_questions=questions::all();
        return view('layout.testing',['all_questions'=>$all_questions]);
    
    }
/////////////////////////end testing///////////////////////////////////
    public function retrive_question_info($id)
    {
         
       $exam= exams::find($id);
       $all_questions=DB::table('exams')->join('code_questions','exams.id','=','code_questions.id_exam')
       ->where('exams.id',$id)
       ->get();
       $trueFalse_questions=DB::table('exams')->join('questions','exams.id','=','questions.id_exam')
       ->where('questions.type','like','true false')
       ->where('exams.id',$id)
       ->get();
       
       $multiple_choise_questions=DB::table('exams')->join('questions','exams.id','=','questions.id_exam')
       ->where('questions.type','like','multiple choose')
       ->where('exams.id',$id)
       ->get();
       
       return view('takingExam',[
       'all_questions'=>$all_questions ,
       'exam'=> $exam ,
       'trueFalse_questions'=>$trueFalse_questions ,
       'multiple_choise_questions'=>$multiple_choise_questions
   ]);


   

    } 

    public function insertCodeQuesrtionAnswer($id)
    {
        //$question =code_questions::find($id);
        $stdent_answer=request('student_answer');

        DB::table('code_questions')->where('id',$id)->update([
            'student_answer'  => $stdent_answer ,
          ]);

       

        return redirect('good_luck'); 

    }

    public function storechooseAndtrueQuestion()
    {
        				
        questions::create([
            'content'  =>request('content'),
            'choose1'  =>request('choose1'),
            'choose2' =>request('choose2'),            
            'choose3'  =>request('choose3'),            
            'choose4'    =>request('choose4'),
            'choosen_answer'     =>request('choosen_answer'),
            'degree'  =>request('degree'),
            'type'  =>request('type'),
             'id_exam' =>request('id_exam')
             ]);
////////////////to make exam id hidden////////////////////////////////////
$allExams=exams::all();
//return redirect('exam_questions') ;
return view('exam_questions',['allExams'=>$allExams]); 
 //////////////// end to make exam id hidden////////////////////////////////////
    
    }

    
    public function index()
    {
        //////////testing///////////////////////////////
        
        $all_questions=DB::table('questions')->get();
        return view('layout.testing')->withSections($all_questions);
        ///////////testing//////////////////////////////
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
	
	
	/*****************************************************adding ***********************************************************/
	public function show_exams($id){
	$allExams=DB::table('exams')->where('id_examiner','=',$id)->get();

     return view('previousExams',['allExams'=>$allExams]); 
	
    }
    

    public function retrive_previous_questions($id)
    {
         
       $exam= exams::find($id);
       $all_questions=DB::table('exams')->join('code_questions','exams.id','=','code_questions.id_exam')
       ->where('exams.id',$id)
       ->get();
       $trueFalse_questions=DB::table('exams')->join('questions','exams.id','=','questions.id_exam')
       ->where('questions.type','like','true false')
       ->where('exams.id',$id)
       ->get();
       
       $multiple_choise_questions=DB::table('exams')->join('questions','exams.id','=','questions.id_exam')
       ->where('questions.type','like','multiple choose')
       ->where('exams.id',$id)
       ->get();
       
       return view('previous_questions',[
       'all_questions'=>$all_questions ,
       'exam'=> $exam ,
       'trueFalse_questions'=>$trueFalse_questions ,
       'multiple_choise_questions'=>$multiple_choise_questions
   ]);
   

   

    } 
	
	
}
