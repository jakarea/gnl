<div class="form-box mt-4">
    <div class="title">
        <h3>Address</h3>
        <a href="{{ route('account.address') }}">
            <img src="/assets/images/icons/pen.svg" alt="I" class="img-fluid">
        </a>
    </div>
    <!-- table start -->
    <div class="personal-info-table-wrap">
        <table>
            <tr>
                <td>
                    <p>Primary addresss</p>
                </td>
                <td>
                    <h6>{{ $user->address ?? 'N/A' }}</h6>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Country</p>
                </td>
                <td>
                    <h6>{{ $user->country ?? 'N/A' }}</h6>
                </td>
            </tr>
            <tr>
                <td>
                    <p>State</p>
                </td>
                <td>
                    <h6>{{ $user->state ?? 'N/A' }}</h6>
                </td>
            </tr>
            <tr>
                <td>
                    <p>City</p>
                </td>
                <td>
                    <h6>{{ $user->city ?? 'N/A' }}</h6>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Post Code</p>
                </td>
                <td>
                    <h6>{{ $user->post_code ?? 'N/A' }}</h6>
                </td>
            </tr>
        </table>
    </div>
    <!-- table end -->
</div>
