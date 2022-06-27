@push('page-head')
<title>Edit Category</title>
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/addProduct.css') }}">
@endpush

@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <div id="content">
        <div class="add-box">
            <h2>Edit Category</h2>
            <form id="add-form" action="{{ route('update-category') }}" method="POST">
                @csrf
                <input type="text" name="id" value="{{ $row->category_id }}" hidden>
                <div class="two-field">
                    <div class="user-box">
                        <input type="text" name="categoryName" required="" value="{{ $row->category_name }}">
                        <label>Category Name</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="image" required="" value="{{ $row->image }}">
                        <label>Image</label>
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