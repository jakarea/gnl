@extends('layouts.auth')

@section('title','Analytics')

@section('style')
<link rel="stylesheet" href="{{ url('assets/css/customer.css') }}" />
<link rel="stylesheet" href="{{ url('assets/css/analytics.css') }}" />
@endsection

@section('content')
<section class="main-page-wrapper analytics-page-wrapper">
    <!-- page title -->
    <div class="page-title">
        <h1 class="pb-0">Analytics</h1>

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

    <!-- project status car start -->
    <div class="row">
        <div class="col-12 col-md-6 col-xl-4">
            <div class="customer-status-box">
                <h5>
                    <img src="{{ asset('assets/images/icons/completed.svg') }}" alt="icon" class="img-fluid" />
                    Total Completed Project
                </h5>
                <h3>{{ $projectStatus['totalCompleted'] }}</h3>
 
                <div class="d-flex">
                    <span class="{{ $projectStatus['completedComparePercentage'] < 0 ? 'lower' : ''}} ">{{ $projectStatus['completedComparePercentage'] }}%</span>
                    @php
                    $highLess = 'Higher';
                    if ($projectStatus['completedComparePercentage'] < 0) { $highLess='Less' ; } @endphp 
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
        <div class="col-12 col-md-6 col-xl-4">
            <div class="customer-status-box">
                <h5>
                    <img src="{{ asset('assets/images/icons/progress.svg') }}" alt="icon" class="img-fluid" />
                    Total Project In Progress
                </h5>
                <h3>{{ $projectStatus['totalInProgress'] }}</h3>
                
                <div class="d-flex">
                  <span class="{{ $projectStatus['inProgressComparePercentage'] < 0 ? 'lower' : ''}} ">
                    {{ $projectStatus['inProgressComparePercentage'] }}%
                  </span>
                  @php
                  $highLess = 'Higher';
                  if ($projectStatus['inProgressComparePercentage'] < 0) { $highLess='Less' ; } @endphp 
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
        <div class="col-12 col-md-6 col-xl-4">
            <div class="customer-status-box">
                <h5>
                    <img src="{{ asset('assets/images/icons/down.svg') }}" alt="icon" class="img-fluid" />
                    Total Cancelled Project
                </h5>
                <h3>{{ $projectStatus['totalCanceled'] }}</h3>
                <div class="d-flex">
                  <span class="{{ $projectStatus['canceledComparePercentage'] < 0 ? 'lower' : ''}} ">
                    {{ $projectStatus['canceledComparePercentage'] }}%
                  </span>
                  @php
                  $highLess = 'Higher';
                  if ($projectStatus['canceledComparePercentage'] < 0) { $highLess='Less' ; } @endphp 
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
    </div>
    <!-- project status car end -->

    <!-- total Customer and products graph start -->
    <div class="row mt-4">
        <div class="col-lg-8">
            <div class="chart-box-wrap">
                <div class="graph-head mb-15">
                    <h5>Total Customer</h5>
                </div>
                <div id="totalCustomer"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="chart-box-wrap status-graph-box">
                <div class="graph-head">
                    <h5>Customer Active Status</h5>
                </div>
                <div class="product-progress-box">
                    <div class="txt">
                        <h5>{{ $customerStatusInfos['totalCustomers'] }}</h5>
                        <p>Total Customer</p>
                    </div>
                    <canvas id="customerStatus"></canvas>
                    <div id="legend" class="legend center-legend"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- total Customer and products graph end -->

    <!-- client graph start -->
    <div class="row mt-4">
        <div class="col-lg-8">
            <div class="chart-box-wrap">
                <div class="graph-head custom-flex mb-15">
                    <h5>Client</h5>
                    <div class="header-flex">
                        <div>
                            <span style="background-color: #436CFF;"></span> Hosting Client
                        </div>
                        <div>
                            <span style="background-color: #00AB55;"></span> Marketing Client
                        </div>
                        <div>
                            <span style="background-color: #FFAB00;"></span> Website Client
                        </div>
                        <div>
                            <span style="background-color: #ED5763;"></span> Project Client
                        </div>
                    </div>
                </div>
                <div id="clientTypeGraph"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="top-active-company-user">
                <h4 class="mb-15">Top Active Customer</h4>
                <div class="user-list">
                  @foreach ($topActiveCustomers->slice(0,7) as $index => $topCustomer)
                    <!-- user one start -->
                    <div class="media">
                      @if ($topCustomer->customer->avatar)
                      <img src="{{ asset($topCustomer->customer->avatar) }}" alt="avatar" class="img-fluid avatar" />
                      @else
                      <img src="{{ asset('uploads/users/avatar-9.png') }}" alt="avatar" class="img-fluid avatar" />
                      @endif 
                        <div class="media-body">
                            <h5>{{ $topCustomer->customer->name }} </h5>
                            <p>{{ $topCustomer->customer->email }}</p>
                        </div>

                        @if ($index == 0)
                            <img src="{{ asset('assets/images/icons/trophy-1.svg') }}" alt="T" class="img-fluid">
                        @elseif ($index == 1)
                            <img src="{{ asset('assets/images/icons/trophy-2.svg') }}" alt="T" class="img-fluid">
                        @else
                            <img src="{{ asset('assets/images/icons/trophy-3.svg') }}" alt="T" class="img-fluid">
                        @endif 
 
                    </div>
                    <!-- user one end --> 
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- client graph end -->

</section>
@endsection

@section('script') 
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- total user graph js start -->
<script>
  const totalCustomerPerMonth = @json($totalCustomerPerMonth);
    var options = {
      series: [{
        name: 'Total',
        data: totalCustomerPerMonth
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
          columnWidth: '30%',
          borderRadius: 2,
          endingShape: 'rounded',

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
        strokeDashArray: 4,
        xaxis: {
          lines: {
            show: false
          }
        },
      },
      tooltip: {
        y: {
          formatter: function(val) {
            return " " + val + " Customers"
          }
        }
      }
    };

    var chart = new ApexCharts(document.querySelector("#totalCustomer"), options);
    chart.render();
  </script>
  <!-- total user graph js end -->

  <!-- customer status graph js start -->
  <script>
    const active = @json($customerStatusInfos['activeCustomers']);
    const inactive = @json($customerStatusInfos['inActiveCustomers']);

    var datas = [active, inactive];

    var backgroundColor = ['#36B37E', '#ED5763'];
    var ctx = document.getElementById('customerStatus').getContext('2d');
    var myDoughnutChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Active Customer', 'Inactive Customer'],
        datasets: [{
          label: 'Customer Status',
          data: datas,
          backgroundColor: backgroundColor,
          hoverOffset: 4
        }]
      },
      options: {
        plugins: {
          legend: {
            display: false
          }
        },
        title: {
          display: true,
          text: 'Chart Donut'
        },
        legend: {
          display: false
        },
        cutout: '70%',
        radius: 110
      }
    });

    // Calculate percentages
    var total = datas.reduce((a, b) => a + b, 0);
    var percentages = datas.map((value) => {
      if (value === 0 || total === 0) {
        return "0%";
      } else {
        return ((value / total) * 100).toFixed(0) + "%";
      }
    });

    // Generate and display the custom legend
    var legendHtml = "<ul>";
    for (var i = 0; i < myDoughnutChart.data.labels.length; i++) {
      legendHtml +=
        '<li>' + '<p> <span style="background-color:' +
        myDoughnutChart.data.datasets[0].backgroundColor[i] +
        '"></span> ' + myDoughnutChart.data.labels[i] + '</p>' + '<h6>' + percentages[i] + '</h6>' +
        "</li>";
    }
    legendHtml += "</ul>";
    document.getElementById("legend").innerHTML = legendHtml;
  </script>
  <!-- product status graph js end -->

  <!-- company user graph js start -->
  <script>

    var options = {
      series:  [{
        name: 'hosting',
        data: [31, 40, 28, 51, 42, 109, 100]
      }, {
        name: 'marketing',
        data: [21, 12, 23, 29, 15, 66, 81]
      }, {
        name: 'project',
        data: [11, 32, 45, 32, 34, 52, 41]
      }, {
        name: 'website',
        data: [51, 22, 35, 72, 14, 22, 31]
      }],
      chart: {
        height: 350,
        type: 'area',
        toolbar: {
          show: false
        },
      },
      dataLabels: {
        enabled: false
      },
      grid: {
        show: true,
        borderColor: '#C2C6CE',
        strokeDashArray: 0,
        xaxis: {
          lines: {
            show: false
          }
        },
      },
      colors: ['#00AB55', '#FFAB00','#436CFF','#ED5763'],
      stroke: {
        curve: 'smooth'
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      },
      tooltip: {
        x: {
          format: 'dd/MM/yy HH:mm'
        },
      },
      legend: {
        show: false
      },
      toolbar: {
        show: false
      }
    };

    var chart = new ApexCharts(document.querySelector("#clientTypeGraph"), options);
    chart.render();
  </script>
  <!-- company user graph js end -->

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