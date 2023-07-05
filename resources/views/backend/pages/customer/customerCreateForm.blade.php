@extends('backend.master')
@section('contents')
    <div>
        <h3>Customer Create Form</h3>
        <form action="{{ route('customer.submit.form') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group my-3">
                <label for="exampleInputEmail1">Customer Name</label>
                <input type="text" name="name" class="form-control" required id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter your name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="form-group my-3">
                <label for="exampleInputEmail1">Customer Image</label>
                <input type="file" name="image" class="form-control" required id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter your image">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="form-group my-3">
                <label for="exampleInputPassword1">Email</label>
                <input type="text" name="email" class="form-control" required id="exampleInputPassword1"
                    placeholder="Your Email">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="form-group my-3">
                <label for="exampleInputPassword1">Password</label>
                <input type="text" name="password" class="form-control" required id="exampleInputPassword1"
                    placeholder="Enter your address">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
