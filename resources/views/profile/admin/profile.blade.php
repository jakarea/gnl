@extends('layouts.auth')

@section('title', 'Admin Profile')

@section('style')
    <link rel="stylesheet" href="{{ url('assets/css/profile.css') }}" />
@endsection

@section('content')
    <section class="main-page-wrapper">
        <!-- page title -->
        <div class="page-title">
            <h1>Profile</h1>
        </div>
        <!-- page title -->

        <!-- customer details start -->
        <div class="row">
            <div class="col-12 col-md-4 col-xl-3">
                <!-- customer about start -->
                @include('profile.admin.profile-sidebar')
                <!-- customer about end -->
            </div>
            <div class="col-12 col-md-8 col-xl-9">
                <!-- customer info start -->
                <div class="company-edit-from-wrapper">
                    <!-- customer personal info start -->
                    @include('profile.admin.profile-personal-info')
                    <!-- customer personal info end -->
                    <!-- customer address info start -->

                    @include('profile.admin.profile-address-info')
                    <!-- customer address info end -->
                </div>
                <!-- customer info end -->
            </div>
        </div>
    </section>
@endsection

