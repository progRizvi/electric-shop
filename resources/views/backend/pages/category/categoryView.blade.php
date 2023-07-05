@extends('backend.master')
@section('contents')

<div>
    <h3>View Only</h3>
    <div>
            <label for="">Category Name</label>
            <input type="text" name="category_name" class="form-control" placeholder="Enter Category Name" value="{{$Category->category_name}}">
    </div>
    
    <div>
            <label for="">Category Details</label>
            <input type="text" name="category_details" class="form-control" placeholder="Enter Category Details" value="{{$Category->category_details}}">
    </div>
    <div>
            <label for="">Category Status</label>
            <select name="category_status" id="" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
    </div>
</div>
@endsection