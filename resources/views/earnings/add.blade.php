<div class="custom-modal custom-modal-hosting">
    <div class="modal fade" id="staticBackdropAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropAddLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal-content-hosting">
                <div class="modal-header modal-header-hosting">
                    <h1 class="modal-title" id="staticBackdropAddLabel">Add Client</h1>
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="fas fa-close"></i>
                    </button>
                </div>
                <div class="modal-body modal-body-hosting">
                    <form action="{{ route('earning.add-earnings') }}" method="POST" class="common-form">
                        @csrf
                        <div class="add-customer-form add-customer-form-hosting">
                            <div class="row">
                                <div class="col-xl-12 mt-4">
                                    <label for="name" class="select-client-hosting">Select Client</label>

                                    <div class="form-group search-by-name" style="grid-template-columns: 65% 35%!important">
                                        <div class="search-item">
                                            <img src="{{ url('assets/images/icons/search-ic.svg') }}" alt="a"
                                                class="img-fluid search">

                                            <input type="text" placeholder="Search client" id="search"
                                                class="form-control" autocomplete="off">

                                            <div class="search-suggestions-box"></div>

                                            <input type="hidden" name="customer_id" value="" id="customer_id">

                                        </div>
                                        <div class="avatar-btn">
                                            <a data-bs-toggle="collapse" href="#multiCollapseExample1" role="button"
                                                aria-expanded="false" aria-controls="multiCollapseExample1"
                                                id="addManualBttn">
                                                <img src="{{ url('/assets/images/icons/user-add-two.svg') }}" alt="a"
                                                    class="img-fluid">Add Manually</a>
                                        </div>
                                    </div>

                                    <!-- selected customer start  -->
                                    <div class="row" id="selectedCustomerUi"></div>
                                    <!-- selected customer end  -->

                                    <!--data collpase start-->
                                    <div class="row">
                                        <div class="col">
                                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                <div class="card-body">
                                                    <div class="common-form">
                                                        <div class="add-customer-form border-bottom pb-4">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="">Profile Image</label>
                                                                        <input type="file" name="avatar" id="avatar"
                                                                            class="d-none">
                                                                        <!-- upload avatar -->
                                                                        <div class="d-flex">
                                                                            <label for="avatar" class="avatar"
                                                                                id="avatarLabel">
                                                                                <img src="{{ url('/assets/users/avatar-9.png') }}"
                                                                                    alt="avatar" class="img-fluid"
                                                                                    id="avatarPreview">
                                                                                <span class="avatar-ol">
                                                                                    <img src="{{ url('/assets/images/icons/camera.svg') }}"
                                                                                        alt="camera" class="img-fluid">
                                                                                </span>
                                                                            </label>
                                                                            <label for="avatar">
                                                                                <p><img src="{{ url('/assets/images/icons/anchor.svg') }}"
                                                                                        alt="anchor" class="img-fluid">
                                                                                    Upload</p>
                                                                            </label>
                                                                        </div>
                                                                        <!-- upload avatar -->
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="manualyCustomer" value="0"
                                                                    id="addManual">
                                                                <div class="col-xl-6">
                                                                    <div class="form-group form-error">
                                                                        <label for="name">Name</label>
                                                                        <input type="text" placeholder="Enter Name"
                                                                            id="name" name="name"
                                                                            class="form-control @error('name') is-invalid @enderror">
                                                                        @error('name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <div class="form-group form-error">
                                                                        <label for="designation">Designation</label>
                                                                        <input type="text"
                                                                            placeholder="Enter Designation"
                                                                            id="designation" name="designation"
                                                                            class="form-control @error('designation') is-invalid @enderror">
                                                                        @error('designation')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <div class="form-group form-error">
                                                                        <label for="email">E-mail</label>
                                                                        <input type="email"
                                                                            placeholder="Enter email address" id="email"
                                                                            name="email"
                                                                            class="form-control @error('email') is-invalid @enderror">
                                                                        @error('email')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <div class="form-group form-error">
                                                                        <label for="phone">Phone</label>
                                                                        <input type="number"
                                                                            placeholder="Enter phone number" id="phone"
                                                                            name="phone"
                                                                            class="form-control @error('phone') is-invalid @enderror">
                                                                        @error('phone')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <div class="form-group form-error">
                                                                        <label for="location">Location</label>
                                                                        <input type="text" placeholder="Enter location"
                                                                            id="location" name="location"
                                                                            class="form-control @error('location') is-invalid @enderror">
                                                                        @error('location')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <div class="form-group form-error">
                                                                        <label for="status">Active Status</label>
                                                                        <input type="hidden" name="status" id="status">
                                                                        <div class="common-dropdown">
                                                                            <div class="dropdown">
                                                                                <button class="btn w-100" type="button"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="false">
                                                                                    <div id="setStatusType">Select Below
                                                                                    </div><i
                                                                                        class="fas fa-angle-down"></i>
                                                                                </button>
                                                                                <ul class="dropdown-menu w-100">
                                                                                    <li>
                                                                                        <a class="dropdown-item dropdown-item-two status-type-bttn"
                                                                                            href="javascript:;"
                                                                                            data-status="active">Active</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a class="dropdown-item dropdown-item-two status-type-bttn"
                                                                                            href="javascript:;"
                                                                                            data-status="inactive">Inactive</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>

                                                                        @error('status')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <div class="form-group form-error">
                                                                        <label for="kvk">KVK</label>
                                                                        <input type="text"
                                                                            placeholder="Enter kvk number" id="kvk"
                                                                            name="kvk"
                                                                            class="form-control @error('kvk') is-invalid @enderror">
                                                                        @error('kvk')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <div class="form-group form-error">
                                                                        <label for="company">Company</label>
                                                                        <input type="text"
                                                                            placeholder="Enter comany name" id="company"
                                                                            name="company"
                                                                            class="form-control @error('company') is-invalid @enderror">
                                                                        @error('company')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <div class="form-group form-error">
                                                                        <label for="website">Website</label>
                                                                        <input type="text"
                                                                            placeholder="Enter website name"
                                                                            id="website" name="website"
                                                                            class="form-control @error('website') is-invalid @enderror">
                                                                        @error('website')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <div class="form-group form-error">
                                                                        <label for="lead_type_id">Service Type</label>
                                                                        <input type="hidden" name="lead_type_id"
                                                                            id="lead_type_id">
                                                                        <div class="common-dropdown">
                                                                            <div class="dropdown">
                                                                                <button class="btn w-100" type="button"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="false">
                                                                                    <div id="setLeadType">Select Below
                                                                                    </div><i
                                                                                        class="fas fa-angle-down"></i>
                                                                                </button>
                                                                                <ul
                                                                                    class="dropdown-menu w-100 dropdown-menu-two dropdown-menu-three">
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
                                                                <div class="col-xl-12">
                                                                    <div class="form-group form-error">
                                                                        <label for="details">Details</label>
                                                                        <input type="text" name="details" id="details"
                                                                            class="form-control @error('details') is-invalid @enderror"
                                                                            placeholder="Enter details">
                                                                        @error('details')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--data collaspe end-->
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="amount">Amount</label>
                                        <input type="number" placeholder="€0000" id="amount" name="amount"
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
                                        <label for="pay_status">Payment Status</label>
                                        <input type="hidden" name="pay_status" id="pay_status">
                                        <div class="common-dropdown">
                                            <div class="dropdown">
                                                <button class="btn w-100" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <div id="setPaysStatus">Select Below</div><i
                                                        class="fas fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu w-100">
                                                    <li>
                                                        <a class="dropdown-item dropdown-item-two payment-status-bttn"
                                                            href="javascript:;" data-status="paid">Paid</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item dropdown-item-two payment-status-bttn"
                                                            href="javascript:;" data-status="unpaid">Unpaid</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        @error('pay_status')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="pay_services">Services Type</label>
                                        <input type="hidden" name="pay_services" id="pay_services">
                                        <div class="common-dropdown">
                                            <div class="dropdown">
                                                <button class="btn w-100" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <div id="setLeadServicessType">Select Below</div><i
                                                        class="fas fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu w-100">
                                                    @foreach ($lead_types as $leadType)
                                                    <li>
                                                        <a class="dropdown-item dropdown-item-two serv-lead-type"
                                                            href="javascript:;" data-id="{{ $leadType->slug }}">{{
                                                            $leadType->name }}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                        @error('pay_services')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="pay_date">Payment Date</label>
                                        <input type="date" placeholder="DD-MM-YYYY" id="pay_date" name="pay_date"
                                            class="form-control @error('pay_date') is-invalid @enderror">
                                        @error('pay_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="pay_type">Payment Type</label>
                                        <input type="hidden" name="pay_type" id="pay_type">
                                        <div class="common-dropdown">
                                            <div class="dropdown">
                                                <button class="btn w-100" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <div id="setPaysType">Select Below</div><i
                                                        class="fas fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu w-100">
                                                    <li>
                                                        <a class="dropdown-item dropdown-item-two payment-type-bttn"
                                                            href="javascript:;" data-type="one_time">One time
                                                            payment</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item dropdown-item-two payment-type-bttn"
                                                            href="javascript:;" data-type="repeated">Repeated
                                                            payment</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        @error('pay_type')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-bttn">
                                        <button type="button" class="btn btn-cancel">Cancel</button>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-bttn">
                                        <button type="submit" class="btn btn-submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- select services leads type js --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let leadServicesType = document.getElementById("pay_services");
        let setLeadServicessType = document.getElementById("setLeadServicessType");
        let leadServTypes = document.querySelectorAll(".serv-lead-type");

        leadServTypes.forEach(item => {
            item.addEventListener("click", function(e) {
                e.preventDefault();
                setLeadServicessType.innerHTML = this.innerHTML;
                leadServicesType.value = this.getAttribute("data-id");
            });
        });
    });
</script>


{{-- payment type select js --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let paysType = document.getElementById("pay_type");
        let setPaysType = document.getElementById("setPaysType");
        let paymenttypeBttns = document.querySelectorAll(".payment-type-bttn");

        paymenttypeBttns.forEach(item => {
            item.addEventListener("click", function(e) {
                e.preventDefault();
                setPaysType.innerHTML = this.innerHTML;
                paysType.value = this.getAttribute("data-type");
            });
        });
    });
</script>

{{-- user statys type select js --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let userStatus = document.getElementById("status");
        let setStatusType = document.getElementById("setStatusType");
        let statusTypeBttns = document.querySelectorAll(".status-type-bttn");

        statusTypeBttns.forEach(item => {
            item.addEventListener("click", function(e) {
                e.preventDefault();
                setStatusType.innerHTML = this.innerHTML;
                userStatus.value = this.getAttribute("data-status");
            });
        });
    });
</script>


{{-- payment statys type select js --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let userPayStatus = document.getElementById("pay_status");
        let setPaysStatus = document.getElementById("setPaysStatus");
        let paymentStatusTypeBttns = document.querySelectorAll(".payment-status-bttn");

        paymentStatusTypeBttns.forEach(item => {
            item.addEventListener("click", function(e) {
                e.preventDefault();
                setPaysStatus.innerHTML = this.innerHTML;
                userPayStatus.value = this.getAttribute("data-status");
            });
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
                    <a href="javascript:;" class="select-customer" data-id="${customer.customer_id}">
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


{{-- update manually added form --}}

<script>
    document.getElementById('addManualBttn').addEventListener('click', function(e) {
    var addManualInput = document.getElementById('addManual');

    addManualInput.value = addManualInput.value == '0' ? '1' : '0';
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
