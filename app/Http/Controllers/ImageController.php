<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::latest()->get();
        return view('admin.images.show',compact('images'));
    }
    public function create()
    {

        return view('admin.images.create');
    }


    public function addImage(Request $request)
    {

        $this->validate($request, [
            'images' => 'required',
            'images.*' => 'image'
        ]);
        foreach ($request->file('images') as $imagefile) {
            $image_name1 = time() . '.' . $imagefile->getClientOriginalName();
            $image_resize1 = \Intervention\Image\Facades\Image::make($imagefile->getRealPath());
            $image_resize1->resize(1200, 696)->save(public_path('haifaImages/bigImages/'.$image_name1));

            $image_name2 = time() . '.' . $imagefile->getClientOriginalName();
            $image_resize2 = \Intervention\Image\Facades\Image::make($imagefile->getRealPath());
            $image_resize2->resize(212, 212)->save(public_path('haifaImages/smallImages/'.$image_name2));
            Image::create([
                'bigphoto' => $image_name1,
                'smallphoto' => $image_name2,
            ]);
        }

        return back()->with('success', 'Images are successfully uploaded');
    }


    public function destroy($id)
    {
        $post = Image::find($id);
        $post->delete();
        return redirect()->back()->with('success','Image Has Deleted Successfully!');
    }
}
