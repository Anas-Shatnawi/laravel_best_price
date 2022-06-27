@push('page-head')
<title>Add Location</title>
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/addProduct.css') }}">
@endpush

@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <div id="content">
        <div class="add-box">
            <h2>Add Location</h2>
            <form id="add-form" action="add-location" method="POST">
                @csrf
                <h5 class="text-primary">General</h5>
                <hr class="bg-primary">
                <div class="two-field">
                    <div class="user-box">
                        <input type="text" name="location_city" required="">
                        <label>City</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="location_street" required="">
                        <label>Street</label>
                    </div>
                </div>
                <div id="add-submit">
                    <button href="add-product">
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