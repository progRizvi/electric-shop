@extends('backend.master')
@section('contents')
<div>
    <h3>View Only</h3>
    <div>
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{$Subcategory->email_address}}" readonly>
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{$Subcategory->password}}" readonly>
    </div>
</div>
@endsection