<?php

namespace App\Http\Controllers\Exam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quizcreate;
use App\Models\Question;
use App\Models\Sclass;
class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  
    {
//         echo 'yes1';
// exit;
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()   
    {
//         echo 'yes2';
// exit;
        $classes = Sclass::orderBy('id','desc')->get();
         $quizes=Quizcreate::orderBy('id','desc')->paginate(50);
        return view('back-end.exam.quiz.create',compact('quizes','classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//         echo 'yes3';
// exit;
         $this->validate($request,[
        'quiz_name'=>'required|unique:quizcreates',
       ]);

       $data=$request->all();
       Quizcreate::create($data);
       
       return redirect()->back()->with('success','Data add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//         echo 'yes4';
// exit;
        // $data=Quizcreate::find($id);
        // $questions=Question::where('quizes_id',$id)->get();
        //  return view('back-end.exam.quiz.details',compact('data','questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classes = Sclass::orderby('id','desc')->get();
        $quizedit = Quizcreate::find($id);
        return view('back-end.exam.quiz.edit',compact('classes','quizedit'));

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
        $update = Quizcreate::find($id);
        $update->update($request->all());
        return back()
        ->with('success',' quiz update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Quizcreate::find($id);
        $del->delete();
        return back()->with('success','quiz deleted successfully.');
    }

       public function status($id)
    {
//         echo 'yes6';
// exit;
        $data=Quizcreate::find($id);
        if($data->status=="1"){
            $data->status=0;
        }else{
        $data->status=1;
        }
        $data->save();

    }
    public function AddQuestion($id)
    {
        // echo 'yes4';
        // exit;
        $quizId=Quizcreate::find($id);
        return view('Exam.question.add_question',compact('quizId'));

    }
}
