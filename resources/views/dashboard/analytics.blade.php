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

    <!-- project status car start -->
    <div class="row">
        <div class="col-12 col-md-6 col-xl-4">
            <div class="customer-status-box">
                <h5>
                    <img src="./assets/images/icons/completed.svg" alt="icon" class="img-fluid" />
                    Total Completed Project
                </h5>
                <h3>345,435</h3>
                <div class="d-flex">
                    <span>+4.3%</span>
                    <p>Higher than last month</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4">
            <div class="customer-status-box">
                <h5>
                    <img src="./assets/images/icons/progress.svg" alt="icon" class="img-fluid" />
                    Total Project In Progress
                </h5>
                <h3>1,695</h3>
                <div class="d-flex">
                    <span>+4.3%</span>
                    <p>Higher than last month</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-4">
            <div class="customer-status-box">
                <h5>
                    <img src="./assets/images/icons/down.svg" alt="icon" class="img-fluid" />
                    Total Cancelled Project
                </h5>
                <h3>520</h3>
                <div class="d-flex">
                    <span class="lower">-0.12%</span>
                    <p>Less than last month</p>
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
            <div class="chart-box-wrap">
                <div class="graph-head">
                    <h5>Customer Active Status</h5>
                </div>
                <div class="product-progress-box">
                    <div class="txt">
                        <h5>62,375</h5>
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
                    </div>
                </div>
                <div id="clientTypeGraph"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="top-active-company-user">
                <h4 class="mb-15">Top Active Customer</h4>
                <div class="user-list">
                    <!-- user one start -->
                    <div class="media">
                        <img src="./uploads/users/avatar-1.png" alt="A" class="img-fluid">
                        <div class="media-body">
                            <h5>Dan Bergstrom </h5>
                            <p>zlincoln@unpixel.com</p>
                        </div>
                        <img src="./assets/images/icons/trophy-1.svg" alt="T" class="img-fluid">
                    </div>
                    <!-- user one end -->
                    <!-- user one start -->
                    <div class="media">
                        <img src="./uploads/users/avatar-3.png" alt="A" class="img-fluid">
                        <div class="media-body">
                            <h5>Dan Bergstrom </h5>
                            <p>Sasha.Fisher@gmail.com</p>
                        </div>
                        <img src="./assets/images/icons/trophy-2.svg" alt="T" class="img-fluid">
                    </div>
                    <!-- user one end -->
                    <!-- user one start -->
                    <div class="media">
                        <img src="./uploads/users/avatar-4.png" alt="A" class="img-fluid">
                        <div class="media-body">
                            <h5>Dan Bergstrom </h5>
                            <p>Devon74@yahoo.com</p>
                        </div>
                        <img src="./assets/images/icons/trophy-3.svg" alt="T" class="img-fluid">
                    </div>
                    <!-- user one end -->
                    <!-- user one start -->
                    <div class="media">
                        <img src="./uploads/users/avatar-7.png" alt="A" class="img-fluid">
                        <div class="media-body">
                            <h5>Dan Bergstrom </h5>
                            <p>Leta.Hand@gmail.com</p>
                        </div>
                        <img src="./assets/images/icons/trophy-3.svg" alt="T" class="img-fluid">
                    </div>
                    <!-- user one end -->
                    <!-- user one start -->
                    <div class="media">
                        <img src="./uploads/users/avatar-5.png" alt="A" class="img-fluid">
                        <div class="media-body">
                            <h5>Dan Bergstrom </h5>
                            <p>Yvonne.Klein26@yahoo.com</p>
                        </div>
                        <img src="./assets/images/icons/trophy-3.svg" alt="T" class="img-fluid">
                    </div>
                    <!-- user one end -->
                </div>
            </div>
        </div>
    </div>
    <!-- client graph end -->

</section>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
            return "$ " + val + " thousands"
          }
        }
      }
    };

    var chart = new ApexCharts(document.querySelector("#totalCustomer"), options);
    chart.render();
  </script>
  <!-- total user graph js end -->

  <!-- product status graph js start -->
  <script>
    var datas = [70, 30];

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
      series: [{
        name: 'series1',
        data: [31, 40, 28, 51, 42, 109, 100]
      }, {
        name: 'series2',
        data: [21, 12, 23, 29, 15, 66, 81]
      }, {
        name: 'series2',
        data: [11, 32, 45, 32, 34, 52, 41]
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
      colors: ['#00AB55', '#FFAB00','#436CFF'],
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
        show: false // Hide the legend
      },
      toolbar: {
        show: false // Hide the top toolbar
      }
    };

    var chart = new ApexCharts(document.querySelector("#clientTypeGraph"), options);
    chart.render();
  </script>
  <!-- company user graph js end -->
@endsection 