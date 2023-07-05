@extends('frontend.master')
@section('contents')

<div class="card">
    <div class="card-body">
        <div class="container mb-5 mt-3">
            <div class="row d-flex align-items-baseline">
                <div class="col-xl-9">
                    <p style="color: green;font-size: 20px;">Invoice <strong>ID: {{$Order->id}}</strong></p>
                    <p style="color: green;font-size: 20px;">Status : <strong>{{$Order->status}}</strong></p>
                </div>

                <hr>
            </div>

            <div class="container">
                <div class="col-md-12">
                    <div class="text-center">
                        <i class="fab fa-mdb fa-4x ms-0" style="color:green ;"></i>

                    </div>

                </div>

                <div class="row">
                    <div class="col-xl-8">
                        <ul class="list-unstyled">
                            <li class="text-muted">To: <span style="color:green ;">{{auth('customer')->user()->name}}</span></li>

                            <li class="text-muted">{{$Order->address}}</li>
                            <li class="text-muted"><i class="fa fa-phone"></i> 01308260888</li>
                        </ul>
                    </div>
                    <div class="col-xl-4">
                        <p class="text-muted">Invoice</p>
                        <ul class="list-unstyled">
                            <li class="text-muted"><i class="bi bi-award" style="color:green ;"></i> <span class="fw-bold">ID:</span>{{$Order->id}}</li>
                            <li class="text-muted"><i class="bi bi-alarm" style="color:green ;"></i> <span class="fw-bold">Creation Date: </span>
                                @if($order_details->count()>0)
                                {{$order_details[0]->created_at->toDateString()}}
                                @endif
                            </li>
                            <li class="text-muted"><i class="bi bi-bezier2" style="color:green ;"></i> <span class="me-1 fw-bold">Payment:</span><span class="badge bg-warning text-black fw-bold">
                                    {{$Order->transaction_id? "Paid" : "Unpaid"}}</span></li>
                        </ul>
                    </div>
                </div>

                <div class="row my-2 mx-1 justify-content-center">
                    <table class="table table-striped table-borderless">
                        <thead style="background-color:green ;" class="text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($order_details as $key=>$order_detail)

                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{$order_detail->product->product_name}}</td>
                                <td><img width="70px" src="{{url('uploads/product', $order_detail->product->product_image)}}" alt=""></td>
                                <td>{{$order_detail->qty}}</td>
                                <td>{{$order_detail->product->product_price}}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="row">
                    <div class="col-xl-8">
                        <p class="ms-3">Add additional notes and payment information</p>

                    </div>
                    <div class="col-xl-3">
                        <ul class="list-unstyled">
                            @php
                            $subtotal = 0;

                            foreach($order_details as $data){
                            $subtotal =+ $data->order->amount;
                            }

                            $subtotal = $subtotal - 100;
                            $delivery = 100;
                            @endphp

                            <div class="checkout__order__subtotal"> Delivery <span>{{ $delivery }} BDT</span>
                                <div class="checkout__order__subtotal"> Subtotal <span>{{ $subtotal }} BDT</span>

                                </div>

                        </ul>
                        <p class="text-black float-start"><span class="text-green me-3"> Total Amount</span><span style="font-size: 25px;">{{$subtotal + $delivery}} BDT</span></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-10">
                        <p>Thank you for your purchase</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection