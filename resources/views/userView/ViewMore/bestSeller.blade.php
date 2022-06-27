@push('page-head')
<title>Best Seller</title>
<link rel="stylesheet" href="{{ asset('css/viewMorePages.css') }}">
@endpush
@extends('layouts.app')
@section('content')
<div class="wrapper">
        <h1 class="head"><img src="{{ asset('image/Home-Image/bestSeller.png') }}" alt=""> Best Seller</h1>
        <div class="all-cards">
            @foreach ($bestSeller as $product)
            <div class="">
                <div class="card">
                    <img src="{{ $product->image }}" class="" alt="tuxedo">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">
                            @for ($i = 0; $i < $product->rating ; $i++)
                                <span id="fill-star" class="fa fa-star checked"></span>
                                @endfor
                                @for ($i=5; $i>$product->rating ; $i--)
                                <span class="fa fa-star"></span>
                            @endfor
                        </p>
                    </div>
                    <div class="price">
                        <p>{{ $product->price }}$</p>
                    </div>
                    <div class="card-footer">
                        <a href="{!! route('switch',['id'=>$product->id]) !!}" id="visit-btn" class="btn my-2">Visit</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</div>
@endsection