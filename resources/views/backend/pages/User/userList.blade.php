@extends('backend.master')
@section('contents')

<div>

    <p style="font-size: xx-large;">User List</p>
    <div style="padding-top: 10px;">
        <table class="table users_list">
            <thead class="table">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>



</div>

@endsection


@push('js')

<script type="text/javascript">
    $(function() {
        var table = $('.users_list').DataTable({
            processing: false,
            serverSide: true,
            ajax: "{{ route('user.list') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'date',
                    name: 'date',
                    searchable: true
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'role',
                    name: 'role'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
    });
</script>
@endpush