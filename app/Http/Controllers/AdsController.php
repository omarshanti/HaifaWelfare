<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Ads::latest()->get();
        return view('admin.ads.show',compact('ads'));
    }
    public function create()
    {

        return view('admin.ads.create');
    }

    public function edit($id)
    {
        $ad = Ads::find($id);
        return view('admin.ads.edit',compact('ad'));
    }

    public function addImage(Request $request)
    {

        $this->validate($request, [
            'images' => 'required',
            'images.*' => 'image',
        ]);
        $is_active = 0;
        if($request->is_active == 'on') {
            $is_active = 1;
        }

        foreach ($request->file('images') as $imagefile) {
            $image_name = time() . '.' . $imagefile->getClientOriginalName();
            $image_resize1 = \Intervention\Image\Facades\Image::make($imagefile->getRealPath());
            $image_resize1->resize(1920, 671)->save(public_path('images/'.$image_name));

            Ads::create([
                'photo' => $image_name,
                'is_active' => $is_active,
            ]);
        }
        toastr()->success('Images are successfully uploaded');
        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
//    dd($request->all());
       $ad = Ads::find($id);
        $is_active = 0;
        if($request->is_main == 'on') {
            $is_active = 1;
        }

        if($request->hasFile('image')) {
            $oldImage = $ad->photo;
            $image_name = time() . '.' . $request->image->getClientOriginalName();
            $image_resize1 = \Intervention\Image\Facades\Image::make($request->image->getRealPath());
            $image_resize1->resize(1920, 671)->save(public_path('images/'.$image_name));
            if(File::exists(public_path('images/'.$oldImage))){
                File::delete(public_path('images/'.$oldImage));
            }
            $ad->update([
                'photo' => $image_name,
            ]);
        }
        $ad->update([
            'is_active' => $is_active,
        ]);
        toastr()->success('Images are successfully uploaded');
        return redirect()->route('Ads');
    }

    public function destroy($id)
    {
        $ad = Ads::find($id);
        if(File::exists(public_path('images/'.$ad->photo))){
            File::delete(public_path('images/'.$ad->photo));
        }
        $ad->delete();
        toastr()->success('Image are successfully deleted');
        return redirect()->back();
    }
}
