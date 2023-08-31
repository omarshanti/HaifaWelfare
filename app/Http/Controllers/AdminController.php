<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        if(view()->exists('admin.' .$id)){
            return view('admin.' .$id );
        }
        else
        {
            return view('admin.404');
        }

     //   return view($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactShow($id = null,$notify = null)
    {
//        dd('contactshow');
        $lastSm = Contact::latest()->first();
        $user = User::find(1);
        $readMessages = $user->readNotifications()->get();
        $unreadMessages = $user->unreadNotifications()->paginate(10);
        if($id !== null && $notify !== null) {
            $sm = Contact::find($id);
            $notification = $user->notifications()->where('id', $notify)->first();
            if ($notification) {
                $notification->markAsRead();
            }
            return view ('admin.contact.show',compact('unreadMessages','readMessages','sm','lastSm','notify'));
        } else {
            return view ('admin.contact.show',compact('unreadMessages','readMessages','lastSm'));
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function singleMessage($id,$notify = null)
    {
//        dd('singleMessage');
        $sm = Contact::find($id);
        $user = User::find(1);
        $readMessages = $user->readNotifications()->get();
        $unreadMessages = $user->unreadNotifications()->paginate(10);
        if ($id !== null && $notify !== null) {
            $notification = $user->notifications()->where('id', $notify)->first();
            if ($notification) {
                $notification->markAsRead();

            }

        }

        return view('admin.contact.single', compact('sm', 'unreadMessages', 'readMessages','notify'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function MarkAllRead()
    {

        $user = User::find(1);
        $user->unreadNotifications->markAsRead();
        // or: Auth::user()->messages()->whereNull('read_at')->update(['read_at' => now()]);
        toastr()->success('All notifications/messages have been marked as read.');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteMessage($id,$notify = null)
    {
//        dd($id,$notify);
        $user = User::find(1);
        $message = Contact::find($id);
        $message->delete();
        if ($notify !== null) {
            $notification = $user->notifications()->where('id', $notify)->delete();
        } else {
            $notification = $user->notifications()->latest()->first();
            $notification->delete();
        }

        if ($message instanceof Contact) {
            toastr()->success('Message has deleted successfully!');

            return redirect()->route('message');
        }
        toastr()->error('An error has occurred please try again later.');

        return back();
    }

    public function dashboard()
    {
        $views = Post::orderBy('views', 'desc')->paginate(7);
        $posts = Post::all();
        $cate = Category::all();
        $messages = Contact::all();
        $gallery = Image::all();
        return view('admin.dashboard',compact('posts','cate','messages','gallery','views'));

    }
}
