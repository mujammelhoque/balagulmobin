<?php

namespace App\Http\Controllers\Exam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quizcreate;
use App\Models\Sclass;
class AnotherQuizController extends Controller
{
    public function index($id)
    {
    // echo "yes";
        $classes = Sclass::orderBy('id','desc')->get();
    	$quizes=Quizcreate::where('class_id', $id)->orderBy('id','desc')->paginate(30);
        return view('font-end.exam.quiz_list',compact('quizes','classes'));
    }
}
