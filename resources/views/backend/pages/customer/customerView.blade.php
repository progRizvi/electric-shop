@extends('backend.master')
@section('contents')

<div>

    <h3>Customer View</h3>
    <div>
    <label for="exampleInputEmail1">Customer Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your order amount" value="{{$Customer->customer_name}}">
    </div>
    <div>
    <label for="exampleInputEmail1">Customer Image</label>
        <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter your image" value="{{$Customer->customer_image}}">
    </div>
    <div>
    <label for="exampleInputPassword1">Email</label>
        <input type="text" name="email" class="form-control" id="exampleInputPassword1"
            placeholder="Your email" value="{{$Customer->email}}">
    </div>
    <div>
    <label for="exampleInputPassword1">Password</label>
        <input type="text"  name="password" class="form-control" id="exampleInputPassword1"
            placeholder="Enter your password" value="{{$Customer->password}}">
    </div>

</div>

@endsection()