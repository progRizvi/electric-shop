@extends('backend.master')
@section('contents')
    <h3 style="font-size: 30px;">Category List</h3>

    <a class="btn btn-success my-2" href="{{ route('create.form') }}">Create</a>

    @if (session()->has('message'))
        <p class="alert alert-success">{{ session()->get('message') }}</p>
    @endif

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Category Name</th>
                <th scope="col">Category Details</th>
                <th scope="col">Category Status</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($Categories as $key => $Category)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $Category->category_name }}</td>
                    <td>{{ $Category->category_details }}</td>
                    <td>{{ $Category->category_status }}</td>
                    <td><a class="btn btn-outline-primary" href="{{ route('edit.category', $Category->id) }}">Edit</a>
                        <a class="btn btn-outline-success" href="{{ route('view.category', $Category->id) }}">View</a>
                        <a class="btn btn-outline-danger" href="{{ route('delete.category', $Category->id) }}">Delete</a>
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $Categories->links() }}
@endsection
