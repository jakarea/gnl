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
                <div class="common-dropdown project-dropdown text-end">
                    <div class="dropdown dropdown-porject-item">
                        <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            All Project<i class="fas fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu project-dropdown-menu">
                            <li><a class="dropdown-item project-dropdown-item" href="#">All Projects<i
                                        class="fas fa-check"></i></a></li>
                            <li><a class="dropdown-item project-dropdown-item" href="#">In Progress</a></li>
                            <li><a class="dropdown-item project-dropdown-item" href="#">Completed</a></li>
                        </ul>
                    </div>
                </div>
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
                        @else
                        <span><i class="fas fa-circle"></i> Completed</span>
                        @endif

                        <a href="#"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                    </div>
                    <div class="title">
                        <h3><a href="{{ url('projects/'.$project->project_id) }}">{{ $project->title }}</a></h3>
                    </div>
                    <div class="thumbnail">
                        @if ($project->thumbnail)
                        <img src="{{ $project->thumbnail }}" alt="a" class="img-fluid">
                        @else
                        <img src="./uploads/projects/project-01.png" alt="a" class="img-fluid">
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
                            <img src="{{ $customer->avatar }}" alt="a" class="img-fluid">
                            @else
                            <img src="./uploads/users/avatar-18.png" alt="a" class="img-fluid avatar">
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
@include('projects/create')
<!-- project add modal end -->

@endsection
{{-- add custmer form end --}}