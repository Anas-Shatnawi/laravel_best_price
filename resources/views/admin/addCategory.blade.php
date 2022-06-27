@push('page-head')
<title>Add Category</title>
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/addProduct.css') }}">
@endpush

@extends('layouts.admin')
@section('content')
    <div class="wrapper">

        <div id="content">
            <div class="add-box">
                <h2>Add Category</h2>
                <form id="add-form" action="add-category" method="POST">
                    @csrf
                    <div class="two-field">
                        <div class="user-box">
                            <input type="text" name="category_name" required="">
                            <label>Category Name</label>
                        </div>
                        <div class="user-box">
                            <input type="text" name="image" required="">
                            <label>Category Image</label>
                        </div>
                    </div>

                    <div id="add-submit">
                        <button href="add-category">
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