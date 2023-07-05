@extends('backend.master')
@section('contents')
    <div>
        <h3>Contact Reply</h3>
        <form action="{{ route('contact.reply.submit', $Contact->id) }}" method="POST">
            @csrf

            <div class="form-group my-3">
                <label for="">Name</label>
                <input type="text" name="name" value="{{ $Contact->name }}" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group my-3">
                <label for="">Email</label>
                <input type="text" name="email" value="{{ $Contact->email }}" class="form-control"
                    placeholder="Enter Email">
            </div>
            <div class="form-group my-3">
                <label for="">Details</label>
                <input height="20px" type="text" name="details" class="form-control" placeholder="Enter Message">
            </div>

            <button type="submit" class="btn btn-warning">Submit</button>

        </form>
    @endsection
