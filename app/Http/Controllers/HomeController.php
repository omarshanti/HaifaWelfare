<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use DemeterChain\C;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $viewPosts = Post::with('category')->orderBy('views', 'desc')->take(10)->get();
        $allPosts = Post::with('category')->latest()->take(4)->get();
        $mainPosts = Post::where('is_main',1)->latest()->get();
        $first_social = Category::with('post')->where('id',3)->latest()->first();
        $socials = Post::with('category')->where('category_id',3)->latest()->skip(1)->take(3)->get();
        $first_relief = Category::with('post')->where('id',4)->latest()->first();
        $reliefs = Post::with('category')->where('category_id',4)->latest()->skip(1)->take(3)->get();
        $ads = Ads::where('is_active',1)->latest()->get();
        $first_support = Category::with('post')->where('id',5)->latest()->first();
        $supports = Post::with('category')->where('category_id',5)->latest()->skip(1)->take(3)->get();
        $images = Image::latest()->take(9)->get();
        return view('index',compact('mainPosts','allPosts','viewPosts','socials','first_social','reliefs','first_relief','supports','first_support','images','ads'));
    }

    public function singlePost($id)
    {

        if(filter_var($id, FILTER_VALIDATE_INT) !== false && Post::find($id) !== null) {
        $cats = Category::all()->toArray();
//        dd($cats);
        $viewPosts = Post::with('category')->orderBy('views', 'desc')->take(10)->get();
        $singlePost = Post::find($id);
//        dd($singlePost->category_id);
        $number_views = $singlePost->views + 1;
//        dd($number_views);
        $singlePost->update([
            'views' => $number_views,
        ]);
        $relatedPost = Post::where('category_id',$singlePost->category_id)->where('id','!=',$singlePost->id)->get();
//        dd($relatedPost);
        return view('front.single_post',compact('singlePost','viewPosts','cats','relatedPost'));
        }
        return abort(404);
    }

    public function categoryPost($id)
    {
        $cats = Category::all()->toArray();
//        dd($cats);
        $viewPosts = Post::with('category')->orderBy('views', 'desc')->take(10)->get();
        $categoryPost = Post::with('Category')->where('category_id',$id)->paginate(5);
        $cat_name = Category::find($id);
        if($id == 1000) {
            $categoryPost = Post::where('is_main',1)->paginate(5);
            $cat_name = "MAIN POSTS";
        }

//        dd($categoryPost);
        return view('front.category_post_page',compact('categoryPost','viewPosts','cats','cat_name'));
    }

    public function contactUs()
    {

        return view('front.contact_us');
    }

    public function ourVision()
    {

        return view('front.our_vision');
    }

    public function ourAims()
    {

        return view('front.our_aims');
    }

    public function search(Request $request)
    {
        $cats = Category::all()->toArray();
//        dd($cats);
        $viewPosts = Post::with('category')->orderBy('views', 'desc')->take(10)->get();
        $s = $request->s;
        $search = Post::where('name_en','LIKE','%'.$s.'%')->orWhere('name_ar','LIKE','%'.$s.'%')->paginate(5);
        return view('front.search_page',compact('search','viewPosts','cats'));
    }
}
