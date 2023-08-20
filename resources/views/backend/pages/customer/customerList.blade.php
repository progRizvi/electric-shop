@extends('backend.master')
@section('contents')
    <div>
        <h3 style="font-size: 30px;">Customer List</h3>
        <!-- <a class="btn btn-success my-2" href="{{ route('customer.create.form') }}"> Create </a> -->

        @if (session()->has('message'))
            <p class="alert alert-success">{{ session()->get('message') }}</p>
        @endif


        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Customer Image</th>
                    <th scope="col">Email</th>
                    <!-- <th scope="col">Password</th> -->
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Customers as $key => $Customer)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $Customer->name }}</td>
                        <td><img width="70px" src="{{ url('uploads/frontUser', $Customer->image) }}" alt=""
                                srcset=""></td>
                        <td>{{ $Customer->email }}</td>
                        <!-- <td>{{ $Customer->password }}</td> -->
                        <td>
                            <!-- <a class="btn btn-success my-2" href="{{ route('edit.customer', $Customer->id) }}">edit</a> -->
                            <a class="btn btn-primary" href="{{ route('view.customer', $Customer->id) }}">view</a>
                            <!-- <a class="btn btn-danger" href="{{ route('delete.customer', $Customer->id) }}">Delete</a> -->
                        <td>
                    </tr>
                @endforeach
        </table>
    </div>

    {{ $Customers->links() }}
@endsection
