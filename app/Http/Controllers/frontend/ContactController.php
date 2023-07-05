<?php

namespace App\Http\Controllers\frontend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yoeunes\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function contact()
    {
      
        
        return view('frontend.headermenu.contact.contact');
    }

    public function contactSubmit(Request $request)
    {

        $request->validate([

            'name'      => 'required',
            'email'     => 'required',
            'details'   => 'required',
        ]);

        Contact::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'details'   => $request->details
        ]);
        toastr()->success('Message', 'Send Message');
        return redirect()->back();
    }
}
