<?php

namespace App\Http\Controllers;

use App\Models\Surahtafsir;
use App\Models\Navtest;
use Illuminate\Http\Request;

class SurahtafsirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surahtafsirs = Surahtafsir::paginate(15);
        return view('back-end.surahtafsir.index', compact('surahtafsirs'))
        ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Navtest::orderby('id','desc')->get();
        return view('back-end.surahtafsir.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        // ]);
    
        Surahtafsir::create($request->all());
     
        return redirect()->route('surahtafsir.create')
                        ->with('success','New Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surahtafsir  $surahtafsir
     * @return \Illuminate\Http\Response
     */
    public function show(Surahtafsir $surahtafsir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surahtafsir  $surahtafsir
     * @return \Illuminate\Http\Response
     */
    public function edit(Surahtafsir $surahtafsir)
    {
        $navs = Navtest::get();
        return view('back-end.surahtafsir.edit',compact('surahtafsir','navs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surahtafsir  $surahtafsir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Surahtafsir $surahtafsir)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'detail' => 'required',
        // ]);
    
        $surahtafsir->update($request->all());
    
        return redirect()->route('surahtafsir.index')
                        ->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surahtafsir  $surahtafsir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surahtafsir $surahtafsir)
    {
        $surahtafsir->delete();
    
        return redirect()->route('surahtafsir.index')
                        ->with('success','Item deleted successfully');
    
    }
}
