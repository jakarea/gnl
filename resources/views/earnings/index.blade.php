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
            <span id="currentQuery">
              @if ($selectedQuery === 'this_month')
              This Month
              @elseif ($selectedQuery === 'last_month')
              Last Month
              @elseif ($selectedQuery === 'this_year')
              This Year
              @elseif ($selectedQuery === 'last_year')
              Last Year
              @elseif ($selectedQuery === 'all_time')
              All Time
              @else
              This Month
              @endif
            </span>
            <i class="fas fa-angle-down"></i>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item filter-item" href="#" data-value="all_time">
                All Time
              </a>
            </li>
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

  {{-- @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif --}}

  <!-- earning card start -->
  <div class="row mt-3">
    <!-- card item start -->
    <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
      <div class="analytics-card-box">
        <div class="top">
          @if ($data['totalEarning']['amountCompare'] >= 0)
          <img src="{{ asset('assets/images/icons/money-recive.svg') }}" alt="I" class="img-fluid money-recive">
          @else
          <img src="{{ asset('assets/images/icons/money-recive-down.svg') }}" alt="I" class="img-fluid money-recive">
          @endif

          <p>Total Earning</p>
        </div>
        <h4>€{{ $data['totalEarning']['amountEarning'] }}</h4>
        <div class="bottom-text">
          <h5 class="{{ $data['totalEarning']['amountCompare'] < 0 ? 'red' : ''}} ">{{
            $data['totalEarning']['amountCompare'] }}%</h5>

          @php
          $highLess = 'Higher';
          if ($data['totalEarning']['amountCompare'] < 0) {
            $highLess='Less';
          }
          @endphp 

          @if ($selectedQuery==='this_month' || $selectedQuery==='last_month' ) <p>{{ $highLess }} than last month</p>
            @elseif ($selectedQuery === 'this_year' || $selectedQuery === 'last_year')
            <p>{{ $highLess }} than last year</p>
            @elseif ($selectedQuery === 'all_time')
            <p>All time record</p>
            @else
            <p>{{ $highLess }} than last month</p>
            @endif

        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
      <div class="analytics-card-box">
        <div class="top">
          @if ($data['totalTax']['taxCompare'] >= 0)
          <img src="{{ asset('assets/images/icons/money-recive.svg') }}" alt="I" class="img-fluid money-recive">
          @else
          <img src="{{ asset('assets/images/icons/money-recive-down.svg') }}" alt="I" class="img-fluid money-recive">
          @endif
          <p>Total VAT</p>
        </div>
        <h4>€{{ $data['totalTax']['taxEarning'] }}</h4>
        <div class="bottom-text">
          <h5 class="{{ $data['totalTax']['taxCompare'] < 0 ? 'red' : ''}} ">{{ $data['totalTax']['taxCompare'] }}%</h5>

          @php
          $highLess2 = 'Higher';
          if ($data['totalTax']['taxCompare'] < 0) 
          { $highLess2='Less' ; } 
          @endphp 

          @if ($selectedQuery==='this_month' || $selectedQuery==='last_month' ) 
          <p>{{ $highLess2 }} than last month</p>
            @elseif ($selectedQuery === 'this_year' || $selectedQuery === 'last_year')
            <p>{{ $highLess2 }} than last year</p>
            @elseif ($selectedQuery === 'all_time')
            <p>All time record</p>
            @else
            <p>{{ $highLess2 }} than last month</p>
            @endif
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
      <div class="analytics-card-box">
        <div class="top">
          @if ($data['totalProfit']['profitCompare'] >= 0)
          <img src="{{ asset('assets/images/icons/money-recive.svg') }}" alt="I" class="img-fluid money-recive">
          @else
          <img src="{{ asset('assets/images/icons/money-recive-down.svg') }}" alt="I" class="img-fluid money-recive">
          @endif
          <p>Total Profit</p>
        </div>
        <h4>€{{ $data['totalProfit']['totalProfit'] }}</h4>
        <div class="bottom-text">
          <h5 class="{{ $data['totalProfit']['profitCompare'] < 0 ? 'red' : ''}} ">{{
            $data['totalProfit']['profitCompare'] }}%</h5>

          @php
          $highLess3 = 'Higher';
          if ($data['totalProfit']['profitCompare'] < 0) { 
            $highLess3='Less' ; 
            } 
          @endphp 
          @if ($selectedQuery==='this_month' || $selectedQuery==='last_month' ) <p>{{ $highLess3 }} than last month</p>
            @elseif ($selectedQuery === 'this_year' || $selectedQuery === 'last_year')
            <p>{{ $highLess3 }} than last year</p>
            @elseif ($selectedQuery === 'all_time')
            <p>All time record</p>
            @else
            <p>{{ $highLess3 }} than last month</p>
            @endif
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
      <div class="analytics-card-box">
        <div class="top">
          <img src="{{ asset('assets/images/icons/money-recive.svg') }}" alt="I" class="img-fluid money-recive">

          <p>Earning Today</p>
        </div>
        <h4>€{{ $data['totalEarningToday'] }}</h4>
        <div class="bottom-text">
          <h5>+100%</h5>
          <p>All time record</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
      <div class="analytics-card-box">
        <div class="top">
          @if ($data['totalEarningHosting']['amountCompare'] >= 0)
          <img src="{{ asset('assets/images/icons/money-recive.svg') }}" alt="I" class="img-fluid money-recive">
          @else
          <img src="{{ asset('assets/images/icons/money-recive-down.svg') }}" alt="I" class="img-fluid money-recive">
          @endif
          <p>Hosting Earning</p>
        </div>
        <h4>€{{ $data['totalEarningHosting']['amountEarning'] }}</h4>
        <div class="bottom-text">
          <h5 class="{{ $data['totalEarningHosting']['amountCompare'] < 0 ? 'red' : ''}} ">{{
            $data['totalEarningHosting']['amountCompare'] }}%</h5>

          @php
          $highLess4 = 'Higher';
          if ($data['totalEarningHosting']['amountCompare'] < 0) { $highLess4='Less' ; } @endphp 
          @if ($selectedQuery==='this_month' || $selectedQuery==='last_month' ) <p>{{ $highLess4 }} than last month</p>
            @elseif ($selectedQuery === 'this_year' || $selectedQuery === 'last_year')
            <p>{{ $highLess4 }} than last year</p>
            @elseif ($selectedQuery === 'all_time')
            <p>All time record</p>
            @else
            <p>{{ $highLess4 }} than last month</p>
            @endif
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
      <div class="analytics-card-box">
        <div class="top">
          @if ($data['totalEarningMarketing']['amountCompare'] >= 0)
          <img src="{{ asset('assets/images/icons/money-recive.svg') }}" alt="I" class="img-fluid money-recive">
          @else
          <img src="{{ asset('assets/images/icons/money-recive-down.svg') }}" alt="I" class="img-fluid money-recive">
          @endif
          <p>Marketing Earning</p>
        </div>
        <h4>€{{ $data['totalEarningMarketing']['amountEarning'] }}</h4>
        <div class="bottom-text">
          <h5 class="{{ $data['totalEarningMarketing']['amountCompare'] < 0 ? 'red' : ''}} ">{{
            $data['totalEarningMarketing']['amountCompare'] }}%</h5>

          @php
          $highLess5 = 'Higher';
          if ($data['totalEarningMarketing']['amountCompare'] < 0) { $highLess5='Less' ; } @endphp

            @if ($selectedQuery === 'this_month' || $selectedQuery === 'last_month')
            <p>{{ $highLess5 }} than last month</p>
            @elseif ($selectedQuery === 'this_year' || $selectedQuery === 'last_year')
            <p>{{ $highLess5 }} than last year</p>
            @elseif ($selectedQuery === 'all_time')
            <p>All time record</p>
            @else
            <p>{{ $highLess5 }} than last month</p>
            @endif

        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
      <div class="analytics-card-box">
        <div class="top">
          @if ($data['totalEarningProject']['amountCompare'] >= 0)
          <img src="{{ asset('assets/images/icons/money-recive.svg') }}" alt="I" class="img-fluid money-recive">
          @else
          <img src="{{ asset('assets/images/icons/money-recive-down.svg') }}" alt="I" class="img-fluid money-recive">
          @endif
          <p>Project Earning</p>
        </div>
        <h4>€{{ $data['totalEarningProject']['amountEarning'] }}</h4>
        <div class="bottom-text">
          <h5 class="{{ $data['totalEarningProject']['amountCompare'] < 0 ? 'red' : ''}} ">{{
            $data['totalEarningProject']['amountCompare'] }}%</h5>

          @php
          $highLess6 = 'Higher';
          if ($data['totalEarningProject']['amountCompare'] < 0) { $highLess6='Less' ; } @endphp

          @if ($selectedQuery === 'this_month' || $selectedQuery === 'last_month')
          <p>{{ $highLess6 }} than last month</p>
          @elseif ($selectedQuery === 'this_year' || $selectedQuery === 'last_year')
          <p>{{ $highLess6 }} than last year</p>
          @elseif ($selectedQuery === 'all_time')
          <p>All time record</p>
          @else
          <p>{{ $highLess6 }} than last month</p>
          @endif
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-4">
      <div class="analytics-card-box">
        <div class="top">
          @if ($data['totalEarningWebsite']['amountCompare'] >= 0)
          <img src="{{ asset('assets/images/icons/money-recive.svg') }}" alt="I" class="img-fluid money-recive">
          @else
          <img src="{{ asset('assets/images/icons/money-recive-down.svg') }}" alt="I" class="img-fluid money-recive">
          @endif
          <p>Website Earning</p>
        </div>
        <h4>€{{ $data['totalEarningWebsite']['amountEarning'] }}</h4>
        <div class="bottom-text">
          <h5 class="{{ $data['totalEarningWebsite']['amountCompare'] < 0 ? 'red' : ''}} ">{{
            $data['totalEarningWebsite']['amountCompare'] }}%</h5>

          @php
          $highLess7 = 'Higher';
          if ($data['totalEarningWebsite']['amountCompare'] < 0) { $highLess7='Less' ; } @endphp

          @if ($selectedQuery === 'this_month' || $selectedQuery === 'last_month')
          <p>{{ $highLess7 }} than last month</p>
          @elseif ($selectedQuery === 'this_year' || $selectedQuery === 'last_year')
          <p>{{ $highLess7 }} than last year</p>
          @elseif ($selectedQuery === 'all_time')
          <p>All time record</p>
          @else
          <p>{{ $highLess7 }} than last month</p>
          @endif
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
              <h5>+100%</h5>
              <p>All time record</p>
            </div>
          </div>
          <div class="earning">
            <a href="#"><i class="fas fa-circle"></i> Earning</a>
            <h5>€{{ $data['totalEarning']['amountEarning'] }}</h5>
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
  <div class="payment-from-copany-user" style="border-radius: 0 0 16px 16px">
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
              <img src="{{ asset('uploads/users/avatar-9.png') }}" alt="avatar" class="img-fluid avatar" />
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
                <a class="dropdown-item earningModalDetails" href="javascript:;"
                  data-earning-id="{{ $earning->earning_id }}">View Details</a>

                <form action="{{ route('earning.destroy-earnings',$earning->earning_id) }}" class="d-inline"
                  method="POST">
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
{{-- @include('earnings.details') --}}
<div class="showEarningDetails"></div>
{{-- client details modal end --}}

{{-- add client modal start --}}
@include('earnings.add')
{{-- add client modal end --}}

@endsection

@section('script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

{{-- earning details js --}}
<script>
  document.addEventListener('click', function(e) {
    if (e.target.classList.contains('earningModalDetails')) {
        e.preventDefault();
        const earningId = e.target.dataset.earningId;

        let currentURL3 = window.location.href;
        const baseUrl3 = currentURL3.split('/').slice(0, 3).join('/'); 

        fetch(`${baseUrl3}/earning/details/${earningId}`, {
            method: 'GET',
            headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', 
                }, 
        })
        .then(function (response) {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(function (data) {
          console.log(data);
            document.querySelector(".showEarningDetails").innerHTML = data;
            
            // $(".earning-details-modal").modal('show');

            const modal = new bootstrap.Modal(document.querySelector('.earning-details-modal'));
            modal.show(); 

        })
        .catch(function (error) {
            console.error('There was a problem with your fetch operation:', error);
        });
    }
});

</script>

<!-- total user graph js start -->
<script>
  const earningsPerMonth = @json($earningsPerMonth);

  var options = {
      series: [{
        name: 'Total earning',
        data: earningsPerMonth
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
            return "€ " + val + " euros"
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