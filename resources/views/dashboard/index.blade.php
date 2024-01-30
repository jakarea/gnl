@extends('layouts.auth')

@section('title','Dashboard')

@section('style') 
<link rel="stylesheet" href="{{ url('assets/css/customer.css') }}" />
@endsection

@section('content')
<section class="main-page-wrapper">
    <!-- page title -->
    <div class="page-title">
      <h1 class="pb-0">Dashboard</h1>

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
    <!-- page title -->

    <!-- customer status car start -->
    <div class="row">
      <div class="col-12 col-md-6 col-xl-4">
        <div class="customer-status-box">
          <h5>
            <img src="./assets/images/icons/money-recive.svg" alt="icon" class="img-fluid" />
            Total Income
          </h5>
          <h3>$29,435.00</h3>
          <div class="d-flex">
            <span>+4.3%</span>
            <p>Higher than last month</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-4">
        <div class="customer-status-box">
          <h5>
            <img src="./assets/images/icons/money-recive.svg" alt="icon" class="img-fluid" />
            Total Expenses
          </h5>
          <h3>$29,435.00</h3>
          <div class="d-flex">
            <span class="lower">-0.12%</span>
            <p>Less than last month</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-4">
        <div class="customer-status-box">
          <h5>
            <img src="./assets/images/icons/money-recive.svg" alt="icon" class="img-fluid" />
            Total Profit
          </h5>
          <h3>3646</h3>
          <div class="d-flex">
            <span>+4.3%</span>
            <p>Higher than last month</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-4 mt-4">
        <div class="customer-status-box">
          <h5>
            <img src="./assets/images/icons/user-add.svg" alt="icon" class="img-fluid" />
            Total Customer
          </h5>
          <h3>4,136</h3>
          <div class="d-flex">
            <span>+4.3%</span>
            <p>Higher than last month</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-4 mt-4">
        <div class="customer-status-box">
          <h5>
            <img src="./assets/images/icons/user-add.svg" alt="icon" class="img-fluid" />
            New Customer
          </h5>
          <h3>490</h3>
          <div class="d-flex">
            <span>+4.3%</span>
            <p>Higher than last month</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-4 mt-4">
        <div class="customer-status-box">
          <h5>
            <img src="./assets/images/icons/user-add.svg" alt="icon" class="img-fluid" />
            Repeat Customer
          </h5>
          <h3>3,646</h3>
          <div class="d-flex">
            <span>+4.3%</span>
            <p>Higher than last month</p>
          </div>
        </div>
      </div>
    </div>
    <!-- customer status car end -->

    <!-- project task section start -->
    <div class="row mt-4">
      <div class="col-lg-6">
        <div class="project-ending-box payment-from-copany-user">
          <h4>Project Ending Soon</h4>
          <div class="project-overflow custom-scroll-bar">
            <div class="user-payment-table">
              <table>
                <tr>
                  <th>Client Name </th>
                  <th>Project Name</th>
                  <th>Time Remaining</th>
                  <th>Amount</th>
                </tr>
                <!-- project single item start -->
                <tr>
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
                    <p>Dashboard Design</p>
                  </td>
                  <td>
                    <p class="danger">1 Day Remaining</p>
                  </td>
                  <td class="text-center">
                    <p>$1,290</p>
                  </td>
                </tr>
                <!-- project single item end -->
                <!-- project single item start -->
                <tr>
                  <td>
                    <div class="media">
                      <img src="./uploads/users/avatar-4.png" alt="A" class="img-fluid">
                      <div class="media-body">
                        <h5>Mr. Roy Cole</h5>
                        <span>zlincoln@unpixel.com</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p>Dashboard Design</p>
                  </td>
                  <td>
                    <p class="danger">1 Day Remaining</p>
                  </td>
                  <td class="text-center">
                    <p>$1,290</p>
                  </td>
                </tr>
                <!-- project single item end -->
                <!-- project single item start -->
                <tr>
                  <td>
                    <div class="media">
                      <img src="./uploads/users/avatar-3.png" alt="A" class="img-fluid">
                      <div class="media-body">
                        <h5>Skiles Cole</h5>
                        <span>zlincoln@unpixel.com</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p>Dashboard Design</p>
                  </td>
                  <td>
                    <p class="danger">1 Day Remaining</p>
                  </td>
                  <td class="text-center">
                    <p>$1,290</p>
                  </td>
                </tr>
                <!-- project single item end -->
                <!-- project single item start -->
                <tr>
                  <td>
                    <div class="media">
                      <img src="./uploads/users/avatar-6.png" alt="A" class="img-fluid">
                      <div class="media-body">
                        <h5>Leah Skiles</h5>
                        <span>zlincoln@unpixel.com</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p>Dashboard Design</p>
                  </td>
                  <td>
                    <p class="danger">1 Day Remaining</p>
                  </td>
                  <td class="text-center">
                    <p>$1,290</p>
                  </td>
                </tr>
                <!-- project single item end -->
                <!-- project single item start -->
                <tr>
                  <td>
                    <div class="media">
                      <img src="./uploads/users/avatar-2.png" alt="A" class="img-fluid">
                      <div class="media-body">
                        <h5>Cecil Sporer</h5>
                        <span>zlincoln@unpixel.com</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p>Dashboard Design</p>
                  </td>
                  <td>
                    <p class="danger">1 Day Remaining</p>
                  </td>
                  <td class="text-center">
                    <p>$1,290</p>
                  </td>
                </tr>
                <!-- project single item end -->
                <!-- project single item start -->
                <tr>
                  <td>
                    <div class="media">
                      <img src="./uploads/users/avatar-4.png" alt="A" class="img-fluid">
                      <div class="media-body">
                        <h5>Mr. Roy Cole</h5>
                        <span>zlincoln@unpixel.com</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p>Dashboard Design</p>
                  </td>
                  <td>
                    <p class="danger">1 Day Remaining</p>
                  </td>
                  <td class="text-center">
                    <p>$1,290</p>
                  </td>
                </tr>
                <!-- project single item end -->
                <!-- project single item start -->
                <tr>
                  <td>
                    <div class="media">
                      <img src="./uploads/users/avatar-3.png" alt="A" class="img-fluid">
                      <div class="media-body">
                        <h5>Skiles Cole</h5>
                        <span>zlincoln@unpixel.com</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p>Dashboard Design</p>
                  </td>
                  <td>
                    <p class="danger">1 Day Remaining</p>
                  </td>
                  <td class="text-center">
                    <p>$1,290</p>
                  </td>
                </tr>
                <!-- project single item end -->
                <!-- project single item start -->
                <tr>
                  <td>
                    <div class="media">
                      <img src="./uploads/users/avatar-6.png" alt="A" class="img-fluid">
                      <div class="media-body">
                        <h5>Leah Skiles</h5>
                        <span>zlincoln@unpixel.com</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p>Dashboard Design</p>
                  </td>
                  <td>
                    <p class="danger">1 Day Remaining</p>
                  </td>
                  <td class="text-center">
                    <p>$1,290</p>
                  </td>
                </tr>
                <!-- project single item end -->
                <!-- project single item start -->
                <tr>
                  <td>
                    <div class="media">
                      <img src="./uploads/users/avatar-2.png" alt="A" class="img-fluid">
                      <div class="media-body">
                        <h5>Cecil Sporer</h5>
                        <span>zlincoln@unpixel.com</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p>Dashboard Design</p>
                  </td>
                  <td>
                    <p class="danger">1 Day Remaining</p>
                  </td>
                  <td class="text-center">
                    <p>$1,290</p>
                  </td>
                </tr>
                <!-- project single item end -->
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="project-ending-box payment-from-copany-user">
          <h4>Upcoming Task</h4>
          <div class="project-overflow custom-scroll-bar">
            <div class="user-payment-table">
              <table>
                <tr>
                  <th>Task Title </th>
                  <th>Task Details</th>
                  <th>Date/ Day</th>
                  <th class="text-center">Time</th>
                </tr>
                <!-- task single item start -->
                <tr>
                  <td>
                    <p>Meeting</p>
                  </td>
                  <td>
                    <p>Meeting for our new <br> project with Elma.</p>
                  </td>
                  <td>
                    <p>Today</p>
                  </td>
                  <td class="text-center">
                    <p class="danger">12:30 PM</p>
                  </td>
                </tr>
                <!-- task single item end -->
                <!-- task single item start -->
                <tr>
                  <td>
                    <p>Meeting</p>
                  </td>
                  <td>
                    <p>Meeting for our new <br> project with Elma.</p>
                  </td>
                  <td>
                    <p>Today</p>
                  </td>
                  <td class="text-center">
                    <p class="danger">12:30 PM</p>
                  </td>
                </tr>
                <!-- task single item end -->
                <!-- task single item start -->
                <tr>
                  <td>
                    <p>Meeting</p>
                  </td>
                  <td>
                    <p>Meeting for our new <br> project with Elma.</p>
                  </td>
                  <td>
                    <p>Today</p>
                  </td>
                  <td class="text-center">
                    <p class="danger">12:30 PM</p>
                  </td>
                </tr>
                <!-- task single item end -->
                <!-- task single item start -->
                <tr>
                  <td>
                    <p>Meeting</p>
                  </td>
                  <td>
                    <p>Meeting for our new <br> project with Elma.</p>
                  </td>
                  <td>
                    <p>Today</p>
                  </td>
                  <td class="text-center">
                    <p class="danger">12:30 PM</p>
                  </td>
                </tr>
                <!-- task single item end -->
                <!-- task single item start -->
                <tr>
                  <td>
                    <p>Meeting</p>
                  </td>
                  <td>
                    <p>Meeting for our new <br> project with Elma.</p>
                  </td>
                  <td>
                    <p>Today</p>
                  </td>
                  <td class="text-center">
                    <p class="danger">12:30 PM</p>
                  </td>
                </tr>
                <!-- task single item end -->
                <!-- task single item start -->
                <tr>
                  <td>
                    <p>Meeting</p>
                  </td>
                  <td>
                    <p>Meeting for our new <br> project with Elma.</p>
                  </td>
                  <td>
                    <p>Today</p>
                  </td>
                  <td class="text-center">
                    <p class="danger">12:30 PM</p>
                  </td>
                </tr>
                <!-- task single item end -->
                <!-- task single item start -->
                <tr>
                  <td>
                    <p>Meeting</p>
                  </td>
                  <td>
                    <p>Meeting for our new <br> project with Elma.</p>
                  </td>
                  <td>
                    <p>Today</p>
                  </td>
                  <td class="text-center">
                    <p class="danger">12:30 PM</p>
                  </td>
                </tr>
                <!-- task single item end -->
                <!-- task single item start -->
                <tr>
                  <td>
                    <p>Meeting</p>
                  </td>
                  <td>
                    <p>Meeting for our new <br> project with Elma.</p>
                  </td>
                  <td>
                    <p>Today</p>
                  </td>
                  <td class="text-center">
                    <p class="danger">12:30 PM</p>
                  </td>
                </tr>
                <!-- task single item end -->
                <!-- task single item start -->
                <tr>
                  <td>
                    <p>Meeting</p>
                  </td>
                  <td>
                    <p>Meeting for our new <br> project with Elma.</p>
                  </td>
                  <td>
                    <p>Today</p>
                  </td>
                  <td class="text-center">
                    <p class="danger">12:30 PM</p>
                  </td>
                </tr>
                <!-- task single item end -->
                <!-- task single item start -->
                <tr>
                  <td>
                    <p>Meeting</p>
                  </td>
                  <td>
                    <p>Meeting for our new <br> project with Elma.</p>
                  </td>
                  <td>
                    <p>Today</p>
                  </td>
                  <td class="text-center">
                    <p class="danger">12:30 PM</p>
                  </td>
                </tr>
                <!-- task single item end -->

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- project task section end -->

    <!-- dashboard graph start -->
    <div class="row mt-4">
      <div class="col-lg-6">
        <div class="payment-from-copany-user">
          <div class="d-flex justify-content-between">
            <h4 class="common-subtitle">Earning &amp; Expenses</h4>
            <ul class="graph-dot">
              <li><i class="fas fa-circle earning"></i> Earning</li>
              <li><i class="fas fa-circle expense"></i> Expenses</li>
            </ul>
          </div>
          <!-- graph placeholde -->
          <img src="./uploads/graph/graph-01.png" alt="a" class="img-fluid d-block w-100">
        </div>
      </div>
      <div class="col-lg-6">
        <div class="payment-from-copany-user">
          <div class="d-flex justify-content-between">
            <h4 class="common-subtitle">Projects</h4>
          </div>
          <!-- graph placeholde -->
          <img src="./uploads/graph/graph-02.png" alt="a" class="img-fluid">
        </div>
      </div>
    </div>
    <!-- dashboard graph end -->

    <!-- active clients start -->
    <div class="row mt-4">
      <div class="col-12">
        <div class="all-customer-box active-client-table payment-from-copany-user">
          <h4 class="common-subtitle mb-15">Active Clients</h4>
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
                <th></th>
              </tr>
              <!-- client single item start -->
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
                  <p class="active">Active</p>
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
                  <span class="status paid">
                    Paid
                  </span>
                </td>
                <td>
                  <a href="#">
                    <img src="./assets/images/icons/dots-horizontal.svg" class="img-fluid" alt="">
                  </a>
                </td>
              </tr>
              <!-- client single item end -->
              <!-- client single item start -->
              <tr>
                <td>
                  1
                </td>
                <td>
                  <div class="media">
                    <img src="./uploads/users/avatar-3.png" alt="A" class="img-fluid">
                    <div class="media-body">
                      <h5>Cecil Sporer</h5>
                      <span>zlincoln@unpixel.com</span>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="inactive">Inactive</p>
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
                  <span class="status pending">
                    Paid
                  </span>
                </td>
                <td>
                  <a href="#">
                    <img src="./assets/images/icons/dots-horizontal.svg" class="img-fluid" alt="">
                  </a>
                </td>
              </tr>
              <!-- client single item end -->
              <!-- client single item start -->
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
                  <p class="active">Active</p>
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
                  <span class="status unpaid">
                    Unpaid
                  </span>
                </td>
                <td>
                  <a href="#">
                    <img src="./assets/images/icons/dots-horizontal.svg" class="img-fluid" alt="">
                  </a>
                </td>
              </tr>
              <!-- client single item end -->
              <!-- client single item start -->
              <tr>
                <td>
                  1
                </td>
                <td>
                  <div class="media">
                    <img src="./uploads/users/avatar-3.png" alt="A" class="img-fluid">
                    <div class="media-body">
                      <h5>Cecil Sporer</h5>
                      <span>zlincoln@unpixel.com</span>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="inactive">Inactive</p>
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
                  <span class="status unpaid">
                    Unpaid
                  </span>
                </td>
                <td>
                  <a href="#">
                    <img src="./assets/images/icons/dots-horizontal.svg" class="img-fluid" alt="">
                  </a>
                </td>
              </tr>
              <!-- client single item end -->
              <!-- client single item start -->
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
                  <p class="active">Active</p>
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
                  <span class="status paid">
                    Paid
                  </span>
                </td>
                <td>
                  <a href="#">
                    <img src="./assets/images/icons/dots-horizontal.svg" class="img-fluid" alt="">
                  </a>
                </td>
              </tr>
              <!-- client single item end -->
              <!-- client single item start -->
              <tr>
                <td>
                  1
                </td>
                <td>
                  <div class="media">
                    <img src="./uploads/users/avatar-3.png" alt="A" class="img-fluid">
                    <div class="media-body">
                      <h5>Cecil Sporer</h5>
                      <span>zlincoln@unpixel.com</span>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="inactive">Inactive</p>
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
                  <span class="status pending">
                    Paid
                  </span>
                </td>
                <td>
                  <a href="#">
                    <img src="./assets/images/icons/dots-horizontal.svg" class="img-fluid" alt="">
                  </a>
                </td>
              </tr>
              <!-- client single item end -->
              <!-- client single item start -->
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
                  <p class="active">Active</p>
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
                  <span class="status paid">
                    Paid
                  </span>
                </td>
                <td>
                  <a href="#">
                    <img src="./assets/images/icons/dots-horizontal.svg" class="img-fluid" alt="">
                  </a>
                </td>
              </tr>
              <!-- client single item end -->
              <!-- client single item start -->
              <tr>
                <td>
                  1
                </td>
                <td>
                  <div class="media">
                    <img src="./uploads/users/avatar-3.png" alt="A" class="img-fluid">
                    <div class="media-body">
                      <h5>Cecil Sporer</h5>
                      <span>zlincoln@unpixel.com</span>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="inactive">Inactive</p>
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
                  <span class="status pending">
                    Paid
                  </span>
                </td>
                <td>
                  <a href="#">
                    <img src="./assets/images/icons/dots-horizontal.svg" class="img-fluid" alt="">
                  </a>
                </td>
              </tr>
              <!-- client single item end -->

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
      </div>
    </div>
    <!-- active clients end -->

  </section>
@endsection