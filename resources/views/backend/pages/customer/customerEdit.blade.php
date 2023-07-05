@extends('backend.master')
@section('contents')
    <div>
        <h3>Customer Update Form</h3>
        <form action="{{ route('update.customer', $Customer->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
    </div>
    <div class="form-group my-3">
        <label for="exampleInputEmail1">Customer Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter your name" value="{{ $Customer->name }}">
        @error('customer_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </div>
    <div class="form-group my-3">
        <label for="exampleInputEmail1">Customer Image</label>
        <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter your image" value="{{ $Customer->image }}">
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </div>
    <div class="form-group my-3">
        <label for="exampleInputPassword1">Email</label>
        <input type="text" name="email" class="form-control" id="exampleInputPassword1"
            placeholder="Enter Your Password" value="{{ $Customer->email }}">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </div>

    <div class="form-group my-3">
        <label for="exampleInputPassword1">Password</label>
        <input type="text" name="password" class="form-control" id="exampleInputPassword1"
            placeholder="Enter your password" value="{{ $Customer->password }}">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </div>

    </div>
    <button type="submit" class="btn btn-warning">Update</button>
    </form>
    </div>
@endsection
