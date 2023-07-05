@extends('backend.master')
@section('contents')
    <div>
        <h3>Category Update Form</h3>
        <form action="{{ route('update.category', $Category->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="form-group my-3">
                <label for="">Category Name</label>
                <input type="text" name="category_name" class="form-control" placeholder="Enter Category Name"
                    value="{{ $Category->category_name }}">
            </div>

            <div class="form-group my-3">
                <label for="">Category Details</label>
                <input type="text" name="category_details" class="form-control" placeholder="Enter Category Details"
                    value="{{ $Category->category_details }}">
            </div>

            <div class="form-group my-3">
                <label for="">Category Status</label>
                <select name="category_status" id="" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
