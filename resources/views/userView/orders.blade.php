@push('page-head')
<title>Orders</title>
<link rel="stylesheet" href="{{ asset('css/orders.css') }}">
@endpush
@extends('layouts.app')
@section('content')
    <div id="orders-container">
        <div id="orders-header">
            <h1>
               <i class="fas fa-list-alt mr-2"></i>Orders
            </h1>
        </div>
        <div id="order-products">
            @foreach ($products as $product)
                <div class="product-card">
                    <img src="{{ $product->image }}" alt="">
                    <div class="product-details">
                        <ul>
                            <li class="all-info"><span class="info">Name:{{ $product->name }}</span></li>
                            <li class="all-info"><span class="info">Ctegorey:{{ $product->cate_id }}</span></li>
                            <li class="all-info"><span class="info">Price:{{ $product->price }}</span></li>
                            <li class="all-info"><span class="info">Qty:{{ $product->qty }}</span></li>
                            <li class="all-info"><span id="fill-star" class="fa fa-star checked"></span>{{ $product->rating }}</li>
                        </ul>
                    </div>
                    <a href="/productDetails/{{ $product->id }}">Visit</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection