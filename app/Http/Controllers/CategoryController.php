<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = Category::all();
        return view ('admin.category.show',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//          $cat = Category::all();
//        $postnum = Post::with('categories')->get();
//        $catnum = Category::all();
//        $tagnum = Tag::all();
//        $usernum = User::all();
        return view ('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
        ]);

        $cat = Category::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
        ]);;
        return redirect()->back()->with('success','Category Has Created Successfully!');
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
        $cat = Category::find($id);
        return view ('admin.category.edit',compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
        ]);

        $cat = Category::find($id);

        $cat->update([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
        ]);;
        return redirect()->back()->with('success','Category Has Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
//        if($cat->posts->count() > 0) {
//            session()->flash('error','Cant deleted '.$cat->name.' Category because Is had Posts');
//            return redirect()->back();
//
//        }
        $cat->delete();
        return redirect()->back()->with('success','Category Has Deleted Successfully!');
    }
}
