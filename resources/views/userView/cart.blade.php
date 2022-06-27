@push('page-head')
<title>Cart</title>
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endpush

@extends('layouts.app')
@section('content')
@if (Session::has('cart') && $products != null)
<div class="" id="page-cart-title">
    <h3 id="cart-title">Your Cart</h3>
</div>
<div id="cart-page" class="">
    <div id="page-cart-side" class="">
        @foreach ($products as $product)
        <input type="hidden" value="{{ $product['item']['id'] }}" id="delete_item_id_{{ $product['item']['id'] }}">
        <div class="" id="cart-item">
            <div id="cart-image-text">

                <img id="cart-item-image" src="{{ $product['item']['image'] }}" alt="">
                <div class="" id="cart-item-text">
                    <ul>
                        <li class="cart-item-li" id="product-name">{{ $product['item']['name'] }}</li>
                        <li class="cart-item-li">Price: <span id="dollar">$</span> {{ $product['price'] * $product['qty'] }}</li>
                        <li class="cart-item-li">Quantity: {{ $product['qty'] }}</li>
                        {{-- <li class="cart-item-li">ID: {{ $product['item']['id'] }}</li> --}}
                        <li class="cart-item-li">
                            @for ($i = 0; $i < $product['item']['rating'] ; $i++) <span id="fill-star"
                            class="fa fa-star checked"></span>
                            @endfor
                            @for ($i=5; $i>$product['item']['rating'] ; $i--)
                            <span class="fa fa-star"></span>
                            @endfor
                        </li>
                    </ul>
                </div>
            </div>
            <div class="" id="item-buttons">
                <div class="quantity">
                    <button class="minus-btn disabled" type="button"><i
                            class="btn-quantity fas fa-minus-circle"></i></button>
                    <input type="text" name="quantity" readonly id="quantity-number" value="{{ $product['qty'] }}" min=1
                        max=10>
                    <button class="plus-btn" type="button"><i class="btn-quantity fas fa-plus-circle"></i></button>
                </div>
                <div id="remove-item-div">
                    <button id="remove-item" class="btn btn-sm" onclick="getItemId({{ $product['item']['id'] }})"><i class='fa fa-trash mr-1' ></i> Remove</button>
                </div>
            </div>

        </div>
        @endforeach
    </div>
    <div id="page-summary-side" class="">
        <div id="page-summary-side-title">
            Summary
        </div>
        <hr>
        <div id="coupon-div">
            <span>Do you have a coupon?</span>
            <form action="">
                <input id="coupon-code" type="text" name="coupon" placeholder="Coupon Code"><button class=""
                    id="apply-coupon">Apply</button>
            </form>
        </div>
        <h4>Amount</h4>
        <hr>
        <div>
            <div class="amount-div">Sub Total: <span id="dollar">$</span> {{ $totalPrice }}</div>
            <div class="amount-div">Discount :</div>
        </div>
        <hr>
        <div id="estimated-total">
            Estimated Total :  
        </div>
        <div id="totalQty">
            Total Quantity : {{ $totalQty }}
        </div>
        <div id="checkout-div">
            <a class="btn " id="checkout-btn" href="/checkout/{{ $user->id }}">Checkout</a>
        </div>
    </div>
    @else
    <div  id="no-item-on-cart">
        <div id="no-item-div">
            <h2>No Items in Cart!</h2>
        </div>
    </div>
    @endif
</div>
<script src="{{ asset('js/productDetails.js') }}"></script>
<script src="{{ asset('js/removeFromCart.js') }}"></script>
@endsection