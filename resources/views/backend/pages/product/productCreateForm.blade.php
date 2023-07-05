@extends('backend.master')
@section('contents')
    <div class="container">
        <h3>Product Create Form</h3>
        <form action="{{ route('product.submit.form') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group my-3">
                <label for="">Product Name</label>
                <input type="text" name="product_name" required class="form-control" placeholder="Enter Product Name">
            </div>

            <div class="form-group my-3">
                <label for="">Category Name</label>
                <select name="category_id" class="form-control" required placeholder="Enter Product Name">
                    @foreach ($Categories as $Category)
                        <option value="{{ $Category->id }}">{{ $Category->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group my-3">
                <label for="">Product Image</label>
                <input type="file" name="product_image" required class="form-control" placeholder="Enter Product Image">
            </div>

            <div class="form-group my-3">
                <label for="">Product Details</label>
                <input type="text" name="product_details" required class="form-control"
                    placeholder="EnterProduct Details">
            </div>

            <div class="form-group my-3">
                <label for="">Product Price</label>
                <input type="number" min="0" name="product_price" required class="form-control"
                    placeholder="Enter Product Price">
            </div>

            <div class="form-group my-3">
                <label for="">Product Quantity</label>
                <input type="number" name="product_quantity" required class="form-control"
                    placeholder="Enter Product Quantity">
            </div>

            <div class="form-group my-3">
                <label for="">Product Status</label>
                <select name="product_status" required class="form-control" id="">
                    <option selected>Choose...</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
