<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::orderBy('id', 'desc')->paginate(8);
        return view('back-end.publication.index', compact('publications'))
        ->with('i', (request()->input('page', 1) - 1) * 8);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.publication.create');
    }

    /**
   
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'required|mimes:png,jpg,jpeg,jiff,pdf,xlx,csv|max:2048',
            'preview' => 'required|mimes:pdf,docx,txt,accdb,pptx,xlx,csv|max:5120',
        ]);
        $input = $request->all();
        if ($image = $request->file('picture')) {
            $destinationPath = 'images/';
            $bookImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $bookImage);
            $input['picture'] = $bookImage;
        }    
        if ($image = $request->file('preview')) {
            $destinationPath = 'preview/';
            $previewfile = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $previewfile);
            $input['preview'] = $previewfile;
        }    
        Publication::create($input);
     
        return redirect()->route('publish.create')
                        ->with('success','New Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editdata = Publication::find($id);
            return view('back-end.publication.edit',compact('editdata'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     
          $input = $request->all();
  
        if ($image = $request->file('picture')) {
            $destinationPath = 'images/';
            $bookImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $bookImage);
            $input['picture'] = $bookImage;
        }else{
            unset($input['picture']);
        }

        if ($image = $request->file('preview')) {
            $destinationPath = 'preview/';
            $previewfile = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $previewfile);
            $input['preview'] = $previewfile;
        }else{
            unset($input['preview']);
        }
        
        $updatedata = Publication::find($id);
        $updatedata->update($input);
        return redirect()->route('publish.index')
        ->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Publication::find($id);
        $del->delete();    
        return redirect()->route('publish.index')
                        ->with('success','Item deleted successfully');
    }




}
