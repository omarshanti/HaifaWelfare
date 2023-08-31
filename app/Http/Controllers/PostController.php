<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('Category','user')->latest()->get();
        return view('admin.post.show',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat = Category::all();
        return view('admin.post.create',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

      $test =   $request->validate([
            'name_en' => 'required|string|max:100',
            'name_ar' => 'required|string|max:100',
            'category' => 'required',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
        ]);

        $image1 = $request->file('photo');
        $image_name1 = time() . '.' . $image1->getClientOriginalName();
        $image_resize1 = Image::make($image1->getRealPath());
        $image_resize1->resize(769, 429)->save(public_path('imagePosts/photo1/'.$image_name1));


        $image2 = $request->file('photo');
        $image_name2 = time() . '.' . $image2->getClientOriginalName();
        $image_resize2 = Image::make($image2->getRealPath());
        $image_resize2->resize(370, 325)->save(public_path('imagePosts/photo2/'.$image_name2));

        $image3 = $request->file('photo');
        $image_name3 = time() . '.' . $image3->getClientOriginalName();
        $image_resize3 = Image::make($image3->getRealPath());
        $image_resize3->resize(334, 293)->save(public_path('imagePosts/photo3/'.$image_name3));

        $status = Post::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'category_id' => $request->category,
            'is_main' => $request->is_main == "on" ? 1 : 0,
            'photo1' => $image_name1,
            'photo2' => $image_name2,
            'photo3' => $image_name3,
            'user_id' => Auth::id(),
            'content_en' => $request->content_en,
            'content_ar' => $request->content_ar,
        ]);

        if ($status) {
            return redirect()->back()->with('success', 'Post Created Successfully.');
        } else {
            return redirect()->back()->with('failed', 'Post Not Created Successfully.');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $post = Post::find($id);
        return view('admin.post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $test =   $request->validate([
            'name_en' => 'required|string|max:100',
            'name_ar' => 'required|string|max:100',
            'category' => 'required',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
        ]);
        $post = Post::find($id);
        $image_name1 = $post->photo1;
        $image_name2 = $post->photo2;
        if($request->hasFile('photo')) {
            $image_path1 = "/imagePosts/photo1/".$post->photo1;  // Value is not URL but directory file path
            $image_path2 = "/imagePosts/photo2/".$post->photo2;
            $image_path3 = "/imagePosts/photo2/".$post->photo3;

            if(File::exists(public_path($image_path1))){
                 File::delete(public_path($image_path1));
            }
            if(File::exists(public_path($image_path2))){
                File::delete(public_path($image_path2));
            }
            if(File::exists(public_path($image_path3))){
                File::delete(public_path($image_path3));
            }
            $image1 = $request->file('photo');
            $image_name1 = time() . '.' . $image1->getClientOriginalName();
            $image_resize1 = Image::make($image1->getRealPath());
            $image_resize1->resize(769, 429)->save(public_path('imagePosts/photo1/'.$image_name1));


            $image2 = $request->file('photo');
            $image_name2 = time() . '.' . $image2->getClientOriginalName();
            $image_resize2 = Image::make($image2->getRealPath());
            $image_resize2->resize(370, 325)->save(public_path('imagePosts/photo2/'.$image_name2));

            $image3 = $request->file('photo');
            $image_name3 = time() . '.' . $image3->getClientOriginalName();
            $image_resize3 = Image::make($image3->getRealPath());
            $image_resize3->resize(334, 293)->save(public_path('imagePosts/photo3/'.$image_name3));
        }


        $status = $post->update([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'category_id' => $request->category,
            'is_main' => $request->is_main == "on" ? 1 : 0,
            'photo1' => $image_name1,
            'photo2' => $image_name2,
            'photo3' => $image_name3,
            'user_id' => Auth::id(),
            'content_en' => $request->content_en,
            'content_ar' => $request->content_ar,
        ]);

        if ($status) {
            return redirect()->back()->with('success', 'Post Updated Successfully.');
        } else {
            return redirect()->back()->with('failed', 'Post Update Successfully.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('success','Post Has Deleted Successfully!');
    }
}
