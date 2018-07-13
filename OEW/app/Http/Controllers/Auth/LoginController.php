<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
       // dd($user->is_admin());
        if($user->is_admin())
            {
                            return redirect()->route('Student_ExaminerPage');

            }


        elseif($user->is_doctor())
            {
                return redirect()->route('examiner');

            }

        else
           {
                            //return redirect()->route('exam/answer/showExams');
                            return redirect()->route('showExams');


            }


        // if ( $user->isAdmin() ) {// do your margic here
        //     return redirect('/admin');
        // }
        // if ( $user->isDelegate() ) {// do your margic here
        //     return redirect()->route('manger.index');
        // }
        // if ( $user->isPharmacy() ) {// do your margic here
        //     return redirect()->route('pharmacy.index');
        // }

        return redirect('/');
    }
}
