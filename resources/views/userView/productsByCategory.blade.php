@push('page-head')
<title>{{ $categoryName->category_name }}</title>
@endpush
@extends('layouts.app')
@section('content')

<div class="wrapper" id="productByCategory">
    <section id="homepage" class="container-section" data-target="#product">
        <br>
        <h1 class="head"><img src="{{ asset('image/Home-Image/star.png') }}" alt=""> {{ $categoryName->category_name }}
        </h1>
        <div class="row px-1">
            @foreach ($products as $product)
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
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
    </section>
</div>

{{--
<!-- ---------------------- {{{{{{{{{{{    SCROLLED NAVBAR }}}}}}}}}} --------------------- --> --}}

<script>
    $(function() {
                    $(document).scroll(function() {
                        var $nav = $("#mainNav");
                        $nav.toggleClass("scrolled", $(this).scrollTop() > 0);
                    });
                });
</script>
@endsection