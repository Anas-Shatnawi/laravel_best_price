@push('page-head')
<title>Edit Location</title>
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/addProduct.css') }}">
@endpush

@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <div id="content">
        <div class="add-box">
            <h2 class="mb-5">Edit Location</h2>
            <form id="add-form" action="{{ route('update-location') }}" method="POST">
                @csrf
                <input type="text" name="id" value="{{ $row->id }}" hidden>
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