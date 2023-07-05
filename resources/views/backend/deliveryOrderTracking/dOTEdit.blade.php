@extends('backend.master')
@section('contents')
    <div class="container">
        <h3 style="font-size: 30px">Delivery Order Tracking List Update</h3>

        <form action="{{ route('order.update', $order->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group my-3">
                <label for="">Delivery Man Name</label>
                <select name="man_id" class="form-control" placeholder="Enter Man Name">
                    <option value="">--Assign Delivery Men--</option>
                    @foreach ($deliverymans as $deliveryman)
                        <option value="{{ $deliveryman->id }}" @if ($order->delivery_men_id == $deliveryman->id) selected @endif>
                            {{ $deliveryman->man_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" style="padding: 10px;">
                <label for="">Tracking Status</label>
                <select name="status" class="form-control" id="">
                    <option @if ($order->status == 'pending') selected @endif>Pending</option>
                    <option @if ($order->status == 'processing') selected @endif value="processing">Order Process</option>
                    <option @if ($order->status == 'dispatched') selected @endif value="dispatched">Order Dispatched</option>
                    <option @if ($order->status == 'delivered') selected @endif value="delivered">Delivered</option>
                    <option @if ($order->status == 'cancel') selected @endif value="cancel">Cancel</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Submit</button>
        </form>
    </div>
@endsection
