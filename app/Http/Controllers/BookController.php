<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use App\Models\Topic;
use App\Models\Question;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function createBookFromModal(Request $request){
        
        Book::create($request->all());
        $book = Book::orderBy("id", "desc")
        ->pluck("id","name");
        // $chapter_id= Topic::orderby('id','desc')->first();

        // $topic = DB::table("topics")
        // ->where("chapter_id",$chapter_id->chapter_id)
        // ->pluck("name","id");
        return response()->json($book);
    }
    public function createChapterFromModal(Request $request){

        Chapter::create($request->all());
        $book_id= Chapter::orderby('id','desc')->first();

        $chapter = Chapter::where("book_id",$book_id->book_id)
        ->orderBy("id", "desc")
        ->pluck("id","name");
        return response()->json($chapter);


    }
    public function createTopicFromModal(Request $request){

        Topic::create($request->all());
        $chapter_id= Topic::orderby('id','desc')->first();

        $topic = Topic::where("chapter_id",$chapter_id->chapter_id)
        ->orderBy("id", "desc")
        ->pluck("id","name");
        return response()->json($topic);
    }
    public function examlanding(){
        $subject = Book::get();
        return view('font-end.newexam.examlanding',compact('subject'));

    }

    public function exam($id){
        $subject = Book::get();
        $question =Question::where('book_id',$id)->orderBy('topic_id','asc')->get()->groupBy(function($data, $tata) {
            return $data->topic_id;
            return $tata->book_id;
        });
    //    $question= DB::table('questions')
    //                 ->where('book_id',$id)
    //                 ->orderBy('topic_id','asc')
    //                 ->groupBy('book_id', 'topic_id')
    //                 ->get();
// dd($question);

        return view('font-end.newexam.exam',compact('question','subject'));
    }
    public function examcheck(Request $request){

        // dd($request->all());
        $questonArray = $request->question;
        $data = $request->all();
        // $i=0;
        // $i++;
        foreach ($questonArray as $key => $value) {
            $ans_status= '0';
        if ($data['answer'][$key]==$data['right_answer'][$key]) {
            $ans_status='1';
        }
        if (Exam::where('question_id',$data['question_id'][$key])->exists()) {
            $examques_id=Exam::where('question_id',$data['question_id'][$key])->get()->first();
          }

          if (isset($examques_id->question_id)) {
            if ($examques_id->question_id==$data['question_id'][$key]) {
                $examupdate=Exam::where('question_id',$data['question_id'][$key])->get()->first();
                $examupdate->update([
                    'teacher_id'=> null,
                    'book_id'       => $data['book_id'][$key],
                    'chapter_id'    => $data['chapter_id'][$key],
                    'topic_id'      => $data['topic_id'][$key],
                    'question'      =>$data['question'][$key],
                    'answer'        => $data['answer'][$key],
                    'right_answer'  => $data['right_answer'][$key],
                    'status'        =>$ans_status
                ]);

               }
          }else{
            Exam::create([
                'teacher_id'=> null,
                'question_id'       => $data['question_id'][$key],
                'book_id'       => $data['book_id'][$key],
                'chapter_id'    => $data['chapter_id'][$key],
                'topic_id'      => $data['topic_id'][$key],
                'question'      =>$data['question'][$key],
                'answer'        => $data['answer'][$key],
                'right_answer'  => $data['right_answer'][$key],
                'status'        =>$ans_status
                ]);
                //   unset($answerr);
            }
        }

        // dd($request->final_submit);
        if($request->final_submit==null){
        $question =Question::where('teacher_id','1')
        ->where('topic_id','>',$data['topic_id'][$key])
        ->orderBy('id','desc')->get()
        ->groupBy(function($data) {
            return $data->topic_id;
        });
        $subject = Book::get();
        return view('font-end.newexam.exam',compact('question','subject'));
    }else{
            $total_question = Exam::get();
    $right_answer   = Exam::where('status','=','1')->get();

    $expected_mark  =$total_question->count() ;
    $right_mark     =$right_answer->count() ;
    echo $expected_mark.'-'.$right_mark ;
    exit;
    }


      
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Book::select('*'))
            ->addColumn('action', 'back-end/book/book-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('back-end.book.index');
    }

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
        Company::updateOrCreate(
            [
              'id' => $request->id
            ],
            [
              'name' => $request->name,
              'address' => $request->address
            ]
          );
      
          return response()->json(
            [
              'success' => true,
              'message' => 'Data inserted successfully'
            ]
          );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $book = Book::where('id',$request->id)->delete();
     
        return Response()->json($book);
    }
}
