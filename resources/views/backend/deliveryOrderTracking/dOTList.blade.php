@extends('backend.master')
@section('contents')
    <div>

        <p style="font-size: xx-large;">Delivery Order Tracking List</p>

        <a class="btn btn-success my-2" href="{{ route('dot.create') }}">Delivery Order Tracking List</a>

        @if (session()->has('message'))
            <p class="alert alert-success">{{ session()->get('message') }}</p>
        @endif

        <div style="padding-top: 10px;">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Delivery Man Name</th>
                        <th scope="col">Order Id</th>
                        <th scope="col">Tracking Status</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($dots as $key => $dot)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $dot->delivery_man->man_name }}</td>
                            <td>{{ $dot->order->id }}</td>
                            <td>{{ $dot->status }}</td>

                            <td>
                                <a class="btn btn-outline-primary" href="{{ route('dot.edit', $dot->id) }}">Edit</a>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        {{ $dots->Links() }}

    </div>
@endsection
