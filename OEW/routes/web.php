<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware'=>'prevent-back-history'],function(){

    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');    


    Route::get('/', function () {
        return view('welcome');});
        
Route::post('examiner', 'HomeController@index');

 Route::post('creating_exam',function(){
     return view('creating_exam');
 });

Route::post('storeExam','creatingExamController@insert_exam_info');   

Route::get('creating_exam',function(){
    return view('creating_exam');
});

 Route::get('exam_questions',function()
 {
     return view('exam_questions');
 });


 Route::post('storeQuestionInfo','creatingQuestionsController@insert_question_info');



 ///////////////////////student//////////////////////////////
Route::post('HomePageStudent',function(){
return view('HomePageStudent');

 });


 Route::post('showExams','creatingExamController@retrieve_exams');
  
 Route::get('showExams','creatingExamController@retrieve_exams');

Route::get('Student_ExaminerPage',function(){

    return view('Student_ExaminerPage');
});


Route::post('examiner',function(){
    return view('examiner');
    
     });

Route::get('examiner',function(){
    return view('examiner');
    
     });


Route::post('exam/{id?}','creatingQuestionsController@retrive_question_info');

Route::patch('exam/updatequestion/{id}','creatingQuestionsController@insertCodeQuesrtionAnswer');

Route::get('good_luck',function()
{
    return view('good_luck');
});


Route::post('multipleChooseQuestion','creatingQuestionsController@storechooseAndtrueQuestion');


//Route::post('exam/{id?}','creatingQuestionsController@retrive_trueFalse_question');
Route::post('exam/answer/student','AnswerExamController@answer')->name('exam.answer');



//////////////////////////////test////////////////////////////
Route::get('test1','AnswerExamController@showLabDetails');
///////////////////from aml ///////////////////////////////////////////
Route::post('/login/custom', ['uses'=>'logincontrl@login', 'as' =>'login.custom' ]);


Route::group(
    ['middleware'=>'auth'],
    function(){
    Route::get('/examiner',function(){return view('examiner');})->name('examiner');
    Route::get('/Student_ExaminerPage',"creatingExamController@retrieve_exams");
    Route::get('/about',function(){return view('about');});
    Route::get('/contact',function(){return view('contact');});
   
    Route::get('statistics','controllerStatistics@view_stat');
    Route::get('showExams','creatingExamController@retrieve_exams')->name('showExams');        
    Route::post('/examReport/{id}','PDFcontroller@getPDF');	
    Route::post('prev_exam/{id}','creatingQuestionsController@retrive_previous_questions');
    
              }

          );
		  
		  
		  
         
		  /****************************************adding********************************************/
Route::post('add_course',function(){
return view('course');
});

// Route::post('storeCorse','courseController@insert_course_info');   


Route::post('course/add','courseController@insert_course_info');


Route::post('show/exams/{id}','creatingQuestionsController@show_exams')->name('show_exam');





}); ///logout middleware 

