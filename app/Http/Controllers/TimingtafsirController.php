<?php

namespace App\Http\Controllers;

use App\Models\Timingtafsir;
use Illuminate\Http\Request;

class TimingtafsirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = Timingtafsir::first();
        $fistid =Timingtafsir::min('id'); 
        $tafsirtiming = Timingtafsir::where('id','!=',$fistid)->orderBy('id', 'desc')->get();
        return view('back-end.tafsirtiming.index', compact('tafsirtiming','title'))
        ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        return view('back-end.tafsirtiming.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Timingtafsir::create($request->all());
     
        return redirect()->route('tafsirtiming.create')
                        ->with('success','New Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Timingtafsir  $timingtafsir
     * @return \Illuminate\Http\Response
     */
    public function show(Timingtafsir $timingtafsir)
    {
     //
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Timingtafsir  $timingtafsir
     * @return \Illuminate\Http\Response
     */
    public function edit($tafsirs)
    {
         $timingtafsir =Timingtafsir::find($tafsirs);
        return view('back-end.tafsirtiming.edit',compact('timingtafsir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Timingtafsir  $timingtafsir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tafsirs=Timingtafsir::find($id);
        $tafsirs->update($request->all());
    
    
        return redirect()->route('tafsirtiming.index')
                        ->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Timingtafsir  $timingtafsir
     * @return \Illuminate\Http\Response
     */
    public function destroy($timingtafsir)
    {
        
        $del = Timingtafsir::find($timingtafsir);
        $del->delete();
        // $timingtafsir->delete();
    
        return redirect()->route('tafsirtiming.index')
                        ->with('success','Item deleted successfully');
    
    
    }
}
