<?php

namespace App\Http\Controllers\backend;

use App\Models\DOT;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DeliveryMan;
use App\Models\Order;

class DeliveryOrderTrackingController extends Controller
{
    public function dOrderTracking()
    {
        $dots = DOT::paginate(5);
        return view('backend.deliveryOrderTracking.dOTList', compact('dots'));
    }

    public function dOTCreate()
    {
        return view('backend.deliveryOrderTracking.dOTCreate', compact('Orders', 'deliverymans'));
    }

    public function editOrder($id)
    {
        $order = Order::find($id);
        $deliverymans = DeliveryMan::all();
        return view('backend.deliveryOrderTracking.dOTEdit', compact('order', 'deliverymans'));
    }

    public function dOTSubmit(Request $request)
    {

        DOT::create([
            'order_id' => $request->order_id,
            'delivery_men_id' => $request->man_name,
            'status' => $request->status

        ]);
        return redirect()->route('dot.list')->with('message', 'Delivery Order Tracking Create Successfully.');
    }



    public function updateOrder(Request $request, $id)
    {
        $dots = ORder::find($id);
        $dots->update([
            'delivery_men_id' => $request->man_id,
            'status' => $request->status
        ]);

        return redirect()->route('order.list')->with('message', 'Order Updated Successfully.');
    }
}
