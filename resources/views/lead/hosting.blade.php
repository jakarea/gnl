@extends('layouts.auth')

@section('title', 'Hosting Leads')

@section('style')
    <link rel="stylesheet" href="{{ url('assets/css/leads.css') }}" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>
        .ui-sortable-placeholder {
            border: 2px dashed #ccc;
            background-color: #f7f7f7;
            height: 50px;
        }

        .leads-collection {
            min-height: 50px;
        }
    </style>
@endsection

@section('content')

    <section class="main-page-wrapper leads-page-wrapper">
        <!-- page title -->
        <div class="page-title leads-page-title">
            <h1>Hosting Leads</h1>
            <!-- bttn -->
            <div class="common-bttn">
                <a href="{{ url('leads/all') }}" class="add">View All</a>
            </div>
            <!-- bttn -->
        </div>
        <div class="leads-main-wrapper">
            <div class="leads-vertical-scroller custom-scroll-bar">

                <!--New Leads Start-->
                <div class="leads-section">
                    <div class="leads-title">
                        <h3>News Leads</h3>
                        <a href="#" type="button" class="add" data-bs-toggle="modal"
                            data-bs-target="#staticBackdropFour"><img src="{{ url('assets/images/icons/plus-circle.svg') }}"
                                class="img-fluid" alt="a"></a>
                    </div>
                    <!--leads collection start-->
                    <div class="leads-collection droptrue" id="newLeadDraggable">
                        @foreach ($leads['new_leads'] as $new_lead)
                            <!--leads item start-->
                            <div class="lead-item-area" data-lead-id="{{ $new_lead->lead_id }}"
                                data-state="{{ $new_lead->state }}">
                                <div class="leads-items">
                                    <div class="media">
                                        @if ($new_lead->avatar)
                                            <img src="{{ asset($new_lead->avatar) }}" alt="avatar"
                                                class="img-fluid avatar" />
                                        @else
                                            <img src="{{ asset('uploads/users/avatar-9.png') }}" alt="avatar"
                                                class="img-fluid avatar" />
                                        @endif
                                        <div class="media-body">
                                            <h5>{{ $new_lead->name }}</h5>
                                            <ul>
                                                <li><a href="{{ $new_lead->phone }}"><img
                                                            src="{{ asset('assets/images/icons/calling-one.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                                <li><a href="mailto:{{ $new_lead->email }}"><img
                                                            src="{{ asset('assets/images/icons/gmail-one.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                                <li><a href="{{ $new_lead->instagram }}"><img
                                                            src="{{ asset('assets/images/icons/instagram.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                                <li><a href="{{ $new_lead->linkedin }}"><img
                                                            src="{{ asset('assets/images/icons/linkedln.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                            </ul>
                                        </div>
                                        <a href="#">
                                            <img src="{{ asset('assets/images/icons/arrow-move.svg') }}" alt="a"
                                                class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--leads item end-->
                        @endforeach
                    </div>
                    <!--leads collection end-->
                </div>
                <!--New Leads End-->

                <!-- in progress Leads Start-->
                <div class="leads-section">
                    <div class="leads-title">
                        <h3>In Progress</h3>
                        <a href="" type="button" class="add" data-bs-toggle="modal"
                            data-bs-target="#staticBackdropFour"><img
                                src="{{ url('assets/images/icons/plus-circle.svg') }}" class="img-fluid"
                                alt=""></a>
                    </div>
                    <!--leads collection start-->
                    <div class="leads-collection droptrue" id="inprogressLeadDraggable">
                        @foreach ($leads['in_progress_leads'] as $in_progress_lead)
                            <!--leads item start-->
                            <div class="lead-item-area" data-lead-id="{{ $in_progress_lead->lead_id }}"
                                data-state="{{ $in_progress_lead->state }}">
                                <div class="leads-items">
                                    <div class="media">
                                        @if ($in_progress_lead->avatar)
                                            <img src="{{ asset($in_progress_lead->avatar) }}" alt="avatar"
                                                class="img-fluid avatar" />
                                        @else
                                            <img src="{{ asset('uploads/users/avatar-9.png') }}" alt="avatar"
                                                class="img-fluid avatar" />
                                        @endif
                                        <div class="media-body">
                                            <h5>{{ $in_progress_lead->name }}</h5>
                                            <ul>
                                                <li><a href="{{ $in_progress_lead->phone }}"><img
                                                            src="{{ asset('assets/images/icons/calling-one.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                                <li><a href="mailto:{{ $in_progress_lead->email }}"><img
                                                            src="{{ asset('assets/images/icons/gmail-one.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                                <li><a href="{{ $in_progress_lead->instagram }}"><img
                                                            src="{{ asset('assets/images/icons/instagram.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                                <li><a href="{{ $in_progress_lead->linkedin }}"><img
                                                            src="{{ asset('assets/images/icons/linkedln.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                            </ul>
                                        </div>
                                        <a href="#">
                                            <img src="{{ asset('assets/images/icons/arrow-move.svg') }}" alt="a"
                                                class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--leads item end-->
                        @endforeach
                    </div>
                    <!--leads collection end-->
                </div>
                <!--in progress Leads End-->

                <!-- No Answer Yet Leads Start-->
                <div class="leads-section">
                    <div class="leads-title">
                        <h3>No Answer Yet</h3>
                        <a href="" type="button" class="add" data-bs-toggle="modal"
                            data-bs-target="#staticBackdropFour"><img
                                src="{{ url('assets/images/icons/plus-circle.svg') }}" class="img-fluid"
                                alt=""></a>
                    </div>
                    <!--leads collection start-->
                    <div class="leads-collection droptrue" id="noAnswarLeadDraggable">
                        @foreach ($leads['no_ans_leads'] as $no_ans_lead)
                            <!--leads item start-->
                            <div class="lead-item-area" data-lead-id="{{ $no_ans_lead->lead_id }}"
                                data-state="{{ $no_ans_lead->state }}">
                                <div class="leads-items">
                                    <div class="media">
                                        @if ($no_ans_lead->avatar)
                                            <img src="{{ asset($no_ans_lead->avatar) }}" alt="avatar"
                                                class="img-fluid avatar" />
                                        @else
                                            <img src="{{ asset('uploads/users/avatar-9.png') }}" alt="avatar"
                                                class="img-fluid avatar" />
                                        @endif
                                        <div class="media-body">
                                            <h5>{{ $no_ans_lead->name }}</h5>
                                            <ul>
                                                <li><a href="{{ $no_ans_lead->phone }}"><img
                                                            src="{{ asset('assets/images/icons/calling-one.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                                <li><a href="mailto:{{ $no_ans_lead->email }}"><img
                                                            src="{{ asset('assets/images/icons/gmail-one.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                                <li><a href="{{ $no_ans_lead->instagram }}"><img
                                                            src="{{ asset('assets/images/icons/instagram.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                                <li><a href="{{ $no_ans_lead->linkedin }}"><img
                                                            src="{{ asset('assets/images/icons/linkedln.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                            </ul>
                                        </div>
                                        <a href="#">
                                            <img src="{{ asset('assets/images/icons/arrow-move.svg') }}" alt="a"
                                                class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--leads item end-->
                        @endforeach
                    </div>
                    <!--leads collection end-->
                </div>
                <!-- No Answer Yet Leads End-->

                <!-- Completed Leads Start-->
                <div class="leads-section">
                    <div class="leads-title">
                        <h3>Completed</h3>
                        <a href="" type="button" class="add" data-bs-toggle="modal"
                            data-bs-target="#staticBackdropFour"><img
                                src="{{ url('assets/images/icons/plus-circle.svg') }}" class="img-fluid" alt="a">
                        </a>
                    </div>
                    <!--leads collection start-->
                    <div class="leads-collection droptrue" id="completedLeadDraggable">
                        @foreach ($leads['completed_leads'] as $completed_lead)
                            <!--leads item start-->
                            <div class="lead-item-area" data-lead-id="{{ $completed_lead->lead_id }}"
                                data-state="{{ $completed_lead->state }}">
                                <div class="leads-items">
                                    <div class="media">
                                        @if ($completed_lead->avatar)
                                            <img src="{{ asset($completed_lead->avatar) }}" alt="avatar"
                                                class="img-fluid avatar" />
                                        @else
                                            <img src="{{ asset('uploads/users/avatar-9.png') }}" alt="avatar"
                                                class="img-fluid avatar" />
                                        @endif
                                        <div class="media-body">
                                            <h5>{{ $completed_lead->name }}</h5>
                                            <ul>
                                                <li><a href="{{ $completed_lead->phone }}"><img
                                                            src="{{ asset('assets/images/icons/calling-one.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                                <li><a href="mailto:{{ $completed_lead->email }}"><img
                                                            src="{{ asset('assets/images/icons/gmail-one.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                                <li><a href="{{ $completed_lead->instagram }}"><img
                                                            src="{{ asset('assets/images/icons/instagram.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                                <li><a href="{{ $completed_lead->linkedin }}"><img
                                                            src="{{ asset('assets/images/icons/linkedln.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                            </ul>
                                        </div>
                                        <a href="#">
                                            <img src="{{ asset('assets/images/icons/arrow-move.svg') }}" alt="a"
                                                class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--leads item end-->
                        @endforeach
                    </div>
                    <!--leads collection end-->
                </div>
                <!-- Completed Leads End-->

                <!-- Lost Leads Start-->
                <div class="leads-section">
                    <div class="leads-title">
                        <h3>Lost Lead</h3>
                        <a href="" type="button" class="add" data-bs-toggle="modal"
                            data-bs-target="#staticBackdropFour"><img
                                src="{{ url('assets/images/icons/plus-circle.svg') }}" class="img-fluid"
                                alt=""></a>
                    </div>
                    <!--leads collection start-->
                    <div class="leads-collection droptrue" id="lostLeadDraggable">
                        @foreach ($leads['lost_leads'] as $lost_lead)
                            <!--leads item start-->
                            <div class="lead-item-area" data-lead-id="{{ $lost_lead->lead_id }}"
                                data-state="{{ $lost_lead->state }}">
                                <div class="leads-items">
                                    <div class="media">
                                        @if ($lost_lead->avatar)
                                            <img src="{{ asset($lost_lead->avatar) }}" alt="avatar"
                                                class="img-fluid avatar" />
                                        @else
                                            <img src="{{ asset('uploads/users/avatar-9.png') }}" alt="avatar"
                                                class="img-fluid avatar" />
                                        @endif
                                        <div class="media-body">
                                            <h5>{{ $lost_lead->name }}</h5>
                                            <ul>
                                                <li><a href="{{ $lost_lead->phone }}"><img
                                                            src="{{ asset('assets/images/icons/calling-one.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                                <li><a href="mailto:{{ $lost_lead->email }}"><img
                                                            src="{{ asset('assets/images/icons/gmail-one.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                                <li><a href="{{ $lost_lead->instagram }}"><img
                                                            src="{{ asset('assets/images/icons/instagram.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                                <li><a href="{{ $lost_lead->linkedin }}"><img
                                                            src="{{ asset('assets/images/icons/linkedln.svg') }}"
                                                            alt="a" class="img-fluid"></a></li>
                                            </ul>
                                        </div>
                                        <a href="#">
                                            <img src="{{ asset('assets/images/icons/arrow-move.svg') }}" alt="a"
                                                class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--leads item end-->
                        @endforeach
                    </div>
                    <!--leads collection end-->
                </div>
                <!-- Lost Leads End-->
            </div>
        </div>

    </section>

    {{-- create leads modal start --}}
    @include('lead.common.create')
    {{-- create leads modal end --}}

@endsection


@section('script')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $("#newLeadDraggable, #inprogressLeadDraggable, #noAnswarLeadDraggable, #completedLeadDraggable, #lostLeadDraggable")
            .disableSelection();


        $(document).ready(function() {

            $(".leads-collection").sortable({
                connectWith: ".droptrue",
                update: function(event, ui) {
                    var leadOrder = $(this).sortable("toArray", {
                        attribute: "data-lead-id"
                    });

                    leadOrder = leadOrder.filter(function(item) {
                        return item !== '';
                    });
                    var listId = $(this).attr("id");
                    var newState = determineNewState(listId);
                    updateLeadOrder(leadOrder, newState);
                }
            });

            function determineNewState(listId) {
                switch (listId) {
                    case 'newLeadDraggable':
                        return 'new';
                    case 'inprogressLeadDraggable':
                        return 'in_progress';
                    case 'noAnswarLeadDraggable':
                        return 'no_ans';
                    case 'completedLeadDraggable':
                        return 'completed';
                    case 'lostLeadDraggable':
                        return 'lost';
                    default:
                        return 'new';
                }
            }

            function updateLeadOrder(leadOrder, newState) {
                $.ajax({
                    url: "{{ route('lead.sortable') }}", // Adjust the route accordingly
                    type: "POST",
                    data: {
                        leadOrder: leadOrder,
                        newState: newState,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log("Lead reorder and state update successfully");
                    },
                    error: function(xhr, status, error) {
                        console.error("Error updating lead order and state:", error);
                    }
                });
            }
        });
    </script>

    </script>
@endsection
