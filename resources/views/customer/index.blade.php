@extends('layouts.auth')

@section('title', 'Customer List Page')

@section('style')
<link rel="stylesheet" href="{{ url('assets/css/customer.css') }}" />
@endsection

@section('content')
    <section class="main-page-wrapper customer-page-wrapper">
        <!-- page title -->

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        @endif

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
                        <span>+{{ $totalCustomerInc }}%</span>
                        <p>Higher than last month</p>
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
                        <span>+{{ $newCustomerInc }}%</span>
                        <p>Higher than last month</p>
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
                        <span>+{{ $repeatCustomerInc }}%</span>
                        <p>Higher than last month</p>
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
                                    All Leads <i class="fas fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item active" href="#">All Leads <i
                                                class="fas fa-check"></i></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Hosting Leads</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Marketing Leads</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Project Leads</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Website Leads</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Lost Leads</a></li>
                                </ul>
                            </div>
                            <!-- filter item -->

                            <!-- filter item -->
                            <div class="dropdown">
                                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    All Service <i class="fas fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item active" href="#">All Service <i
                                                class="fas fa-check"></i></a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">App Design</a></li>
                                    <li>
                                        <a class="dropdown-item" href="#">Dashboard Design</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Landing Page Design</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- filter item -->

                            <!-- filter item -->
                            <div class="dropdown">
                                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    All Customer <i class="fas fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item active" href="#">All Customer <i
                                                class="fas fa-check"></i></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Active Customer</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Inactive Customer</a>
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
            <div class="row">
                @foreach ($customers as $customer)
                    <!-- customer start -->
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mt-15">
                        <div class="customer-person-box-wrap">
                            <div class="avatar">
                                @if ($customer->avatar)
                                    <img src="{{ asset('storage/' . $customer->avatar) }}" alt="avatar"
                                        class="img-fluid" />
                                @else
                                    <img src="{{ asset('uploads/users/avatar-1.png') }}" alt="default avatar"
                                        class="img-fluid" />
                                @endif
                            </div>

                            <div class="text">
                                <span class="new">New Customer</span>
                                <h4>
                                    <a href="javascript:;" data-customer-id="{{ $customer->customer_id }}"
                                        class="details customerModalDetails">{{ $customer->name }}</a>
                                </h4>

                                {{-- <h4><a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                            aria-controls="offcanvasRight" data-customer-id="{{ $customer->customer_id }}"
                                            class="details customerModalDetails">{{ $customer->name }}</a></h4> --}}
                                <h6>Assistant</h6>
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
                                            <a class="dropdown-item" href="#">Edit Customer</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">Delete Customer</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- customer end -->
                @endforeach
            </div>
            <!-- list end -->
            <!--pagination started-->
            <!-- Your content goes here -->

            <!-- Pagination Section -->
            <div class="pagination-section">
                <nav class="mt-4" aria-label="...">
                    {!! $customers->links('pagination::gnl-pagination') !!}
                </nav>
                {{-- <div class="pagination-text">
                    <p>Showing {{ $customers->firstItem() }} to {{ $customers->lastItem() }} of {{ $customers->total() }} entries</p>
                </div> --}}
            </div>

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
                                @csrf
                                <div class="add-customer-form">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Profile Image</label>
                                                <input type="file" name="avatar" id="avatar" class="d-none" />
                                                <!-- upload avatar -->
                                                <div class="d-flex">
                                                    <label for="avatar" class="avatar">
                                                        <img src="./uploads/users/avatar-13.png" alt="avatar"
                                                            class="img-fluid" />
                                                        <span class="avatar-ol">
                                                            <img src="./assets/images/icons/camera.svg" alt="camera"
                                                                class="img-fluid" />
                                                        </span>
                                                    </label>
                                                    <p>
                                                        <img src="./assets/images/icons/anchor.svg" alt="anchor"
                                                            class="img-fluid" />
                                                        Upload
                                                    </p>
                                                </div>
                                                <!-- upload avatar -->
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-error">
                                                <label for="name">Name</label>
                                                <input type="text" placeholder="Enter Name" id="name"
                                                    name="name" class="form-control" />
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-error">
                                                <label for="designation">Designation</label>
                                                <input type="text" placeholder="Enter Designation" id="designation"
                                                    name="designation" class="form-control" />

                                                @error('designation')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-error">
                                                <label for="email">E-mail</label>
                                                <input type="email" placeholder="Enter email address" id="email"
                                                    name="email" class="form-control" />
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-error">
                                                <label for="phone">Phone</label>
                                                <input type="number" placeholder="Enter phone number" id="phone"
                                                    name="phone" class="form-control" />

                                                @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-error">
                                                <label for="location">Location</label>
                                                <input type="text" placeholder="Enter location" id="location"
                                                    name="location" class="form-control" />
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
                                                            Active<i class="fas fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-two dropdown-menu-three">
                                                            <li>
                                                                <a class="dropdown-item dropdown-item-two"
                                                                    href="#">Active<i class="fas fa-check"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item dropdown-item-two"
                                                                    href="#">Inactive</a>
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
                                                    name="kvk" class="form-control" />
                                                @error('kvk')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-error">
                                                <label for="service">Service</label>
                                                <input type="text" placeholder="Enter service" id="service"
                                                    name="service" class="form-control" />
                                                @error('service')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-error">
                                                <label for="company">Company</label>
                                                <input type="text" placeholder="Enter company name" id="company"
                                                    name="company" class="form-control" />
                                                @error('company')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group form-error">
                                                <label for="website">Website</label>
                                                <input type="text" placeholder="Enter website" id="website"
                                                    name="website" class="form-control" />
                                                @error('website')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group form-error">
                                                <label for="details">Details</label>
                                                <textarea name="details" id="details" rows="7" class="form-control" placeholder="Enter details"></textarea>
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
                <div class="offcanvas-body offcanvas-body-details customerDetailsModalData">
                </div>
            </div>
        </div>

        <div class="showEditCustomerModal"></div>


    </section>

@section('script')

    <script>
        $(document).on('click', '.customerModalDetails', function(e) {
            e.preventDefault();
            const customerId = $(this).data('customer-id');
            $.ajax({
                url: '{{ route('customers.details.modal') }}',
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

        function editCustomerModal(customerId) {
            $.ajax({
                url: '{{ route('customers.edit') }}',
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

        function deleteCustomer(customerUrl) {
            $.ajax({
                url: customerUrl,
                type: 'post',
                data: {
                    _mehode: "delete"
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
    </script>
@endsection

@endsection
{{-- add custmer form end --}}
