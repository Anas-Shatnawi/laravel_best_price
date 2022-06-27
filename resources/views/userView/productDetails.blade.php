@push('page-head')
<title>Best Price</title>
<link rel="stylesheet" href="{{ asset('css/details.css') }}">
@endpush

@extends('layouts.app')

@section('content')

<div id="details-container" class="">
    <div class="row">
        <div class="">

            <img id="product-image" src="{{asset(  $details->image  ) }}" alt="">

        </div>
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12" id="content">

            <div id="detail-header">
                <h3 id="product-name">{{ $details->name }}</h3>
                <div class="d-flex">
                    <h3 id="product-price">Price: {{ $details->price }}$</h3>
                    <div id="rating-div">
                        @for ($i = 0; $i < $details->rating ; $i++)
                            <span id="fill-star" class="fa fa-star checked"></span>
                            @endfor
                            @for ($i=5; $i>$details->rating ; $i--)
                            <span id="empty-star" class="fa fa-star"></span>
                            @endfor
                    </div>
                </div>
                @foreach ($categoryName as $categoryName)
                @if ($categoryName->category_id==$details->cate_id)
                <p id="cate-name" class="">
                    Category: {{ $categoryName->category_name }}
                </p>
                @endif
                @endforeach

                <hr class="hr-black">
            </div>
            <div id="desc-div">
                <h4 class="text-center">Description</h4>
                <p id="descriptions">
                    @if(strlen($details->description) > 400)
                    {{substr($details->description,0,400)}}
                    <span class="read-more-show hide_content">More<i class="fa fa-angle-down"></i></span>
                    <span class="read-more-content">
                        {{substr($details->description,400,strlen($details->description))}}
                        <span class="read-more-hide hide_content">Less <i class="fa fa-angle-up"></i></span> </span>
                    @else
                    {{$details->description}}
                    @endif
                </p>
            </div>
            <div id="buttons">
                <form id="wish-list-form" action="/add-to-wish-list" method="POST">
                    @csrf
                    <input type="hidden" name="product_wish_id" value="{{ $details->id }}">
                    <button class="btn" id="add-list-button" type="submit"><i class="fas fa-stream mr-3"></i>ADD TO WISH
                        LIST <i class="fas fa-stream ml-3"></i></button>
                </form>
                <div class="row" id="add-cart">
                    <div class="quantity">
                        <button class="btn minus-btn disabled" type="button"><i
                                class="fas fa-minus-circle"></i></button>
                        <input type="text" readonly id="quantity-number" value="1" min=1 max=10>
                        <button class="btn plus-btn" type="button"><i class="fas fa-plus-circle"></i></button>
                    </div>
                    <form action="/" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $details->id }}">
                        <a href="{{ route('add.to.cart',['id'=>$details->id]) }}" class="btn" id="add-button"><i
                                class="fas fa-cart-plus mr-3"></i> ADD TO CART<i class="fas fa-cart-plus ml-3"></i></a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<div id="related-products-container">
    <div id="">
        <h3 id="title">Related Products</h3>
    </div>
    <div id="related-products" class="row">
        @foreach ($relatedProducts as $relatedProduct)
        <div id="related-products-card" class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card ">
                <img src="{{ $relatedProduct->image }}" class="" alt="tuxedo">
                <div class="card-body">
                    <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                    <p class="card-text">
                        @for ($i = 0; $i < $relatedProduct->rating ; $i++)
                            <span id="fill-star" class="fa fa-star checked"></span>
                            @endfor
                            @for ($i=5; $i>$relatedProduct->rating ; $i--)
                            <span class="fa fa-star"></span>
                            @endfor
                    </p>
                </div>
                <div class="price">
                    <p>{{ $relatedProduct->price }}$</p>
                </div>
                <div class="card-footer">
                    <a id="visit-btn" href="{!! route('switch',['id'=>$relatedProduct->id]) !!}" class="btn my-2">Visit</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script src="{{ asset('js/productDetails.js') }}"></script>
@endsection