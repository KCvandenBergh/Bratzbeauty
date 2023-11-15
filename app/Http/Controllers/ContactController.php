<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Mail::to('ontvanger@example.com')->send(new ContactFormMail(
            $request->input('name'),
            $request->input('email'),
            $request->input('message')
        ));

        return redirect()->route('contact.create')->with('success', 'Bedankt voor je bericht!');
    }
}

