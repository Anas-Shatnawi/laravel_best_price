@push('page-head')
<title>Users</title>
<link rel="stylesheet" href="{{ asset('css/productsTable.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
@endpush

@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <section id="content">
        <!--for demo wrap-->
        <h1 id="header">All Users</h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>City</th>
                        <th>Street</th>
                        <th>email</th>
                        <th>Created Date</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }} </td>
                        <td>{{ $user->phoneNumber }}</td>
                        <td>{{ $user->city }}</td>
                        <td>{{ $user->street }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        @foreach ($roles as $role)
                            @if ($role->user_id === $user->id)
                                <td>{{ $role->name }} </td>
                            @endif
                        @endforeach
                        
                        <td><a href="edit-user\{{ $user->id }}" class="table-view-btn btn btn-sm"><i
                                    class='fa fa-edit mr-2'></i>Edit</a>
                        <td><button value="{{ $user->id }}" class="delete_user btn btn-sm" id="remove-btn">
                                <i class='fa fa-trash mr-1'></i>
                                Remove</button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </section>
</div>
<div class="modal fade" id="DeleteUserModal" tabindex="-1" aria-labelledby="exampleModalLable" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLable">Delete user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <input type="hidden" id="delete_user_id">
                <h4>Are You Sure that you want to delete this user?</h4>
            </div>
            <div class="modal-footer">
                <button id="close-modal-btn" type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_user_btn">Delete</button>
            </div>
        </div>
    </div>

</div>
<script>
    $(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
    }).resize();
</script>

<script src="{{ asset('js/admin/removeUser.js') }}"></script>
@endsection