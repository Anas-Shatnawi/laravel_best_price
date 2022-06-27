@push('page-head')
<title>Edit Product</title>
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/addProduct.css') }}">
@endpush

@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <div id="content">
        <div class="add-box">
            <h2>Add Product</h2>
            <form id="add-form" action="{{ route('update-product') }}" method="POST">
                @csrf
                <input type="text" name="id" value="{{ $row->id }}" hidden>
                <div class="two-field">
                    <div class="user-box">
                        <input type="text" name="productName" required="" value="{{ $row->name }}">
                        <label>Product Name</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="price" required="" value="{{ $row->price }}">
                        <label>Price</label>
                    </div>
                </div>

                <div class="two-field">
                    <div class="user-box">
                        <select name="categorey" id="select-categorey">
                            @foreach ($category_name as $category_name)
                            @foreach ($categories as $categorey)
                            @if ($category_name->category_id === $categorey->category_id)
                            <option value="{{ $categorey->category_id }}" selected>{{ $categorey->category_name }}
                            </option>
                            @else
                            <option value="{{ $categorey->category_id }}">{{ $categorey->category_name }}</option>
                            @endif
                            @endforeach
                            @endforeach
                        </select>
                        <label>Categorey </label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="image" value="{{ $row->image }}" required>
                        <label>Image</label>
                    </div>
                </div>
                <div class="two-field">
                    <div class="user-box">
                        <textarea name="description" id="description">{{ $row->description }}</textarea>
                        <label>Description</label>
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