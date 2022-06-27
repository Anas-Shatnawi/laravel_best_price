@push('page-head')
<title>Wish List</title>
@endpush
@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/wish_list.css') }}">
@section('content')

<div id="wish_list_container">
    <div id="div_wish_list_title">
        <h1 id="wish_list_title">
            My Wish List
        </h1>
    </div>
    <div id="wish_list_content">
        @if ($wish_list != null)
        <div class="row px-1">
            @foreach ($wish_list as $wish_list )
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="card ">
                    <img src="{{ $wish_list->image }}" class="" alt="tuxedo">
                    <div class="card-body">
                        <h5 class="card-title">{{ $wish_list->name }}</h5>
                        <p class="card-text">
                            @for ($i = 0; $i < $wish_list->rating ; $i++)
                                <span id="fill-star" class="fa fa-star checked"></span>
                                @endfor
                                @for ($i=5; $i>$wish_list->rating ; $i--)
                                <span class="fa fa-star"></span>
                                @endfor
                        </p>
                    </div>
                    <div class="price">
                        <p>{{ $wish_list->price }}$</p>
                    </div>
                    <div class="card-footer">
                        <a id="visit-btn" href="{!! route('switch',['id'=>$wish_list->id]) !!}"
                            class="btn my-2">Visit</a>
                        <button id="delete-btn" data-id="{{ $wish_list->wish_id }}"
                            class="deleteRecord btn my-2" >Delete</button>

                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @else
        <div class="row justify-content-md-center">
            <div id="" class="col-sm-12 col-md-12 col-md-offset-12 col-sm-offset-12">
                <h2>No Products in Your Wish List!</h2>
            </div>
        </div>
        @endif
    </div>
</div>
<script src="{{ asset('js/removeFromWishList.js') }}"></script>
@endsection