@extends('layouts.auth')

@section('title', 'Customer List Page')

@section('style')

@endsection

@section('content')

    <main class="main-page-wrapper marketplace-page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- page title -->
                    <div class="page-title">
                        <h1>All Notifications</h1>

                        <!-- filter -->
                        <form action="" method="GET" id="myForm">
                            <div class="page-filter">
                                <div class="dropdown">

                                    <button class="btn" type="button" id="dropdownBttn" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Filter
                                        <i class="fas fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item filterItem" href="#" data-value="">All
                                                Notification</a></li>
                                        <li>
                                            <a class="dropdown-item filterItem" href="#" data-value="yesterday">
                                                Yesterday
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item filterItem" href="#" data-value="last_7_days">
                                                Last 7 days
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item filterItem" href="#" data-value="last_30_days">
                                                Last 30 days
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item filterItem" href="#" data-value="last_365_days">
                                                Last 1 year
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <input type="hidden" name="status" id="inputField">
                        </form>
                        <!-- filter -->
                    </div>
                    <!-- page title -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="notification-box-wrapper">
                        @if (count($notifications) > 0)
                            @foreach ($notifications as $notification)
                                @if ($notification->action_link == 'customers.show')
                                    <a href="{{ route('customers.show', $notification->action_id) }}">{{ $notification->message }}</a>
                                @elseif ($notification->action_link == 'task.show')
                                    <a href="{{ route('task.show', $notification->action_id) }}">{{ $notification->message }}</a>
                                @elseif ($notification->action_link == 'projects.single')
                                    <a href="{{ route('projects.single', $notification->action_id) }}">{{ $notification->message }}</a>
                                @endif
                            @endforeach
                        @else
                            <div class="text-center d-flex justify-content-center align-items-center flex-column"
                                style="min-height: 50vh;">
                                <i class="fa-solid fa-circle-exclamation" style="font-size: 2rem; color:#E03137;"></i>
                                <h6 style="font-size: 1rem; font-weight: 700;" class="mt-3">No Notification Found!</h6>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">

                    {{-- {!! $notifications->links('pagination::gnl-pagination') !!} --}}
                </div>
            </div>
        </div>
    </main>

    </main>
@endsection
