@extends('backend.master')
@section('contents')
    <h3>Sub-Category List</h3>

    <a class="btn btn-success my-2" href="{{ route('sub.category.create.form') }}">Create</a>

    @if (session()->has('message'))
        <p class="alert alert-primary">{{ session()->get('message') }}</p>
    @endif
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Sub-Category Name</th>
                <th scope="col">Sub-Category Details</th>
                <th scope="col">Category</th>
                <th scope="col">Sub-Category Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Subcategory as $key => $Subcategory)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $Subcategory->subcategory_name }}</td>
                    <td>{{ $Subcategory->subcategory_details }}</td>
                    <td>{{ $Subcategory->categories->category_name }}</td>
                    <td>{{ $Subcategory->subcategory_status }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('edit.sub.category', $Subcategory->id) }}">Edit</a>
                        <a class="btn btn-success my-2" href="{{ route('view.sub.category', $Subcategory->id) }}">View</a>
                        <a class="btn btn-danger" href="{{ route('delete.sub.category', $Subcategory->id) }}">Delete</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
