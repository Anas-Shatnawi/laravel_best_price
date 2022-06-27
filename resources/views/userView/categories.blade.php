@push('page-head')
<title>Categories</title>
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endpush

@extends('layouts.app')
@section('content')
<div class="categories-container">
    <p id="categories-title">categories</p>
    <hr class="hr-title">
    <div class="container" id="categories">
        <div class="d-flex flex-wrap justify-content-center">
            @foreach ($categories as $category )
            <div class="py-2 pr-5">
                <a href="/categories/{{ $category->category_id }}">
                    <div class="category-card">
                        <img class="cat-img" src="{{ asset(  $category->image  ) }}">
                        <div class="text-img ">{{ $category->category_name }}</div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection