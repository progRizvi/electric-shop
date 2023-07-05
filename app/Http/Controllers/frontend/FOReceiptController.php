<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FOReceiptController extends Controller
{
    public function frontOrderReceipt($id)
    {
        $Order = Order::find($id);
        $order_details = OrderDetails::with("order")->where("order_id", $id)->get();
        //$recentOrder = Order::where("user_id",auth()->user()->id)->whereDate("updated_at", "=",date('Y-m-d'))->get();
        return view('frontend.frontOrderReceipt.foReceipt', compact('order_details', 'Order'));
    }
}
