@extends('layouts.auth')

@section('title', 'Dashboard')

@section('style')
    <link rel="stylesheet" href="{{ url('assets/css/earning.css') }}" />
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
                    <h3>${{ $totalIncome }}</h3>
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
                    <h3>${{ $totalExpense }}</h3>
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
                    <h3>${{ $totalProfit }}</h3>
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
                    <h3>{{ $totalCustomer }}</h3>
                    <div class="d-flex">
                        <span>+{{ $totalCustomerInc }}%</span>
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
                    <h3>{{ $newCustomer }}</h3>
                    <div class="d-flex">
                        <span>+{{ $newCustomerInc }}%</span>
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
                    <h3>{{ $repeatedCustomer }}</h3>
                    <div class="d-flex">
                        <span>+{{ $repeatCustomerInc }}%</span>
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
                                @if (count($customers) > 0)
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    @if ($customer->avatar)
                                                        <img src="{{ asset($customer->avatar) }}" alt="avatar"
                                                            class="img-fluid" />
                                                    @else
                                                        <img src="{{ asset('uploads/users/avatar-1.png') }}"
                                                            alt="default avatar" class="img-fluid" />
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
@endsection
