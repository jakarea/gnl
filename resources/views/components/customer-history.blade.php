<div class="user-payment-table">
    <table>
        <tr>
            <th width="3%">No</th>
            <th class="d-flex justify-content-between">
                <span>Service</span>
                <div class="filter-sort-box">
                    <div class="dropdown">
                        <button class="btn p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                            id="dropdownBttn"></button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item filterItem" href="#" data-value="asc">In
                                    order A-Z</a>
                            </li>
                            <li>
                                <a class="dropdown-item filterItem" href="#" data-value="desc">In
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
        <!-- payment single item start -->
        @if ($customer->earnings)
            @foreach ($customer->earnings as $payment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div class="media">
                            <div class="media-body">
                                <h5>{{ optional($payment->customer->projects->first())->name }}</h5>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p>{{ \Carbon\Carbon::parse($payment->pay_date)->format('d M, Y') }}</p>
                    </td>
                    <td>
                        <p>{{ $payment->amount }}</p>
                    </td>
                    <td>
                        <ul>
                            <li>
                                @if ($payment->pay_status == 'pending')
                                    <a href="javascript:;" class="status unpaid">{{ ucfirst($payment->pay_status) }}</a>
                                @elseif ($payment->pay_status == 'processing')
                                    <a href="javascript:;" class="btn-pending">{{ ucfirst($payment->pay_status) }}</a>
                                @else
                                    <a href="javascript:;" class="btn-view btn-export">{{ ucfirst($payment->pay_status) }}</a>
                                @endif
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
</div>
