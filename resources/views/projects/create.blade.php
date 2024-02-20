<div class="custom-modal">
    <div class="modal fade" id="staticBackdropProject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-header-two">
                    <h1 class="modal-title" id="staticBackdropLabel">Add New Project</h1>
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="fas fa-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('projects.store') }}" class="common-form another-form" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="add-customer-form">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <!--modal left part start-->
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="form-group mt-0">
                                                        <div class="customer-modal-title">
                                                            <h3>Project Information</h3>
                                                        </div>
                                                        <hr>
                                                        <input type="file" name="thumbnail" id="thumbnail"
                                                            class="d-none">
                                                        <!-- upload thumbnail -->
                                                        <div class="project-thumbnail-upload">
                                                            <h3>Project Thumbnail</h4>
                                                                <div class="d-flex">
                                                                    <div class="thumbnail-preview"
                                                                        id="thumbnail-container">
                                                                        <img src="{{ url('assets/projects/project-01.png') }}"
                                                                            alt="Upload" class="img-fluid">
                                                                    </div>
                                                                    <label for="thumbnail"
                                                                        class="thumbnail-upload-icon">
                                                                        <img src="{{ url('/assets/images/icons/anchor.svg') }}"
                                                                            alt="Upload" class="img-fluid">
                                                                        <p> Upload </p>
                                                                    </label>
                                                                </div>
                                                        </div>
                                                        <!-- upload thumbnail -->
                                                    </div>
                                                </div>

                                                <div class="col-xl-12">
                                                    <div class="form-group form-error">
                                                        <label for="title">Project Name</label>
                                                        <input type="text" placeholder="Enter Title" id="title"
                                                            name="title" value="{{ old('title') }}"
                                                            value="{{ old('title') }}"
                                                            class="form-control @error('title') is-invalid @enderror">

                                                        @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-group form-error">
                                                        <label for="amount">Amount</label>
                                                        <input type="number" placeholder="€0000" id="amount"
                                                            name="amount" value="{{ old('amount') }}"
                                                            class="form-control @error('amount') is-invalid @enderror">

                                                        @error('amount')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-group form-error">
                                                        <label for="tax">Tax</label>
                                                        <input type="number" placeholder="€0000" id="tax" name="tax"
                                                            value="{{ old('tax') }}"
                                                            class="form-control @error('tax') is-invalid @enderror">

                                                        @error('tax')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-group form-error">
                                                        <label for="start_date">Start Date</label>
                                                        <input type="date" id="start_date" name="start_date"
                                                            value="{{ old('start_date') }}"
                                                            class="form-control @error('start_date') is-invalid @enderror">

                                                        @error('start_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-group form-error">
                                                        <label for="end_date">End Date</label>
                                                        <input type="date" id="end_date" name="end_date"
                                                            value="{{ old('end_date') }}"
                                                            class="form-control @error('end_date') is-invalid @enderror">

                                                        @error('end_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-group form-error">
                                                        <label for="note">Note</label>
                                                        <input type="text" placeholder="Write note" id="note"
                                                            name="note" value="{{ old('note') }}"
                                                            class="form-control @error('note') is-invalid @enderror">

                                                        @error('note')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="form-group form-error">
                                                        <label for="priority">Project Priority</label>
                                                        <input type="hidden" value="basic" id="priority"
                                                            name="priority">
                                                        <div class="common-dropdown common-dropdown-two">
                                                            <div class="dropdown dropdown-two">
                                                                <button class="btn" type="button"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <span class="priorityy text-capitalize">Select
                                                                        Priority</span>
                                                                    <i class="fas fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-two">
                                                                    <li>
                                                                        <a class="text-primary dropdown-item dropdown-item-two filterItem"
                                                                            href="#" data-value="basic">Basic<i
                                                                                class="fas fa-check"></i></a>
                                                                    </li>
                                                                    <li><a class="text-warning dropdown-item dropdown-item-two filterItem"
                                                                            href="#"
                                                                            data-value="important">Important</a>
                                                                    </li>
                                                                    <li><a class="text-danger dropdown-item dropdown-item-two filterItem"
                                                                            href="#" data-value="priority">Priority</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        @error('priority')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group form-error">
                                                        <label for="project_status">Project Status</label>
                                                        <input type="hidden" value="in_progress" id="project_status"
                                                            name="project_status">
                                                        <div class="common-dropdown common-dropdown-two">
                                                            <div class="dropdown dropdown-two">
                                                                <button class="btn" type="button"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <span class="project_statuss text-capitalize">Select
                                                                        Status</span>
                                                                    <i class="fas fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-two">
                                                                    <li>
                                                                        <a class="text-danger dropdown-item dropdown-item-two filterProjectStatus"
                                                                            href="#" data-value="cancel">Cancelled</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="text-warning dropdown-item dropdown-item-two filterProjectStatus"
                                                                            href="#" data-value="in_progress">In
                                                                            Progress</a>
                                                                    </li>
                                                                    <li><a class="text-primary dropdown-item dropdown-item-two filterProjectStatus"
                                                                            href="#"
                                                                            data-value="completed">Completed</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        @error('project_status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group form-error">
                                                        <label for="description">Description</label>
                                                        <textarea name="description" id="description" rows="7"
                                                            class="form-control @error('description') is-invalid @enderror"
                                                            placeholder="Enter details">{{ old('description') }}</textarea>

                                                        @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--modal left part end-->
                                        <div class="col-lg-6">
                                            <div class="customer-modal-title">
                                                <h3>Customer Information</h3>
                                            </div>
                                            <hr>
                                            <div class="col-xl-12">
                                                <div class="select-title">
                                                    <h3>Select Customer</h3>
                                                </div>
                                                <!-- customer search form start -->
                                                <div class="form-group search-by-name" style="grid-template-columns: 65% 35%!important">
                                                    <div class="search-item">
                                                        <img src="{{ url('assets/images/icons/search-ic.svg') }}"
                                                            alt="a" class="img-fluid search">

                                                        <input type="text" placeholder="Search by name" id="search"
                                                            class="form-control" autocomplete="off">

                                                        <div class="search-suggestions-box"></div>

                                                        <input type="hidden" name="customer_id" value=""
                                                            id="customer_id">

                                                    </div>
                                                    <div class="avatar-btn">
                                                        <a data-bs-toggle="collapse" href="#collapseTwo" role="button"
                                                            aria-expanded="false" aria-controls="collapseTwo"
                                                            type="button" id="addManualBttn">
                                                            <img src="{{ url('/assets/images/icons/user-add-two.svg') }}"
                                                                alt="a" class="img-fluid">Add Manually</a>
                                                    </div>
                                                </div>
                                                <!-- customer search form end -->

                                                <!-- selected customer start  -->
                                                <div class="row" id="selectedCustomerUi"></div>
                                                <!-- selected customer end  -->

                                                <!--collapse part start-->
                                                <div class="collapse" id="collapseTwo">
                                                    <div class="card-body">
                                                        <div class="modal-body">
                                                            <div class="common-form">
                                                                <div class="add-customer-form">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <hr>
                                                                            <div class="form-group">
                                                                                <label for="avatar">Profile
                                                                                    Image</label>
                                                                                <input type="file" name="avatar"
                                                                                    id="avatar" class="d-none">
                                                                                <!-- upload avatar -->
                                                                                <div class="d-flex">
                                                                                    <label for="avatar" class="avatar"
                                                                                        id="avatarLabel">
                                                                                        <img src="{{ url('/assets/users/avatar-9.png') }}"
                                                                                            alt="avatar"
                                                                                            class="img-fluid"
                                                                                            id="avatarPreview">
                                                                                        <span class="avatar-ol">
                                                                                            <img src="{{ url('/assets/images/icons/camera.svg') }}"
                                                                                                alt="camera"
                                                                                                class="img-fluid">
                                                                                        </span>
                                                                                    </label>
                                                                                    <label for="avatar">
                                                                                        <p><img src="{{ url('/assets/images/icons/anchor.svg') }}"
                                                                                                alt="anchor"
                                                                                                class="img-fluid">
                                                                                            Upload</p>
                                                                                    </label>
                                                                                </div>
                                                                                <!-- upload avatar -->
                                                                            </div>


                                                                        </div>
                                                                        {{-- add manual and seletd customer --}}
                                                                        <input type="hidden" name="manualyCustomer"
                                                                            value="0" id="addManual">
                                                                        {{-- add manual and seletd customer --}}
                                                                        <div class="col-xl-6">
                                                                            <div class="form-group form-error">
                                                                                <label for="name">Name</label>
                                                                                <input type="text"
                                                                                    placeholder="Enter Name" id="name"
                                                                                    name="name"
                                                                                    value="{{ old('name') }}"
                                                                                    class="form-control @error('name') is-invalid @enderror">

                                                                                @error('name')
                                                                                <span class="invalid-feedback"
                                                                                    role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xl-6">
                                                                            <div class="form-group form-error">
                                                                                <label
                                                                                    for="designation">Designation</label>
                                                                                <input type="text"
                                                                                    placeholder="Enter Designation" {{
                                                                                    old('designation') }}
                                                                                    id="designation" name="designation"
                                                                                    class="form-control @error('designation') is-invalid @enderror">

                                                                                @error('designation')
                                                                                <span class="invalid-feedback"
                                                                                    role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="form-group form-error">
                                                                                <label for="email">E-mail</label>
                                                                                <input type="email"
                                                                                    placeholder="Enter email address"
                                                                                    id="email" name="email"
                                                                                    class="form-control @error('email') is-invalid @enderror">

                                                                                @error('email')
                                                                                <span class="invalid-feedback"
                                                                                    role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="form-group form-error">
                                                                                <label for="phone">Phone</label>
                                                                                <input type="number"
                                                                                    placeholder="Enter phone number"
                                                                                    id="phone" name="phone"
                                                                                    class="form-control @error('phone') is-invalid @enderror">

                                                                                @error('phone')
                                                                                <span class="invalid-feedback"
                                                                                    role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="form-group form-error">
                                                                                <label for="location">Location</label>
                                                                                <input type="text"
                                                                                    placeholder="Enter location"
                                                                                    id="location" name="location"
                                                                                    class="form-control @error('location') is-invalid @enderror">

                                                                                @error('location')
                                                                                <span class="invalid-feedback"
                                                                                    role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="form-group form-error">
                                                                                <label for="customer_status">
                                                                                    Active
                                                                                    Status
                                                                                </label>
                                                                                <input type="hidden" value="inactive"
                                                                                    id="customer_status"
                                                                                    name="customer_status">
                                                                                <div
                                                                                    class="common-dropdown common-dropdown-two">
                                                                                    <div class="dropdown dropdown-two">
                                                                                        <button class="btn"
                                                                                            type="button"
                                                                                            data-bs-toggle="dropdown"
                                                                                            aria-expanded="false">
                                                                                            <span
                                                                                                class="customer_statuss text-capitalize">
                                                                                                Select Status
                                                                                            </span><i
                                                                                                class="fas fa-angle-down"></i>
                                                                                        </button>
                                                                                        <ul
                                                                                            class="dropdown-menu dropdown-menu-two">
                                                                                            <li><a class="dropdown-item dropdown-item-two statusFilterCustomer text-primary"
                                                                                                    href="#"
                                                                                                    data-value="active">Active</a>
                                                                                            </li>
                                                                                            <li><a class="dropdown-item dropdown-item-two statusFilterCustomer"
                                                                                                    href="#"
                                                                                                    data-value="inactive">Inactive</a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>

                                                                                @error('customer_status')
                                                                                <span class="invalid-feedback"
                                                                                    role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="form-group form-error">
                                                                                <label for="kvk">KVK</label>
                                                                                <input type="text"
                                                                                    placeholder="Enter kvk number"
                                                                                    id="kvk" name="kvk"
                                                                                    class="form-control @error('kvk') is-invalid @enderror">

                                                                                @error('kvk')
                                                                                <span class="invalid-feedback"
                                                                                    role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="form-group form-error">
                                                                                <label for="company">Company</label>
                                                                                <input type="text"
                                                                                    placeholder="Enter company name"
                                                                                    id="company" name="company"
                                                                                    class="form-control @error('company') is-invalid @enderror">

                                                                                @error('company')
                                                                                <span class="invalid-feedback"
                                                                                    role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="form-group form-error">
                                                                                <label for="website">Website</label>
                                                                                <input type="text"
                                                                                    placeholder="Enter website"
                                                                                    id="website" name="website"
                                                                                    class="form-control @error('website') is-invalid @enderror">

                                                                                @error('website')
                                                                                <span class="invalid-feedback"
                                                                                    role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        {{-- <div class="col-xl-6">
                                                                            <div class="form-group form-error">
                                                                                <label for="service">Service</label>
                                                                                <input type="hidden"
                                                                                    name="service_type_id"
                                                                                    id="service_type_id">
                                                                                <div
                                                                                    class="common-dropdown common-dropdown-two common-dropdown-three">
                                                                                    <div
                                                                                        class="dropdown dropdown-two dropdown-three">
                                                                                        <button class="btn"
                                                                                            type="button"
                                                                                            data-bs-toggle="dropdown"
                                                                                            aria-expanded="false">
                                                                                            <div id="setType">Select
                                                                                                Below</div><i
                                                                                                class="fas fa-angle-down"></i>
                                                                                        </button>
                                                                                        <ul
                                                                                            class="dropdown-menu dropdown-menu-two dropdown-menu-three">

                                                                                            @foreach ($service_types as $serviceType)
                                                                                            <li>
                                                                                                <a class="dropdown-item dropdown-item-two service-type"
                                                                                                    href="javascript:;"
                                                                                                    data-id="{{ $serviceType->service_type_id }}">{{
                                                                                                    $serviceType->name
                                                                                                    }}</a>
                                                                                            </li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>

                                                                                @error('service_type_id')
                                                                                <div class="text-danger">{{ $message }}
                                                                                </div>
                                                                                @enderror
                                                                            </div>
                                                                        </div> --}}


                                                                        <div class="col-xl-6">
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
                                                                                                    data-id="{{ $leadType->lead_type_id }}">{{
                                                                                                    $leadType->name }}</a>
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
                                                                                <textarea name="details" id="details"
                                                                                    rows="7"
                                                                                    class="form-control @error('name') is-invalid @enderror"
                                                                                    placeholder="Enter details"></textarea>

                                                                                @error('details')
                                                                                <span class="invalid-feedback"
                                                                                    role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--collapse part end-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--modal button start-->
                                <div class="col-xl-6">
                                    <div class="form-bttn">
                                        <button type="button" class="btn btn-cancel"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-bttn">
                                        <button type="submit" class="btn btn-submit">Submit</button>
                                    </div>
                                </div>
                                <!--modal button end-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- select priority js --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let priorityInput = document.getElementById("priority");
        let priorityy = document.querySelector(".priorityy");
        let dropdownItemsFilter = document.querySelectorAll(".filterItem");

        dropdownItemsFilter.forEach(item => {
            item.addEventListener("click", function(e) {
                e.preventDefault();
                priorityy.innerHTML = this.getAttribute("data-value");
                priorityInput.value = this.getAttribute("data-value");
            });
        });
    });
</script>

{{-- select project status js --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let project_statuss = document.getElementById("project_status");
        let project_statusss = document.querySelector(".project_statuss");
        let filterProjectStatus = document.querySelectorAll(".filterProjectStatus");

        filterProjectStatus.forEach(item => {
            item.addEventListener("click", function(e) {
                e.preventDefault();
                project_statusss.innerHTML = this.innerHTML;
                project_statuss.value = this.getAttribute("data-value");
            });
        });
    });
</script>

{{-- thumbnail upload preview js --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var thumbnailContainer = document.getElementById('thumbnail-container');

        document.getElementById('thumbnail').addEventListener('change', function (e) {
            var input = e.target;
            var file = input.files[0];

            var thumbnailPreview = document.getElementById('thumbnail-preview');
            var closeIcon = document.getElementById('close-icon');

            if (file) {
                if (!thumbnailPreview) {
                    thumbnailPreview = document.createElement('img');
                    thumbnailPreview.id = 'thumbnail-preview';
                    thumbnailPreview.className = 'img-fluid proThumb';
                    thumbnailContainer.innerHTML = '';
                    thumbnailContainer.appendChild(thumbnailPreview);
                }

                if (!closeIcon) {
                    closeIcon = document.createElement('i');
                    closeIcon.id = 'close-icon';
                    closeIcon.className = 'fas fa-close close-icon';
                    closeIcon.style.cursor = 'pointer';
                    closeIcon.addEventListener('click', function () {
                        thumbnailPreview.src = '';
                        thumbnailContainer.removeChild(closeIcon);
                        document.getElementById('thumbnail').value = '';
                    });
                    thumbnailContainer.appendChild(closeIcon);
                }

                var reader = new FileReader();
                reader.onload = function (e) {
                    thumbnailPreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                if (closeIcon) {
                    thumbnailContainer.removeChild(closeIcon);
                }
            }
        });
    });
</script>

{{-- customer search ajax request --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var searchSuggestionsBox = document.querySelector('.search-suggestions-box');
        let searchInput = document.getElementById("search");

        searchInput.addEventListener('input', function() {
            var search = searchInput.value.trim();
            if (search.length === 0) {
                searchSuggestionsBox.innerHTML = '';
            }
            fetchSearchResults(search);
        });

        function fetchSearchResults(searchTerm) {
            let currentURL = window.location.href;
            const baseUrl = currentURL.split('/').slice(0, 3).join('/');

            fetch(`${baseUrl}/search-customers?name=${searchTerm}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => response.json())
            .then(data => {
                displaySearchResults(data.message);
            })
            .catch(error => {
                searchSuggestionsBox.innerHTML = '';
                console.error('Error fetching search results:', error);
            });
        }

        function displaySearchResults(customers) {

            searchSuggestionsBox.innerHTML = '';
            const baseUrl2 = window.location.href.split('/').slice(0, 3).join('/');

            customers.forEach(function(customer) {
                var profileMarkup = `
                    <a href="#" class="select-customer" data-id="${customer.customer_id}">
                        <div class="selected-profile-box mt-0 bg-white border-0 p-0">
                        <div class="media">
                            <img src="${customer.avatar ? baseUrl2 + '/' + customer.avatar : '{{ url('uploads/users/avatar-9.png')}}'}" class="img-fluid avatar" alt="avatar">
                            <div class="media-body">
                                <h3>${customer.name}</h3>
                                <p>${customer.designation}</p>
                            </div>
                        </div>
                    </div>
                    </a>
                `;
                searchSuggestionsBox.insertAdjacentHTML('beforeend', profileMarkup);
            });

            // select customer from suggest
            let selectedCustomerUi = document.getElementById('selectedCustomerUi');
            let customer_id = document.getElementById('customer_id');
            let selectCustomers = document.querySelectorAll('.select-customer');

           // Store selected customer IDs
            var selectedCustomers = [];

            // Loop through each customer
            selectCustomers.forEach(customer => {
                customer.addEventListener('click', function(event) {
                    var customerId = this.getAttribute('data-id');

                    if (!selectedCustomers.includes(customerId)) {
                        selectedCustomers.push(customerId);

                        var avatar = this.querySelector('.media img').getAttribute('src');
                        var name = this.querySelector('.media-body h3').textContent;
                        var designation = this.querySelector('.media-body p').textContent;

                        let customerHTML = `
                            <div class="col-lg-6 prfile-box">
                                <div class="selected-profile-box">
                                    <div class="media">
                                        <img src="${avatar}" class="img-fluid avatar" alt="avatar">
                                        <div class="media-body">
                                            <h3>${name}</h3>
                                            <p>${designation}</p>
                                        </div>
                                        <a href="#" class="close-customer">
                                            <img src="{{ url('/assets/images/icons/close-2.svg') }}" alt="a" class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        `;

                        // Append the customer HTML to the selectedCustomerUi
                        selectedCustomerUi.innerHTML += customerHTML;

                        // Update the value of the input field
                        if (customer_id.value !== '') {
                            customer_id.value += ',' + customerId;
                        } else {
                            customer_id.value = customerId;
                        }
                    }
                });
            });

        }
    });
</script>

<script>
    document.getElementById('addManualBttn').addEventListener('click', function(e) {
    var addManualInput = document.getElementById('addManual');

    addManualInput.value = addManualInput.value == '0' ? '1' : '0';
});
</script>

{{-- select customer status js --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let customer_status = document.getElementById("customer_status");
        let customer_statusss = document.querySelector(".customer_statuss");
        let statusFilterCustomer = document.querySelectorAll(".statusFilterCustomer");

        statusFilterCustomer.forEach(item => {
            item.addEventListener("click", function(e) {
                e.preventDefault();
                customer_statusss.innerHTML = this.getAttribute("data-value");
                customer_status.value = this.getAttribute("data-value");
            });
        });
    });
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
