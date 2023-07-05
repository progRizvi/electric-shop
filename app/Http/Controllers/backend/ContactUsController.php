<?php

namespace App\Http\Controllers\backend;

use App\Models\Contact;
use App\Mail\OrderEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function contactUsList()
    {
        $Contacts = Contact::all();
        return view('backend.ContactUs.contactUsList', compact('Contacts'));
    }

    public function contactEdit($id)
    {
        $Contact = Contact::find($id);
        return view('backend.ContactUs.editContact', compact('Contact'));
    }

    public function contactReplySubmit(Request $request, $id)
    {
        // dd($request->all());

        $Contact = Contact::find($id);
        $Contact->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'details'   => $request->details
        ]);

        Mail::to($request->email)->send(new OrderEmail());

        return redirect()->route('contact.us')->with('message', 'Replied Successfully.');
    }
}
