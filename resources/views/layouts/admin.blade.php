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

    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@300&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    @stack('page-head')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-light py-0  navbar-expand-lg fixed-top" id="mainNav">
            <div id="sidebar" class="collapsed">
                <button title="Toggle sidebar" class="btn btn-sm open-clos-sidebar-btn ml-2 mt-2"><i
                        class="fa fa-bars "></i></button>
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
                        <ul class="list-unstyled components">
                            <li>
                                <a href="{{ url('manage/products-table') }}" class="sidebar-option"><i
                                        class="fas fa-list mr-2"></i>Products</a>
                            </li>
                            <li>
                                <a href="{{ url('manage/categories-table') }}" class="sidebar-option"><i
                                        class="fas fa-list mr-2"></i>Categories</a>
                            </li>
                            <li>
                                <a href="{{ url('manage/locations-table') }}" class="sidebar-option"><i
                                        class="fas fa-location-circle mr-2"></i>Locations</a>
                            </li>
                            <li>
                                <a href="{{ url('manage/coupons-table') }}" class="sidebar-option"><i
                                        class="fas fa-receipt mr-2"></i>Coupon</a>
                            </li>
                            <li>
                                <a href="{{ url('manage/users-table') }}" class="sidebar-option"><i
                                        class="fa fa-address-book mr-2"></i>Users</a>
                            </li>
                            <li>
                                <a href="{{ url('manage/users-orders') }}" class="sidebar-option"><i
                                        class="fas fa-list-alt mr-2"></i>Users Orders</a>
                            </li>
                        </ul>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <div></div>
                    </div>
                </div>
            </div>
            <button title="Toggle sidebar" class="btn btn-sm open-clos-sidebar-btn"><i class="fa fa-bars"></i></button>
            <a href="{{ url('/manage') }}" class="navbar-brand" id="bprice">
                B<span id="dollar">$</span>PRICE
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navLinks">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-nav ml-auto">
                @guest
                <a class="nav-item nav-link white" id="login-button" href="{{ route('login') }}"><i
                        class="fas fa-sign-in-alt pr-2"></i>{{ __('Login') }}</a>
                @if (Route::has('register'))
                <a class="nav-link white" href="{{ route('register') }}"><i class="fas fa-chevron-circle-up mr-1"></i>{{
                    __('Register') }}</a>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: white" href="#" role="button"
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
    </div>
    <script>
    $(function() {
        $(document).scroll(function() {
            var $nav = $("#mainNav ");
            $nav.toggleClass("scrolled ", $(this).scrollTop() > 0);
        });
    });
    </script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>

</html>