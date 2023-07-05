@extends('backend.master')
@section('contents')
    <h3>Sub-Category Create Form</h3>
    <form action="{{ route('sub.category.submit.form') }}" method="POST">
        @csrf
        <div class="form-group my-3">
            <label for="">Sub-Category Name</label>
            <input type="text" name="subcategory_name" class="form-control" placeholder="Enter Sub-Category Name">
        </div>

        <div class="form-group my-3">
            <label for="">Sub-Category Details</label>
            <input type="text" name="subcategory_details" class="form-control" placeholder="Enter Sub-Category Details">
        </div>

        <div class="form-group my-3">
            <label for="">Category Name</label>
            <select name="category_id" class="form-control" placeholder="Enter Product Name">
                @foreach ($Categories as $Category)
                    <option value="{{ $Category->id }}">{{ $Category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group" style="padding: 10px;">
            <label for="">Sub-Category Status</label>
            <select name="subcategory_status" class="form-control" id="">
                <option selected>Choose...</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
