<div class="custom-modal">
    <div class="modal fade" id="taskEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header modal-header-two">
                    <h1 class="modal-title" id="staticBackdropLabel">Edit Task</h1>
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="fas fa-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('/to-do-list/' . $task->task_id . '/update') }}"
                        class="common-form another-form" enctype="multipart/form-data">
                        <input class="setCustomerId" type="hidden" name="project_id" value="{{ $task->project_id }}">
                        <input type="hidden" name="priority" class="priority" value="{{ $task->priority }}">
                        <input type="hidden" name="manualyCustomer" id="manualyCustomer" value="false">
                        <input type="hidden" name="status" id="status" value="active">
                        <input type="hidden" name="service_type_id" class="service_type_id">
                        <input type="hidden" name="lead_type_id" class="lead_type_id">
                        @csrf
                        @method('put')

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
                                                            <h3>Task Information</h3>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group form-error mt-0">
                                                        <label for="title">Task Title</label>
                                                        <input type="text" placeholder="Enter title" id="title"
                                                            name="title" class="form-control"
                                                            value="{{ $task->title ?? old('title') }}">
                                                        @error('title')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group form-error">
                                                        <label for="website">Priority</label>
                                                        <div class="common-dropdown common-dropdown-two">
                                                            <div class="dropdown dropdown-two">
                                                                <button class="btn" type="button"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <div class="setPriority">{{ $task->priority ?? "Select Priority" }}</div>
                                                                    <i class="fas fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-two">
                                                                    <li><a onclick="updatePriority('basic')"
                                                                            class="text-primary dropdown-item dropdown-item-two"
                                                                            href="javascript:;">Basic<i
                                                                                class="fas fa-check"></i></a></li>
                                                                    <li><a onclick="updatePriority('important')"
                                                                            class="text-warning dropdown-item dropdown-item-two"
                                                                            href="javascript:;">Important</a>
                                                                    </li>
                                                                    <li><a onclick="updatePriority('priority')"
                                                                            class="text-danger dropdown-item dropdown-item-two"
                                                                            href="javascript:;">Priority</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        @error('priority')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-xl-12">
                                                    <div class="form-group form-error">
                                                        <label for="date">Date</label>
                                                        <input type="date" placeholder="dd-mm-yyyy" id="date"
                                                            name="date" class="form-control"
                                                            value="{{ $task->date ?? old('date') }}">
                                                        @error('date')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="form-group form-error">
                                                        <label for="schedule">Schedule</label>
                                                        <input type="time" placeholder="dd-mm-yyyy" id="schedule"
                                                            name="schedule" class="form-control"
                                                            value="{{ $task->start_time ?? old('start_time') }}">
                                                        @error('schedule')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group form-error">
                                                        <label for="details">Description</label>
                                                        <textarea name="description" id="details" rows="7" class="form-control" placeholder="Enter details">{{ $task->description ?? old('description') }}</textarea>
                                                        @error('description')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--modal left part end-->
                                        <div class="col-lg-6">
                                            <div class="project-add-scrollbar custom-scroll-bar">
                                                <div class="customer-modal-title">
                                                    <h3>Project Information</h3>
                                                </div>
                                                <hr>
                                                <div class="col-xl-12">
                                                    <div class="select-title">
                                                        <h3>Select Project</h3>
                                                    </div>
                                                    <!-- customer search form start -->
                                                    <div class="form-group search-by-name mt-2 grid-100">
                                                        <div class="search-item">
                                                            <img src="./assets/images/icons/search-ic.svg"
                                                                alt="a" class="img-fluid search">
                                                            <input oninput="searchProject(event)" type="text"
                                                                placeholder="Search Project" name="search"
                                                                class="form-control">
                                                        </div>
                                                        <div class="projectSearch">
                                                            @if ($task->project_id)
                                                                <div class="col-lg-6">
                                                                    <div class="selected-profile-box">
                                                                        <div class="media">
                                                                            @if ($task->project->avatar)
                                                                                <img src="{{ asset('storage/' . $task->project->thumbnail) }}"
                                                                                    alt="avatar"
                                                                                    class="img-fluid avatar" />
                                                                            @else
                                                                                <img src="{{ asset('uploads/projects/project-01.png') }}"
                                                                                    alt="a"
                                                                                    class="img-fluid avatar">
                                                                            @endif
                                                                            <div class="media-body">
                                                                                <h3>{{ $task->project->title }}</h3>
                                                                            </div>
                                                                            {{-- <a href="javascript:;"
                                                                                onclick="removeProjectById('{{ $task->project_id }}')">
                                                                                <img src="./assets/images/icons/close-2.svg"
                                                                                    alt="a" class="img-fluid">
                                                                            </a> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        @error('project_id')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>


                                                    <div class="row loadProjectById"></div>

                                                    <div class="customer-modal-title">
                                                        <h3>Customer Information</h3>
                                                    </div>
                                                    <hr>

                                                    <!-- customer search form end -->
                                                    <div class="select-title">
                                                        <h3>Select Customer</h3>
                                                    </div>
                                                    <!-- customer search form start -->
                                                    <div class="form-group search-by-name mt-2">
                                                        <div class="search-item">
                                                            <img src="assets/images/icons/search-ic.svg"
                                                                alt="a" class="img-fluid search">
                                                            <input type="text" placeholder="Search by name"
                                                                id="search1" class="form-control"
                                                                autocomplete="off">
                                                            <div class="search-suggestions-box"></div>

                                                            <input type="hidden" name="customer_id"
                                                                value="{{ $task->customer_id }}" id="customer_id1">
                                                        </div>
                                                        <div class="avatar-btn">
                                                            <a onclick="addManualyCustomer()"
                                                                data-bs-toggle="collapse" href="#collapseTwo"
                                                                role="button" aria-expanded="false"
                                                                aria-controls="collapseTwo" type="button">
                                                                <img src="./assets/images/icons/user-add-two.svg"
                                                                    alt="a" class="img-fluid">Add Manually</a>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="selectedCustomerUi1">
                                                        @if ($task->customer_id)
                                                            <a href="javascript:;" class="select-customer mt-2">
                                                                <div
                                                                    class="selected-profile-box mt-0 bg-white border-0 p-0">
                                                                    <div class="media">
                                                                        @if ($task->customer->avatar)
                                                                            <img src="{{ asset($task->customer->avatar) }}"
                                                                                alt="avatar"
                                                                                class="img-fluid avatar" />
                                                                        @else
                                                                            <img src="{{ asset('uploads/users/avatar-1.png') }}"
                                                                                alt="default avatar"
                                                                                class="img-fluid avatar" />
                                                                        @endif

                                                                        <div class="media-body">
                                                                            <h3>{{ $task->customer->name }}</h3>
                                                                            <p>{{ $task->customer->designation }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        @endif
                                                    </div>
                                                    <!-- customer search form end -->

                                                    <!-- selected customer start  -->
                                                    <div class="row" id="selectedCustomerUi"></div>
                                                    <!-- selected customer end  -->

                                                    <!--collapse part start-->
                                                    <div class="collapse" id="collapseTwo">
                                                        <div class="card-body">
                                                            <div class="modal-body">
                                                                <form action="" class="common-form">
                                                                    <div class="add-customer-form">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <hr>
                                                                                <div class="form-group">
                                                                                    <label for="avatar">Profile
                                                                                        Image</label>
                                                                                    <input type="file"
                                                                                        name="avatar" id="avatar"
                                                                                        class="d-none">
                                                                                    <!-- upload avatar -->
                                                                                    <div class="d-flex">
                                                                                        <label for="avatar"
                                                                                            class="avatar">
                                                                                            <img src="./uploads/users/avatar-9.png"
                                                                                                alt="avatar"
                                                                                                class="img-fluid">
                                                                                            <span class="avatar-ol">
                                                                                                <img src="./assets/images/icons/camera.svg"
                                                                                                    alt="camera"
                                                                                                    class="img-fluid">
                                                                                            </span>
                                                                                        </label>
                                                                                        <label for="avatar">
                                                                                            <p><img src="./assets/images/icons/anchor.svg"
                                                                                                    alt="anchor"
                                                                                                    class="img-fluid">
                                                                                                Upload</p>
                                                                                        </label>
                                                                                    </div>
                                                                                    <!-- upload avatar -->
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label for="name">Name</label>
                                                                                    <input type="text"
                                                                                        placeholder="Enter Name"
                                                                                        id="name" name="name"
                                                                                        class="form-control"
                                                                                        value="{{ old('name') }}">
                                                                                    @error('name')
                                                                                        <div class="text-danger">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label
                                                                                        for="designation">Designation</label>
                                                                                    <input type="text"
                                                                                        placeholder="Enter Designation"
                                                                                        id="designation"
                                                                                        name="designation"
                                                                                        class="form-control"
                                                                                        value="{{ old('designation') }}">
                                                                                    @error('designation')
                                                                                        <div class="text-danger">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label
                                                                                        for="email">E-mail</label>
                                                                                    <input type="email"
                                                                                        placeholder="Enter email address"
                                                                                        id="email" name="email"
                                                                                        class="form-control"
                                                                                        value="{{ old('email') }}">
                                                                                    @error('email')
                                                                                        <div class="text-danger">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label for="phone">Phone</label>
                                                                                    <input type="number"
                                                                                        placeholder="Enter phone number"
                                                                                        id="phone" name="phone"
                                                                                        class="form-control"
                                                                                        value="{{ old('phone') }}">
                                                                                    @error('phone')
                                                                                        <div class="text-danger">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label
                                                                                        for="location">Location</label>
                                                                                    <input type="text"
                                                                                        placeholder="Enter location"
                                                                                        id="location" name="location"
                                                                                        class="form-control"
                                                                                        value="{{ old('location') }}">
                                                                                    @error('location')
                                                                                        <div class="text-danger">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label for="website">Active
                                                                                        Status</label>
                                                                                    <div
                                                                                        class="common-dropdown common-dropdown-two common-dropdown-three">
                                                                                        <div
                                                                                            class="dropdown dropdown-two dropdown-three">
                                                                                            <button class="btn"
                                                                                                type="button"
                                                                                                data-bs-toggle="dropdown"
                                                                                                aria-expanded="false">
                                                                                                <div class="setStatus">
                                                                                                    Active</div><i
                                                                                                    class="fas fa-angle-down"></i>
                                                                                            </button>
                                                                                            <ul
                                                                                                class="dropdown-menu dropdown-menu-two dropdown-menu-three">
                                                                                                <li>
                                                                                                    <a onclick="updateStatus('active')"
                                                                                                        class="dropdown-item dropdown-item-two"
                                                                                                        href="javascript:;">Active<i
                                                                                                            class="fas fa-check"></i></a>
                                                                                                </li>
                                                                                                <li>
                                                                                                    <a onclick="updateStatus('inactive')"
                                                                                                        class="dropdown-item dropdown-item-two"
                                                                                                        href="javascript:;">Inactive</a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label for="company">KVK</label>
                                                                                    <input type="text"
                                                                                        placeholder="Enter kvk number"
                                                                                        id="kvk" name="kvk"
                                                                                        class="form-control"
                                                                                        value="{{ old('kvk') }}">
                                                                                    @error('kvk')
                                                                                        <div class="text-danger">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label
                                                                                        for="service">Service</label>
                                                                                    <div
                                                                                        class="common-dropdown common-dropdown-two common-dropdown-three">
                                                                                        <div
                                                                                            class="dropdown dropdown-two dropdown-three">
                                                                                            <button class="btn"
                                                                                                type="button"
                                                                                                data-bs-toggle="dropdown"
                                                                                                aria-expanded="false">
                                                                                                <div
                                                                                                    class="setServiceLabel">
                                                                                                    Select Below</div><i
                                                                                                    class="fas fa-angle-down"></i>
                                                                                            </button>
                                                                                            <ul
                                                                                                class="dropdown-menu dropdown-menu-two dropdown-menu-three">
                                                                                                @foreach ($services_types as $serviceType)
                                                                                                    <li>
                                                                                                        <a onclick="setServiceypeId('{{ $serviceType->service_type_id }}', '{{ $serviceType->name }}')"
                                                                                                            class="dropdown-item dropdown-item-two service-type"
                                                                                                            href="javascript:;">{{ $serviceType->name }}</a>
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>

                                                                                    @error('service_type_id')
                                                                                        <div class="text-danger">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label
                                                                                        for="company">Company</label>
                                                                                    <input type="text"
                                                                                        placeholder="Enter company name"
                                                                                        id="company" name="company"
                                                                                        class="form-control"
                                                                                        value="{{ old('company') }}">
                                                                                    @error('company')
                                                                                        <div class="text-danger">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group form-error">
                                                                                    <label
                                                                                        for="website">Website</label>
                                                                                    <input type="text"
                                                                                        placeholder="Enter website"
                                                                                        id="website" name="website"
                                                                                        class="form-control"
                                                                                        value="{{ old('website') }}">
                                                                                    @error('website')
                                                                                        <div class="text-danger">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-12">
                                                                                <div class="form-group form-error">
                                                                                    <label for="lead_type_id">Leads
                                                                                        Type</label>
                                                                                    <div
                                                                                        class="common-dropdown common-dropdown-two common-dropdown-three">
                                                                                        <div
                                                                                            class="dropdown dropdown-two dropdown-three">
                                                                                            <button class="btn"
                                                                                                type="button"
                                                                                                data-bs-toggle="dropdown"
                                                                                                aria-expanded="false">
                                                                                                <div class="setLeadLabel">
                                                                                                    Select Below</div><i
                                                                                                    class="fas fa-angle-down"></i>
                                                                                            </button>
                                                                                            <ul
                                                                                                class="dropdown-menu dropdown-menu-two dropdown-menu-three">
                                                                                                @foreach ($lead_types as $leadType)
                                                                                                    <li>
                                                                                                        <a onclick="setLeaTypeId('{{ $leadType->lead_type_id }}', '{{ $leadType->name }}')"
                                                                                                            class="dropdown-item dropdown-item-two lead-type"
                                                                                                            href="javascript:;">{{ $leadType->name }}</a>
                                                                                                    </li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>

                                                                                    @error('lead_type_id')
                                                                                        <div class="text-danger">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group form-error">
                                                                                    <label
                                                                                        for="details">Details</label>
                                                                                    <textarea name="details" id="details" rows="7" class="form-control" placeholder="Enter details">{{ old('details') }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--collapse part end-->
                                                </div>
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


<script>
    // document.addEventListener('DOMContentLoaded', function() {
        var searchSuggestionsBox = document.querySelector('.search-suggestions-box');
        let searchInput = document.getElementById("search1");
        console.log(searchInput)

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
                <a href="#" class="select-customer" data-customer-id="${customer.customer_id}">
                    <div class="selected-profile-box mt-0 bg-white border-0 p-0">
                    <div class="media">
                        <img src="${customer.avatar ? baseUrl2 + '/' + customer.avatar : '{{ url('uploads/users/avatar-19.png') }}'}" class="img-fluid avatar" alt="avatar">
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
            let selectedCustomerUi = document.getElementById('selectedCustomerUi1');
            let customer_id = document.getElementById('customer_id1');
            let selectCustomers = document.querySelectorAll('.select-customer');

            // Store selected customer IDs
            var selectedCustomers = [];

            // Loop through each customer
            selectCustomers.forEach(customer => {
                customer.addEventListener('click', function(event) {
                    var customerId = this.getAttribute('data-customer-id');

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
    // });
</script>
