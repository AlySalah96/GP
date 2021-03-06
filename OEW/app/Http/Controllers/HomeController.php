<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('home');
		if(auth()->user()->role==1){
		return view('examiner');
		
		}
		else
		{
		//return view('HomePageStudent');
		return redirect('showExams');
		}
     }
}
