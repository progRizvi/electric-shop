@extends('backend.master')
@section('contents')
    <div>
        <h3>Brand Update Form</h3>
        <form action="{{ route('update.brand', $Brand->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group my-3">
                <label for="exampleInputEmail1">Email address</label>
                <input required type="email" name="email_address" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email" value="{{ $Brand->email_address }}">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group my-3">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    placeholder="Password" value="{{ $Brand->password }}">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>

    </div>
@endsection
