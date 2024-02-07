@extends('layouts.auth')

@section('title', 'Admin Profile Settings')

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
                    <div class="form-box mt-4">
                        <form method="post" action="{{ route('account.address.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="title">
                                <h3>Address</h3>
                                @if (!request()->is('account/settings/address'))
                                    <a href="{{ route('account.index') }}">
                                        <img src="/assets/images/icons/pen.svg" alt="I" class="img-fluid">
                                    </a>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name">Primary Address <span>*</span></label>
                                <input type="text" class="form-control" placeholder="Pristia Candra Nelson"
                                    name="address" id="name" value="{{ $user->address ?? old('address') }}">
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="text">Country<span>*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter Country"
                                            value="{{ $user->country ?? old('country') }}" name="country" id="text">
                                        @error('country')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="text">City <span>*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter City"
                                            value="{{ $user->city ?? old('city') }}" name="city" id="text">
                                        @error('city')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="text">State<span>*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter State"
                                            value="{{ $user->state ?? old('state') }}" name="state" id="text">
                                        @error('state')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="text">Post Code<span>*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter State"
                                            value="{{ $user->post_code ?? old('post_code') }}" name="post_code"
                                            id="text">
                                        @error('post_code')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-submit">
                                <button type="submit" class="btn btn-submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                    <!-- customer address info end -->
                </div>
                <!-- customer info end -->
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
