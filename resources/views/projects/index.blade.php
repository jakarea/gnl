@extends('layouts.auth')

@section('title', 'Projects')
@section('style')
<link rel="stylesheet" href="assets/css/project.css" />
@endsection
@section('content')
<section class="main-page-wrapper">

    <!-- page title -->
    <div class="page-title mb-4">
        <h1>Projects</h1>
        <!-- bttn -->
        <div class="common-bttn">
            <a href="#" class="add" data-bs-toggle="modal" data-bs-target="#staticBackdropProject"><i
                    class="fas fa-plus"></i>
                Add Project</a>
        </div>
        <!-- bttn -->
    </div>


    <div class="project-root-wrap">
        <div class="row align-items-center mb-4">
            <div class="col-lg-6">
                <h2 class="inner-title">All Project</h2>
            </div>
            <div class="col-lg-6">
                <form action="" id="myForm" method="GET">
                    <div class="common-dropdown project-dropdown text-end">
                        <div class="dropdown dropdown-porject-item">
                            <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if ($selectedStatus == 'in_progress')
                                In progress
                                @elseif ($selectedStatus == 'completed')
                                Completed
                                @else
                                All Project
                                @endif
                                <i class="fas fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu project-dropdown-menu">
                                <li>
                                    <a class="dropdown-item project-dropdown-item filterItems" href="#"
                                        data-value="">All Projects

                                        @if ($selectedStatus == '')
                                        <i class="fas fa-check"></i>
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item project-dropdown-item filterItems" href="#"
                                        data-value="cancel">
                                        Cancelled
                                        @if ($selectedStatus && $selectedStatus == 'cancel')
                                        <i class="fas fa-check"></i>
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item project-dropdown-item filterItems" href="#"
                                        data-value="in_progress">
                                        In Progress
                                        @if ($selectedStatus && $selectedStatus == 'in_progress')
                                        <i class="fas fa-check"></i>
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item project-dropdown-item filterItems" href="#"
                                        data-value="completed">Completed
                                        @if ($selectedStatus && $selectedStatus == 'completed')
                                        <i class="fas fa-check"></i>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <input type="hidden" name="status" id="inputField">
                    </div>
                </form>
            </div>

        </div>
        <div class="row">
            @foreach ($projects as $project)
            <!--project single box start-->
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-15">
                <div class="project-single-box">
                    <div class="project-status">
                        @if ($project->status == 'in_progress')
                        <span class="in_progress"><i class="fas fa-circle danger"></i> In Progress</span>
                        @elseif ($project->status == 'cancel')
                        <span class="cancel"><i class="fas fa-circle danger"></i> Cancelled</span>
                        @else
                        <span><i class="fas fa-circle"></i> Completed</span>
                        @endif

                        <div class="btn-group dropstart">
                            <a href="#" type="button" class="ellipse dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-start">
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ url('projects/'.$project->project_id) }}">View Project</a>
                                </li>
                                <li>
                                    <form action="{{ url('projects/'.$project->project_id.'/destroy') }}" class="d-inline" method="POST">
                                        @csrf
                                        <button type="submit" class="btn dropdown-item">Delete Project</button>
                                      </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="title">
                        <h3><a href="{{ url('projects/'.$project->project_id) }}">{{ $project->title }}</a></h3>
                    </div>
                    <div class="thumbnail">
                        @if ($project->thumbnail)
                        <img src="{{ asset($project->thumbnail) }}" alt="a" class="img-fluid">
                        @else
                        <img src="{{ asset('uploads/projects/project-01.png') }}" alt="a" class="img-fluid">
                        @endif
                    </div>

                    @php
                    $startDate = new DateTime($project->start_date);
                    $endDate = new DateTime($project->end_date);
                    $currentDate = new DateTime();
                    $interval = $currentDate->diff($endDate);
                    $remainingDays = $interval->days;
                    @endphp

                    <div class="d-flex">
                        <p>
                            <img src="./assets/images/icons/calendar.svg" alt="a" class="img-fluid">
                            {{ $startDate->format('j M') }} - {{ $endDate->format('j M') }} {{ $startDate->format('Y')
                            }}
                        </p>
                        <p>
                            <img src="./assets/images/icons/clock.svg" alt="a" class="img-fluid">
                            {{ $remainingDays }} Days Remaining
                        </p>
                    </div>
                    <hr>
                    <div class="project-bottom">
                        @foreach ($project->customers->slice(0,1) as $customer)
                        <div class="media">
                            @if ($customer->avatar)
                            <img src="{{ asset($customer->avatar) }}" alt="a" class="img-fluid avatar">
                            @else
                            <img src="{{ asset('uploads/users/avatar-18.png') }}" alt="a" class="img-fluid avatar">
                            @endif
                            <div class="media-body">
                                <h5>{{ $customer->name }}</h5>
                                <p>{{ $customer->designation }}</p>
                            </div>
                        </div>
                        @endforeach
                        <h4>€ {{ $project->amount}}</h4>
                    </div>
                </div>
            </div>
            <!--project single box end-->
            @endforeach

        </div>
    </div>
</section>

<!-- project add modal start -->
@include('projects/create');
<!-- project add modal end -->
@endsection
{{-- add custmer form end --}}

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {

        let inputField = document.getElementById("inputField");
        let dropdownItems = document.querySelectorAll(".filterItems");
        let form = document.getElementById("myForm");

        dropdownItems.forEach(item => {
            item.addEventListener("click", function(e) {
                e.preventDefault();
                inputField.value = this.getAttribute("data-value");

                form.submit();
            });
        });
    });
</script>
@endsection
