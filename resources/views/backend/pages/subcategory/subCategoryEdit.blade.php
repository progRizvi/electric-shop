@extends('backend.master')
@section('contents')
    <div>
        <h3>Sub-Category Update Form</h3>
        <form action="{{ route('update.sub.category', $Subcategory->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group my-3">
                <label for="">Sub-Category Name</label>
                <input type="text" name="subcategory_name" class="form-control" placeholder="Enter Sub-Category Name"
                    value="{{ $Subcategory->subcategory_name }}">
            </div>

            <div class="form-group my-3">
                <label for="">Sub-Category Details</label>
                <input type="text" name="subcategory_details" class="form-control"
                    placeholder="Enter Sub-Category Details" value="{{ $Subcategory->subcategory_details }}">
            </div>


            <div class="form-group" style="padding: 10px;">
                <label for="">Sub-Category Status</label>
                <select name="subcategory_status" class="form-control" id=""
                    value="{{ $Subcategory->subcategory_status }}">
                    <option selected>Choose...</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
