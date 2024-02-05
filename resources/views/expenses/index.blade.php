@extends('layouts.auth')

@section('title', 'Total Expense')

@section('style')
    <link rel="stylesheet" href="{{ url('assets/css/earning.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/analytics.css') }}" />
@endsection

@section('content')
    <section class="main-page-wrapper analytics-page-wrapper">
        <!-- page title start-->
        <div class="page-title page-title-one">
            <h1>Expenses</h1>
            <!-- bttn -->
            <div class="page-bttn d-flex">
                <div class="dropdown">
                    <a class="bttn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./assets/images/icons/calendar-2.svg" alt="">This Month<i
                            class="fas fa-angle-down"></i>
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

                <div class="common-bttn ms-3">
                    {{-- <a href="#" type="button" class="add" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop"><i class="fas fa-plus"></i> Add Expenses</a> --}}

                    <a href="#" class="add" data-bs-toggle="modal"
                        data-bs-target="#staticBackdropAdd"><i class="fas fa-plus"></i> Add Expenses</a>

                </div>
            </div>
            <!-- bttn -->
        </div>
        <!--page title end-->

        <div class="row mt-3">
            <!-- card item start -->
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                <div class="analytics-card-box">
                    <div class="top">
                        <img src="./assets/images/icons/money-recive.svg" alt="I" class="img-fluid money-recive">
                        <p>Fixed Expenses</p>
                    </div>
                    <h4>$30,000</h4>
                    <div class="bottom-text">
                        <h5>+1.48%</h5>
                        <p>Higher than last month</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                <div class="analytics-card-box">
                    <div class="top">
                        <img src="./assets/images/icons/money-recive.svg" alt="I" class="img-fluid money-recive">
                        <p>Variable Expenses</p>
                    </div>
                    <h4>$10,000</h4>
                    <div class="bottom-text">
                        <h5 class="red">+0.12%</h5>
                        <p>Higher than last month</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                <div class="analytics-card-box">
                    <div class="top">
                        <img src="./assets/images/icons/money-recive.svg" alt="I" class="img-fluid money-recive">
                        <p>Total Expenses</p>
                    </div>
                    <h4>$5000</h4>
                    <div class="bottom-text">
                        <h5>+1.48%</h5>
                        <p>Higher than last month</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                <div class="analytics-card-box">
                    <div class="top">
                        <img src="./assets/images/icons/money-recive.svg" alt="I" class="img-fluid money-recive">
                        <p>Marketing Tax</p>
                    </div>
                    <h4>$15,000</h4>
                    <div class="bottom-text">
                        <h5>+1.48%</h5>
                        <p>Higher than last month</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                <div class="analytics-card-box">
                    <div class="top">
                        <img src="./assets/images/icons/money-recive.svg" alt="I" class="img-fluid money-recive">
                        <p>Project Tax</p>
                    </div>
                    <h4>$12,000</h4>
                    <div class="bottom-text">
                        <h5>+1.48%</h5>
                        <p>Higher than last month</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4">
                <div class="analytics-card-box">
                    <div class="top">
                        <img src="./assets/images/icons/money-recive.svg" alt="I" class="img-fluid money-recive">
                        <p>Total Tax</p>
                    </div>
                    <h4>$6,000</h4>
                    <div class="bottom-text">
                        <h5 class="red">-0.12%</h5>
                        <p>Higher than last month</p>
                    </div>
                </div>
            </div>
            <!-- card item end -->
        </div>
        <!--page title end-->

        <!-- total expense and analytics graph start -->
        <div class="row mb-15">
            <div class="col-lg-8">
                <div class="chart-box-wrap">
                    <div class="graph-head mb-15">
                        <div class="total-earning">
                            <h5>Expenses</h5>
                        </div>
                    </div>
                    <div id="totalUser"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="chart-box-wrap">
                    <div class="graph-head">
                        <h5>Expenses Analytics</h5>
                    </div>
                    <div class="product-progress-box">
                        <div class="txt">
                            <h5>12,375</h5>
                            <p>Total Expenses</p>
                        </div>
                        <canvas id="productStatus"></canvas>
                        <div id="legend" class="legend center-legend"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- total expene and analytics graph end -->

        <!-- tax graph start -->
        <div class="row">
            <div class="col-lg-12">
                <div class="payment-from-copany-user">
                    <div class="d-flex justify-content-between">
                        <h4 class="common-subtitle">Tax</h4>
                        <ul class="graph-dot">
                            <li><i class="fas fa-circle earning"></i> Current Year</li>
                            <li><i class="fas fa-circle expense"></i> Previous Year</li>
                        </ul>
                    </div>
                    <!-- graph placeholde -->
                    <img src="./uploads/graph/grap-03.png" alt="a" class="img-fluid d-block w-100">
                </div>
            </div>
        </div>
        <!-- tax graph end -->

        <!-- active clients start -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="payment-from-copany-user expense-table">
                    <div class="d-flex mb-15">
                        <h4 class="common-subtitle">Expenses History</h4>
                        <div class="actions">
                            <div class="dropdown">
                                <a class="bttn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ request()->filter ? $filterLabels[request()->filter] : "All History" }} <i class="fas fa-angle-down ms-2"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="{{ request()->is('expenses/today') ? 'active' : '' }}">
                                        <a class="dropdown-item" href="{{ route('expense.index', ['filter' => 'today']) }}">
                                            Today
                                        </a>
                                    </li>
                                    <li class="{{ request()->is('expenses/yesterday') ? 'active' : '' }}">
                                        <a class="dropdown-item" href="{{ route('expense.index', ['filter' => 'yesterday']) }}">
                                            Yesterday
                                        </a>
                                    </li>
                                    <li class="{{ request()->is('expenses/last7days') ? 'active' : '' }}">
                                        <a class="dropdown-item" href="{{ route('expense.index', ['filter' => 'last7days']) }}">
                                            Last 7 days
                                        </a>
                                    </li>
                                    <li class="{{ request()->is('expenses/thisMonth') ? 'active' : '' }}">
                                        <a class="dropdown-item" href="{{ route('expense.index', ['filter' => 'thisMonth']) }}">
                                            This Month
                                        </a>
                                    </li>
                                    <li class="{{ request()->is('expenses/thisYear') ? 'active' : '' }}">
                                        <a class="dropdown-item" href="{{ route('expense.index', ['filter' => 'thisYear']) }}">
                                            This Year
                                        </a>
                                    </li>
                                </ul>
                            </div>


                            <a href="#" class="bttn" data-bs-toggle="modal"
                                data-bs-target="#staticBackdropAdd"><i class="fas fa-plus me-2"></i> Add Expenses</a>
                        </div>
                    </div>
                    <div class="user-payment-table">
                        <table>
                            <tr>
                                <th>Title</th>
                                <th>Payment Description</th>
                                <th>Payment Date</th>
                                <th>Service Type</th>
                                <th>Expenses Type</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            <!-- expense single item start -->
                            @if ( count($expenses) > 0 )
                                @foreach ($expenses as $expense)

                                    <tr>
                                        <td>
                                            <p>{{ $expense->title }}</p>
                                        </td>
                                        <td>
                                            <p>{{ Str::substr($expense->description, 0, 48) }}</p>
                                        </td>
                                        <td>
                                            <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $expense->pay_date)->format('d M, Y') }}
                                            </p>
                                        </td>
                                        <td>
                                            <p>{{ $expense->service_type }}</p>
                                        </td>
                                        <td>
                                            <p class="fixed">{{ $expense->type }}</p>
                                        </td>
                                        <td>
                                            <p>${{ $expense->amount }}</p>
                                        </td>
                                        <td>
                                            <a class="invoice" href="#">
                                                Invoice
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            @else
                                <tr>
                                    <td class="text-center" colspan="7">@component( 'components.empty-data-component' , ['dynamicData' => 'No found customer history'])@endcomponent</td>
                                </tr>
                            @endif
                            <!-- expense single item end -->

                        </table>
                    </div>
                    <!--pagination started-->
                    {!! $expenses->links('pagination::gnl-pagination') !!}
                    <!--pagination end-->
                </div>
            </div>
        </div>
        <!-- active clients end -->

    </section>

    <!-- add expense modal start -->
    <div class="custom-modal custom-modal-hosting">
        <div class="modal fade" id="staticBackdropAdd" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropAddLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-content-hosting">
                    <div class="modal-header modal-header-hosting">
                        <h1 class="modal-title" id="staticBackdropAddLabel">Add Expenses</h1>
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="fas fa-close"></i>
                        </button>
                    </div>
                    <div class="modal-body modal-body-hosting">
                        <form method="post" action="{{ url('/expenses/store') }}" class="common-form"
                            enctype="multipart/form-data">
                            <input type="hidden" name="type" class="paymentType">
                            <input type="hidden" name="lead_type_id" class="lead_type_id">
                            @csrf
                            <div class="add-customer-form add-customer-form-hosting">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group form-error">
                                            <label for="title">Title</label>
                                            <input type="text" placeholder="Enter name" id="title" name="title"
                                                class="form-control" value="{{ old('title') }}" />
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group form-error">
                                            <label for="date">Payment Date</label>
                                            <input type="date" placeholder="" id="date" name="pay_date"
                                                class="form-control" value="{{ old('pay_date') }}" />
                                            @error('pay_date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-group form-error">
                                            <label for="lead_type_id">Service Type</label>

                                            <div class="common-dropdown common-dropdown-two common-dropdown-three">
                                                <div class="dropdown dropdown-two dropdown-three">
                                                    <button class="btn w-100" type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <div class="setLeadType">Select Below</div><i
                                                            class="fas fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu w-100 dropdown-menu-two dropdown-menu-three">
                                                        @foreach ($lead_types as $leadType)
                                                        <li>
                                                            <a onclick="setLeadType('{{ $leadType->lead_type_id }}', '{{ $leadType->name }}')" class="dropdown-item dropdown-item-two lead-type"
                                                                href="javascript:;">{{
                                                                $leadType->name }} Lead</a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>

                                            @error('lead_type_id')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-group form-error">
                                            <label for="amount">Amount</label>
                                            <input type="text" placeholder="$0000" id="amount" name="amount"
                                                class="form-control" value="{{ old('amount') }}">
                                            @error('amount')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group form-error">
                                            <label for="tax">Tax</label>
                                            <input type="text" placeholder="$0000" id="tax" name="tax"
                                                class="form-control" value="{{ old('tax') }}">
                                            @error('tax')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group form-error form-group-four">
                                            <label for="website">Payment Type</label>
                                            <div class="common-dropdown">
                                                <div class="dropdown">
                                                    <button class="btn w-100" type="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <span class="setPaymentType">Active</span><i class="fas fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-two dropdown-menu-three w-100">
                                                        <li><a onclick="paymentType('fixed')" class="dropdown-item" href="javascript:;">Fixed<i
                                                                    class="fas fa-check"></i></a></li>
                                                        <li><a onclick="paymentType('variable')"class="dropdown-item" href="javascript:;">Variable</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @error('type')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="description" placeholder="Write Description" class="form-control">{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-bttn">
                                            <button type="button" class="btn btn-cancel"
                                                data-bs-dismiss="modal">Cancel</button>
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
    <!-- add expense modal end -->

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const paymentType = (type) => {
            $('.paymentType').val(type);
            capitalizeType = type.charAt(0).toUpperCase() + type.slice(1);
            $(".setPaymentType").html(capitalizeType);
        }

        const setLeadType = (leadTypeId, leadTypeName) => {
            $('.lead_type_id').val(leadTypeId);
            $('.setLeadType').text(leadTypeName);
        }
    </script>

    <!-- product status graph js start -->
    <script>
        var datas = [70, 30];

        var backgroundColor = ['#194BFB', '#ED5763'];
        var ctx = document.getElementById('productStatus').getContext('2d');
        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Fixed Expenses', 'Variable Expenses'],
                datasets: [{
                    label: 'Expense Status',
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

        var chart = new ApexCharts(document.querySelector("#totalUser"), options);
        chart.render();
    </script>
    <!-- total user graph js end -->
@endsection
