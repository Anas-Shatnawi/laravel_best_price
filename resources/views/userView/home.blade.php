@push('page-head')
<title>Welcome</title>
@endpush
@extends('layouts.app')
@section('content')
<div class="wrapper">
    <div id="content">
        @if($errors->any())
        <div class="modal" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLable">Problem</h5>
                    </div>
                    <div class="modal-body">
                        <h4>{{$errors->first()}}</h4>
                    </div>
                    <div class="modal-footer">
                        <button id="close-modal-btn" type="button" class="btn btn-secondary">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <section id="homepage">
            <!-- section.active nav.cool-navbar ul li a -->
            <section id="newProducts" data-target="#newProducts" class="active">
                <nav class="cool-navbar newProducts">
                    <ul>
                        <li><a href="#newProducts" class="active"><span class="min-span">New Products</span>
                                <div class="indicator"></div>
                            </a></li>
                        <li><a href="#bestSeller"><span class="min-span">Best Seller</span>
                                <div class="indicator"></div>
                            </a></li>
                        <li><a href="#topRated"><span class="min-span">Top Rated</span>
                                <div class="indicator"></div>
                            </a></li>
                    </ul>
                </nav>
                <div class="container-section">
                    <div class="header-section">
                        <h1 class="head">
                            <img src="{{ asset('image/Home-Image/new.png') }}" alt="New"> New Products
                        </h1>
                    </div>
                    <div class="row px-1 cards-container">
                        @foreach ($newProducts as $newProduct )
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="card ">
                                <img src="{{ $newProduct->image }}" class="" alt="tuxedo">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $newProduct->name }}</h5>
                                    <p class="card-text">
                                        @for ($i = 0; $i < $newProduct->rating ; $i++)
                                            <span id="fill-star" class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i=5; $i>$newProduct->rating ; $i--)
                                            <span class="fa fa-star"></span>
                                            @endfor
                                    </p>
                                </div>
                                <div class="price">
                                    <p>{{ $newProduct->price }}$</p>
                                </div>
                                <div class="card-footer">
                                    <a id="visit-btn" href="{!! route('switch',['id'=>$newProduct->id]) !!}"
                                        class="btn my-2">Visit</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="/new-products" class="view-more">View More <i class="fa fa-arrow-right arrow pl-3"
                            aria-hidden="true"></i></a>
                </div>
            </section>

            {{--
            <!-- --------------------{{{{{{{{   END NEW PRODUCT    }}}}}}}} ---------------------------------------------------------- -->
            --}}

            <section id="bestSeller" data-target="#bestSeller">
                <div class="container-section">
                    <div class="header-section">
                        <h1 class="head"><img src="{{ asset('image/Home-Image/bestSeller.png') }}" alt=""> Best Seller
                        </h1>
                    </div>
                    <div class="row px-1 cards-container">
                        @foreach ($bestSeller as $bestSeller )

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="card ">
                                <img src="{{ $bestSeller->image }}" class="" alt="tuxedo">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $bestSeller->name }}</h5>
                                    <p class="card-text">
                                        @for ($i = 0; $i < $bestSeller->rating ; $i++)
                                            <span id="fill-star" class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i=5; $i>$bestSeller->rating ; $i--)
                                            <span class="fa fa-star"></span>
                                            @endfor
                                    </p>
                                </div>
                                <div class="price">
                                    <p>{{ $bestSeller->price }}$</p>
                                </div>
                                <div class="card-footer">
                                    <a id="visit-btn" href="{!! route('switch',['id'=>$bestSeller->id]) !!}"
                                        class="btn my-2">Visit</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="/best-seller" class="view-more">View More <i class="fa fa-arrow-right arrow pl-3"
                            aria-hidden="true"></i></a>
                </div>
            </section>
            {{--
            <!-- ------------------------------ {{{{{{{{    END MOST ORDER  }}}}}}}} -------------------------------------------------- -->
            --}}
            {{--
            <!-- ------------------------------ {{{{{{{{    START TOP RATED PRODUCTS  }}}}}}}} -------------------------------------------------- -->
            --}}

            <section id="topRated" data-target="#topRated">
                <div class="container-section">
                    <div class="header-section">
                        <h1 class="head"><img src="{{ asset('image/Home-Image/star.png') }}" alt=""> top Rated </h1>
                    </div>
                    <div class="row px-1 cards-container">
                        @foreach ($topRated as $topRated)
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <img src="{{ $topRated->image }}" class="" alt="tuxedo">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $topRated->name }}</h5>
                                    <p class="card-text">
                                        @for ($i = 0; $i < $topRated->rating ; $i++)
                                            <span id="fill-star" class="fa fa-star checked"></span>
                                            @endfor
                                            @for ($i=5; $i>$topRated->rating ; $i--)
                                            <span class="fa fa-star"></span>
                                            @endfor
                                    </p>
                                </div>
                                <div class="price">
                                    <p>{{ $topRated->price }}$</p>
                                </div>
                                <div class="card-footer">
                                    <a id="visit-btn" href="{!! route('switch',['id'=>$topRated->id]) !!}"
                                        class="btn my-2">Visit</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <a href="top-rated" class="view-more">View More <i class="fa fa-arrow-right arrow pl-3"
                            aria-hidden="true"></i></a>
                </div>
            </section>
        </section>
    </div>
</div>
{{--
<!-- ------------------------------ {{{{{{{{    END TOP RATED PRODUCTS  }}}}}}}} -------------------------------------------------- -->
--}}
{{--
<!-- ------------------------------ {{{{{{{{    CATEGORIES  }}}}}}}} -------------------------------------------------- -->
--}}
<div id="some-categories-container">
    <div id="categories-header">
        <h1>CATEGORIES</h1>
    </div>
    <div id="some-categories">
        @foreach ($categories as $categorey )
        <a id="categorey-card" href="/categories/{{ $categorey->category_id }}">
            <img id="categorey-image" src="{{ $categorey->image }}" alt="">
            <div id="categorey-name">
                <h3>{{ $categorey->category_name }}</h3>
            </div>
        </a>
        @endforeach
    </div>
    <a href="/categories" class="view-more">View More <i class="fa fa-arrow-right arrow pl-3"
            aria-hidden="true"></i></a>
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
<script src="{{ asset('js/coolNavbar.js') }}"></script>
<script src="{{ asset('js/errorModal.js') }}"></script>
@endsection