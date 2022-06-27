@push('page-head')
<title>Edit User</title>
<link rel="stylesheet" href="{{ asset('css/Shop.css') }}">
<link rel="stylesheet" href="{{ asset('css/settings.css') }}">
@endpush

@extends('layouts.app')
@section('content')
<div class="wrapper">
    <div id="content">
        <div class="add-box">
            <form id="add-form" action="/update-settings/{{ $userInfo->id }}" method="POST">
                <h2 class="mb-5">Settings</h2>
                @csrf
                <input type="text" name="id" value="{{ $userInfo->id }}" hidden>
                <div class="two-field">
                    <div class="user-box">
                        <input type="text" name="name" required="" value="{{ $userInfo->name }}">
                        <label>Name</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="phoneNumber" required="" value="{{ $userInfo->phoneNumber }}">
                        <label>Phone Number</label>
                    </div>
                </div>
                <div class="two-field">
                    <div class="user-box">
                        <input type="text" name="city" required="" value="{{ $userInfo->city }}">
                        <label>City</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="street" required="" value="{{ $userInfo->street }}">
                        <label>Street</label>
                    </div>
                </div>
                <div class="two-field">
                    <div class="user-box">
                        <input type="text" name="email" required="" value="{{ $userInfo->email }}">
                        <label>Email</label>
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