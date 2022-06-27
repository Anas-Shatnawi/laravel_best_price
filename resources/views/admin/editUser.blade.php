@push('page-head')
<title>Edit User</title>
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/addProduct.css') }}">
@endpush

@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <div id="content">
        <div class="add-box">
            <h2 class="mb-5">Edit User</h2>
            <form id="add-form" action="{{ route('update-user') }}" method="POST">
                @csrf
                <input type="text" name="id" value="{{ $row->id }}" hidden>
                <div class="two-field">
                    <div class="user-box">
                        <input type="text" name="name" required="" value="{{ $row->name }}">
                        <label>Name</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="phoneNumber" required="" value="{{ $row->phoneNumber }}">
                        <label>Phone Number</label>
                    </div>
                </div>
                <div class="two-field">
                    <div class="user-box">
                        <input type="text" name="city" required="" value="{{ $row->city }}">
                        <label>City</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="street" required="" value="{{ $row->street }}">
                        <label>Street</label>
                    </div>
                </div>
                <div class="two-field">
                    <div class="user-box">
                        <input type="text" name="email" required="" value="{{ $row->email }}">
                        <label>Email</label>
                    </div>
                    <div class="user-box">
                        <select name="roles" id="select-categorey">
                            @foreach ($roles as $role)
                            @if ($userRole = $role->id)
                             <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                            @else
                             <option value="{{ $role->id }}">{{ $role->name }}</option>
                             @endif
                            @endforeach
                        </select>

                        <label>Role</label>
                    </div>
                </div>
                <div id="add-submit">
                    <button href="#">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection