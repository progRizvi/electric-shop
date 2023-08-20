<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function report()
    {
        $Orders = Order::all();
        return view('backend.pages.report.report', compact('Orders'));

    }

    public function reportSearch(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ]);

        if ($validator->fails()) {
            toastr()->error('From date and to date required and to should greater then from date.');
            return redirect()->back();
        }

        $from = date($request->from_date);
        $to = date($request->to_date);
        // $Orders = Order::whereBetween('created_at', [$from, $to])->get();
        $Orders = Order::whereDate('created_at', '>=', $from)->whereDate('created_at', '<=', $to)->get();
        return view('backend.pages.report.report', compact('Orders'));

    }
}
