<?php

namespace App\Http\Controllers;
use App\Models\Question;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReadyoptController extends Controller
{

//     public function firststep(Request $request){
//         $data = $request->all();
// return view('question0', compact('data'));

//     }
    public function allstore(Request $request){
        $data = $request->all();
        $ans = $request->ans;
        //   dd( $data['ans'][0]);
    $quet = $request->question;
    // dd($request->question);
 
        $book_id=  $request->book_id;
        $chapter_id=  $request->chapter_id;
        $topic_id=  $request->topic_id;
        $option1=  $request->option1;
        $option2=  $request->option2;
        $option3=  $request->option3;
        $option4=  $request->option4;
        $option5=  $request->option5;
        $option6=  $request->option6;

      
        foreach ($quet as $key => $value) {
         
            Question::create([
                'teacher_id'=> null,
                'book_id' => $book_id,
                'chapter_id' => $chapter_id,
                'topic_id' => $topic_id,
                'option1' => $option1??'',
                'option2' => $option2??'',
                'option3' => $option3??'',
                'option4' => $option4??'',
                'option5' => $option5??'',
                'option6' => $option6??'',
               
                'answer' => $data['ans'][$key],
                'question' => $value,
                ]);
                //   unset($answerr);
        }
      
return back()
->with('success','Data inserted successfully.');
     
    }
    

    // public function createbook(){
     
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // public function index()
    // {
       
    // $allbook = DB::table("books")->pluck("name","id");
    // return view('back-end.newexam.index',compact('allbook'));
    // }
    
    public function getBook(Request $request)
    {
    $chapter = DB::table("chapters")
    ->where("book_id",$request->book_id)
    ->pluck("name","id");
    return response()->json($chapter);
    }
    
    public function getTopic(Request $request)
    {
    $chapter = DB::table("topics")
    ->where("chapter_id",$request->chapter_id)
    ->pluck("name","id");
    return response()->json($chapter);
    }







    // public function index()
    // {
    //    return view('index');
    // }

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
}
