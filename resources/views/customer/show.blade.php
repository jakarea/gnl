@extends('layouts.auth')

@section('title', 'Customer Details Page')

@section('style')
<link rel="stylesheet" href="{{ url('assets/css/customer.css') }}" />
@endsection

@section('content')

    <!-- main page wrapper start -->

    <section class="main-page-wrapper">
        <h2>Customer Detail</h2>
        <!-- payment from company user start -->
        <div class="payment-from-copany-user">
            <!--customer profile header start-->
            <div class="profile-header">
                <div class="profile-box">
                    <img src="uploads/users/avatar-9.png" alt="" />
                    <div class="profile-text">
                        <h3>Melinda Keebler</h3>
                        <p>Facilitator</p>
                    </div>
                    <a href="#" class="active">Active</a>
                </div>
                <div class="profile-edit-box">
                    <a href=""><img class="img-fluid pen-tools" src="./assets/images/icons/edit-2.svg"
                            alt="pen-images" /></a>
                    <a href=""><img class="img-fluid trash-tools" src="./assets/images/icons/trash.svg"
                            alt="trash-images" /></a>
                </div>
            </div>
            <!--customer profile header end-->
            <!--address info start-->

            <div class="address-info">
                @if ($customer->phone)
                    <div class="adress-info-text">
                        <p>Phone</p>
                        <a href="tel:{{ $customer->phone }}">
                            <img src="/assets/images/icons/call.svg" alt="" />{{ $customer->phone }}
                        </a>
                    </div>
                @endif

                @if ($customer->email)
                    <div class="adress-info-text">
                        <p>Email</p>
                        <a href="mailto:{{ $customer->email }}">
                            <img src="/assets/images/icons/envelope.svg" alt="" />{{ $customer->email }}
                        </a>
                    </div>
                @endif

                @if ($customer->website)
                    <div class="address-info-text">
                        <p>Website</p>
                        <a href="{{ $customer->website }}">
                            <img src="/assets/images/icons/location.svg" alt="" />{{ $customer->website }}
                        </a>
                    </div>
                @endif

                @if ($customer->location)
                    <div class="address-info-text">
                        <p>Location</p>
                        <a href="{{ $customer->location }}">
                            <img src="{{ asset('/assets/path/to/location.svg') }}" alt="location icon" />{{ $customer->location }}
                        </a>
                    </div>
                @endif
            </div>
            <!--address info end-->
            <!--service part start-->
            <div class="service-profile">
                <div class="service-text">
                    <p>Service:</p>
                    <a href="#ssss">Dashboard Design</a>
                    <a href="#">Hosting</a>
                    <a href="#">Marketing</a>
                </div>
                <div class="service-text border-line">
                    <p>Company:</p>
                    <a href="#">The Star Place</a>
                </div>
                <div class="service-text border-line">
                    <p>KVK:</p>
                    <a href="">Z005484</a>
                </div>
            </div>
            <!--service part end-->
            <!--details page start-->
            <div class="details">
                <h3>Details</h3>
                <p>
                    Ut qui vel libero labore quidem aut veniam. Distinctio et
                    doloremque velit iusto amet aut. Qui praesentium consequatur sint
                    atque. Aut iure aut possimus libero nisi molestias in et
                    consequatur. Cumque soluta beatae dolor enim nostrum est. Rem
                    minus dicta et quia. Ut delectus minima commodi. Neque veritatis
                    sunt quaerat quasi quo maiores impedit. Dolor sequi fuga rerum
                    delectus in necessitatibus non quam. Doloribus molestiae qui esse.
                </p>
            </div>
            <!--details page end-->
            <div class="header">
                <h3>Customer History</h3>
                <span class="paid">Total Paid= $1,956</span>
            </div>
            <div class="user-payment-table">
                <table>
                    <tr>
                        <th width="3%">No</th>
                        <th class="d-flex justify-content-between">
                            <span>Service</span>
                            <div class="filter-sort-box">
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false" id="dropdownBttn"></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item filterItem" href="#" data-value="asc">In order
                                                A-Z</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item filterItem" href="#" data-value="desc">In order
                                                Z-A</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </th>
                        <th>Payment Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                    <!-- payment single item start -->
                    <tr>
                        <td>1</td>
                        <td>
                            <div class="media">
                                <div class="media-body">
                                    <h5>Dashboard Design</h5>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p>09 Oct, 2023</p>
                        </td>
                        <td>
                            <p>$1,290</p>
                        </td>
                        <td>
                            <ul>
                                <li>
                                    <span class="btn-pending">Pending</span>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <!-- payment single item end -->
                    <!-- payment single item start -->
                    <tr>
                        <td>2</td>
                        <td>
                            <div class="media">
                                <div class="media-body">
                                    <h5>App Design</h5>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p>09 Oct, 2023</p>
                        </td>
                        <td>
                            <p>$2,640</p>
                        </td>
                        <td>
                            <ul>
                                <li>
                                    <span class="btn-view btn-export">Paid</span>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <!-- payment single item end -->
                    <!-- payment single item start -->
                    <tr>
                        <td>3</td>
                        <td>
                            <div class="media">
                                <div class="media-body">
                                    <h5>Landing Page Design</h5>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p>09 Oct, 2023</p>
                        </td>
                        <td>
                            <p>$1,290</p>
                        </td>
                        <td>
                            <ul>
                                <li>
                                    <span class="btn-view btn-export">Paid</span>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <!-- payment single item end -->
                    <!-- payment single item start -->
                    <tr>
                        <td>4</td>
                        <td>
                            <div class="media">
                                <div class="media-body">
                                    <h5>Logo Design</h5>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p>09 Oct, 2023</p>
                        </td>
                        <td>
                            <p>$2,609</p>
                        </td>
                        <td>
                            <ul>
                                <li>
                                    <span class="btn-view btn-export">Paid</span>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <!-- payment single item end -->
                    <!-- payment single item start -->
                    <tr>
                        <td>5</td>
                        <td>
                            <div class="media">
                                <div class="media-body">
                                    <h5>Dashboard Design</h5>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p>09 Oct, 2023</p>
                        </td>
                        <td>
                            <p>$2,608</p>
                        </td>
                        <td>
                            <ul>
                                <li>
                                    <span class="btn-view btn-export">Paid</span>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <!-- payment single item end -->
                </table>
            </div>
        </div>
        <!-- payment from company user end -->
        <!-- add comapny modal form start -->
        <div class="add-company-modal-from">
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-body">
                    <!-- payment from company user start -->
                    <div class="payment-from-copany-user">
                        <!--customer profile header start-->
                        <div class="profile-header">
                            <div class="profile-box">
                                <img src="uploads/users/avatar-9.png" alt="" />
                                <div class="profile-text">
                                    <h3>Melinda Keebler</h3>
                                    <p>Facilitator</p>
                                </div>
                                <a href="#" class="active">Active</a>
                            </div>
                            <div class="profile-edit-box">
                                <a href=""><img class="img-fluid pen-tools" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
                                        src="./assets/images/icons/edit-2.png" alt="pen-images" /></a>
                                <img class="img-fluid trash-tools" src="./assets/images/icons/trash.png"
                                    alt="trash-images" />
                            </div>
                        </div>
                        <!--customer profile header end-->
                        <!--address info start-->
                        <div class="address-info">
                            <div class="adress-info-text">
                                <p>Phone</p>
                                <a href="#"><img src="./assets/images/icons/call.svg"
                                        alt="" />817-291-2029</a>
                            </div>
                            <div class="adress-info-text">
                                <p>Email</p>
                                <a href="#"><img src="./assets/images/icons/envelope.svg"
                                        alt="" />Dolly30@yahoo.com</a>
                            </div>
                            <div class="adress-info-text">
                                <p>Website</p>
                                <a href="#"><img src="./assets/images/icons/call.svg"
                                        alt="" />www.thestarplace.net</a>
                            </div>
                            <div class="adress-info-text">
                                <p>Location</p>
                                <a href="#"><img src="./assets/images/icons/location.svg" alt="" />47946
                                    Mitchel Circles</a>
                            </div>
                        </div>
                        <!--address info end-->
                        <!--service part start-->
                        <div class="service-profile">
                            <div class="service-text">
                                <p>Service:</p>
                                <a href="#">Dashboard Design</a>
                                <a href="#">Hosting</a>
                                <a href="#">Marketing</a>
                            </div>
                            <div class="service-text border-line">
                                <p>Company:</p>
                                <a href="#">The Star Place</a>
                            </div>
                            <div class="service-text border-line">
                                <p>KVK:</p>
                                <a href="">Z005484</a>
                            </div>
                        </div>
                        <!--service part end-->
                        <!--details page start-->
                        <div class="details">
                            <h3>Details</h3>
                            <p>
                                Ut qui vel libero labore quidem aut veniam. Distinctio et
                                doloremque velit iusto amet aut. Qui praesentium consequatur
                                sint atque. Aut iure aut possimus libero nisi molestias in
                                et consequatur. Cumque soluta beatae dolor enim nostrum est.
                                Rem minus dicta et quia. Ut delectus minima commodi. Neque
                                veritatis sunt quaerat quasi quo maiores impedit. Dolor
                                sequi fuga rerum delectus in necessitatibus non quam.
                                Doloribus molestiae qui esse.
                            </p>
                        </div>
                        <!--details page end-->
                        <div class="header">
                            <h3>Customer History</h3>

                        </div>
                        <div class="user-payment-table">
                            <table>
                                <tr>
                                    <th width="3%">No</th>
                                    <th class="d-flex justify-content-between">
                                        <span>Service</span>
                                        <div class="filter-sort-box">
                                            <div class="dropdown">
                                                <button class="btn p-0" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false" id="dropdownBttn"></button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item filterItem" href="#"
                                                            data-value="asc">In order A-Z</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item filterItem" href="#"
                                                            data-value="desc">In order Z-A</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </th>
                                    <th>Payment Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                                <!-- payment single item start -->
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="media">
                                            <div class="media-body">
                                                <h5>Dashboard Design</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>09 Oct, 2023</p>
                                    </td>
                                    <td>
                                        <p>$1,290</p>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a href="#" class="btn-pending">Pending</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- payment single item end -->
                                <!-- payment single item start -->
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="media">
                                            <div class="media-body">
                                                <h5>App Design</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>09 Oct, 2023</p>
                                    </td>
                                    <td>
                                        <p>$2,640</p>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a href="#" class="btn-view btn-export">Paid</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- payment single item end -->
                                <!-- payment single item start -->
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <div class="media">
                                            <div class="media-body">
                                                <h5>Landing Page Design</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>09 Oct, 2023</p>
                                    </td>
                                    <td>
                                        <p>$1,290</p>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a href="#" class="btn-view btn-export">Paid</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- payment single item end -->
                                <!-- payment single item start -->
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <div class="media">
                                            <div class="media-body">
                                                <h5>Logo Design</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>09 Oct, 2023</p>
                                    </td>
                                    <td>
                                        <p>$2,609</p>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a href="#" class="btn-view btn-export">Paid</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- payment single item end -->
                                <!-- payment single item start -->
                                <tr>
                                    <td>5</td>
                                    <td>
                                        <div class="media">
                                            <div class="media-body">
                                                <h5>Dashboard Design</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>09 Oct, 2023</p>
                                    </td>
                                    <td>
                                        <p>$2,608</p>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a href="#" class="btn-view btn-export">Paid</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- payment single item end -->
                            </table>
                        </div>
                    </div>
                    <!-- payment from company user end -->
                </div>
            </div>
        </div>
        <!-- add comapny modal form end -->
    </section>
@endsection
