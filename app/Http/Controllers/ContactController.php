<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ContactFormNotification;
use App\Notifications\ContactUsNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Nette\Schema\Message;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'content' => 'required|string',
            'email' => 'required|email',
        ]);

        $message = Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'content' => $request->content,
            'email' => $request->email,
        ]);
        $user = User::where('id',1)->first();
        // Dispatch the notification and store it in the database
        Notification::send($user, new ContactUsNotification($message));
        // Redirect or return a response
        if ($message instanceof Contact) {
            toastr()->success('Message has been sent successfully!');

            return redirect()->back();
        }
        toastr()->error('An error has occurred please try again later.');

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function showMessage()
    {
        $messages = Notification::all()->latest()->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
