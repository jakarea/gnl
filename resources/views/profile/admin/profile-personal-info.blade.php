<div class="form-box">

        <div class="title">
            <h3>Personal Info</h3>
            <a href="{{ route('account.settings') }}">
                <img src="/assets/images/icons/pen.svg" alt="I" class="img-fluid">
            </a>
        </div>


    <!-- table start -->
    <div class="personal-info-table-wrap">
        <table>
            <tr>
                <td>
                    <p>Full Name</p>
                </td>
                <td>
                    <h6>{{ $user->full_name ?? "N/A" }}</h6>
                </td>
                <td>
                    <p>Gender</p>
                </td>
                <td>
                    <h6>{{ $user->gender ?? "N/A" }}</h6>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Designation</p>
                </td>
                <td>
                    <h6>{{ $user->designation ?? "N/A" }}</h6>
                </td>
                <td>
                    <p>Marital Status</p>
                </td>
                <td>
                    <h6>{{ $user->marital_status ?? "N/A" }}</h6>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Date of Birth</p>
                </td>
                <td>
                    <h6>{{ $user->birth ?? "N/A" }}</h6>
                </td>
                <td>
                    <p>Phone Number</p>
                </td>
                <td>
                    <h6>{{ $user->phone ?? "N/A" }}</h6>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Nationality</p>
                </td>
                <td>
                    <h6>{{ $user->nationality ?? "N/A" }}</h6>
                </td>
                <td>
                    <p>Email Address</p>
                </td>
                <td>
                    <h6>{{ $user->email ?? "N/A" }}</h6>
                </td>
            </tr>
        </table>
    </div>
    <!-- table end -->
</div>
