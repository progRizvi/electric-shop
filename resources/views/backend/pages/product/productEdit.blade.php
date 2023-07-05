@extends('backend.master')
@section('contents')
    <div>
        <h3>Product Update Form</h3>
        <form action="{{ route('update.product', $Product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group my-3">
                <label for="">Product Name</label>
                <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name"
                    value="{{ $Product->product_name }}">
            </div>

            <div class="form-group my-3">
                <label for="">Product Image</label>
                <input type="file" name="product_image" class="form-control" placeholder="Enter Product Image"
                    value="{{ $Product->product_image }}">
            </div>

            <div class="form-group my-3">
                <label for="">Product Details</label>
                <input type="text" name="product_details" class="form-control" placeholder="Enter Product Details"
                    value="{{ $Product->product_details }}">
            </div>

            <div class="form-group my-3">
                <label for="">Product Price</label>
                <input type="number" min="0" name="product_price" class="form-control"
                    placeholder="Enter Product Price" value="{{ $Product->product_price }}">
            </div>

            <div class="form-group my-3">
                <label for="">Product Quantity</label>
                <input type="number" name="product_quantity" class="form-control" placeholder="Enter Product Quantity"
                    value="{{ $Product->product_quantity }}">
            </div>

            <div class="form-group">
                <label for="">Product Status</label>
                <select name="product_status" class="form-control" id="" value="{{ $Product->product_status }}">
                    <option selected>Choose...</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
