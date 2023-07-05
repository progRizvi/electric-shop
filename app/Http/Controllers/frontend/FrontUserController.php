<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class FrontUserController extends Controller
{
    public function frontUserProfile()
    {

        $Categories = Category::all();
        $Orders = Order::where("customer_id", auth('customer')->user()->id)->get();
        return view('frontend.frontUser.frontUser', compact('Orders', 'Categories'));
    }

    public function frontUserProfileUpdate(Request $request)
    {

        $fileName = (auth('customer')->user()->image);
        if ($request->hasFile('image')) {
            $fileName = 'electric-shop' . '.' . date('Ymdhmsis') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads/frontUser', $fileName);
        }

        Customer::find(auth('customer')->user()->id)->update([
            'image' => $fileName,
            'name' => $request->name,
            'email' => $request->email,

        ]);

        toastr()->success('Profile', 'Update Successfully');

        return redirect()->back();
    }

    public function frontUserOrderTrack($id)
    {

        $order = Order::find($id);
        return view('frontend.frontUser.frontUserOrder', compact('order'));
    }

    public function cancelOrder($id)
    {
        $order = Order::find($id);
        if ($order->status == "processing") {
            toastr()->error('error', 'Order Is processing. Cant cancel');
            return back();
        }
        $order->update([
            'status' => 'cancel',
        ]);
        toastr()->success('success', 'Order has been canceled!');
        return redirect()->back();
    }
}
