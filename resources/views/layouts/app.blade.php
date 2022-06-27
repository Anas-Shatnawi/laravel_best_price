<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- -----------------Bootstrap CSS----------------------------------------- -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Display:wght@500&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@300&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    {{-- add icon in the title --}}
    <link rel="shortcut icon" type="image/x-icon" href={{ asset('image/Home-Image/LOGO.png') }} />
    @stack('page-head')
</head>

<body>
    <div id="app">
        <button title="Toggle sidebar" class="btn btn-sm open-clos-sidebar-btn" id="list-button"><i id="collapse-btn" class="fa fa-bars"></i></button>
        <nav class="navbar navbar-light py-0  navbar-expand-lg fixed-top" id="mainNav">
            <div id="sidebar" class="collapsed">
                <button title="Toggle sidebar" class="btn btn-sm open-clos-sidebar-btn ml-2 mt-2"><i
                        class="fa fa-bars"></i></button>
                <div id="sidebar-content">
                    <div id="user-info">
                        <i class="fas fa-user-circle" id="sidebar-user-icon"></i>
                        @if (Auth::check())
                        <div id="sidebar-user-name">
                            {{ Auth::user()->name }}
                        </div>
                        @else
                        <div id="sidebar-user-name">
                            Guest
                        </div>
                        @endif
                    </div>
                    <hr class="bg-white">
                    <div id="sidebar-menu">
                        <a href="/home" class="sidebar-option"><i class="fa fa-home mr-2"></i>Home Page</h4></a>
                        <a href="/categories" class="sidebar-option"><i class="fas fa-th mr-2"></i>Categories</a>
                        <a href="/cart" class="sidebar-option"><i class='fas fa-shopping-basket mr-2'></i>My Cart</a>
                        <a href="/wish-list" class="sidebar-option"><i class="fas fa-align-left mr-2"></i>My Wish
                            List</a>
                        <a href="/orders" class="sidebar-option"><i class="fas fa-list-alt mr-2"></i>My Orders</a>
                        <a href="/settings" class="sidebar-option"><i class="fas fa-cogs mr-2"></i>Settings</a>
                        <a href="" class="sidebar-option"><i class="fas fa-hands-helping mr-2"></i>Get Help</a>
                        <a href="" class="sidebar-option"><i class="fa fa-info-circle mr-2"></i>About Us</a>
                        <hr class="bg-white">
                        <a class="sidebar-option" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out mr-2"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <div></div>
                    </div>
                </div>
            </div>
            <a href="{{ url('/home') }}" class="navbar-brand">
                <img src="{{ asset('image/Home-Image/LOGO.png') }}" alt="" id="logo">
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navLinks">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navLinks">

                <div class="navbar-nav ml-auto " id="centeredlinks">
                    <a class="nav-item nav-link" href="{{ url('/home') }}" id="home">
                        <i class="fas fa-store"></i>
                        Home
                    </a>
                    <a class="nav-item nav-link" href="{{ url('/categories') }}" id="cat">
                        <i class="fas fa-th"></i>
                        Categories
                    </a>
                    <a href="/orders" class="nav-item nav-link"><i class="fas fa-list-alt mr-2"></i>My Orders</a>
                    <a class="nav-item nav-link" id="order" href="{{ route('cart') }}">
                        <i class="fas fa-shopping-cart"></i> Cart <span class="badge badge-light">{{
                            Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span></a>
                </div>
                <div class="navbar-nav ml-auto">
                    @guest
                    <a class="nav-item nav-link login-button" id="" href="{{ route('login') }}"><i
                            class="fas fa-sign-in-alt pr-2"></i>{{ __('Login') }}</a>
                    @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-chevron-circle-up mr-1"></i>{{
                        __('Register') }}</a>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </div>
            </div>
        </nav>
        <main class="mt-5 mb-8">
            @yield('content')
        </main>
        <footer>
            <div class="footer-content">
                <h3>Best Price</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis, exercitationem! Corrupti deleniti
                    nulla soluta porro quis sed reiciendis non, vero cum repellendus iste accusantium. Consequatur neque
                    recusandae a iusto ipsam.</p>
                <ul class="socials">
                    <li><a href=""><i class="fab fa-facebook"></i></a></li>
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li><a href=""><i class="fab fa-google"></i></i></a></li>
                    <li><a href=""><i class="fab fa-youtube"></i></a></li>
                    <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="footer-bottom">
                <p>copyrights &copy;2022 BestPrice designed By <span>A-Shatnawi</span></p>

            </div>
        </footer>
    </div>
    <script src="{{ asset('js/sidebar.js') }}"></script>

    {{-- --
    <!-- ---------------------- {{{{{{{{{{{    SCROLLED NAVBAR }}}}}}}}}} --------------------- --> --}}
    <script>
        $(function() {
                    $(document).scroll(function() {
                        var $nav = $("#mainNav ");
                        $nav.toggleClass("scrolled ", $(this).scrollTop() > 0);
                    });
                });
    </script>
</body>

</html>