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
            <div class="company-about-box">
                <div class="avatar-wrap">
                    <img src="./uploads/users/avatar-11.png" alt="U" class="img-fluid">
                </div>
                <div class="txt">
                    <h1>Yvette Schmitt</h1>
                    <p>Engineer</p>

                    <hr>

                    <ul>
                        <li>
                            <p><img src="./assets/images/icons/envelope.svg" alt="I" class="img-fluid">
                                macejkovic@yahoo.com</p>
                        </li>
                        <li>
                            <p><img src="./assets/images/icons/call.svg" alt="I" class="img-fluid"> 294-528-6776</p>
                        </li>
                        <li>
                            <p><img src="./assets/images/icons/global.svg" alt="I" class="img-fluid">Bedfordsh</p>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- customer about end -->
        </div>
        <div class="col-12 col-md-8 col-xl-9">
            <!-- customer info start -->
            <div class="company-edit-from-wrapper">
                <!-- customer personal info start -->
                <div class="form-box">
                    <div class="title">
                        <h3>Personal Info</h3>
                        <a href="profile-edit">
                            <img src="./assets/images/icons/pen.svg" alt="I" class="img-fluid">
                        </a>
                    </div>

                    <!-- table start -->
                    <div class="personal-info-table-wrap">
                        <table>
                            <tr>
                                <td>
                                    <p>Full Name</p>
                                </td>
                                <td>
                                    <h6>Yvette Schmitt</h6>
                                </td>
                                <td>
                                    <p>Gender</p>
                                </td>
                                <td>
                                    <h6>Female</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Designation</p>
                                </td>
                                <td>
                                    <h6>Engineer</h6>
                                </td>
                                <td>
                                    <p>Marital Status</p>
                                </td>
                                <td>
                                    <h6>Unmarried</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Date of Birth</p>
                                </td>
                                <td>
                                    <h6>21 Oct 1995</h6>
                                </td>
                                <td>
                                    <p>Phone Number</p>
                                </td>
                                <td>
                                    <h6>294-528-6776</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Nationality</p>
                                </td>
                                <td>
                                    <h6>Bedfordshire</h6>
                                </td>
                                <td>
                                    <p>Email Address</p>
                                </td>
                                <td>
                                    <h6>macejkovic@yahoo.com</h6>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- table end -->
                </div>
                <!-- customer personal info end -->
                <!-- customer address info start -->
                <div class="form-box mt-4">
                    <div class="title">
                        <h3>Address</h3>
                        <a href="profile-edit-address">
                            <img src="./assets/images/icons/pen.svg" alt="I" class="img-fluid">
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
                                    <h6>4383 Prosacco Mission</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Country</p>
                                </td>
                                <td>
                                    <h6>Bedfordsh</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>State</p>
                                </td>
                                <td>
                                    <h6>Maryland</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>City</p>
                                </td>
                                <td>
                                    <h6>North Marquise</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Post Code</p>
                                </td>
                                <td>
                                    <h6>42068</h6>
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
    </div>
</section>
@endsection

@section('script')
@endsection