@extends('layouts.auth')

@section('title', 'Customer Details Page')

@section('style')
    <link rel="stylesheet" href="{{ url('assets/css/customer.css') }}" />
@endsection

@section('content')

    <!-- main page wrapper start -->

    <section class="main-page-wrapper">
        <h2>Customer Detail</h2>
        <div data-delete-url="{{ route('customers.destroy', $customer->customer_id) }}"
            data-customer-id="{{ $customer->customer_id }}"></div>
        <!-- payment from company user start -->
        <div class="payment-from-copany-user">
            <!--customer profile header start-->
            <div class="profile-header">
                <div class="profile-box">
                    @if ($customer->avatar)
                        <img src="{{ asset($customer->avatar) }}" alt="avatar" class="img-fluid" />
                    @else
                        <img src="{{ asset('uploads/users/avatar-9.png') }}" alt="default avatar" class="img-fluid" />
                    @endif
                    <div class="profile-text">
                        <h3>{{ $customer->name }}</h3>
                        <p>{{ $customer->designation }}</p>
                    </div>

                    @if ($customer->status == 'active')
                        <a href="javascript:;" class="active">Active</a>
                    @else
                        <a href="javascript:;" class="active inactive">Inactive</a>
                    @endif

                </div>
                <div class="profile-edit-box">
                    <a href="javascript:;" onclick="editCustomerModal('{{ $customer->customer_id }}')"><img
                            class="img-fluid pen-tools" src="/assets/images/icons/edit-2.svg" alt="pen-images" /></a>
                    <a href="javascript:;" onclick="deleteCustomer()"><img class="img-fluid trash-tools"
                            src="/assets/images/icons/trash.svg" alt="trash-images" /></a>
                </div>
            </div>
            <!--customer profile header end-->
            <!--address info start-->

            <div class="address-info">
                @if ($customer->phone)
                    <div class="adress-info-text">
                        <p>Phone</p>
                        <a href="tel:{{ $customer->phone }}"><img src="/assets/images/icons/call.svg" alt="" />{{
                            $customer->phone }}</a>
                    </div>
                @endif

                @if ($customer->email)
                    <div class="adress-info-text">
                        <p>Email</p>
                        <a href="mailto:{{ $customer->email }}"><img src="/assets/images/icons/envelope.svg"
                                alt="" />{{ $customer->email }}</a>
                    </div>
                @endif

                @if ($customer->website)
                    <div class="adress-info-text">
                        <p>Website</p>
                        <a target="_blank" href="{{ $customer->website }}"><img src="/assets/images/icons/call.svg"
                                alt="" />{{ $customer->website }}</a>
                    </div>
                @endif

                @if ($customer->location)
                    <div class="adress-info-text">
                        <p>Location</p>
                        <a href="javascript:;"><img src="/assets/images/icons/location.svg" alt="" />{{ $customer->location }}</a>
                    </div>
                @endif
            </div>
            <!--address info end-->
            <!--service part start-->
            <div class="service-profile">
                <div class="service-text">
                    <p>Service:</p>
                    @if ($customer->service)
                        <a href="#" class="pe-none"> {{ $customer->service }}</a>
                    @endif
                </div>

                @if ($customer->company)
                    <div class="service-text border-line">
                        <p class="mb-0">Company:</p>
                        <a href="javascript:;" class="pe-none">{{ $customer->company }}</a>
                    </div>
                @endif

                @if ($customer->kvk)
                    <div class="service-text border-line">
                        <p class="mb-0">KVK:</p>
                        <a href="javascript:;" class="pe-none"> {{ $customer->kvk }} </a>
                    </div>
                @endif
            </div>
            <!--service part end-->
            <!--details page start-->
            @isset($customer->details)
                <div class="details">
                    <h3>Details</h3>
                    <p>
                        {{ $customer->details }}
                    </p>
                </div>
            @endisset
            <!--details page end-->
            <div class="header">
                <h3>Customer History</h3>
                <span class="paid">Total Paid= ${{ $customer->earning?->where('pay_status', 'paid')->sum('amount') ?? "0.00" }}</span>
            </div>

            @include('components.customer-history', ['customer' => $customer])
        </div>

    </section>
    <div class="showEditCustomerModal"></div>
@endsection



@section('script')
    <script>
        const editCustomerModal = (customerId) => {
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



        function updateStatus(newStatus) {
            document.getElementById('status').value = newStatus;
            capitalizeStatus = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
            document.getElementById('setStatus').innerHTML = capitalizeStatus;
        }
    </script>
    </script>


@endsection
