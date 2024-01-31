@extends('layouts.auth')

@section('title', 'Admin Profile Settings')

@section('style')
    <link rel="stylesheet" href="{{ url('assets/css/profile.css') }}" />
@endsection

@section('content')
    <section class="main-page-wrapper marketplace-page-wrapper">
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
            <!--pesonal info start-->
            <div class="col-12 col-md-8 col-xl-9">
                <!-- customer info start -->
                <div class="company-edit-from-wrapper">
                    <!-- customer personal info start -->
                    <form method="POST" action="{{ route('account.settings.update') }}" class="form-box"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="title">
                            <h3>Personal Info</h3>
                            <a href="{{ route('account.index') }}">
                                <img src="/assets/images/icons/pen.svg" alt="I" class="img-fluid">
                            </a>
                        </div>
                        <div class="form-group">
                            <label for="name">Full Name <span>*</span></label>
                            <input type="text" class="form-control" placeholder="Michael Windler" name="full_name"
                                id="name" value="{{ $user->full_name ?? old('full_name') }}" required>
                            @error('full_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tagline">Designation<span>*</span></label>
                            <input type="text" class="form-control" placeholder="Admin" name="designation" id="tagline"
                                value="{{ $user->designation ?? old('designation') }}" required>
                            @error('designation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="date">Date of Birtht<span>*</span></label>
                                    <input type="date" class="form-control" placeholder="" name="birth" id="date"
                                        value="{{ $user->birth ?? old('birth') }}" required>
                                    @error('birth')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="text">Gender <span>*</span></label>
                                    <select name="gender" id="" class="form-control" required>
                                        <option @selected($user->gender == 'male') value="male">Male</option>
                                        <option @selected($user->gender == 'female') value="felmale">Female</option>
                                    </select>
                                    <div class="fields-icons">
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                    @error('gender')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email Address <span>*</span></label>
                                    <input type="email" class="form-control" placeholder="Enter Email" name="email"
                                        id="email" value="{{ $user->email ?? old('email') }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="number">Phone Number<span>*</span></label>
                                    <input type="number" class="form-control" placeholder="Enter Phone Number"
                                        name="phone" id="number" value="{{ $user->phone ?? old('phone') }}" required>
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label for="nationality">Nationality<span>*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Status" name="nationality"
                                        id="nationality" value="{{ $user->nationality ?? old('nationality') }}" required>
                                    @error('nationality')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="marital-text">Marital Status<span>*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Status"
                                        name="marital_status" id="marital-text"
                                        value="{{ $user->marital_status ?? old('marital_status') }}" required>
                                    @error('marital_status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-submit">
                            <button type="submit" class="btn btn-submit">Save Changes</button>
                        </div>
                    </form>
                    <!-- customer personal info end -->
                    <!-- customer address info start -->
                    <div class="form-box mt-4">
                        <div class="title">
                            <h3>Address</h3>
                            <a href="{{ route('account.address') }}">
                                <img src="/assets/images/icons/pen.svg" alt="I" class="img-fluid">
                            </a>
                        </div>
                        <!-- table start -->
                        <div class="personal-info-table-wrap">
                            <table>
                                <tr>
                                    <td>
                                        <p>Primary addresss</p>
                                    </td>
                                    <td>
                                        <h6>{{ $user->address ?? 'N/A' }}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Country</p>
                                    </td>
                                    <td>
                                        <h6>{{ $user->country ?? 'N/A' }}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>State</p>
                                    </td>
                                    <td>
                                        <h6>{{ $user->state ?? 'N/A' }}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>City</p>
                                    </td>
                                    <td>
                                        <h6>{{ $user->city ?? 'N/A' }}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Post Code</p>
                                    </td>
                                    <td>
                                        <h6>{{ $user->post_code ?? 'N/A' }}</h6>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- table end -->
                    </div>
                    <!-- customer address info end -->
                </div>
                <!-- customer info end -->
            </div>
            <!--personal info end-->
        </div>
    </section>
@endsection

@section('script')
@endsection
