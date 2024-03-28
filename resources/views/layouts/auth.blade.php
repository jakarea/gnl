<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="D&D is a Ecommerce Platform" />
    <meta property="og:title" content="D&D" />
    <meta property="og:type" content="E-Commerce" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta name="theme-color" content="#fff" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS start -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}" />
    <!-- Bootstrap CSS end -->

    <!-- plugin CSS start -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- plugin CSS end -->

    <!-- custom CSS start -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/responsive.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- custom CSS end -->
    @yield("style")

    <title>GNL || @yield("title")</title>
</head>

<body>
    <!-- dashboard page wrapper start -->
    <main class="root-main-wrapper">
        <!-- sidebar wrapper start -->
        <aside class="sidebar-wrap custom-scroll-bar">
            <!-- logo -->
            <div class="logo-box">
                <a href="{{ url('/') }}">
                    <img src="{{ url('/assets/images/logo.svg') }}" alt="Logo" class="img-fluid">
                </a>
            </div>
            <!-- logo -->

            <!-- navbar -->
            @include("partials/sidenav")
            <!-- navbar -->
        </aside>
        <!-- sidebar wrapper end -->

        <!-- header part start -->
        @include("partials/header")
        <!-- header part end -->

        <!-- main page wrapper start -->
        @yield('content')
        <!-- main page wrapper end -->
    </main>
    <!-- dashboard page wrapper end -->

    <!-- Bootstrap Bundle with Popper JS start -->
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/js/custom.js') }}"></script>
    <!-- Bootstrap Bundle with Popper JS end -->
    @yield('script')
</body>

</html>
