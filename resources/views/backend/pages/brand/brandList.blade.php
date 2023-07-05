@extends('backend.master')
@section('contents')
    <div>
        <h3>Brand List</h3>
        <a class="btn btn-success my-2" href="{{ route('brand.create.form') }}">Create</a>

        @if (session()->has('message'))
            <p class="alert alert-success">{{ session()->get('message') }}</p>
        @endif

        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Password</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($Brands as $Brand)
                    <tr>
                        <th scope="row">{{ $Brand->id }}</th>
                        <td>{{ $Brand->email_address }}</td>
                        <td>{{ $Brand->password }}</td>
                        <td><a class="btn btn-danger" href="{{ route('delete.brand', $Brand->id) }}">Delete</a>
                            <a class="btn btn-primary" href="{{ route('edit.brand', $Brand->id) }}">Edit</a>
                            <a class="btn btn-success my-2" href="{{ route('view.brand', $Brand->id) }}">View</a>

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
