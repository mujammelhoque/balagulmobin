<?php

namespace App\Http\Controllers\Exam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quizcreate;
use App\Models\Question;
use App\Models\Option;
use App\Models\Topic;
class QuestionController extends Controller
{
    public function index()
    {
        $questions=Question::all();
        return view('back-end.exam.question.view',compact('questions'));
    }

   public function create(){
     $quizes =Quizcreate::all();
     $topic =Topic::orderBy('id','desc')->get();
      // dd($topic);
     return view('back-end.exam.question.add_question', compact('quizes','topic'));
   }
    
     
    public function store(Request $request)
    {
     
           $this->validate($request,[
       'question'=>'required|unique:questions,question,NULL,id,quizes_id,'.$request->quizes_id,
        'quizes_id'=>'required',

       ]);

       $data=$request->all();
      $ques= Question::create($data);
       
       if(count($request->option) > 0) {
        foreach ($request->option as $item=>$v) {
        $datad=array(
          'questions_id'=>$ques->id,
          'option'=>$request->option[$item]
        );
        Option::insert($datad);
      }
      }

       return redirect()->back()->with('success','Data add successfully');
    }

    
    public function show($id)
    {
        //
    }

     
    public function edit($id)
    {
      // echo 'dd';
      // exit;
        $questiondata=Question::find($id);
          $quiz=Quizcreate::all();
        return view('back-end.exam.question.edit',compact('questiondata','quiz'));
    }

    
    // public function update(Request $request, $id)
    // {
    //      $this->validate($request,[
    //     'quizes_id'=>'required',
    //     'question'=>'required',
    //    ]);
    //     $data=Question::find($id);
    //     $new_data=$request->all();
    //     $data->update($new_data);

    //      if(count($request->option_id) > 0) {
    //     foreach ($request->option_id as $item=>$v) {
    //     $datad=array(
          
    //       'option'=>$request->option[$item]
           
    //     );
    //     $dbazar=Option::where('id',$request->option_id[$item])->first();
    //     $dbazar->update($datad);
    //   }
    //   }

    //     return redirect()->back()->with('success','Data update successfully');  
    // }
    public function update(Request $request, $id){
      $question=Question::find($id);
        $question->update($request->all());
    
    
        return back()
           ->with('success','Item updated successfully');
    }

    
    public function destroy($id)
    {
      $del = Question::find($id);
      $del->delete();
      // $timingtafsir->delete();
  
      return back()->with('success','Item deleted successfully');
    }
}
