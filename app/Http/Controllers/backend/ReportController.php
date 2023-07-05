<?php

namespace App\Http\Controllers\backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function report(){
        $Orders = Order::all();
        return view('backend.pages.report.report', compact('Orders'));

    }

    public function reportSearch(Request $request)
    {
//        $request->validate([
//            'from_date'    => 'required|date',
//            'to_date'      => 'required|date|after:from_date',
//        ]);

        $validator = Validator::make($request->all(), [
            'from_date'    => 'required|date',
            'to_date'      => 'required|date|after:from_date',
        ]);

        if($validator->fails())
        {
//            notify()->error($validator->getMessageBag());
            toastr()->error('From date and to date required and to should greater then from date.');
            return redirect()->back();
        }



       $from=$request->from_date;
       $to=$request->to_date;


//       $status=$request->status;

        $Orders=Order::whereBetween('created_at', [$from, $to])->get();
        return view('backend.pages.report.report', compact('Orders'));

    }
}
