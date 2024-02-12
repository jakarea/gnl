@extends('layouts.auth')

@section('title', 'Customer List Page')

@section('style')
    <link rel="stylesheet" href="{{ url('assets/css/customer.css') }}" />
@endsection

@section('content')
    <section class="main-page-wrapper customer-page-wrapper">
        <!-- page title -->

        <div class="page-title">
            <h1 class="pb-0">Customer</h1>

            <!-- bttn -->
            <div class="common-bttn">
                <a href="#" type="button" class="add" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
                        class="fas fa-plus"></i> Add Customer</a>
            </div>
            <!-- bttn -->
        </div>
        <!-- page title -->

        <!-- customer status car start -->
        <div class="row">
            <div class="col-12 col-md-6 col-xl-4">
                <div class="customer-status-box">
                    <h5>
                        <img src="./assets/images/icons/user-add.svg" alt="icon" class="img-fluid" />
                        Total Customer
                    </h5>
                    <h3>{{ $totalCustomer }}</h3>
                    <div class="d-flex">
                        <span>{{ $totalCustomerInc }}%</span>
                        <p>{{ $totalCustomerInc > 0 ? 'Higher' : 'Less' }} than last month</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
                <div class="customer-status-box">
                    <h5>
                        <img src="./assets/images/icons/user-add.svg" alt="icon" class="img-fluid" />
                        New Customer
                    </h5>
                    <h3>{{ $newCustomer }}</h3>
                    <div class="d-flex">
                        <span>{{ $newCustomerInc }}%</span>
                        <p>{{ $newCustomerInc > 0 ? 'Higher' : 'Less' }} than last month</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
                <div class="customer-status-box">
                    <h5>
                        <img src="./assets/images/icons/user-add.svg" alt="icon" class="img-fluid" />
                        Repeat Customer
                    </h5>
                    <h3> {{ $repeatedCustomer }} </h3>
                    <div class="d-flex">
                        <span>{{ $repeatCustomerInc }}%</span>
                        <p>{{ $repeatCustomerInc > 0 ? 'Higher' : 'Less' }} than last month</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- customer status car end -->

        <!-- all customer list start -->
        <div class="all-customer-box mt-15">
            <!-- customer header filter start -->
            <div class="row">
                <div class="col-lg-5">
                    <div class="customer-filter-title">
                        <h2 class="common-title pb-0">All Customer</h2>
                    </div>
                </div>
                <div class="col-lg-7">
                    <form action="">
                        <div class="filters-area">
                            <!-- filter item -->
                            <div class="dropdown">
                                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                    {{ Str::ucfirst(request()->leadTypeId && request()->leadTypeId !== 'all' ? optional(App\Models\LeadType::find(request()->leadTypeId))->name : 'All Leads') }}

                                    <i class="fas fa-angle-down"></i>
                                </button>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('customers.index', ['leadTypeId' => 'all', 'searchTypeId' => request()->searchTypeId, 'status' => request()->status]) }}">
                                            All Leads {!! request()->leadTypeId == 'all' ? '<i class="fas fa-check"></i>' : '' !!}</a>
                                    </li>

                                    @if (count($lead_types) > 0)

                                        @foreach ($lead_types as $leadType)
                                            <li>
                                                <a class="dropdown-item {{ request()->leadTypeId == $leadType->lead_type_id ? 'active' : '' }}"
                                                    href="{{ route('customers.index', ['leadTypeId' => $leadType->lead_type_id, 'searchTypeId' => request()->searchTypeId, 'status' => request()->status]) }}">
                                                    {{ $leadType->name }} {!! request()->leadTypeId == $leadType->lead_type_id ? '<i class="fas fa-check"></i>' : '' !!}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <!-- filter item -->

                            <!-- filter item -->
                            <div class="dropdown">
                                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Str::ucfirst(request()->searchTypeId && request()->searchTypeId !== 'all' ? optional(App\Models\ServiceType::find(request()->searchTypeId))->name : 'All Service') }}

                                    <i class="fas fa-angle-down"></i>
                                </button>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item "
                                            href="{{ route('customers.index', ['searchTypeId' => 'all', 'leadTypeId' => request()->leadTypeId, 'status' => request()->status]) }}">
                                            All Service {!! request()->searchTypeId == 'all' ? '<i class="fas fa-check"></i>' : '' !!}</a>
                                    </li>
                                    @if (count($services_types) > 0)
                                        @foreach ($services_types as $serviceType)
                                            <li>
                                                <a class="dropdown-item {{ request()->searchTypeId == $serviceType->service_type_id ? 'active' : '' }}"
                                                    href="{{ route('customers.index', ['searchTypeId' => $serviceType->service_type_id, 'leadTypeId' => request()->leadTypeId, 'status' => request()->status]) }}">
                                                    {{ $serviceType->name }} {!! request()->searchTypeId == $serviceType->service_type_id ? '<i class="fas fa-check"></i>' : '' !!}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <!-- filter item -->

                            <!-- filter item -->
                            <div class="dropdown">
                                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Str::ucfirst(request()->input('status')) ?? 'All' }} Customer <i
                                        class="fas fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item {{ request()->input('status') === 'all' ? 'active' : '' }}"
                                            href="{{ route('customers.index', ['status' => 'all', 'searchTypeId' => request()->searchTypeId, 'leadTypeId' => request()->leadTypeId]) }}">All
                                            Customer {!! request()->status == 'all' ? '<i class="fas fa-check"></i>' : '' !!}</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ request()->input('status') === 'active' ? 'active' : '' }}"
                                            href="{{ route('customers.index', ['status' => 'active', 'searchTypeId' => request()->searchTypeId, 'leadTypeId' => request()->leadTypeId]) }}">Active
                                            Customer {!! request()->status == 'active' ? '<i class="fas fa-check"></i>' : '' !!}</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item {{ request()->input('status') === 'inactive' ? 'active' : '' }}"
                                            href="{{ route('customers.index', ['status' => 'inactive', 'searchTypeId' => request()->searchTypeId, 'leadTypeId' => request()->leadTypeId]) }}">Inactive
                                            Customer {!! request()->status == 'inactive' ? '<i class="fas fa-check"></i>' : '' !!}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- filter item -->
                        </div>
                    </form>
                </div>
            </div>
            <!-- customer header filter end -->

            <!-- list start -->
            <div class="row" id="customerWraper">
                @if (count( $customers ) > 0)
                    @foreach ($customers as $customer)
                        <!-- customer start -->
                        <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mt-15">
                            <div data-delete-url="{{ route('customers.destroy', $customer->customer_id) }}"
                                data-customer-id="{{ $customer->customer_id }}"></div>
                            <div class="customer-person-box-wrap">
                                <div class="avatar">
                                    @if ($customer->avatar)
                                        <img src="{{ asset($customer->avatar) }}" alt="avatar" class="img-fluid avatar" />
                                    @else
                                        <img src="{{ asset('uploads/users/avatar-9.png') }}" alt="default avatar"
                                            class="img-fluid avatar" />
                                    @endif
                                </div>

                                <div class="text">
                                    <span class="{{ $customer->isNew() ? 'new' : 'repeat' }}">{{ $customer->isNew() ? 'New Customer' : 'Repeat Customer' }}</span>
                                    <h4>
                                        <a href="javascript:;" data-customer-id="{{ $customer->customer_id }}"
                                            class="details customerModalDetails">{{ $customer->name }}</a>
                                    </h4>

                                    <h6>{{ $customer->designation }}</h6>
                                    <hr />
                                    <p>
                                        <i class="fa-regular fa-envelope"></i> {{ $customer->email }}
                                    </p>
                                </div>
                                <div class="actions">
                                    <a href="{{ route('customers.show', $customer->customer_id) }}" class="details">View
                                        Details</a>

                                    <div class="btn-group dropstart">
                                        <a href="#" type="button" class="ellipse dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false" aria-expanded="false"><i
                                                class="fa-solid fa-ellipsis-vertical"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-start">
                                            <li>
                                                <a class="dropdown-item" href="javascript:;"
                                                    onclick="editCustomerModal('{{ $customer->customer_id }}')">Edit
                                                    Customer</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="javascript:;"
                                                    onclick="deleteCustomer()">Delete
                                                    Customer</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- customer end -->
                    @endforeach

                @else
                    @component( 'components.empty-data-component' , ['dynamicData' => 'No Task Found!'])@endcomponent
                @endif
            </div>
            <!-- list end -->
            <!--pagination started-->
            <!-- Your content goes here -->

            <!-- Pagination Section -->
            {!! $customers->links('pagination::gnl-pagination') !!}

            <!--pagination end-->
        </div>
        <!-- all customer list end -->
        <!-- customer add modal start -->
        <!-- Button trigger modal -->

        <div class="custom-modal">
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                Add New Customer
                            </h1>
                            <button type="button" class="btn" data-bs-dismiss="modal">
                                <i class="fas fa-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('customers.store') }}" class="common-form"
                                enctype="multipart/form-data">
                                <input type="hidden" name="status" id="status" value="active">
                                @csrf
                                <div class="add-customer-form">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Profile Image</label>
                                                <input type="file" name="avatar" id="avatar" class="d-none">
                                                <!-- upload avatar -->
                                                <div class="d-flex">
                                                    <label for="avatar" class="avatar" id="avatarLabel">
                                                        <img src="{{ url('/uploads/users/avatar-9.png') }}"
                                                            alt="avatar" class="img-fluid" id="avatarPreview">
                                                        <span class="avatar-ol">
                                                            <img src="{{ url('/assets/images/icons/camera.svg') }}"
                                                                alt="camera" class="img-fluid">
                                                        </span>
                                                    </label>
                                                    <label for="avatar">
                                                        <p><img src="{{ url('/assets/images/icons/anchor.svg') }}"
                                                                alt="anchor" class="img-fluid">
                                                            Upload</p>
                                                    </label>
                                                </div>
                                                <!-- upload avatar -->
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-error">
                                                <label for="name">Name</label>
                                                <input type="text" placeholder="Enter Name" id="name"
                                                    name="name" class="form-control" value="{{ old('name') }}" />
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-error">
                                                <label for="designation">Designation</label>
                                                <input type="text" placeholder="Enter Designation" id="designation"
                                                    name="designation" class="form-control"
                                                    value="{{ old('designation') }}" />

                                                @error('designation')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-error">
                                                <label for="email">E-mail</label>
                                                <input type="email" placeholder="Enter email address" id="email"
                                                    name="email" class="form-control" value="{{ old('email') }}" />
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-error">
                                                <label for="phone">Phone</label>
                                                <input type="number" placeholder="Enter phone number" id="phone"
                                                    name="phone" class="form-control" value="{{ old('phone') }}" />

                                                @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-error">
                                                <label for="location">Location</label>
                                                <input type="text" placeholder="Enter location" id="location"
                                                    name="location" class="form-control"
                                                    value="{{ old('location') }}" />
                                                @error('location')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-error">
                                                <label for="website">Active Status</label>
                                                <div class="common-dropdown common-dropdown-two common-dropdown-three">
                                                    <div class="dropdown dropdown-two dropdown-three">
                                                        <button class="btn" type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <div id="setStatus">Active</div><i
                                                                class="fas fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-two dropdown-menu-three">
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
                                                <input type="text" placeholder="Enter kvk number" id="kvk"
                                                    name="kvk" class="form-control" value="{{ old('kvk') }}" />
                                                @error('kvk')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-error">
                                                <label for="service">Service</label>
                                                <input type="hidden" name="service_type_id" id="service_type_id">
                                                <div class="common-dropdown common-dropdown-two common-dropdown-three">
                                                    <div class="dropdown dropdown-two dropdown-three">
                                                        <button class="btn" type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <div id="setType">Select Below</div><i
                                                                class="fas fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-two dropdown-menu-three">
                                                            @foreach ($services_types as $serviceType)
                                                                <li>
                                                                    <a class="dropdown-item dropdown-item-two service-type"
                                                                        href="javascript:;"
                                                                        data-id="{{ $serviceType->service_type_id }}">{{ $serviceType->name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>

                                                @error('service_type_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-error">
                                                <label for="company">Company</label>
                                                <input type="text" placeholder="Enter company name" id="company"
                                                    name="company" class="form-control" value="{{ old('company') }}" />
                                                @error('company')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-error">
                                                <label for="website">Website</label>
                                                <input type="text" placeholder="Enter website" id="website"
                                                    name="website" class="form-control" value="{{ old('website') }}" />
                                                @error('website')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="form-group form-error">
                                                <label for="lead_type_id">Leads Type</label>
                                                <input type="hidden" name="lead_type_id" id="lead_type_id">
                                                <div class="common-dropdown common-dropdown-two common-dropdown-three">
                                                    <div class="dropdown dropdown-two dropdown-three">
                                                        <button class="btn" type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <div id="setLeadType">Select Below</div><i
                                                                class="fas fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-two dropdown-menu-three">
                                                            @foreach ($lead_types as $leadType)
                                                                <li>
                                                                    <a class="dropdown-item dropdown-item-two lead-type"
                                                                        href="javascript:;"
                                                                        data-id="{{ $leadType->lead_type_id }}">{{ $leadType->name }}
                                                                        Lead</a>
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
                                        <div class="col-12">
                                            <div class="form-group form-error">
                                                <label for="details">Details</label>
                                                <textarea name="details" id="details" rows="7" class="form-control" placeholder="Enter details">{{ old('details') }}</textarea>
                                                @error('details')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-bttn">
                                                <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-bttn">
                                                <button type="submit" class="btn btn-submit">
                                                    Submit
                                                </button>
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


        <!-- customer add modal end -->
        <!-- add comapny modal form start -->

        <div class="add-company-modal-from">
            <div class="offcanvas offcanvas-end customerDetailsModal" tabindex="-1" id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-body offcanvas-body-details">
                    <div class="customerDetailsModalData"></div>
                </div>
            </div>
        </div>

        <div class="showEditCustomerModal"></div>


    </section>

@endsection

@section('script')
    <script>
        $(document).on('click', '.customerModalDetails', function(e) {
            e.preventDefault();
            const customerId = $(this).data('customer-id');
            $.ajax({
                url: "{{ route('customers.details.modal') }}",
                type: 'post',
                data: {
                    customerId: customerId
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },

                success: function(data) {
                    $(".customerDetailsModalData").html(data);
                    $('.customerDetailsModal').offcanvas('show');
                },
                error: function(error) {
                    console.error('AJAX request error:', status, error);
                }
            });
        });

        const editCustomerModal = (customerId) => {
            $.ajax({
                url: "{{ route('customers.edit') }}",
                type: 'post',
                data: {
                    customerId: customerId
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },

                success: function(data) {
                    $(".showEditCustomerModal").html(data);
                    $('.customerDetailsModal').offcanvas('hide');
                    $("#customerEdit").modal('show');
                },
                error: function(error) {
                    console.error('AJAX request error:', status, error);
                }
            });
        }

        const deleteCustomer = () => {
            const customerUrl = $('div[data-customer-id]').data('delete-url');
            const customerId = $('div[data-customer-id]').data('customer-id');

            const isConfirmed = confirm("Are you sure you want to delete this customer?");

            if (!isConfirmed) {
                return;
            }

            $.ajax({
                url: customerUrl,
                type: 'post',
                data: {
                    _method: "delete",
                    customer_id: customerId
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },

                success: function(data) {
                    $("#customerWraper").load(location.href + " #customerWraper>*", "");
                    window.location.href = '{{ route('customers.index') }}';
                },
                error: function(error) {
                    console.error('AJAX request error:', status, error);
                }
            });
        }


        // Set status in input hidden field
        function updateStatus(newStatus) {
            document.getElementById('status').value = newStatus;
            capitalizeStatus = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
            document.getElementById('setStatus').innerHTML = capitalizeStatus;
        }


        const closeCustomerDetailsModalOff = (e) => {
            e.preventDefault();
            $('.customerDetailsModal').offcanvas('hide');
        }
    </script>


    {{-- customer avatar js --}}
    <script>
        // Get references to elements
        const avatarInput = document.getElementById('avatar');
        const avatarPreview = document.getElementById('avatarPreview');
        const avatarLabel = document.getElementById('avatarLabel');

        // Add event listener to file input
        avatarInput.addEventListener('change', function(event) {
            const file = event.target.files[0]; // Get the first file selected by the user

            // Check if a file is selected
            if (file) {
                // Read the file as a data URL
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Update the preview image source with the data URL
                    avatarPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Optional: Add event listener to reset the file input
        avatarLabel.addEventListener('click', function() {
            avatarInput.value = ''; // Clear the file input
            avatarPreview.src = '{{ url('/uploads/users/avatar-9.png') }}'; // Reset the preview image to default
        });
    </script>

    {{-- select services type js --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let serviceTypeId = document.getElementById("service_type_id");
            let setType = document.getElementById("setType");
            let serviceTypes = document.querySelectorAll(".service-type");

            serviceTypes.forEach(item => {
                item.addEventListener("click", function(e) {
                    e.preventDefault();
                    setType.innerHTML = this.innerHTML;
                    serviceTypeId.value = this.getAttribute("data-id");
                });
            });
        });
    </script>

    {{-- select leads type js --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let leadTypeId = document.getElementById("lead_type_id");
            let setLeadType = document.getElementById("setLeadType");
            let leadTypes = document.querySelectorAll(".lead-type");

            leadTypes.forEach(item => {
                item.addEventListener("click", function(e) {
                    e.preventDefault();
                    setLeadType.innerHTML = this.innerHTML;
                    leadTypeId.value = this.getAttribute("data-id");
                });
            });
        });
    </script>

@endsection
