@extends('backend.master')
@section('contents')

<div>
    <h3>Product View</h3>
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{$Product->email_address}}">

            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{$Product->password}}">

</div>

@endsection