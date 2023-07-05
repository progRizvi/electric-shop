@extends('backend.master')
@section('contents')

    <h1>Order Report</h1>

    <form action="{{ route('order.report.search') }}" method="get">

        <div class="row">
            <div class="col-md-4">
                <label for="">From date:</label>
                <input name="from_date" type="date" class="form-control">

            </div>
            <div class="col-md-4">
                <label for="">To date:</label>
                <input name="to_date" type="date" class="form-control">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success my-2">Search</button>
            </div>
        </div>

    </form>
    <div id="orderReport">


        <h3 style="font-size: xx-large;">Order Reports- {{ date('Y-m-d') }}</h3>

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
                    <!-- <th scope="col">Action</th> -->
                </tr>
            </thead>
            <tbody>

                @if (isset($Orders))
                    @foreach ($Orders as $Order)
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

                            <!-- <td>
                        @if (!($Order->status == 'cancel'))
    <a type="submit" href="{{ route('order.reciept', $Order->id) }}" class="btn btn-success my-2">Order Reciept</a>
                        <a type="submit" href="{{ route('order.edit', $Order->id) }}" class="btn btn-outline-dark">Edit</a>
    @endif
                    </td> -->

                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <button onclick="printDiv('orderReport')" class="btn btn-success my-2">Print</button>


    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>

@endsection
