@extends('layouts.auth')

@section('title', 'Total Earning')

@section('style')
<link rel="stylesheet" href="{{ url('assets/css/earning.css') }}" />
<link rel="stylesheet" href="{{ url('assets/css/customer.css') }}" />
<link rel="stylesheet" href="{{ url('assets/css/project.css') }}" />
@endsection

@section('content')
<section class="main-page-wrapper analytics-page-wrapper">
  <!-- page title start-->
  <div class="page-title page-title-one">
    <h1>Earnings</h1>
    <!-- bttn -->
    <div class="page-bttn">
      <form action="" method="GET" id="myForm">
      <div class="dropdown">
        <a class="bttn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="./assets/images/icons/calendar-2.svg" alt="icon" class="img-fluid">
          <span id="currentQuery">This Month</span>
          <i class="fas fa-angle-down"></i>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="dropdown-item filter-item" href="#" data-value="this_month">
              This Month 
            </a>
          </li>
          <li>
            <a class="dropdown-item filter-item" href="#" data-value="last_month">
              Last Month 
            </a>
          </li>
          <li>
            <a class="dropdown-item filter-item" href="#" data-value="this_year">
              This Year
            </a>
          </li>
          <li>
            <a class="dropdown-item filter-item" href="#" data-value="last_year">
              Last Year
            </a>
          </li>
        </ul>
      </div>
      <input type="hidden" name="query" id="filterQuery">
      </form>
    </div>
    <!-- bttn -->
  </div>
  <!--page title end-->

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <!-- earning card start -->
  <div class="row mt-3">
    <!-- card item start -->
    <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
      <div class="analytics-card-box">
        <div class="top">
          <img src="./assets/images/icons/money-recive.svg" alt="I" class="img-fluid money-recive">
          <p>Total Earning</p>
        </div>
        <h4>€{{ $status['totalEarning'] }}</h4>
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
          <p>Total VAT</p>
        </div>
        <h4>€{{ $status['totalTax'] }}</h4>
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
        <h4>€{{ $status['totalProfit'] }}</h4>
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
          <p>Earning Today</p>
        </div>
        <h4>€{{ $status['totalEarningToday'] }}</h4>
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
          <p>Hoisting Earning</p>
        </div>
        <h4>€{{ $status['totalEarningHosting'] }}</h4>
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
          <p>Marketing Earning</p>
        </div>
        <h4>€{{ $status['totalEarningMarketing'] }}</h4>
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
        <h4>€{{ $status['totalEarningProject'] }}</h4>
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
          <p>Website Earning</p>
        </div>
        <h4>€{{ $status['totalEarningWebsite'] }}</h4>
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
            <h5>€{{ $status['totalEarning'] }}</h5>
          </div>
        </div>
        <div id="totalEarning"></div>
      </div>
    </div>
  </div>
  <!-- total user and products graph end -->

  <!--cient leads start-->
  <div class="page-title page-title-two pb-0">
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
          <th class="text-center">Payment Status</th>
          <th></th>
        </tr>
        @foreach ($earnings as $earning)
        <!-- payment single item start -->
        <tr>
          <td>
            {{ ($earnings->currentPage() - 1) * $earnings->perPage() + $loop->iteration }}
          </td>
          <td>
            <div class="media">
              @if ($earning->customer->avatar)
              <img src="{{ asset($earning->customer->avatar) }}" alt="avatar" class="img-fluid avatar" />
              @else
              <img src="{{ asset('uploads/users/avatar-9.png') }}" alt="avatar"
                  class="img-fluid avatar" />
              @endif

              <div class="media-body">
                  <h5>{{ $earning->customer->name }}</h5>
                  <span>{{ $earning->customer->email }}</span>
              </div>
          </div>
          </td>
          <td>
            @if ($earning->customer->status == 'active')
            <p class="active-status">Active</p>
            @else
            <p class="active-status text-danger">Inactive</p>
            @endif
            
          </td>
          <td>
            <p>{{ $earning->pay_date}}</p>
          </td>
          <td>
            <p class="text-capitalize">{{ $earning->pay_services }}</p>
          </td>
          <td>
            <p>€{{ $earning->amount }}</p>
          </td>

          <td>
            <ul>
              <li>
                @if ($earning->pay_status == 'unpaid')
                <a href="#" class="btn-view no-ans-btn">Unpaid</a>
                @elseif($earning->pay_status == 'paid')
                <a href="#" class="btn-view btn-completed">Paid</a>  
                @endif

              </li>
            </ul>
          </td>

          <td>
            <div class="table-dropdown">
              <a href="#" type="button" class="dot-bttn" data-bs-toggle="dropdown" aria-expanded="false"
                aria-expanded="false">
                <img src="{{ url('/assets/images/icons/dots-horizontal.svg')}}" class="img-fluid" alt="">
              </a>
              <div class="dropdown-menu">
                {{-- <a class="dropdown-item lead-edit" href="#" data-bs-toggle="modal" data-id="{{ $earning->earning_id }}"
                  data-bs-target="#staticBackdropFive">Edit Payment</a> --}}

                <form action="{{ route('earning.destroy-earnings',$earning->earning_id) }}" class="d-inline" method="POST">
                  @csrf
                  <button type="submit" class="btn dropdown-item">Delete Payment</button>
                </form>
              </div>
            </div>
          </td>

        </tr>
        <!-- payment single item end -->
        @endforeach
      </table>
    </div>
    {{-- paggination wrap --}}
    <div class="row mt-5">
      <div class="col-12 pagination-section">
        {{ $earnings->links('pagination::bootstrap-5') }}
      </div>
    </div>
    {{-- paggination wrap --}}
  </div>
  <!--client lead end-->
</section>

{{-- client details modal start --}}
@include('earnings.details')
{{-- client details modal end --}}

{{-- add client modal start --}}
@include('earnings.add')
{{-- add client modal end --}}

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

{{-- sort top card query js --}} 
<script> 
  document.addEventListener("DOMContentLoaded", function() {

      document.querySelectorAll(".filter-item").forEach(item => {
          item.addEventListener("click", function(e) {
              e.preventDefault();
              document.getElementById("filterQuery").value = this.getAttribute("data-value");
              document.getElementById("myForm").submit();
          });
      });
  });
</script>
@endsection