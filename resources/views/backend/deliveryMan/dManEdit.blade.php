@extends('backend.master')
@section('contents')
    <div class="container">
        <h3 style="font-size: 30px">Delivery Man Edit</h3>

        <form action="{{ route('delivery.man.update', $deliveryman->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group my-3">
                <label for="">Delivery Man Name</label>
                <input type="text" name="man_name" class="form-control" placeholder="Enter Name"
                    value="{{ $deliveryman->man_name }}">
            </div>

            <div class="form-group my-3">
                <label for="">Image</label>
                <input type="file" name="man_image" class="form-control" placeholder="Enter Image"
                    value="{{ $deliveryman->man_image }}">
            </div>

            <div class="form-group my-3">
                <label for="">Email</label>
                <input type="text" name="man_email" class="form-control" placeholder="Enter Email"
                    value="{{ $deliveryman->man_email }}">
            </div>

            <div class="form-group my-3">
                <label for="">Number</label>
                <input type="text" name="man_number" class="form-control" placeholder="Enter Number"
                    value="{{ $deliveryman->man_number }}">
            </div>

            <div class="form-group" style="padding: 10px;">
                <label for="">Service Status</label>
                <select name="man_status" class="form-control" id="" value="{{ $deliveryman->man_status }}">
                    <option selected>Choose...</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
