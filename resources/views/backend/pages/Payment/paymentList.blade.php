@extends('backend.master')
@section('contents')

<div>
    <h3 style="font-size: 30px;">Payment List</h3>

    @if(session()->has('message'))

    <p class="alert alert-success">{{session()->get('message')}}</p>

    @endif

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Order Id</th>
                <th scope="col">Customer Id</th>
                <th scope="col">Transection Id</th>
                <th scope="col">Amount</th>
    


            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $key=>$payment)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$payment->id}}</td>
                <td>{{$payment->customer_id}}</td>
                <td>{{$payment->transaction_id}}</td>
                <td>{{$payment->amount}} BDT</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$payments->links()}}
</div>
@endsection