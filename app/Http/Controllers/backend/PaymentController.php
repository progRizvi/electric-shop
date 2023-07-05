<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentList()
    {

        $payments = Order::select('id','customer_id','transaction_id','amount')->paginate(10);

        return view('backend.pages.payment.paymentList', compact('payments'));
    }
}
