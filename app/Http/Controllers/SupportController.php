<?php

namespace App\Http\Controllers;


use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function support()
    {

        $message = Support::where('from_user', auth('customer')->user()->id)->OrWhere('to_user', auth('customer')->user()->id)->get();


        $allchat = Support::get()->count();



        return view('frontend.support.support', compact('message', 'allchat'));
    }


    public function message(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'message' => 'required'
        ]);

        Support::create([

            'from_user' => auth('customer')->user()->id,
            'to_user' => 1,
            'message' => $request->message,


        ]);

        return redirect()->back()->with('message', 'message sent sucessfully');
    }


    ////User SUppprt
    public function list()
    {

        $categories = Support::with(['userFrom', 'userTo'])->orderBy('id', 'DESC')->paginate(10);


        return view('backend.support.list', compact('categories'));
    }


    public function reply($id)
    {

        return view('backend.support.reply', compact('id'));
    }



    public function send(Request $request)
    {


        $request->validate([
            'message' => 'required'
        ]);

        $conversation = Support::find($request->message_id);

        Support::create([
            'from_user' => auth()->user()->id,
            'to_user' => $conversation->from_user,
            'message' => $request->message,
            "from_message" => "admin"
        ]);

        return redirect()->route('backend.support.list');
    }
}
