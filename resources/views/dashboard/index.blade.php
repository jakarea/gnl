@extends('layouts.auth')

@section('title', 'GNL Dashboard')

@section('style')
<link rel="stylesheet" href="{{ url('assets/css/earning.css') }}" />
<link rel="stylesheet" href="{{ url('assets/css/customer.css') }}" />
<link rel="stylesheet" href="{{ url('assets/css/project.css') }}" />
@endsection

@section('content')
<section class="main-page-wrapper analytics-page-wrapper">
    <!-- page title -->
    <div class="page-title page-title-one">
        <h1 class="pb-0">Dashboard</h1>

        <!-- bttn -->
        <div class="page-bttn">
            <form action="" method="GET" id="myForm">
                <div class="dropdown">
                    <a class="bttn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('assets/images/icons/calendar-2.svg') }}" alt="icon" class="img-fluid">
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
    <!-- page title -->

    <!-- customer status car start -->
    <div class="row mt-3">
        <div class="col-12 col-sm-6 col-md-4 col-xl-4 mb-4">
            <div class="analytics-card-box">
                <div class="top">
                    @if ($data['totalEarning']['amountCompare'] >= 0)
                    <img src="{{ asset('assets/images/icons/money-recive.svg') }}" alt="I"
                        class="img-fluid money-recive">
                    @else
                    <img src="{{ asset('assets/images/icons/money-recive-down.svg') }}" alt="I"
                        class="img-fluid money-recive">
                    @endif

                    <p>Total Earning</p>
                </div>
                <h4 class="mt-125">€{{ $data['totalEarning']['amountEarning'] }}</h4>
                <div class="bottom-text">
                    <h5 class="{{ $data['totalEarning']['amountCompare'] < 0 ? 'red' : ''}} ">{{
                        $data['totalEarning']['amountCompare'] }}%</h5>

                    @php
                    $highLess = 'Higher';
                    if ($data['totalEarning']['amountCompare'] < 0) { $highLess='Less' ; } @endphp 
                    @if ($selectedQuery==='this_month' || $selectedQuery==='last_month' ) <p>{{ $highLess }} than last
                        month</p>
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
        <div class="col-12 col-sm-6 col-md-4 col-xl-4 mb-4">
            <div class="analytics-card-box">
                <div class="top">
                    @if ($data['totalTax']['taxCompare'] >= 0)
                    <img src="{{ asset('assets/images/icons/money-recive.svg') }}" alt="I"
                        class="img-fluid money-recive">
                    @else
                    <img src="{{ asset('assets/images/icons/money-recive-down.svg') }}" alt="I"
                        class="img-fluid money-recive">
                    @endif
                    <p>Total VAT</p>
                </div>
                <h4 class="mt-125">€{{ $data['totalTax']['taxEarning'] }}</h4>
                <div class="bottom-text">
                    <h5 class="{{ $data['totalTax']['taxCompare'] < 0 ? 'red' : ''}} ">{{
                        $data['totalTax']['taxCompare'] }}%</h5>

                    @php
                    $highLess2 = 'Higher';
                    if ($data['totalTax']['taxCompare'] < 0) { $highLess2='Less' ; } @endphp 
                    @if ($selectedQuery==='this_month' || $selectedQuery==='last_month' ) <p>{{ $highLess2 }} than last
                        month</p>
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
        <div class="col-12 col-sm-6 col-md-4 col-xl-4 mb-4">
            <div class="analytics-card-box">
              <div class="top">
                <img src="{{ asset('assets/images/icons/profit.svg') }}" alt="I" class="img-fluid money-recive">
                <p>Total Profit</p>
              </div>
              <h4 class="mt-125">€{{ $data['totalProfit']['totalProfit'] }}</h4>
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
          <div class="col-12 col-sm-6 col-md-4 col-xl-4 mb-4">
            <div class="analytics-card-box">
              <div class="top">
                <img src="{{ asset('assets/images/icons/user-add.svg') }}" alt="I" class="img-fluid money-recive">
                <p>Total Customer</p>
              </div>
              <h4>{{ $data['totalCustomer']['hostingcustomers'] }}</h4>
              <div class="bottom-text">
                <h5 class="{{ $data['totalCustomer']['hostingcustomersCompare'] < 0 ? 'red' : ''}} ">{{ $data['totalCustomer']['hostingcustomersCompare'] }}%</h5>
      
                @php
                $highLess2 = 'Higher';
                if ($data['totalCustomer']['hostingcustomersCompare'] < 0) 
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
          <div class="col-12 col-sm-6 col-md-4 col-xl-4 mb-4">
            <div class="analytics-card-box">
              <div class="top">
                <img src="{{ asset('assets/images/icons/user-add.svg') }}" alt="I" class="img-fluid money-recive">
                <p>New Customer</p>
              </div>
              <h4>{{ $data['totalNewCustomer'] }}</h4>
              <div class="bottom-text">
                <h5 class="{{ $data['totalNewCustomer'] < 0 ? 'red' : ''}} ">100%</h5>
      
                <p>All time record</p>
              </div>
            </div>
          </div> 
          <div class="col-12 col-sm-6 col-md-4 col-xl-4 mb-4">
            <div class="analytics-card-box">
              <div class="top">
                <img src="{{ asset('assets/images/icons/user-add.svg') }}" alt="I" class="img-fluid money-recive">
                <p>Repeat Customer</p>
              </div>
              <h4>{{ $data['totalRepeatCustomer'] }}</h4>
              <div class="bottom-text">
                <h5 class="{{ $data['totalRepeatCustomer'] < 0 ? 'red' : ''}} ">100%</h5>
      
                <p>All time record</p>
              </div>
            </div>
          </div> 
    </div>
    <!-- customer status car end -->

    <!-- project task section start -->
    <div class="row">
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
                            @if (count($customers) > 0)
                            @foreach ($customers as $customer)
                            <tr>
                                <td>
                                    <div class="media">
                                        @if ($customer->avatar)
                                        <img src="{{ asset($customer->avatar) }}" alt="avatar" class="img-fluid" />
                                        @else
                                        <img src="{{ asset('uploads/users/avatar-1.png') }}" alt="default avatar"
                                            class="img-fluid" />
                                        @endif
                                        <div class="media-body">
                                            <h5>{{ $customer->name }}</h5>
                                            <span>{{ $customer->designation }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p>{{ $customer->projects->first()->title ?? 'N/A' }}</p>
                                </td>
                                <td>
                                    @php
                                    $remainingDays = now()->diffInDays($customer->projects->first()->end_date);
                                    @endphp
                                    <p class="danger">
                                        {{ $remainingDays }}
                                        {{ $remainingDays > 1 ? 'Days Remaining' : 'Day Remaining' }}
                                    </p>

                                </td>
                                <td class="text-center">
                                    <p>${{ $customer->projects->first()->amount ?? 'N/A' }}</p>
                                </td>
                            </tr>
                            @endforeach
                            @endif
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

                            @if (count($tasks) > 0)
                            @foreach ($tasks as $task)
                            <tr>
                                <td>
                                    <p>{{ $task->title }}</p>
                                </td>
                                <td>
                                    <p>{{ Str::substr($task->description, 0, 38) }}</p>
                                </td>
                                <td>
                                    @php
                                    $date = \Carbon\Carbon::parse($task->date);

                                    if ($date->isToday()) {
                                    $formattedDate = 'today';
                                    } elseif ($date->isTomorrow()) {
                                    $formattedDate = 'tomorrow';
                                    } else {
                                    $formattedDate = $date->format('d M Y');
                                    }
                                    @endphp
                                    <p>{{ ucfirst($formattedDate) }}</p>
                                </td>
                                <td class="text-center">
                                    @php
                                    $time = strtotime($task->start_time);
                                    $formattedTime = date('h:i A', $time);
                                    @endphp
                                    <p class="danger">{{ $formattedTime }}</p>
                                </td>
                            </tr>
                            @endforeach
                            @endif
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
        <div class="col-lg-7">
            <div class="payment-from-copany-user">
                <div class="d-flex justify-content-between">
                    <h4 class="common-subtitle">Earning &amp; Expenses</h4>
                    <ul class="graph-dot">
                        <li><i class="fas fa-circle earning"></i> Earning</li>
                        <li><i class="fas fa-circle expense"></i> Expenses</li>
                    </ul>
                </div>
                 {{-- earning expenses graph --}}
                 {{-- <div id="earningExpenseGraph"></div> --}}

            </div>
        </div>
        <div class="col-lg-5">
            <div class="payment-from-copany-user">
                <h4 class="common-subtitle">Projects</h4>
              
                <div class="d_grid">
                    <div class="pro-graph">
                        <div class="txt">
                            <h5>{{ array_sum($projectStatusGraph) }}</h5>
                            <p><img src="{{ asset('assets/images/icons/arrow-up-gren.svg') }}" alt="a" class="img-fluid"> 
                                {{ array_sum($projectStatusGraph) > 0 ? '+' . array_sum($projectStatusGraph) : '-' }}%
                            </p>
                          </div>
                        <canvas id="projectStatus"></canvas>
                    </div>
                    <div class="pro-graph-txt">
                        <div id="legend" class="legend center-legend"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- dashboard graph end -->

    <!-- active clients start -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="all-customer-box active-client-table payment-from-copany-user">
                <h4 class="common-subtitle mb-15">Earning Clients</h4>
                @include('earnings.earning-clients')
                <!--pagination end-->
            </div>
        </div>
    </div>
    <!-- active clients end -->

</section>
<div class="showEarningDetails"></div>
@endsection

@section('script')

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                    .then(function(response) {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.text();
                    })
                    .then(function(data) {
                        console.log(data);
                        document.querySelector(".showEarningDetails").innerHTML = data;

                        // $(".earning-details-modal").modal('show');

                        const modal = new bootstrap.Modal(document.querySelector('.earning-details-modal'));
                        modal.show();

                    })
                    .catch(function(error) {
                        console.error('There was a problem with your fetch operation:', error);
                    });
            }
        });
</script>

<script>
    var options = {
          series: [{
            name: "Desktops",
            data: [10, 41, 35, 51, 49, 62, 69, 91, 148],
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        }, 
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        }
        };

        var chart = new ApexCharts(document.querySelector("#earningExpenseGraph"), options);
        chart.render();
</script>

{{-- project graph --}}
<script>
    const projectStatusGraph = @json($projectStatusGraph); 

    var datas = [projectStatusGraph.completedProject, projectStatusGraph.inProgressProject];

    var backgroundColor = ['#194BFB', '#FFAA2A'];
    var ctx = document.getElementById('projectStatus').getContext('2d');
    var myDoughnutChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Completed Project', 'Inprogress Project'],
        datasets: [{
          label: 'Total',
          data: datas,
          backgroundColor: backgroundColor,
          hoverOffset: 3
        }]
      },
      options: {
        plugins: {
          legend: {
            display: false
          }
        }, 
        legend: {
          display: false
        },
        cutout: '65%',
        radius: 125
      }
    }); 
 
   // Generate and display the custom legend
    var legendHtml = "<ul>";
    for (var i = 0; i < myDoughnutChart.data.labels.length; i++) {
        legendHtml +=
            '<li>' + '<p> <span style="background-color:' +
            myDoughnutChart.data.datasets[0].backgroundColor[i] +
            '"></span> ' + myDoughnutChart.data.labels[i] + '</p>' + '<h6>' + datas[i] + '</h6>' +
            "</li>";
    }
    legendHtml += "</ul>"; 


    document.getElementById("legend").innerHTML = legendHtml;
  </script>

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