<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $requestall = $request->all();
$quiz_id =$requestall['quiz_id'];
$ans =$requestall['ans'];
$question =$requestall['question'];
$note =$requestall['note'];

//  dd($quiz_id);


            foreach ($requestall as $key => $value) {
                // dd($value);
                if ($key == '_token') {
                    continue;
                }
                if ($key == 'quiz_id') {
                    continue;

                }
                if ($key == 'ans') {
                    continue;

                }
                if ($key == 'question') {
                    continue;

                }
                if ($key == 'note') {
                    continue;

                }
              
         
                Option::create([
                    'option_key' => $key,
                    'option_value' => $value,
                    'quiz_id' => $quiz_id,
                    'ans' => $ans,
                    'question' => $question,
                    'note' => $note,
                    ]);
            }

        
    
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Option $option)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        //
    }
}
