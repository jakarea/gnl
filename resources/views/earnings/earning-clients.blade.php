<div class="user-payment-table">
    <table>
        <tr>
            <th width="3%">No</th>
            <th class="d-flex justify-content-between">
                <span>Name</span>
            </th>
            <th>Active Status</th>
            <th>Payment Date</th>
            <th>Service</th>
            <th>Amount</th>
            <th class="text-center">Payment Status</th>
            <th></th>
        </tr>
        @foreach ($earnings as $earning)
            <!-- payment single item start -->
            <tr>
                <td>
                    {{ ($earnings->currentPage() - 1) * $earnings->perPage() + $loop->iteration }}
                </td>
                <td>
                    <div class="media">
                        @if ($earning->customer->avatar)
                            <img src="{{ asset($earning->customer->avatar) }}" alt="avatar"
                                class="img-fluid avatar" />
                        @else
                            <img src="{{ asset('uploads/users/avatar-9.png') }}" alt="avatar"
                                class="img-fluid avatar" />
                        @endif

                        <div class="media-body">
                            <h5><a href="{{ route('customers.show', $earning->customer->customer_id) }}">{{ $earning->customer->name }}</a></h5>
                            <span>{{ $earning->customer->email }}</span>
                        </div>
                    </div>
                </td>
                <td>
                    @if ($earning->customer->status == 'active')
                        <p class="active-status" style="color: #08B86E;">Active</p>
                    @else
                        <p class="active-status text-danger">Inactive</p>
                    @endif

                </td>
                <td>
                    <p>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $earning->pay_date)->format('d M, Y') }}
                    </p>
                </td>
                <td>
                    <p class="text-capitalize">{{ $earning->pay_services }} Services</p>
                </td>
                <td>
                    <p>€{{ $earning->amount }}</p>
                </td>

                <td>
                    <ul>
                        <li>
                            @if ($earning->pay_status == 'unpaid')
                                <a href="#" class="btn-view no-ans-btn">Unpaid</a>
                            @elseif($earning->pay_status == 'paid')
                                <a href="#" class="btn-view btn-completed">Paid</a>
                            @endif

                        </li>
                    </ul>
                </td>

                <td>
                    <div class="table-dropdown">
                        <a href="#" type="button" class="dot-bttn" data-bs-toggle="dropdown"
                            aria-expanded="false" aria-expanded="false">
                            <img src="{{ url('/assets/images/icons/dots-horizontal.svg') }}"
                                class="img-fluid" alt="">
                        </a>
                        <div class="dropdown-menu">
                                <a class="dropdown-item earningModalDetails w-100 border-0 py-4" href="javascript:;"
                                data-earning-id="{{ $earning->earning_id }}">View Details</a>

                            <form action="{{ route('earning.destroy-earnings', $earning->earning_id) }}"
                                class="d-inline" method="POST">
                                @csrf
                                <button type="submit" class="btn dropdown-item">Delete Payment</button>
                            </form>
                        </div>
                    </div>
                </td>

            </tr>
            <!-- payment single item end -->
        @endforeach
    </table>
</div>
{{-- paggination wrap --}}
<div class="row mt-5">
    {!! $earnings->links('pagination::gnl-pagination') !!}
</div>
