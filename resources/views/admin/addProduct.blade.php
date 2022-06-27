@push('page-head')
<title>addProducts</title>
<link rel="stylesheet" href="{{ asset('css/admin/addProduct.css') }}">
@endpush

@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <div id="content">
        <div class="add-box">
            <h2>Add Product</h2>
            <form id="add-form" action="add-product" method="POST">
                @csrf
                <div class="two-field">
                    <div class="user-box">
                        <input type="text" name="productName" required="">
                        <label>Product Name</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="price" required="">
                        <label>Price</label>
                    </div>
                </div>

                <div class="two-field">
                    <div class="user-box">
                        <select name="categorey" id="select-categorey">
                            <option disabled selected value> -- select an option -- </option>
                            @foreach ($categories as $categorey)
                            <option value="{{ $categorey->category_id }}">{{ $categorey->category_name }}</option>
                            @endforeach
                        </select>
                        <label>Categorey </label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="image" required="">
                        <label>Image</label>
                    </div>
                </div>
                <div class="two-field">
                    <div class="user-box">
                        <textarea name="description" id="description"></textarea>
                        <label>Description</label>
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