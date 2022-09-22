<?php

namespace App\Http\Controllers;

use App\Models\Navtest;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;


class NavtestController extends Controller
{
   
   public function __construct()
   {
    // if(!$this->checkauth()) { return redirect("/");}
    //dd(Auth::check());
    // $this->middleware("onlyadmin");
   }

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $allCategories = Navtest::orderBy('id','DESC')->get();
    //   $categories = Navtest::with('childs')->whereNull('parent_id')->get();
    $categories = Navtest::where('parent_id', '=', 0)->get();


      return view('back-end.navlist.index',compact('categories','allCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Navtest::where('parent_id', '=', null)->get();
        $allCategories = Navtest::pluck('name','id')->all();
     
        return view('back-end.navlist.createform', compact('categories','allCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $validatedData = $this->validate($request, [
                'name'      => 'required',
                // 'parent_id' => 'sometimes|nullable|numeric'
          ]);
     
    $input = $request->all();
    $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
    
    Navtest::create($input);
    // return back()->with('success', 'New Category added successfully.');
    return redirect()->route('navlist.index')->withSuccess('You have successfully created a Category!');
}

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Navtest $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Navtest  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Navtest $category)
    {
        return view('back-end.navlist.editform',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Category $category)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         // 'description' => 'required',
    //     ]);
    
    //     $category->update($request->all());
    
    //     return back()->with('success','Your categroy updated successfully');
    
    // }
    public function editcategory(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ]);
        $category=Navtest::find($id);
        $category->update($request->all());
    
        return back()->with('success','Your categroy updated successfully');
    
    }


    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy( $category)
    {
        $del = Navtest::find($category);
        $del->delete();
        // dd($del);
        return back();
    
    }
}
