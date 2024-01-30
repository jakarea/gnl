@extends('layouts.auth')

@section('title', 'Hosting Leads')

@section('style')
    <link rel="stylesheet" href="{{ url('assets/css/leads.css') }}" />
@endsection

@section('content')
    <section class="main-page-wrapper leads-page-wrapper">
        <!-- page title -->
        <div class="page-title leads-page-title">
            <h1>Hosting Leads</h1>
            <!-- bttn -->
            <div class="common-bttn">
                <a href={{ url('hosting-leads/all') }} class="add">View All</a>
            </div>
            <!-- bttn -->
        </div>
        <div class="leads-main-wrapper">
            <div class="leads-vertical-scroller custom-scroll-bar">
                <!--New Leads Start-->
                <div class="leads-section">
                    <div class="leads-title">
                        <h3>News Leads</h3>
                        <a href="#" type="button" class="add" data-bs-toggle="modal"
                            data-bs-target="#staticBackdropFour"><img src="{{url('assets/images/icons/plus-circle.svg') }}"
                                class="img-fluid" alt="a"></a>
                    </div>
                    <!--leads collection start-->
                    <div class="leads-collection">
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->

                    </div>
                    <!--leads collection end-->
                </div>
                <!--New Leads End-->

                <!-- in progress Leads Start-->
                <div class="leads-section">
                    <div class="leads-title">
                        <h3>In Progress</h3>
                        <a href="" type="button" class="add" data-bs-toggle="modal"
                            data-bs-target="#staticBackdropFour"><img src="{{url('assets/images/icons/plus-circle.svg') }}"
                                class="img-fluid" alt=""></a>
                    </div>
                    <!--leads collection start-->
                    <div class="leads-collection">
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->

                    </div>
                    <!--leads collection end-->
                </div>
                <!--in progress Leads End-->

                <!-- No Answer Yet Leads Start-->
                <div class="leads-section">
                    <div class="leads-title">
                        <h3>No Answer Yet</h3>
                        <a href="" type="button" class="add" data-bs-toggle="modal"
                            data-bs-target="#staticBackdropFour"><img src="{{url('assets/images/icons/plus-circle.svg') }}"
                                class="img-fluid" alt=""></a>
                    </div>
                    <!--leads collection start-->
                    <div class="leads-collection">
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->

                    </div>
                    <!--leads collection end-->
                </div>
                <!-- No Answer Yet Leads End-->

                <!-- Completed Leads Start-->
                <div class="leads-section">
                    <div class="leads-title">
                        <h3>Completed</h3>
                        <a href="" type="button" class="add" data-bs-toggle="modal"
                            data-bs-target="#staticBackdropFour"><img src="{{url('assets/images/icons/plus-circle.svg') }}"
                                class="img-fluid" alt=""></a>
                    </div>
                    <!--leads collection start-->
                    <div class="leads-collection">
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->

                    </div>
                    <!--leads collection end-->
                </div>
                <!-- Completed Leads End-->
                <!-- Completed Leads Start-->
                <div class="leads-section">
                    <div class="leads-title">
                        <h3>Completed</h3>
                        <a href="" type="button" class="add" data-bs-toggle="modal"
                            data-bs-target="#staticBackdropFour"><img src="{{url('assets/images/icons/plus-circle.svg') }}"
                                class="img-fluid" alt=""></a>
                    </div>
                    <!--leads collection start-->
                    <div class="leads-collection">
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->

                    </div>
                    <!--leads collection end-->
                </div>
                <!-- Completed Leads End-->
                <!-- Completed Leads Start-->
                <div class="leads-section">
                    <div class="leads-title">
                        <h3>Completed</h3>
                        <a href="" type="button" class="add" data-bs-toggle="modal"
                            data-bs-target="#staticBackdropFour"><img src="{{url('assets/images/icons/plus-circle.svg') }}"
                                class="img-fluid" alt=""></a>
                    </div>
                    <!--leads collection start-->
                    <div class="leads-collection">
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->
                        <!--leads item start-->
                        <div class="lead-item-area">
                            <div class="leads-items">
                                <div class="media">
                                    <img src="{{ ('uploads/users/avatar-13.png') }}" class="img-fluid avatar" alt="avatar">
                                    <div class="media-body">
                                        <h5>Harold Gaylord</h5>
                                        <ul>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/calling-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/gmail-one.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/instagram.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                            <li><a href="#"><img src="{{url('/assets/images/icons/linkedln.svg') }}"
                                                        alt="a" class="img-fluid"></a></li>
                                        </ul>
                                    </div>
                                    <a href="#">
                                        <img src="{{url('/assets/images/icons/arrow-move.svg') }}" alt="a"
                                            class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--leads item end-->

                    </div>
                    <!--leads collection end-->
                </div>
                <!-- Completed Leads End-->

            </div>
        </div>
    </section>

@endsection

@section('script')

@endsection
