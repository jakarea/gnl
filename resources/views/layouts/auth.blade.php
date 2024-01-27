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
    <link rel="stylesheet" href="{{ url('assets/css/customer.css') }}" />
    <!-- custom CSS end -->
    @yield("style")

    <title>@yield("title")</title>
</head>

<body>
    <!-- dashboard page wrapper start -->
    <main class="root-main-wrapper">
        <!-- sidebar wrapper start -->
        <aside class="sidebar-wrap custom-scroll-bar">
            <!-- logo -->
            <div class="logo-box">
                <a href="dashboard.html">
                    <img src="{{ url('/assets/images/logo.svg') }}" alt="Logo" class="img-fluid">
                </a>
            </div>
            <!-- logo -->

            <!-- navbar -->
            <div class="side-navbar-wrap">
                <ul class="side-nav">
                    <li class="side-item">
                        <a href="{{ url('dashboard') }}"
                            class="{{ Request::is('dashboard') ? 'active' : '' }} side-link">
                            <img src="{{ url('assets/images/icons/sidebar/dashboard.svg') }}" alt="I"
                                class="img-fluid">
                            dashboard
                        </a>
                    </li>

                    <li class="side-item">
                        <a href="{{ url('analytics') }}"
                            class="{{ Request::is('analytics') ? 'active' : '' }} side-link"><img
                                src="{{ url('assets/images/icons/sidebar/analytics.svg') }}" alt="I" class="img-fluid" />
                            Analytics
                        </a>
                    </li>
                    <li class="side-item">
                        <a href="{{ url('customers') }}"
                            class="{{ Request::is('customers') ? 'active' : '' }} side-link"><img
                                src="{{ url('assets/images/icons/sidebar/customer.svg') }}" alt="I" class="img-fluid" />
                            Customers</a>
                    </li>
                    <li class="side-item">
                        <a href="{{ url('to-do-list') }}"
                            class="{{ Request::is('to-do-list') ? 'active' : '' }} side-link">
                            <img src="{{ url('assets/images/icons/sidebar/calendar.svg') }}" alt="I" class="img-fluid" />
                            To Do List
                        </a>
                    </li>
                    <li class="side-item">
                        <a href="{{ url('projects') }}" class="{{ Request::is('projects') ? 'active' : '' }} side-link"><img
                                src="{{ url('assets/images/icons/sidebar/project.svg') }}" alt="I" class="img-fluid" />
                            Projects</a>
                    </li>
                    <li class="side-item side-subitem">
                        <a class="side-link" data-bs-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample">
                            <img src="{{ url('assets/images/icons/sidebar/leads.svg') }}" alt="I" class="img-fluid" />
                            Leads
                            <i class="fas fa-angle-down"></i>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="sub-nav">
                                <li><a href="#" class="sub-link active">Hosting Leads</a></li>
                                <li><a href="#" class="sub-link">Marketing Leads</a></li>
                                <li><a href="#" class="sub-link">Project Leads</a></li>
                                <li><a href="#" class="sub-link">Website Leads</a></li>
                                <li><a href="#" class="sub-link">Lost Leads</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-item side-subitem">
                        <a class="side-link" data-bs-toggle="collapse" href="#collapseExample2" role="button"
                            aria-expanded="false" aria-controls="collapseExample2">
                            <img src="{{ url('assets/images/icons/sidebar/earnings.svg') }}" alt="I" class="img-fluid" />
                            Earning
                            <i class="fas fa-angle-down"></i>
                        </a>
                        <div class="collapse" id="collapseExample2">
                            <ul class="sub-nav">
                                <li><a href="#" class="sub-link active">Total</a></li>
                                <li><a href="#" class="sub-link">Hosting</a></li>
                                <li><a href="#" class="sub-link">Marketing</a></li>
                                <li><a href="#" class="sub-link">Website</a></li>
                                <li><a href="#" class="sub-link">Project</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-item">
                        <a href="{{ url('expenses') }}" class="side-link">
                            <img src="{{ url('assets/images/icons/sidebar/expense.svg') }}" alt="I" class="img-fluid" />
                            Expenses</a>
                    </li>
                    <li class="side-item">
                        <a href="{{ url('/logout') }}" class="side-link">
                            <i class="fas fa-sign-out me-3"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
            <!-- navbar -->
        </aside>
        <!-- sidebar wrapper end -->

        <!-- header part start -->
        <header class="header-area">
            <!-- search box start -->
            <div class="header-search-box">
                <img src="{{ url('assets/images/icons/search.svg') }}" alt="S" class="img-fluid search" />
                <input type="text" class="form-control" placeholder="Search" />
            </div>
            <!-- search box end -->

            <!-- header icons start -->
            <div class="header-icons-box">
                <ul class="main">
                    <li class="head-item">
                        <a href="#" class="head-link">
                            <span></span>
                            <img src="{{ url('assets/images/icons/bell.svg') }}" alt="B" class="img-fluid" />
                        </a>
                    </li>
                    <li class="head-item">
                        <div class="dropdown p-0 header-dropdown">
                            <a class="p-0 user head-link" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="{{ url('/uploads/users/avatar-2.png') }}" alt="A" class="img-fluid" />

                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="#"> Profile </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"> Profile Setting </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="head-item">
                        <a href="#" class="d-lg-none head-link" id="menuToggle">
                            <i class="fas fa-bars"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- header icons end -->
        </header>
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
</body>

</html>
