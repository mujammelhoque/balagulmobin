<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courses;
use App\Messages;
use App\Educations;
use App\Events;
use App\News;
class FrontpageController extends Controller
{
    public function index()
    {
    	return view('frontend.index');
    }
    public function staffView()
    {
    	return view('front_page.staff.view');
    }
     public function faculty()
    {
        return view('front_page.faculty.view');
    }
    public function courseDetails($courseName)
    {
    	$data=Courses::where('course_name','=',$courseName)->first();
    	return view('front_page.course.details',compact('data'));
    }
    public function messageHome($title,$id)
    {
    	$data=Messages::where('id','=',$id)->first();
    	return view('front_page.home_message.view',compact('data'));
    }
    public function about($id)
    {
        $about=Messages::where('id',$id)->first();
        return view('frontend.home_message.view',compact('about'));
    }
    public function education($id)
    {
        $data=Educations::find($id);
        return view('front_page.education.details',compact('data'));
    }
    public function news($id)
    {
        $data=News::find($id);
        return view('front_page.news.details',compact('data'));
    }
    public function events($id)
    {
        $data=Events::find($id);
        return view('front_page.event.details',compact('data'));
    }
}
