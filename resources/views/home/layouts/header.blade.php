<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>@yield('page_title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/homeasset/assets/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/homeasset/assets/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('public/homeasset/assets/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('public/homeasset/assets/images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('public/homeasset/assets/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0//css/font-awesome.min.css">
    <!--  -->
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/homeasset/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesoeet" href="{{ asset('public/homeasset/assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>

<body>
    <!-- banner bg main start -->
    <div class="banner_bg_main">
        <!-- header top section start -->
        <div class="container">
            <div class="header_section_top">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="custom_menu">
                            <ul>
                                <li><a href="#">Best Sellers</a></li>
                                <li><a href="#">Gift Ideas</a></li>
                                <li><a href="{{ route('newreleasepage') }}">New Releases</a></li>
                                <li><a href="{{ route('todaysdealpage') }}">Today's Deals</a></li>
                                <li><a href="{{ route('customservicepage') }}">Customer Service</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top section start -->
        <!-- logo section start -->
        <div class="logo_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="logo"><a href="{{ url('/redirect') }}"><img
                                    src="{{ asset('public/homeasset/assets/images/logo.png') }}"></a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- logo section end -->
        <!-- header section start -->
        <div class="header_section">
            <div class="container">
                <div class="containt_main">
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <a href="index.html">Home</a>
                        @php
                            $categories = App\Models\Category::latest()->get();
                            
                        @endphp
                        @foreach ($categories as $category)
                            <a href="{{ route('categorypage', $category->id) }}">{{ $category->category_name }}</a>
                        @endforeach


                    </div>
                    <span class="toggle_icon" onclick="openNav()"><img
                            src="{{ asset('public/homeasset/assets/images/toggle-icon.png') }}"></span>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach ($categories as $category)
                                <a href="{{ route('categorypage', $category->id) }}"
                                    class="dropdown-item">{{ $category->category_name }}</a>
                            @endforeach

                        </div>
                    </div>
                    <div class="main">
                        <!-- Another variation with a button -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search this blog">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button"
                                    style="background-color: #f26522; border-color:#f26522 ">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="header_box">
                        <div class="lang_box ">
                            <a href="#" title="Language" class="nav-link" data-toggle="dropdown"
                                aria-expanded="true">
                                <img src="{{ asset('public/homeasset/assets/images/flag-uk.png') }}" alt="flag"
                                    class="mr-2 " title="United Kingdom"> English <i class="fa fa-angle-down ml-2"
                                    aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu ">
                                <a href="#" class="dropdown-item">
                                    <img src="{{ asset('public/homeasset/assets/images/flag-france.png') }}"
                                        class="mr-2" alt="flag">
                                    French
                                </a>
                            </div>
                        </div>
                        <div class="login_menu">
                            <ul>
                                <li><a href="{{ route('addtocartpage') }}">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span class="padding_10">Cart</span></a>
                                </li>
                                @if (Auth::user())
                                    <li><a href="{{ route('userprofilepage') }}">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <span class="padding_10">User Profile</span></a>
                                    </li>
                                @else
                                    <li><a href="{{ url('/login') }}">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <span class="padding_10">Login</span></a>
                                    </li>
                                    <li><a href="{{ url('/register') }}">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <span class="padding_10">Register</span></a>
                                    </li>
                                @endif


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header section end -->
