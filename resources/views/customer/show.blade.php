@extends('layouts.auth')

@section('title', 'Customer Details Page')

@section('content')

    <!-- main page wrapper start -->
    <section className="main-page-wrapper">
        <h2>Customer Detail</h2>

        <div className="payment-from-copany-user">

            <div className="profile-header">
                <div className="profile-box">
                    <Image src={avatar} alt="a" className="img-fluid pen-tools" />
                    <div className="profile-text">
                        <h3>{{ $customer->name }}}</h3>
                        <p>{{ $customer->designation }}</p>
                    </div>
                    <a href="#" className="active">{customer.status ? 'Active' : "Deactive"}</a>
                </div>
                <div className="profile-edit-box">
                    ===================
                    {{-- <CustomerEditDeleteButton customer={customer} /> --}}
                </div>
            </div>


            <div class="address-info">
                @if ($customer->phone)
                    <div class="adress-info-text">
                        <p>Phone</p>
                        <a href="tel:{{ $customer->phone }}">
                            <img src="{{ asset('path/to/callIcon.png') }}" alt="call icon" />{{ $customer->phone }}
                        </a>
                    </div>
                @endif

                @if ($customer->email)
                    <div class="adress-info-text">
                        <p>Email</p>
                        <a href="mailto:{{ $customer->email }}">
                            <img src="{{ asset('path/to/emailIcon.png') }}" alt="email icon" />{{ $customer->email }}
                        </a>
                    </div>
                @endif

                @if ($customer->website)
                    <div class="address-info-text">
                        <p>Website</p>
                        <a href="{{ $customer->website }}">
                            <img src="{{ asset('path/to/callIcon.png') }}" alt="call icon" />{{ $customer->website }}
                        </a>
                    </div>
                @endif

                @if ($customer->location)
                    <div class="address-info-text">
                        <p>Location</p>
                        <a href="{{ $customer->location }}">
                            <img src="{{ asset('path/to/location.png') }}" alt="location icon" />{{ $customer->location }}
                        </a>
                    </div>
                @endif
            </div>



            <div class="service-profile">
                <div class="service-text">
                    <p class="ps-0 mb-0">Service:</p>

                    @if ($customer->service)
                        <a href="#"> {{ $customer->service }}</a>
                    @endif
                </div>

                @if ($customer->company)
                    <div class="service-text border-line">
                        <p class="mb-0">Company:</p>
                        <a href="#">{{ $customer->company }}</a>
                    </div>
                @endif

                @if ($customer->kvk)
                    <div class="service-text border-line">
                        <p class="mb-0">KVK:</p>
                        <a href="#"> {{ $customer->kvk }} </a>
                    </div>
                @endif
            </div>


            <div class="details">
                <h3>Details</h3>
                <p>
                    {{ $customer->details }}
                </p>
            </div>


            <div className="header">
                <h3>Customer History</h3>
                <span className="paid">Total Paid= $1,956</span>
            </div>
            <div className="user-payment-table">
                <table>
                    <tbody>
                        <tr>
                            <th width="3%">No</th>
                            <th className="d-flex justify-content-between">
                                <span>Service</span>
                                <div className="filter-sort-box">
                                    <div className="dropdown">
                                        <button className="btn p-0" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false" id="dropdownBttn"></button>
                                        <ul className="dropdown-menu">
                                            <li>
                                                <a className="dropdown-item filterItem" href="#" data-value="asc">In
                                                    order A-Z</a>
                                            </li>
                                            <li>
                                                <a className="dropdown-item filterItem" href="#" data-value="desc">In
                                                    order Z-A</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </th>
                            <th>Payment Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>


                        <tr>
                            <td>1</td>
                            <td>
                                <div className="media">
                                    <div className="media-body">
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
                                        <span className="btn-pending">Pending</span>
                                    </li>
                                </ul>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>


    </section>
@endsection
