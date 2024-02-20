<div class="custom-modal client-details-modal">
    <div class="modal fade earning-details-modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-header-two">
                    <h1 class="modal-title" id="staticBackdropLabel">Customer Detail</h1>
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="fas fa-close"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- customer details start -->
                    <div class="payment-from-copany-user">
                        <!--customer profile header start-->
                        <div class="profile-header">
                            <div class="profile-box">
                                @if ($earning->customer->avatar)
                                    <img src="{{ asset($earning->customer->avatar) }}" alt="avatar"
                                        class="img-fluid" />
                                @else
                                    <img src="{{ asset('assets/users/avatar-9.png') }}" alt="default avatar"
                                        class="img-fluid" />
                                @endif
                                <div class="profile-text">
                                    <h3>{{ $earning->customer->name }}</h3>
                                    <p>{{ $earning->customer->designation }}</p>
                                </div>
                                @if ($earning->customer->status == 'active')
                                    <a href="javascript:;" class="active">Active</a>
                                @else
                                    <a href="javascript:;" class="inactive">Inactive</a>
                                @endif

                            </div>
                        </div>
                        <!--customer profile header end-->
                        <!--address info start-->
                        <div class="address-info">
                            @if ($earning->customer->phone)
                                <div class="adress-info-text">
                                    <p>Phone</p>
                                    <a href="tel:{{ $earning->customer->phone }}"><img src="/assets/images/icons/call.svg"
                                            alt="" />{{ $earning->customer->phone }}</a>
                                </div>
                            @endif

                            @if ($earning->customer->email)
                                <div class="adress-info-text">
                                    <p>Email</p>
                                    <a href="mailto:{{ $earning->customer->email }}"><img
                                            src="/assets/images/icons/envelope.svg"
                                            alt="" />{{ $earning->customer->email }}</a>
                                </div>
                            @endif

                            @if ($earning->customer->website)
                                <div class="adress-info-text">
                                    <p>Website</p>
                                    <a target="_blank" href="{{ $earning->customer->website }}"><img
                                            src="/assets/images/icons/call.svg"
                                            alt="" />{{ $earning->customer->website }}</a>
                                </div>
                            @endif

                            @if ($earning->customer->location)
                                <div class="adress-info-text">
                                    <p>Location</p>
                                    <a href="javascript:;"><img src="/assets/images/icons/location.svg"
                                            alt="" />{{ $earning->customer->location }}</a>
                                </div>
                            @endif
                        </div>
                        <!--address info end-->
                        <!--service part start-->
                        <div class="service-profile">
                            <div class="service-text">
                                <p>Service:</p>
                                @if ($earning->pay_services)
                                    <a href="#"> {{ $earning->pay_services }}</a>
                                @endif
                            </div>

                            @if ($earning->customer->company)
                                <div class="service-text border-line">
                                    <p class="mb-0">Company:</p>
                                    <a href="#">{{ $earning->customer->company }}</a>
                                </div>
                            @endif

                            @if ($earning->customer->kvk)
                                <div class="service-text border-line">
                                    <p class="mb-0">KVK:</p>
                                    <a href="#"> {{ $earning->customer->kvk }} </a>
                                </div>
                            @endif
                        </div>
                        <!--service part end-->
                        <!--details page start-->
                        @isset($earning->customer->details)
                            <div class="details">
                                <h3>Details</h3>
                                <p>
                                    {{ $earning->customer->details }}
                                </p>
                            </div>
                        @endisset
                        <!--details page end-->
                        <div class="header">
                            <h3>Customer History</h3>
                            <span class="paid">Total Paid = ${{ $earning->where('pay_status', 'paid')->sum('amount') ?? "0.00" }}</span>
                        </div>
                        @include('components.customer-history', ['customer' => $earning->customer])
                    </div>
                    <!-- customer details end -->
                </div>
            </div>
        </div>
    </div>
</div>
