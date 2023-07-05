@extends('backend.master')
@section('contents')


<h3 style="font-size: 30px;">Contact List</h3>


@if(session()->has('message'))

<p class="alert alert-success">{{session()->get('message')}}</p>

@endif

<table class="table">
    <thead class="table-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Details</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($Contacts as $key=>$Contact)
        <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ $Contact->name }}</td>
            <td>{{ $Contact->email }}</td>
            <td>{{ $Contact->details }}</td>
            <td><a class="btn btn-outline-primary" href="{{route('edit.contact', $Contact->id)}}">Reply</a>
            </td>

        </tr>
        @endforeach

    </tbody>
</table>


@endsection