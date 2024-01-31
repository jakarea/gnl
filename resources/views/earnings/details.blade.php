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
                                <img src="uploads/users/avatar-9.png" alt="avatar" class="img-fluid" />
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
                            @if ($earning->customer)
                                @if ($earning->customer->phone)
                                <div class="adress-info-text">
                                    <p>Phone</p>
                                    <a href="tel:{{ $earning->customer->phone }}">
                                        <img src="{{ asset('assets/images/icons/call.svg') }}" alt="" />{{ $earning->customer->phone }}
                                    </a>
                                </div>
                                @endif

                                @if ($earning->customer->email)
                                <div class="adress-info-text">
                                    <p>Email</p>
                                    <a href="mailto:{{ $earning->customer->email }}">
                                        <img src="{{ asset('assets/images/icons/envelope.svg') }}" alt="" />{{ $earning->customer->email
                                        }}
                                    </a>
                                </div>
                                @endif

                                @if ($earning->customer->website)
                                <div class="address-info-text">
                                    <p>Website</p>
                                    <a target="_blank" href="{{ $earning->customer->website }}">
                                        <img src="{{ asset('assets/images/icons/location.svg') }}" alt="" />{!!
                                        $earning->customer->website !!}
                                    </a>
                                </div>
                                @endif

                                @if ($earning->customer->location)
                                <div class="address-info-text">
                                    <p>Location</p>
                                    <a target="_blank" href="{{ $earning->customer->location }}">
                                        <img src="{{ asset('assets/images/icons/location.svg') }}"
                                            alt="location icon" />{!! $earning->customer->location !!}
                                    </a>
                                </div>
                                @endif
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
                            <span class="paid">Total Paid = {{ $earning->amount }}</span>
                        </div>
                        <div class="user-payment-table">
                            <table>
                                <tr>
                                    <th width="3%">No</th>
                                    <th class="d-flex justify-content-between">
                                        <span>Service</span>
                                        <div class="filter-sort-box">
                                            <div class="dropdown">
                                                <button class="btn p-0" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false" id="dropdownBttn"></button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item filterItem" href="#" data-value="asc">In
                                                            order A-Z</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item filterItem" href="#"
                                                            data-value="desc">In order Z-A</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </th>
                                    <th>Payment Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                                <!-- payment single item start -->
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="media">
                                            <div class="media-body">
                                                <h5>Dashboard Design</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>09 Oct, 2023</p>
                                    </td>
                                    <td>
                                        <p>$1,290</p>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>
                                                <span class="btn-pending">Pending</span>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- payment single item end -->
                                <!-- payment single item start -->
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="media">
                                            <div class="media-body">
                                                <h5>App Design</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>09 Oct, 2023</p>
                                    </td>
                                    <td>
                                        <p>$2,640</p>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>
                                                <span class="btn-view btn-export">Paid</span>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- payment single item end -->
                                <!-- payment single item start -->
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <div class="media">
                                            <div class="media-body">
                                                <h5>Landing Page Design</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>09 Oct, 2023</p>
                                    </td>
                                    <td>
                                        <p>$1,290</p>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>
                                                <span class="btn-view btn-export">Paid</span>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- payment single item end -->
                                <!-- payment single item start -->
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <div class="media">
                                            <div class="media-body">
                                                <h5>Logo Design</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>09 Oct, 2023</p>
                                    </td>
                                    <td>
                                        <p>$2,609</p>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>
                                                <span class="btn-view btn-export">Paid</span>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- payment single item end -->
                                <!-- payment single item start -->
                                <tr>
                                    <td>5</td>
                                    <td>
                                        <div class="media">
                                            <div class="media-body">
                                                <h5>Dashboard Design</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p>09 Oct, 2023</p>
                                    </td>
                                    <td>
                                        <p>$2,608</p>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>
                                                <span class="btn-view btn-export">Paid</span>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- payment single item end -->
                            </table>
                        </div>
                    </div>
                    <!-- customer details end -->
                </div>
            </div>
        </div>
    </div>
</div>