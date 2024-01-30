@extends('layouts.auth')

@section('title', 'All Leads')

@section('style')
<link rel="stylesheet" href="{{ url('assets/css/leads.css') }}" />
@endsection

@section('content')
<section class="main-page-wrapper">
    <div class="page-title">
        <h1>All Leads</h1>
        <!-- filter -->
        <div class="page-filter d-flex">
            <form action="" method="GET" id="myForm">
                <div class="dropdown">
                    <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                        @if ($selectedLead == 'in_progress')
                            In progress
                        @elseif ($selectedLead == 'completed')
                            Completed
                        @elseif ($selectedLead == 'new')
                            New Leads
                        @elseif ($selectedLead == 'no_ans')
                            No Answer Yet
                        @elseif ($selectedLead == 'lost')
                            Lost Leads
                        @else
                            All Leads
                        @endif
                        <i class="fas fa-angle-down"></i>

                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item filterLeads" data-value="" href="#">All Leads
                            @if ($selectedLead == '')
                                <i class="fas fa-check"></i>
                            @endif
                            </a></li>
                        <li><a class="dropdown-item filterLeads" data-value="new" href="#">New Leads
                            @if ($selectedLead == 'new')
                                <i class="fas fa-check"></i>
                            @endif    
                        </a></li>
                        <li><a class="dropdown-item filterLeads" data-value="in_progress" href="#">In Progress
                            @if ($selectedLead == 'in_progress')
                                <i class="fas fa-check"></i>
                            @endif    
                        </a></li>
                        <li><a class="dropdown-item filterLeads" data-value="no_ans" href="#">No Answer Yet
                        
                            @if ($selectedLead == 'no_ans')
                                <i class="fas fa-check"></i>
                            @endif
                        </a></li>
                        <li><a class="dropdown-item filterLeads" data-value="completed" href="#">Completed
                            
                            @if ($selectedLead == 'completed')
                            <i class="fas fa-check"></i>
                            @endif
                        </a></li>
                        <li><a class="dropdown-item filterLeads" data-value="lost" href="#">Lost Leads
                            
                            @if ($selectedLead == 'lost')
                            <i class="fas fa-check"></i>
                            @endif
                        </a></li>
                    </ul>
                </div>
                <input type="hidden" name="leadStatus" id="leadStatus">
            </form>
            <div class="dropdown dropdown-category">
                <button class="btn" type="button" data-bs-toggle="modal"
                data-bs-target="#staticBackdropFour">
                    <i class="fa-solid fa-plus"></i>Add Leads
                </button>
            </div>
        </div>
    </div>
    <div class="all-customer-box payment-from-copany-user">
        <div class="user-payment-table">
             
            <table>
                <tbody>
                    <tr>
                        <th width="3%">No</th>
                        <th class="d-flex justify-content-between">
                            <span>Name</span>
                        </th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th>Website</th>
                        <th>Code</th>
                        <th class="text-center">Status</th>
                        <th></th>
                    </tr>
                    @foreach ($allLeads as $lead)
                    <!-- payment single item start -->
                    <tr>
                        <td>
                            {{ ($allLeads->currentPage() - 1) * $allLeads->perPage() + $loop->iteration }}
                        </td>
                        <td>
                            <div class="media">
                                @if ($lead->avatar)
                                <img src="{{ asset($lead->avatar) }}" alt="avatar" class="img-fluid avatar" />
                                @else
                                <img src="{{ asset('uploads/users/avatar-9.png') }}" alt="avatar"
                                    class="img-fluid avatar" />
                                @endif

                                <div class="media-body">
                                    <h5>{{ $lead->name }}</h5>
                                    <span>{{ $lead->email }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p>{{ $lead->phone ? $lead->phone : '--' }}</p>
                        </td>
                        <td>
                            <p>{{ $lead->company ? $lead->company : '--' }}</p>
                        </td>
                        <td>
                            <p><a href="{{ $lead->website ? $lead->website : '--' }}">{{ $lead->website ? $lead->website : '--' }}</a></p>
                        </td>
                        <td>
                            <p>99824254</p>
                        </td>
                        <td>
                            <ul>
                                <li>
                                    @if ($lead->state == 'new')
                                    <a href="#" class="btn-view">New</a>
                                    @elseif($lead->state == 'completed')
                                    <a href="#" class="btn-view btn-completed">Completed</a>
                                    @elseif($lead->state == 'no_ans')
                                    <a href="#" class="btn-view no-ans-btn">No Answer</a>
                                    @elseif($lead->state == 'in_progress')
                                    <a href="#" class="btn-view btn-progress">In Progress</a>
                                    @elseif($lead->state == 'lost')
                                    <a href="#" class="btn-view no-ans-btn">Lost</a>
                                    @endif

                                </li> 
                            </ul>
                        </td>
                        
                        <td>
                            <div class="table-dropdown">
                                <a href="#" type="button" class="dot-bttn" data-bs-toggle="dropdown"
                                    aria-expanded="false" aria-expanded="false">
                                    <img
                                    src="{{ url('/assets/images/icons/dots-horizontal.svg')}}" class="img-fluid"
                                    alt="">
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item lead-edit" href="#" data-bs-toggle="modal" data-id="{{ $lead->lead_id }}"
                                    data-bs-target="#staticBackdropFive">Edit Lead</a> 

                                    <form action="{{ route('lead.destroy',$lead->lead_id) }}" class="d-inline" method="POST">
                                        @csrf
                                        <button type="submit" class="btn dropdown-item">Delete Lead</button>
                                    </form>  
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!-- payment single item end -->
                    @endforeach
                </tbody>
            </table>
        </div> 

        {{-- paggination wrap --}}
        <div class="row mt-5">
            <div class="col-12 pagination-section">
                {{ $allLeads->links('pagination::bootstrap-5') }}
            </div>
        </div>
        {{-- paggination wrap --}} 
    </div>
</section>

{{-- create leads modal start --}}
@include('lead.common.create')
{{-- create leads modal end --}}

{{-- create leads modal start --}}
@include('lead.common.edit')
{{-- create leads modal end --}}
@endsection

@section('script')

{{-- on click edit lead ajax req --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
    var leadEditLinks = document.querySelectorAll('.lead-edit');
    leadEditLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            var leadId = link.getAttribute('data-id');
            fetchLeadDetails(leadId);
        });
    });

    function fetchLeadDetails(leadId) {

        let currentURL = window.location.href;
            const baseUrl = currentURL.split('/').slice(0, 3).join('/'); 

            fetch(`${baseUrl}/lead-details/${leadId}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', 
                },
            })
            .then(function (response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(function (data) {
                populateFormFields(data); 
            })
            .catch(function (error) {
                console.error('There was a problem with your fetch operation:', error);
            });
    }
});

</script>

{{-- sort js --}}
<script> 
    document.addEventListener("DOMContentLoaded", function() {

        let leadStatus = document.getElementById("leadStatus");
        let filterLeadsItems = document.querySelectorAll(".filterLeads");
        let form = document.getElementById("myForm");

        filterLeadsItems.forEach(item => {
            item.addEventListener("click", function(e) {
                e.preventDefault();
                leadStatus.value = this.getAttribute("data-value");
                form.submit();
            });
        });
    });
</script>
@endsection