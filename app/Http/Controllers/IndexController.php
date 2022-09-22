<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Navtest;
use App\Models\Surahtafsir;
use App\Models\Timingtafsir;
use App\Models\Publication;
use App\Models\Notification;
use App\Models\Carousel;

class IndexController extends Controller
{
    
   public function index(){
      $title = Timingtafsir::first();
        $fistid =Timingtafsir::min('id'); 
        $timingtafsir = Timingtafsir::where('id','!=',$fistid)->orderBy('id', 'desc')->get();
      $carousel = Carousel::where('status','active')->orderBy('id','desc')->get();
      $notification = Notification::where('status','active')->orderBy('id','desc')->get();

  
   //  $navs =  Navtest::where('parent_id', 0)->take(6)->get();
    $sidenavs =  Navtest::where('parent_id', 0)->get();
   //  $navsdrop =  Navtest::where('parent_id', 0)->skip(6)->take(15)->get();
    return view('index', compact('timingtafsir','sidenavs','title','notification','carousel'));
   }
   public function subindex($id){
   $sidenavs =  Navtest::where('parent_id', 0)->take(6)->get();
   $surahtafsirs = Surahtafsir::where('nav_id', $id )->paginate(10);
   $notification = Notification::where('status','active')->orderBy('id','desc')->get();
   $carousel = Carousel::where('status','active')->orderBy('id','desc')->get();
    $navs =  Navtest::where('parent_id', $id)->take(4)->get();
    $navsdrop =  Navtest::where('parent_id', $id)->skip(4)->take(15)->get();
    $navactive =  Navtest::find($id);
    $navactivess =  Navtest::find($navactive->parent_id );
    $navactive2 =  Navtest::find($navactivess->parent_id);
    $parentnav =  Navtest::find($id);
   //  if data not found start
   $title = Timingtafsir::first();
      $fistid =Timingtafsir::min('id'); 
      $timingtafsir = Timingtafsir::where('id','!=',$fistid)->orderBy('id', 'desc')->get();

   //  if data not found end
   //  $parentnav2 =  Navtest::find($parentnav->parent_id );
    return view('font-end.surahtafsir.index', compact('navs','parentnav','surahtafsirs','navsdrop','sidenavs','navactivess','navactive2','title','timingtafsir','notification','carousel'))
    ->with('i', (request()->input('page', 1) - 1) * 10);
   }

   public function publication(){
      $publications = Publication::orderby('id','desc')->paginate(8);

    $sidenavs =  Navtest::where('parent_id', 0)->get();
    return view('font-end.publication.index', compact('sidenavs','publications'))
    ->with('i', (request()->input('page', 1) - 1) * 8);
   }
   public function about(){
    $sidenavs =  Navtest::where('parent_id', 0)->get();
    return view('font-end.about.index', compact('sidenavs'));
   }


}
