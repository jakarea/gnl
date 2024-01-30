@extends('layouts.auth')

@section('title', 'Total Earning')

@section('style')
<link rel="stylesheet" href="{{ url('assets/css/earning.css') }}" />
<link rel="stylesheet" href="{{ url('assets/css/customer.css') }}" />
@endsection

@section('content')
<section class="main-page-wrapper analytics-page-wrapper">
    <!-- page title start-->
    <div class="page-title page-title-one">
        <h1>Earnings</h1>
        <!-- bttn -->
        <div class="page-bttn">
            <div class="dropdown">
                <a class="bttn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="./assets/images/icons/calendar-2.svg" alt="">This Month<i class="fas fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="profile">
                            Today
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="profile">
                            Yesterday
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="profile">
                            Last 7 days
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item " href="profile-edit">
                            This Month
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item " href="#">
                            This Year
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- bttn -->
    </div>
    <!--page title end-->

    <!-- earning card start -->
    <div class="row mt-3">
        <!-- card item start -->
        <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
            <div class="analytics-card-box">
                <div class="top">
                    <img src="./assets/images/icons/money-recive.svg" alt="I" class="img-fluid money-recive">
                    <p>Total Earning</p>
                </div>
                <h4>$30,000</h4>
                <div class="bottom-text">
                    <h5>+1.48%</h5>
                    <p>Higher than last month</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
            <div class="analytics-card-box">
                <div class="top">
                    <img src="./assets/images/icons/money-recive-down.svg" alt="I" class="img-fluid money-recive">
                    <p>Total Expenses</p>
                </div>
                <h4>$10,000</h4>
                <div class="bottom-text">
                    <h5 class="red">-0.12%</h5>
                    <p>Less than last month</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
            <div class="analytics-card-box">
                <div class="top">
                    <img src="./assets/images/icons/money-recive.svg" alt="I" class="img-fluid money-recive">
                    <p>Total VAT</p>
                </div>
                <h4>$5000</h4>
                <div class="bottom-text">
                    <h5>+1.48%</h5>
                    <p>Higher than last month</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
            <div class="analytics-card-box">
                <div class="top">
                    <img src="./assets/images/icons/money-recive.svg" alt="I" class="img-fluid money-recive">
                    <p>Total Profit</p>
                </div>
                <h4>$15,000</h4>
                <div class="bottom-text">
                    <h5>+1.48%</h5>
                    <p>Higher than last month</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
            <div class="analytics-card-box">
                <div class="top">
                    <img src="./assets/images/icons/money-recive.svg" alt="I" class="img-fluid money-recive">
                    <p>Total Earning</p>
                </div>
                <h4>$12,000</h4>
                <div class="bottom-text">
                    <h5>+1.48%</h5>
                    <p>Higher than last month</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
            <div class="analytics-card-box">
                <div class="top">
                    <img src="./assets/images/icons/money-recive-down.svg" alt="I" class="img-fluid money-recive">
                    <p>Earning Today</p>
                </div>
                <h4>$6,000</h4>
                <div class="bottom-text">
                    <h5 class="red">-0.12%</h5>
                    <p>Less than last month</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
            <div class="analytics-card-box">
                <div class="top">
                    <img src="./assets/images/icons/money-recive.svg" alt="I" class="img-fluid money-recive">
                    <p>Website Earning</p>
                </div>
                <h4>$8,000</h4>
                <div class="bottom-text">
                    <h5>+1.48%</h5>
                    <p>Higher than last month</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
            <div class="analytics-card-box">
                <div class="top">
                    <img src="./assets/images/icons/money-recive.svg" alt="I" class="img-fluid money-recive">
                    <p>Project Earning</p>
                </div>
                <h4>$4,000</h4>
                <div class="bottom-text">
                    <h5>+1.48%</h5>
                    <p>Higher than last month</p>
                </div>
            </div>
        </div>
        <!-- card item end -->
    </div>
    <!-- earning card end -->

    <!-- total user and products graph start -->
    <div class="row mb-15">
        <div class="col-lg-12">
            <div class="chart-box-wrap">
                <div class="graph-head mb-15">
                    <div class="total-earning">
                        <h5>Total Earning</h5>
                        <div class="bottom-text">
                            <h5>+6.10%</h5>
                            <p>Higher than last month</p>
                        </div>
                    </div>
                    <div class="earning">
                        <a href="#"><i class="fas fa-circle"></i> Earning</a>
                        <h5>$10,000.00</h5>
                    </div>
                </div>
                <div id="totalEarning"></div>
            </div>
        </div>
    </div>
    <!-- total user and products graph end -->
    <!--cient leads start-->
    <div class="page-title page-title-two">
        <h1>Clients</h1>
        <!-- filter -->
        <div class="page-filter d-flex">
            <div class="dropdown">
                <button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropAdd"><i
                        class="fa-solid fa-plus"></i>
                    Add Client
                </button>
            </div>
        </div>
    </div>
    <div class="payment-from-copany-user">
        <div class="user-payment-table">
            <table>
                <tr>
                    <th width="3%">No</th>
                    <th class="d-flex justify-content-between">
                        <span>Name</span>
                    </th>
                    <th>Active Status</th>
                    <th>Payment Date</th>
                    <th>Service</th>
                    <th>Amount</th>
                    <th>Payment Status</th>
                </tr>
                <!-- payment single item start -->
                <tr>
                    <td>
                        1
                    </td>
                    <td>
                        <div class="media">
                            <img src="./uploads/users/avatar-1.png" alt="A" class="img-fluid">
                            <div class="media-body">
                                <h5>Lela Mraz</h5>
                                <span>zlincoln@unpixel.com</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="active-status">Active</p>
                    </td>
                    <td>
                        <p>09 Oct, 2023</p>
                    </td>
                    <td>
                        <p>Dashboard Design</p>
                    </td>
                    <td>
                        <p>$1,290</p>
                    </td>
                    <td>
                        <ul>
                            <li>
                                <a href="#" class="btn-view">Paid</a>
                            </li>
                            <li>
                                <a href="#" class="lead-dots" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop"><img
                                        src="./assets/images/icons/dots-horizontal.svg" class="img-fluid" alt="a"></a>
                            </li>
                        </ul>
                    </td>
                </tr>
                <!-- payment single item end -->
                <!-- payment single item start -->
                <tr>
                    <td>
                        2
                    </td>
                    <td>
                        <div class="media">
                            <img src="./uploads/users/avatar-2.png" alt="A" class="img-fluid">
                            <div class="media-body">
                                <h5>Cecil Sporer</h5>
                                <span>lincoln@unpixel.com</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p>Inactive</p>
                    </td>
                    <td>
                        <p>09 Oct, 2023</p>
                    </td>
                    <td>
                        <p>App Design</p>
                    </td>
                    <td>
                        <p>$2,640</p>
                    </td>
                    <td>
                        <ul>
                            <li>
                                <a href="#" class="btn-view">Unpaid</a>
                            </li>
                            <li>
                                <a href="#" class="lead-dots" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop"><img
                                        src="./assets/images/icons/dots-horizontal.svg" class="img-fluid" alt=""></a>
                            </li>
                        </ul>
                    </td>
                </tr>
                <!-- payment single item end -->
                <!-- payment single item start -->
                <tr>
                    <td>
                        3
                    </td>
                    <td>
                        <div class="media">
                            <img src="./uploads/users/avatar-3.png" alt="A" class="img-fluid">
                            <div class="media-body">
                                <h5>Leah Skiles</h5>
                                <span>lincoln@unpixel.com</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p>Active</p>
                    </td>
                    <td>
                        <p>09 Oct, 2023</p>
                    </td>
                    <td>
                        <p>www.evalyn.net</p>
                    </td>
                    <td>
                        <p>96406470</p>
                    </td>
                    <td>
                        <ul>
                            <li>
                                <a href="#" class="btn-view btn-completed">Completed</a>
                            </li>
                            <li>
                                <a href="#" class="lead-dots" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop"><img
                                        src="./assets/images/icons/dots-horizontal.svg" class="img-fluid" alt=""></a>
                            </li>
                        </ul>
                    </td>
                </tr>
                <!-- payment single item end -->
                <!-- payment single item start -->
                <tr>
                    <td>
                        4
                    </td>
                    <td>
                        <div class="media">
                            <img src="./uploads/users/avatar-4.png" alt="A" class="img-fluid">
                            <div class="media-body">
                                <h5>Bradley Heathcote</h5>
                                <span>lincoln@unpixel.com</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p>774-699-3689</p>
                    </td>
                    <td>
                        <p>Hackett - Considine</p>
                    </td>
                    <td>
                        <p>www.willie.org</p>
                    </td>
                    <td>
                        <p>83622377</p>
                    </td>
                    <td>
                        <ul>
                            <li>
                                <a href="#" class="btn-view btn-progress">In Progress</a>
                            </li>
                            <li>
                                <a href="#" class="lead-dots" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop"><img
                                        src="./assets/images/icons/dots-horizontal.svg" class="img-fluid" alt=""></a>
                            </li>
                        </ul>
                    </td>
                </tr>
                <!-- payment single item end -->
                <!-- payment single item start -->
                <tr>
                    <td>
                        5
                    </td>
                    <td>
                        <div class="media">
                            <img src="./uploads/users/avatar-5.png" alt="A" class="img-fluid">
                            <div class="media-body">
                                <h5>Claire Turcotte</h5>
                                <span>lincoln@unpixel.com</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p>434-984-0055</p>
                    </td>
                    <td>
                        <p>Walter Group</p>
                    </td>
                    <td>
                        <p>www.edgar.biz</p>
                    </td>
                    <td>
                        <p>50380514</p>
                    </td>
                    <td>
                        <ul>
                            <li>
                                <a href="#" class="btn-view btn-completed">Completed</a>
                            </li>
                            <li>
                                <a href="#" class="lead-dots" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop"><img
                                        src="./assets/images/icons/dots-horizontal.svg" class="img-fluid" alt=""></a>
                            </li>
                        </ul>
                    </td>
                </tr>
                <!-- payment single item end -->
                <!-- payment single item start -->
                <tr>
                    <td>
                        6
                    </td>
                    <td>
                        <div class="media">
                            <img src="./uploads/users/avatar-6.png" alt="A" class="img-fluid">
                            <div class="media-body">
                                <h5>Rita Kovacek</h5>
                                <span>lincoln@unpixel.com</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p>614-594-2629</p>
                    </td>
                    <td>
                        <p>Klocko - McGlynn</p>
                    </td>
                    <td>
                        <p>www.jamaal.net</p>
                    </td>
                    <td>
                        <p>55393669</p>
                    </td>
                    <td>
                        <ul>
                            <li>
                                <a href="#" class="btn-view no-ans-btn">No ans yet</a>
                            </li>
                            <li>
                                <a href="#" class="lead-dots" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop"><img
                                        src="./assets/images/icons/dots-horizontal.svg" class="img-fluid" alt=""></a>
                            </li>
                        </ul>
                    </td>
                </tr>
                <!-- payment single item end -->
                <!-- payment single item start -->
                <tr>
                    <td>
                        7
                    </td>
                    <td>
                        <div class="media">
                            <img src="./uploads/users/avatar-7.png" alt="A" class="img-fluid">
                            <div class="media-body">
                                <h5>Mr. Roy Cole</h5>
                                <span>lincoln@unpixel.com</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p>611-805-5505</p>
                    </td>
                    <td>
                        <p>Dickens and Wehner</p>
                    </td>
                    <td>
                        <p>www.ben.name</p>
                    </td>
                    <td>
                        <p>38137645</p>
                    </td>
                    <td>
                        <ul>
                            <li>
                                <a href="#" class="btn-view">New</a>
                            </li>
                            <li>
                                <a href="#" class="lead-dots" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop"><img
                                        src="./assets/images/icons/dots-horizontal.svg" class="img-fluid" alt=""></a>
                            </li>
                        </ul>
                    </td>
                </tr>
                <!-- payment single item end -->
                <!-- payment single item start -->
                <tr>
                    <td>
                        8
                    </td>
                    <td>
                        <div class="media">
                            <img src="./uploads/users/avatar-8.png" alt="A" class="img-fluid">
                            <div class="media-body">
                                <h5>Cecilia Fisher</h5>
                                <span>lincoln@unpixel.com</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p>534-492-2869</p>
                    </td>
                    <td>
                        <p>Littel and Rolfson</p>
                    </td>
                    <td>
                        <p>www.rickey.org</p>
                    </td>
                    <td>
                        <p>33225105</p>
                    </td>
                    <td>
                        <ul>
                            <li>
                                <a href="#" class="btn-view no-ans-btn">No ans yet</a>
                            </li>
                            <li>
                                <a href="#" class="lead-dots"><img src="./assets/images/icons/dots-horizontal.svg"
                                        class="img-fluid" alt=""></a>
                            </li>
                        </ul>
                    </td>
                </tr>
                <!-- payment single item end -->
            </table>
        </div>
        <!--pagination started-->
        <div class="pagination-section">
            <nav class="mt-4" aria-label="...">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link page-link-left"><i class="fa-solid fa-angle-left"></i></a>
                    </li>
                    <li class="page-item" aria-current="page"><a class="page-link" href="#">1</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">10</a></li>
                    <li class="page-item">
                        <a class="page-link page-link-right ms-0" href="#"><i class="fa-solid fa-angle-right"></i></a>
                    </li>
                </ul>
            </nav>
            <div class="pagination-text">
                <p>Showing 1 to 8 of 80 entries</p>
            </div>
        </div>
        <!--pagination end-->
    </div>
    <!--client lead end-->
</section>

<!-- client details modal start -->
<div class="custom-modal client-details-modal">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header modal-header-two">
            <h1 class="modal-title" id="staticBackdropLabel">Customer Detail</h1>
            <button type="button" class="btn" data-bs-dismiss="modal">
              <i class="fas fa-close"></i>
            </button>
          </div>
          <div class="modal-body">
            <!-- customer details start -->
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

              </div>
              <!--customer profile header end-->
              <!--address info start-->
              <div class="address-info">
                <div class="adress-info-text">
                  <p>Phone</p>
                  <a href="#"><img src="./assets/images/icons/call.svg" alt="" />817-291-2029</a>
                </div>
                <div class="adress-info-text">
                  <p>Email</p>
                  <a href="#"><img src="./assets/images/icons/envelope.svg" alt="" />Dolly30@yahoo.com</a>
                </div>
                <div class="adress-info-text">
                  <p>Website</p>
                  <a href="#"><img src="./assets/images/icons/call.svg" alt="" />www.thestarplace.net</a>
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
                  <p class="ps-0">Service:</p>
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
                          <button class="btn p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownBttn"></button>
                          <ul class="dropdown-menu">
                            <li>
                              <a class="dropdown-item filterItem" href="#" data-value="asc">In order A-Z</a>
                            </li>
                            <li>
                              <a class="dropdown-item filterItem" href="#" data-value="desc">In order Z-A</a>
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
            <!-- customer details end -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- client details modal end -->

  <!-- add client modal start -->
  <div class="custom-modal custom-modal-hosting">
    <div class="modal fade" id="staticBackdropAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropAddLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content modal-content-hosting">
          <div class="modal-header modal-header-hosting">
            <h1 class="modal-title" id="staticBackdropAddLabel">Add Client</h1>
            <button type="button" class="btn" data-bs-dismiss="modal">
              <i class="fas fa-close"></i>
            </button>
          </div>
          <div class="modal-body modal-body-hosting">
            <form action="" class="common-form">
              <div class="add-customer-form add-customer-form-hosting">
                <div class="row">
                  <div class="col-xl-12 mt-4">
                    <label for="name" class="select-client-hosting">Select Client</label>
                    <div class="form-group form-group-two form-group-three form-error">
                      <div class="search-client">
                        <img src="assets/images/icons/search.svg" alt="">
                        <input type="text" placeholder="Search Client" id="name" name="name" class="form-control">
                      </div>
                      <!--collapse btn start-->
                      <a data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><img src="assets/images/icons/user-add-two.svg" alt="" class="img-fluid">Add Manually</a>
                      <!--collapse btn end-->
                    </div>

                    <!-- selected customer start  -->
                    <div class="row">
                      <!-- person -->
                      <div class="col-lg-6">
                        <div class="selected-profile-box">
                          <div class="media">
                            <img src="uploads/users/avatar-19.png" class="img-fluid avatar" alt="avatar">
                            <div class="media-body">
                              <h3>Glenda Miller</h3>
                              <p>Manager</p>
                            </div>
                            <a href="#">
                              <img src="./assets/images/icons/close-2.svg" alt="a" class="img-fluid">
                            </a>
                          </div>
                        </div>
                      </div>
                      <!-- person --> 
                    </div>
                    <!-- selected customer end  -->

                    <!--data collpase start-->
                    <div class="row">
                      <div class="col">
                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                          <div class="card-body">
                            <form action="" class="common-form">
                              <div class="add-customer-form border-bottom pb-4">
                                <div class="row">
                                  <div class="col-12">
                                    <div class="form-group">
                                      <label for="">Profile Image</label>
                                      <input type="file" name="avatar" id="avatar" class="d-none">
                                      <!-- upload avatar -->
                                      <div class="d-flex">
                                        <label for="avatar" class="avatar">
                                          <img src="./uploads/users/avatar-13.png" alt="avatar" class="img-fluid">
                                          <span class="avatar-ol">
                                            <img src="./assets/images/icons/camera.svg" alt="camera" class="img-fluid">
                                          </span>
                                        </label>
                                        <p><img src="./assets/images/icons/anchor.svg" alt="anchor" class="img-fluid"> Upload</p>
                                      </div>
                                      <!-- upload avatar -->
                                    </div>
                                  </div>
                                  <div class="col-xl-6">
                                    <div class="form-group form-error">
                                      <label for="name">Name</label>
                                      <input type="text" placeholder="Enter Name" id="name" name="name" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-xl-6">
                                    <div class="form-group form-error">
                                      <label for="designation">Designation</label>
                                      <input type="text" placeholder="Enter Designation" id="designation" name="designation" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-xl-6">
                                    <div class="form-group form-error">
                                      <label for="email">E-mail</label>
                                      <input type="email" placeholder="Enter email address" id="email" name="email" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-xl-6">
                                    <div class="form-group form-error">
                                      <label for="phone">Phone</label>
                                      <input type="number" placeholder="Enter phone number" id="phone" name="phone" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-xl-6">
                                    <div class="form-group form-error">
                                      <label for="location">Location</label>
                                      <input type="text" placeholder="Enter location" id="location" name="location" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-xl-6">
                                    <div class="form-group form-error form-group-four">
                                      <label for="website">Active Status</label>
                                      <div class="common-dropdown common-dropdown-two common-dropdown-three">
                                        <div class="dropdown dropdown-two dropdown-three">
                                          <button class="btn w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Active<i class="fas fa-angle-down"></i>
                                          </button>
                                          <ul class="dropdown-menu dropdown-menu-two dropdown-menu-three w-100">
                                            <li><a class="dropdown-item dropdown-item-two dropdown-item-three" href="#">Active<i class="fas fa-check"></i></a></li>
                                            <li><a class="dropdown-item dropdown-item-two dropdown-item-three" href="#">Inactive</a></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xl-6">
                                    <div class="form-group form-error">
                                      <label for="kvk">KVK</label>
                                      <input type="text" placeholder="Enter kvk number" id="kvk" name="kvk" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-xl-6">
                                    <div class="form-group form-error">
                                      <label for="company">Company</label>
                                      <input type="text" placeholder="Enter cpmany name" id="company" name="company" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-xl-6">
                                    <div class="form-group form-error">
                                      <label for="website">Website</label>
                                      <input type="text" placeholder="Enter website name" id="website" name="website" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-xl-6">
                                    <div class="form-group form-error">
                                      <label for="details">Details</label>
                                      <input type="text" name="details" id="details" class="form-control" placeholder="Enter details">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--data collaspe end-->
                  </div>
                  <div class="col-xl-6">
                    <div class="form-group form-error">
                      <label for="amount">Amount</label>
                      <input type="text" placeholder="$0000" id="amount" name="amount" class="form-control">
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="form-group form-error">
                      <label for="text">Tax</label>
                      <input type="text" placeholder="$0000" id="tax" name="tax" class="form-control">
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="form-group form-error">
                      <label for="text">Payment Status</label>
                      <input type="text" placeholder="Paid" id="paid" name="paid" class="form-control">
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="form-group form-error">
                      <label for="text">Service</label>
                      <input type="text" placeholder="Service name" id="service" name="service" class="form-control">
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="form-group form-error">
                      <label for="date">Payment Date</label>
                      <input type="date" placeholder="DD-MM-YYYY" id="date" name="date" class="form-control">
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="form-group form-error form-group-four">
                      <label for="website">Payment Type</label>
                      <div class="common-dropdown common-dropdown-two common-dropdown-three">
                        <div class="dropdown dropdown-two dropdown-three">
                          <button class="btn w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            1 time payment<i class="fas fa-angle-down"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-two dropdown-menu-three w-100">
                            <li><a class="dropdown-item dropdown-item-two dropdown-item-three" href="#">1 time payment<i class="fas fa-check"></i></a></li>
                            <li><a class="dropdown-item dropdown-item-two dropdown-item-three" href="#">Repeated payment</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="form-bttn">
                      <button type="button" class="btn btn-cancel">Cancel</button>
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="form-bttn">
                      <button type="submit" class="btn btn-submit">Submit</button>
                    </div>
                  </div>

                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- add client modal end -->

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  <!-- total user graph js start -->
  <script>
    var options = {
      series: [{
        name: 'Net Profit',
        data: [44, 55, 23, 56, 61, 28, 63, 35, 66, 30, 45, 33]
      }],
      chart: {
        type: 'bar',
        height: 350,
        toolbar: {
          show: false
        },
      },
      colors: ['#194BFB'],
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '20%'
        },
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      },
      fill: {
        opacity: 1
      },
      grid: {
        show: true,
        borderColor: '#C2C6CE',
        // strokeDashArray: 4,
        xaxis: {
          lines: {
            show: false
          }
        },
      },
      tooltip: {
        y: {
          formatter: function(val) {
            return "$ " + val + " thousands"
          }
        }
      }
    };

    var chart = new ApexCharts(document.querySelector("#totalEarning"), options);
    chart.render();
  </script>
  <!-- total user graph js end -->
@endsection