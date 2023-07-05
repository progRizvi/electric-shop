@extends('backend.master')
@section('contents')
    <h3 style="font-size: xx-large;">Todays Order List</h3>

    <table class="table">

        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Order Receiver Name</th>
                <th scope="col">Order Email</th>
                <th scope="col">Order Phone</th>
                <th scope="col">Order Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Order Address</th>
                <th scope="col">Transaction ID</th>
                <th scope="col">Currency</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todaysOrder as $Order)
                <tr>
                    <th scope="row">{{ $Order->id }}</th>
                    <td>{{ $Order->customer->name }}</td>
                    <td>{{ $Order->name }}</td>
                    <td>{{ $Order->email }}</td>
                    <td>{{ $Order->phone }}</td>
                    <td>{{ $Order->amount }}</td>
                    <td>{{ $Order->status }}</td>
                    <td>{{ $Order->address }}</td>
                    <td>{{ $Order->transaction_id }}</td>
                    <td>{{ $Order->currency }}</td>
                    <td>
                        @if (!($Order->status == 'cancel'))
                            <a type="submit" href="{{ route('order.reciept', $Order->id) }}"
                                class="btn btn-success my-2">Order Reciept</a>
                            <a type="submit" href="{{ route('order.edit', $Order->id) }}"
                                class="btn btn-outline-dark">Edit</a>
                        @endif
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $todaysOrder->Links() }}
@endsection
