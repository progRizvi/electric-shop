<?php

namespace App\Http\Controllers\backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\DOT;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('backend.dashboard');
    }


    public function master()
    {
        return view('backend.master');
    }


    public function newPage()
    {
        $totalCustomer = Customer::get()->count();
        $totalOrderAmount = Order::pluck('amount')->toArray();

        $totalAmount = array_sum($totalOrderAmount);
        $totalOrder = Order::whereDate('created_at', '=', date('Y-m-d'))->get()->count();

        $Orders = Order::orderBy('id', 'DESC')->paginate(10);



        $totalOrderCount = [];

        for ($m = 1; $m <= 12; $m++) {
            $count = Order::whereMonth("created_at", $m)->get()->count();
            $totalOrderCount[] = $count;
        }

        return view('backend.pages.newPage', compact('Orders', 'totalOrder', 'totalCustomer', 'totalAmount', 'totalOrderCount'));
    }


    public function todaysOrder()
    {
        $Orders = Order::all();
        $todaysOrder = Order::whereDate('created_at', '=', date('Y-m-d'))->paginate(10);

        return view('backend.pages.order.todaysOrder', compact('Orders', 'todaysOrder'));
    }


    public function orderList()
    {
        $Orders = Order::orderBy('id', 'DESC')->paginate(10);

        if (\request()->has('search')) {
            $search_key = request()->search;
            $Orders = Order::where('id', 'LIKE', '%' . $search_key . '%')->paginate(10);
        } else {
            $search_key = request()->search;
            $customer = Customer::where('name', 'LIKE', '%' . $search_key . '%')->pluck("id")->toArray();
            $Orders = Order::whereIn("customer_id",  $customer)->with('customer')->paginate(10);
        }

        $Customers = Customer::all();

        $order_details = OrderDetails::with("order")->with("product")->get();


        return view('backend.pages.order.orderlist', compact('Orders', 'order_details', 'Customers'));
    }

    public function orderEdit($id)
    {
        $Order = Order::find($id);
        return view('backend.pages.newPage', compact('Order'));
    }

    public function orderUpdate($id)
    {
        $Order = Order::find($id);

        $Order->update([
            "status" => "Approved"
        ]);
        return redirect()->back();
    }

    public function orderReciept($id)
    {
       

        $Order = Order::find($id);
        

        $Product = Product::all();
        $order_details = OrderDetails::where("order_id", $id)->get();
        return view('backend.pages.order.orderReciept', compact('Order', 'order_details', 'Product'));
    }
}
