@extends('layouts.auth')

@section('title', 'Customer List Page')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/project.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/todo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/time-range.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/calender/calendar.css') }}" />
@endsection

@section('content')
    <section class="main-page-wrapper">
        <!-- page title -->
        <div class="page-title">
            <h1 class="pb-0">To Do List</h1>
        </div>
        <!-- page title -->

        <div class="row">
            <div class="col-lg-3">
                <!-- my task list box start -->
                <div class="my-task-list-box">
                    <div class="header">
                        <h4>My Task</h4>
                        <a href="#" class="add inter" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
                                class="fas fa-plus me-2"></i>Task</a>
                    </div>

                    <!-- task list -->
                    <div class="task-list-area custom-scroll-bar" id="task-list-area">
                        <!-- task item start -->
                        @if (count($tasks) > 0)
                            @foreach ($tasks as $task)
                                <div data-delete-url="{{ url('/to-do-list/' . $task->task_id . '/delete') }}"
                                    data-task-id="{{ $task->task_id }}"></div>
                                <div class="task-item">
                                    <div class="top">
                                        <span><i class="fas fa-circle"></i> {{ ucfirst($task->priority) }}</span>
                                        {{-- <a href="#"><i class="fas fa-ellipsis-vertical"></i></a> --}}

                                        <div class="btn-group dropstart">
                                            <a href="#" type="button" class="ellipse dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false" aria-expanded="false"><i
                                                    class="fa-solid fa-ellipsis-vertical"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-start">
                                                <li>
                                                    <a class="dropdown-item" href="javascript:;"
                                                        onclick="editTaskModal('{{ $task->task_id }}')">Edit
                                                        Task</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript:;"
                                                        onclick="deleteTask()">Delete
                                                        Task</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h4><img src="assets/images/icons/camera-2.svg" alt="a" class="img-fluid">
                                        {{ $task->title }}</h4>
                                    <p>{{ Str::substr($task->description, 0, 48) }}</p>
                                    <hr />

                                    @if ($task->customer)
                                        <div class="media">
                                            @if ($task->customer->avatar)
                                                <img src="{{ asset($task->customer->avatar) }}" alt="avatar"
                                                    class="img-fluid avatar" />
                                            @else
                                                <img src="{{ asset('uploads/users/avatar-9.png') }}" alt="default avatar"
                                                    class="img-fluid avatar" />
                                            @endif
                                            <div class="media-body">
                                                <h5>{{ $task->customer->name }}</h5>
                                                <span>{{ $task->customer->designation }}</span>
                                            </div>
                                        </div>
                                        <hr />
                                    @endif

                                    @if ($task->project)
                                        <div class="media">
                                            @if ($task->project->thumbnail)
                                                <img src="{{ asset($task->project->thumbnail) }}" alt="avatar"
                                                    class="img-fluid avatar" />
                                            @else
                                                <img src="{{ asset('uploads/projects/project-01.png') }}" alt="a"
                                                    class="img-fluid avatar">
                                            @endif

                                            <div class="media-body">
                                                <h5>{{ $task->project->title }}</h5>
                                                <span><img src="/assets/images/icons/close-3.svg" alt="a"
                                                        class="img-fluid "> {{ $task->project->remaining_days }} Days
                                                    Remaining</span>
                                            </div>
                                        </div>
                                        <hr />
                                    @endif


                                    <div class="ftr">
                                        <p><img src="assets/images/icons/calendar.svg" alt="a" class="img-fluid">
                                            {{ $task->created_at->diffForHumans() }}</p>
                                        <p><img src="assets/images/icons/clock.svg" alt="a" class="img-fluid">
                                            {{ $task->created_at->format('g:i A') }}

                                        </p>
                                    </div>

                                </div>
                                <!-- task item end -->
                            @endforeach
                        @endif
                    </div>
                    <!-- task list -->
                </div>
                <!-- my task list box end -->
            </div>
            <div class="col-lg-9">
                <!-- schedule part here -->
                <div class="schedule-part-box">
                    <div class="header">
                        <a href="#"><i class="fas fa-plus me-2"></i> Schedule</a>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div id="navigation">
                                <div id="currentMonthYear"></div>
                                <button id="prevMonth"><i class="fas fa-chevron-left"></i></button>

                                <button id="nextMonth"><i class="fas fa-chevron-right"></i></button>
                            </div>
                            <table id="calendar"></table>

                            <div class="metting-notice-day">
                                @if (count($tomorrowTasks) > 0)
                                    <div class="notice-item">
                                        <h4>TOMORROW {{ now()->addDay(1)->format('j/m/Y') }}</h4>
                                        @foreach ($tomorrowTasks as $task)
                                            <div>
                                                <p class="m-0">{{ $task->start_time }} -
                                                    {{ \Carbon\Carbon::parse($task->end_time)->format('g:i A') }}</p>
                                                <p class="m-0">{{ $task->description }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                @if (count($nextDayOfTomorrowTasks) > 0)
                                    <div class="notice-item">
                                        <h4>{{ strtoupper(now()->addDay(2)->format('l j/m/Y')) }}</h4>
                                        @foreach ($nextDayOfTomorrowTasks as $task)
                                            <div>
                                                <p class="m-0">{{ $task->start_time }} -
                                                    {{ \Carbon\Carbon::parse($task->end_time)->format('g:i A') }}</p>
                                                <p class="m-0">{{ $task->description }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                @if (count($afterNextDayOfTomorrowTasks) > 0)
                                    <div class="notice-item">
                                        <h4>{{ strtoupper(now()->addDay(3)->format('l j/m/Y')) }}</h4>
                                        @foreach ($afterNextDayOfTomorrowTasks as $task)
                                            <div>
                                                <p class="m-0">{{ $task->start_time }} -
                                                    {{ \Carbon\Carbon::parse($task->end_time)->format('g:i A') }}</p>
                                                <p class="m-0">{{ $task->description }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6 text-left">
                            {{-- Show task by date --}}
                            <div class="showTaskByDate"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- task add modal start -->
    <div class="custom-modal">
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header modal-header-two">
                        <h1 class="modal-title" id="staticBackdropLabel">Add Task</h1>
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="fas fa-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ url('/to-do-list/store') }}" class="common-form another-form"
                            enctype="multipart/form-data">
                            <input type="hidden" name="project_id" class="setProjectId">
                            <input type="hidden" name="priority" class="priority">
                            <input type="hidden" name="manualyCustomer" id="manualyCustomer" value="false">
                            <input type="hidden" name="status" id="status" value="active">
                            <input type="hidden" name="service_type_id" class="service_type_id">
                            <input type="hidden" name="lead_type_id" class="lead_type_id">
                            @csrf

                            <div class="add-customer-form">
                                <div class="row">

                                    <div class="col-xl-12">
                                        <div class="row">
                                            <!--modal left part start-->
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="form-group mt-0">
                                                            <div class="customer-modal-title">
                                                                <h3>Task Information</h3>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="form-group form-error mt-0">
                                                            <label for="title">Task Title</label>
                                                            <input type="text" placeholder="Enter title"
                                                                id="title" name="title" class="form-control"
                                                                value="{{ old('title') }}" required>
                                                            @error('title')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="form-group form-error">
                                                            <label for="website">Priority</label>
                                                            <div class="common-dropdown common-dropdown-two">
                                                                <div class="dropdown dropdown-two">
                                                                    <button class="btn" type="button"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <div class="setPriority">Select Priority</div>
                                                                        <i class="fas fa-angle-down"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu dropdown-menu-two">
                                                                        <li><a onclick="updatePriority('basic')"
                                                                                class="text-primary dropdown-item dropdown-item-two"
                                                                                href="javascript:;">Basic<i
                                                                                    class="fas fa-check"></i></a></li>
                                                                        <li><a onclick="updatePriority('important')"
                                                                                class="text-warning dropdown-item dropdown-item-two"
                                                                                href="javascript:;">Important</a>
                                                                        </li>
                                                                        <li><a onclick="updatePriority('priority')"
                                                                                class="text-danger dropdown-item dropdown-item-two"
                                                                                href="javascript:;">Priority</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            @error('priority')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12">
                                                        <div class="form-group form-error">
                                                            <label for="date">Date</label>
                                                            <input type="date" placeholder="dd-mm-yyyy" id="date"
                                                                name="date" class="form-control"
                                                                value="{{ old('date') }}" required>
                                                            @error('date')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">

                                                        {{-- <div class="form-group form-error">
                                                            <label for="schedule">Schedule</label>
                                                            <input type="time" placeholder="dd-mm-yyyy" id="schedule"
                                                                name="schedule" class="form-control"
                                                                value="{{ old('schedule') }}" required>
                                                            @error('schedule')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div> --}}

                                                        <div class="form-group form-error">
                                                            <label for="schedule">Schedule</label>
                                                            <div id="datetimepickerDate" class="input-group timerange">
                                                                <input class="form-control" type="text" name="schedule" placeholder="--:- -">
                                                                <span class="input-group-addon">
                                                                    <i class="fa-regular fa-clock"></i>
                                                                </span>
                                                            </div>
                                                            @error('schedule')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group form-error">
                                                            <label for="details">Description</label>
                                                            <textarea name="description" id="details" rows="7" class="form-control" placeholder="Enter details">{{ old('description') }}</textarea>
                                                            @error('description')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--modal left part end-->
                                            <div class="col-lg-6">
                                                <div class="project-add-scrollbar custom-scroll-bar">
                                                    <div class="customer-modal-title">
                                                        <h3>Project Information</h3>
                                                    </div>
                                                    <hr>
                                                    <div class="col-xl-12">
                                                        <div class="select-title">
                                                            <h3>Select Project</h3>
                                                        </div>
                                                        <!-- customer search form start -->


                                                        <div class="form-group search-by-name grid-100">
                                                            <div class="search-item">
                                                                <img src="{{ url('assets/images/icons/search-ic.svg') }}"
                                                                    alt="a" class="img-fluid search">

                                                                <input type="text" placeholder="Search by name"
                                                                    oninput="searchProject(event)" class="form-control"
                                                                    autocomplete="off">

                                                                <div class="projectSearch"></div>

                                                            </div>
                                                            @error('project_id')
                                                                <div class="text-danger">
                                                                    {{ $message }}</div>
                                                            @enderror

                                                        </div>

                                                        <div class="row loadProjectById"></div>

                                                        <div class="customer-modal-title">
                                                            <h3>Customer Information</h3>
                                                        </div>
                                                        <hr>

                                                        <!-- customer search form end -->
                                                        <div class="select-title">
                                                            <h3>Select Customer</h3>
                                                        </div>
                                                        <!-- customer search form start -->
                                                        <div class="form-group search-by-name mt-2"
                                                            style="grid-template-columns: 65% 35%!important">
                                                            <div class="search-item">
                                                                <img src="assets/images/icons/search-ic.svg"
                                                                    alt="a" class="img-fluid search">
                                                                <input type="text" placeholder="Search by name"
                                                                    id="search" class="form-control"
                                                                    autocomplete="off">
                                                                <div class="search-suggestions-box"></div>

                                                                <input type="hidden" name="customer_id" value=""
                                                                    id="customer_id">
                                                            </div>
                                                            <div class="avatar-btn">
                                                                <a onclick="addManualyCustomer()"
                                                                    data-bs-toggle="collapse" href="#collapseTwo"
                                                                    role="button" aria-expanded="false"
                                                                    aria-controls="collapseTwo" type="button">
                                                                    <img src="./assets/images/icons/user-add-two.svg"
                                                                        alt="a" class="img-fluid">Add
                                                                    Manually</a>
                                                            </div>
                                                        </div>
                                                        <div class="row" id="selectedCustomerUi"></div>
                                                        <!-- customer search form end -->

                                                        <!-- selected customer start  -->
                                                        <div class="row" id="selectedCustomerUi"></div>
                                                        <!-- selected customer end  -->

                                                        <!--collapse part start-->
                                                        <div class="collapse" id="collapseTwo">
                                                            <div class="card-body">
                                                                <div class="modal-body">
                                                                    <form action="" class="common-form">
                                                                        <div class="add-customer-form">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <hr>
                                                                                    <div class="form-group">
                                                                                        <label for="avatar">Profile
                                                                                            Image</label>
                                                                                        <input type="file"
                                                                                            name="avatar" id="avatar"
                                                                                            class="d-none">
                                                                                        <!-- upload avatar -->
                                                                                        <div class="d-flex">
                                                                                            <label for="avatar"
                                                                                                class="avatar">
                                                                                                <img src="./uploads/users/avatar-9.png"
                                                                                                    alt="avatar"
                                                                                                    class="img-fluid">
                                                                                                <span class="avatar-ol">
                                                                                                    <img src="./assets/images/icons/camera.svg"
                                                                                                        alt="camera"
                                                                                                        class="img-fluid">
                                                                                                </span>
                                                                                            </label>
                                                                                            <label for="avatar">
                                                                                                <p><img src="./assets/images/icons/anchor.svg"
                                                                                                        alt="anchor"
                                                                                                        class="img-fluid">
                                                                                                    Upload</p>
                                                                                            </label>
                                                                                        </div>
                                                                                        <!-- upload avatar -->
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-6">
                                                                                    <div class="form-group form-error">
                                                                                        <label for="name">Name</label>
                                                                                        <input type="text"
                                                                                            placeholder="Enter Name"
                                                                                            id="name" name="name"
                                                                                            class="form-control"
                                                                                            value="{{ old('name') }}">
                                                                                        @error('name')
                                                                                            <div class="text-danger">
                                                                                                {{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-6">
                                                                                    <div class="form-group form-error">
                                                                                        <label
                                                                                            for="designation">Designation</label>
                                                                                        <input type="text"
                                                                                            placeholder="Enter Designation"
                                                                                            id="designation"
                                                                                            name="designation"
                                                                                            class="form-control"
                                                                                            value="{{ old('designation') }}">
                                                                                        @error('designation')
                                                                                            <div class="text-danger">
                                                                                                {{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-6">
                                                                                    <div class="form-group form-error">
                                                                                        <label
                                                                                            for="email">E-mail</label>
                                                                                        <input type="email"
                                                                                            placeholder="Enter email address"
                                                                                            id="email" name="email"
                                                                                            class="form-control"
                                                                                            value="{{ old('email') }}">
                                                                                        @error('email')
                                                                                            <div class="text-danger">
                                                                                                {{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-6">
                                                                                    <div class="form-group form-error">
                                                                                        <label for="phone">Phone</label>
                                                                                        <input type="number"
                                                                                            placeholder="Enter phone number"
                                                                                            id="phone" name="phone"
                                                                                            class="form-control"
                                                                                            value="{{ old('phone') }}">
                                                                                        @error('phone')
                                                                                            <div class="text-danger">
                                                                                                {{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-6">
                                                                                    <div class="form-group form-error">
                                                                                        <label
                                                                                            for="location">Location</label>
                                                                                        <input type="text"
                                                                                            placeholder="Enter location"
                                                                                            id="location" name="location"
                                                                                            class="form-control"
                                                                                            value="{{ old('location') }}">
                                                                                        @error('location')
                                                                                            <div class="text-danger">
                                                                                                {{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-6">
                                                                                    <div class="form-group form-error">
                                                                                        <label for="website">Active
                                                                                            Status</label>
                                                                                        <div
                                                                                            class="common-dropdown common-dropdown-two common-dropdown-three">
                                                                                            <div
                                                                                                class="dropdown dropdown-two dropdown-three">
                                                                                                <button class="btn"
                                                                                                    type="button"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-expanded="false">
                                                                                                    <div class="setStatus">
                                                                                                        Active</div><i
                                                                                                        class="fas fa-angle-down"></i>
                                                                                                </button>
                                                                                                <ul
                                                                                                    class="dropdown-menu dropdown-menu-two dropdown-menu-three">
                                                                                                    <li>
                                                                                                        <a onclick="updateStatus('active')"
                                                                                                            class="dropdown-item dropdown-item-two"
                                                                                                            href="javascript:;">Active<i
                                                                                                                class="fas fa-check"></i></a>
                                                                                                    </li>
                                                                                                    <li>
                                                                                                        <a onclick="updateStatus('inactive')"
                                                                                                            class="dropdown-item dropdown-item-two"
                                                                                                            href="javascript:;">Inactive</a>
                                                                                                    </li>
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-6">
                                                                                    <div class="form-group form-error">
                                                                                        <label for="company">KVK</label>
                                                                                        <input type="text"
                                                                                            placeholder="Enter kvk number"
                                                                                            id="kvk" name="kvk"
                                                                                            class="form-control"
                                                                                            value="{{ old('kvk') }}">
                                                                                        @error('kvk')
                                                                                            <div class="text-danger">
                                                                                                {{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-6">
                                                                                    <div class="form-group form-error">
                                                                                        <label
                                                                                            for="service">Service</label>
                                                                                        <div
                                                                                            class="common-dropdown common-dropdown-two common-dropdown-three">
                                                                                            <div
                                                                                                class="dropdown dropdown-two dropdown-three">
                                                                                                <button class="btn"
                                                                                                    type="button"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-expanded="false">
                                                                                                    <div
                                                                                                        class="setServiceLabel">
                                                                                                        Select Below
                                                                                                    </div><i
                                                                                                        class="fas fa-angle-down"></i>
                                                                                                </button>
                                                                                                <ul
                                                                                                    class="dropdown-menu dropdown-menu-two dropdown-menu-three">
                                                                                                    @foreach ($services_types as $serviceType)
                                                                                                        <li>
                                                                                                            <a onclick="setServiceypeId('{{ $serviceType->service_type_id }}', '{{ $serviceType->name }}')"
                                                                                                                class="dropdown-item dropdown-item-two service-type"
                                                                                                                href="javascript:;">{{ $serviceType->name }}</a>
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>

                                                                                        @error('service_type_id')
                                                                                            <div class="text-danger">
                                                                                                {{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-6">
                                                                                    <div class="form-group form-error">
                                                                                        <label
                                                                                            for="company">Company</label>
                                                                                        <input type="text"
                                                                                            placeholder="Enter company name"
                                                                                            id="company" name="company"
                                                                                            class="form-control"
                                                                                            value="{{ old('company') }}">
                                                                                        @error('company')
                                                                                            <div class="text-danger">
                                                                                                {{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-6">
                                                                                    <div class="form-group form-error">
                                                                                        <label
                                                                                            for="website">Website</label>
                                                                                        <input type="text"
                                                                                            placeholder="Enter website"
                                                                                            id="website" name="website"
                                                                                            class="form-control"
                                                                                            value="{{ old('website') }}">
                                                                                        @error('website')
                                                                                            <div class="text-danger">
                                                                                                {{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-xl-12">
                                                                                    <div class="form-group form-error">
                                                                                        <label for="lead_type_id">Leads
                                                                                            Type</label>
                                                                                        <div
                                                                                            class="common-dropdown common-dropdown-two common-dropdown-three">
                                                                                            <div
                                                                                                class="dropdown dropdown-two dropdown-three">
                                                                                                <button class="btn"
                                                                                                    type="button"
                                                                                                    data-bs-toggle="dropdown"
                                                                                                    aria-expanded="false">
                                                                                                    <div
                                                                                                        class="setLeadLabel">
                                                                                                        Select Below
                                                                                                    </div><i
                                                                                                        class="fas fa-angle-down"></i>
                                                                                                </button>
                                                                                                <ul
                                                                                                    class="dropdown-menu dropdown-menu-two dropdown-menu-three">
                                                                                                    @foreach ($lead_types as $leadType)
                                                                                                        <li>
                                                                                                            <a onclick="setLeaTypeId('{{ $leadType->lead_type_id }}', '{{ $leadType->name }}')"
                                                                                                                class="dropdown-item dropdown-item-two lead-type"
                                                                                                                href="javascript:;">{{ $leadType->name }}</a>
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>

                                                                                        @error('lead_type_id')
                                                                                            <div class="text-danger">
                                                                                                {{ $message }}</div>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12">
                                                                                    <div class="form-group form-error">
                                                                                        <label
                                                                                            for="details">Details</label>
                                                                                        <textarea name="details" id="details" rows="7" class="form-control" placeholder="Enter details">{{ old('details') }}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--collapse part end-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--modal button start-->
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
                                    <!--modal button end-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- task add modal end -->


    <div class="showEditTaskModal"></div>

@endsection

@section('script')
    <script src="{{ asset('assets/js/time-range.js') }}"></script>
    <script src="{{ asset('assets/calender/calendar.js') }}"></script>

    <script>
        const searchProject = (e) => {
            const searchTerm = e.target.value;

            $.ajax({
                type: 'get',
                url: "{{ route('projectsearch') }}",
                data: {
                    query: searchTerm
                },
                success: function(data) {
                    $(".projectSearch").html(data)
                },
                error: function(error) {
                    console.error('Ajax request failed: ', error);
                }
            });

        }

        const getProjectId = (projectId) => {
            $.ajax({
                type: 'get',
                url: "{{ route('getProjectById') }}",
                data: {
                    projectId: projectId
                },
                success: function(data) {
                    $(".setProjectId").val(projectId);
                    $(".projectSearch").empty();
                    $(".loadProjectById").html(data);
                },
                error: function(error) {
                    console.error('Ajax request failed: ', error);
                }
            });
        }

        const removeProjectById = (projectId) => {
            $(".setCustomerId").val('');
            $(".loadProjectById").empty();
        }

        const updateStatus = (newStatus) => {
            document.getElementById('status').value = newStatus;
            capitalizeStatus = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
            $('.setStatus').html(capitalizeStatus);
        }


        const updatePriority = (priority) => {
            console.log(priority)
            $('.priority').val(priority);
            capitalizeStatus = priority.charAt(0).toUpperCase() + priority.slice(1);
            $('.setPriority').html(capitalizeStatus);
        }

        const addManualyCustomer = () => {
            const manualyCustomerInput = document.getElementById('manualyCustomer');
            const currentValue = manualyCustomerInput.value;
            const newValue = (currentValue === 'true') ? 'false' : 'true';
            manualyCustomerInput.value = newValue;
            const button = document.querySelector('button');
            button.classList.toggle('manualy-customer-active', newValue === 'true');
        }

        const setServiceypeId = (serviceTypeId, serviceLabel) => {
            $(".setServiceLabel").html(serviceLabel)
            $(".service_type_id").val(serviceTypeId)
        }

        const setLeaTypeId = (leadTypeId, leadLabel) => {
            $(".setLeadLabel").html(leadLabel)
            $(".lead_type_id").val(leadTypeId)
        }


        // Show edit task modal
        const editTaskModal = (taskId) => {
            $.ajax({
                url: '/to-do-list/edit',
                type: 'post',
                data: {
                    taskId: taskId
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },

                success: function(data) {
                    $(".showEditTaskModal").html(data);
                    $("#taskEdit").modal('show');
                },
                error: function(error) {
                    console.error('AJAX request error:', status, error);
                }
            });
        }

        const deleteTask = () => {
            console.log('id')
            const taskUrl = $('div[data-task-id]').data('delete-url');
            const taskId = $('div[data-task-id]').data('task-id');

            const isConfirmed = confirm("Are you sure you want to delete this task?");

            if (!isConfirmed) {
                return;
            }

            $.ajax({
                url: taskUrl,
                type: 'post',
                data: {
                    _method: "delete",
                    customer_id: taskId
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },

                success: function(data) {
                    $("#task-list-area").load(location.href + " #task-list-area>*", "");
                    window.location.href = "{{ url('/to-do-list') }}";
                },
                error: function(error) {
                    console.error('AJAX request error:', status, error);
                }
            });
        }

        // get schedule data by click
    </script>

    {{-- customer get by search ajax req --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchSuggestionsBox = document.querySelector('.search-suggestions-box');
            let searchInput = document.getElementById("search");
            searchInput.addEventListener('input', function() {
                var search = searchInput.value.trim();
                if (search.length === 0) {
                    searchSuggestionsBox.innerHTML = '';
                }
                fetchSearchResults(search);
            });

            function fetchSearchResults(searchTerm) {
                let currentURL = window.location.href;
                const baseUrl = currentURL.split('/').slice(0, 3).join('/');

                fetch(`${baseUrl}/search-customers?name=${searchTerm}`, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        displaySearchResults(data.message);
                    })
                    .catch(error => {
                        searchSuggestionsBox.innerHTML = '';
                        console.error('Error fetching search results:', error);
                    });
            }

            function displaySearchResults(customers) {

                searchSuggestionsBox.innerHTML = '';
                const baseUrl2 = window.location.href.split('/').slice(0, 3).join('/');

                customers.forEach(function(customer) {
                    var profileMarkup = `
                    <a href="#" class="select-customer" data-id="${customer.customer_id}">
                        <div class="selected-profile-box mt-0 bg-white border-0 p-0">
                        <div class="media">
                            <img src="${customer.avatar ? baseUrl2 + '/' + customer.avatar : '{{ url('uploads/users/avatar-9.png') }}'}" class="img-fluid avatar" alt="avatar">
                            <div class="media-body">
                                <h3>${customer.name}</h3>
                                <p>${customer.designation}</p>
                            </div>
                        </div>
                    </div>
                    </a>
                `;
                    searchSuggestionsBox.insertAdjacentHTML('beforeend', profileMarkup);
                });

                // select customer from suggest
                let selectedCustomerUi = document.getElementById('selectedCustomerUi');
                let customer_id = document.getElementById('customer_id');
                let selectCustomers = document.querySelectorAll('.select-customer');

                // Store selected customer IDs
                var selectedCustomers = [];

                // Loop through each customer
                selectCustomers.forEach(customer => {
                    customer.addEventListener('click', function(event) {
                        var customerId = this.getAttribute('data-id');

                        if (!selectedCustomers.includes(customerId)) {
                            selectedCustomers.push(customerId);

                            var avatar = this.querySelector('.media img').getAttribute('src');
                            var name = this.querySelector('.media-body h3').textContent;
                            var designation = this.querySelector('.media-body p').textContent;

                            let customerHTML = `
                            <div class="col-lg-6 prfile-box">
                                <div class="selected-profile-box mt-0 bg-white border-0 p-0">
                                    <div class="media">
                                        <img src="${avatar}" class="img-fluid avatar" alt="avatar">
                                        <div class="media-body">
                                            <h3>${name}</h3>
                                            <p>${designation}</p>
                                        </div>
                                        <a href="#" class="close-customer">
                                            <img src="{{ url('/assets/images/icons/close-2.svg') }}" alt="a" class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        `;

                            // Append the customer HTML to the selectedCustomerUi
                            selectedCustomerUi.innerHTML += customerHTML;

                            // Update the value of the input field
                            if (customer_id.value !== '') {
                                customer_id.value += ',' + customerId;
                            } else {
                                customer_id.value = customerId;
                            }
                        }
                    });
                });

            }
        });
    </script>

@endsection
