<?php

namespace App\Http\Controllers\Exam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quizcreate;
use App\Models\Question;
use App\Models\Exam;
use App\Models\Result;
use App\Models\Optiontow;
use App\Models\Sclass;
// use Sentinel;
class ExamController extends Controller
{
  // public function __construct()
  // {
  //   return $this->middleware('member');
  // }
   public function quizList()
    {
        $quizes=Quizcreate::orderBy('id','desc')->paginate(30);
        return view('frontend.exam.quiz_list',compact('quizes'));
    }
    public function exam($id)
    {
      // echo 'yes';
      // exit;
       $quiz=Quizcreate::where('id',$id)->where('status',1)->first();
       $classes = Sclass::orderBy('id','desc')->get();

       $ques2=Optiontow::get();
      // dd($quiz);
      $questions=Question::inRandomOrder()->limit($quiz->number_of_question)->where('quizes_id',$quiz->id)->get();
      // dd( $questions);
      return view('font-end.exam.exam',compact('questions','quiz','ques2','classes'));

     
    }
    public function examPost(Request $request)
    {

      $userId=Auth::id();
      $date=date('Y-m-d');
        $yes=0;
        $no=0;
       $data=$request->all();
      
       for($i=1; $i<=$request->index;$i++){
           if(isset($data['questions_id'.$i])){
           
            $exam=new Exam;
        
               $question=Question::where('id',$data['questions_id'.$i])->get()->first();
               if (Exam::where('questions_id',$data['questions_id'.$i])->exists()) {
                $examques_id=Exam::where('questions_id',$data['questions_id'.$i])->get()->first();
              }
           
               if($question->answer==$data['ans'.$i])
               {
                   $result[$data['questions_id'.$i]]='Yes';
                   $exam->is_ans="yes";
                   $yes++;
               }else{
                   $result[$data['questions_id'.$i]]='No';
                   $exam->is_ans="No";
                   $no++;
               }
          $exam->user_id= $userId;
            $exam->quizes_id= $question->quizes_id;
               $exam->questions_id=$data['questions_id'.$i];
               $exam->ans=$data['ans'.$i];
               if (isset($examques_id->questions_id)) {
                 
               
               if ($examques_id->questions_id==$data['questions_id'.$i]) {
                $examupdate=Exam::where('questions_id',$data['questions_id'.$i])->get()->first();
                $examupdate->update([
                  'user_id' => $userId,
                  'questions_id' => $data['questions_id'.$i],
                  'quizes_id' => $question->quizes_id,
                  'ans' => $data['ans'.$i],
                  'is_ans' =>$exam->is_ans,
                ]);

               }else{
                $exam->save();
               }
              }else{
                $exam->save();

              }
        

           }
           
       }

       if($res=Result::where('user_id',$userId)->where('quizes_id',$request->quizes_id)->first()){

       }else{
        $res=new Result;
       }
       $res->user_id= $userId;
       $res->quizes_id= $request->quizes_id;
       $res->date= $date;
       $res->yes_ans=$yes;
       $res->no_ans=$no;
       
       $res->save();

       return redirect('/MyExamResult')->with('success','Thaks For Join This Exam');

    }

    public function examResult()
    {
       $userId=Auth::id();
      $results=Result::orderBy('id','desc')->where('user_id',$userId)->paginate(10);
      $classes = Sclass::orderBy('id','desc')->get();

      return view('font-end.exam.result',compact('results','classes'));
    }
     public function ResultDetails($id)
    {
        $userId=Auth::id();
       $exams=Exam::where('user_id', $userId)->where('quizes_id',$id)->get();
       $quiz=Quizcreate::find($id);
       $questions=Question::where('quizes_id',$id)->get();
      //  dd($questions);
      $classes = Sclass::orderBy('id','desc')->get();

      return view('font-end.exam.resultDetails',compact('exams','quiz','questions','classes'));
    }
}
 