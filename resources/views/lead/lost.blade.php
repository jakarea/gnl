@extends('layouts.auth')

@section('title', 'Lost Leads')

@section('style')
<link rel="stylesheet" href="{{ url('assets/css/leads.css') }}" />
@endsection

@section('content')
<section class="main-page-wrapper">
    <div class="page-title">
        <h1>Lost Leads</h1>
        <!-- filter -->
        <div class="page-filter d-flex">

            <div class="dropdown dropdown-category">
                <button class="btn" type="button" data-bs-toggle="modal"
                data-bs-target="#staticBackdropFour">
                    <i class="fa-solid fa-plus"></i> Add Leads
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
                        <th>Actions</th>
                    </tr>
                    @foreach ($lostLeads as $lead)
                    <!-- payment single item start -->
                    <tr>
                        <td>
                            {{ ($lostLeads->currentPage() - 1) * $lostLeads->perPage() + $loop->iteration }}
                        </td>
                        <td>
                            <div class="media">
                                @if ($lead->avatar)
                                <img src="{{ asset($lead->avatar) }}" alt="avatar" class="img-fluid avatar" />

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
                                    <a href="#" class="btn-view no-ans-btn">Lost</a>
                                </li>
                            </ul>
                        </td>

                        <td>
                            <div class="table-dropdown d-flex gap-2">
                                {{-- <div class="dot-bttn justify-content-center">
                                    <a href="{{ route('lost.lead.edit') }}"><i class="fa-solid fa-pencil"></i></a>
                                </div> --}}
                                <div class="dot-bttn justify-content-center">
                                    <form action="{{ route('lead.destroy',$lead->lead_id) }}" class="d-inline" method="POST">
                                        @csrf
                                        <button type="submit" class="btn dropdown-item">
                                            <i class="fas fa-trash text-secondary"></i>
                                        </button>
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
                {{ $lostLeads->links('pagination::bootstrap-5') }}
            </div>
        </div>
        {{-- paggination wrap --}}
    </div>
</section>

{{-- create leads modal start --}}
@include('lead.common.create')
{{-- create leads modal end --}}

@endsection

@section('script')

@endsection
