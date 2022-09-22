<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->is_admin==1){
        return redirect()->route('dashboard');
        }elseif (Auth::user()->is_admin==2) {
            return redirect()->route('teacherboard');

        }elseif (Auth::user()->is_admin==0) {
            // return redirect()->route('studentboard');
            return redirect()->route('index');
        }
        else{
            return redirect()->route('index') ;
        }
        
        
    }
}
