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
                    <form action="{{ route('projects.store') }}" class="common-form another-form" method="POST">
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
                                                        <!-- upload avatar -->
                                                        <div class="project-thumbnail-upload">
                                                            <h3>Project Thumbnail</h4>
                                                                <div class="d-flex">
                                                                    <div class="thumbnail-preview">
                                                                        <img src="{{ url('/uploads/projects/project-01.png') }}"
                                                                            alt="a" class="img-fluid">
                                                                    </div>
                                                                    <label for="thumbnail"
                                                                        class="thumbnail-upload-icon">
                                                                        <img src="{{ url('/assets/images/icons/anchor.svg') }}"
                                                                            alt="Upload" class="img-fluid">
                                                                        <p> Upload </p>
                                                                    </label>
                                                                </div>
                                                        </div>
                                                        <!-- upload avatar -->
                                                    </div>
                                                </div>

                                                <div class="col-xl-12">
                                                    <div class="form-group form-error">
                                                        <label for="title">Project Name</label>
                                                        <input type="text" placeholder="Enter Title" id="title"
                                                            name="title" value="{{ old('title') }}"
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
                                                            name="amount"
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
                                                        <label for="start_date">Start Date</label>
                                                        <input type="date" id="start_date" name="start_date"
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
                                                            name="note"
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
                                                        <label for="priority">Priority</label>
                                                        <input type="hidden" value="" id="priority" name="priority">
                                                        <div class="common-dropdown common-dropdown-two">
                                                            <div class="dropdown dropdown-two">
                                                                <button class="btn" type="button"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    Select Priority<i class="fas fa-angle-down"></i>
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
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group form-error">
                                                        <label for="description">Description</label>
                                                        <textarea name="description" id="description" rows="7"
                                                            class="form-control @error('description') is-invalid @enderror"
                                                            placeholder="Enter details"></textarea>

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
                                                <div class="form-group search-by-name">
                                                    <div class="search-item">
                                                        <img src="{{ url('assets/images/icons/search-ic.svg') }}"
                                                            alt="a" class="img-fluid">

                                                        <input type="text" placeholder="Search by name" id="search"
                                                            class="form-control">
                                                        <ul id="suggestions"></ul>

                                                    </div>
                                                    <div class="avatar-btn">
                                                        <a data-bs-toggle="collapse" href="#collapseTwo" role="button"
                                                            aria-expanded="false" aria-controls="collapseTwo"
                                                            type="button">
                                                            <img src="{{ url('/assets/images/icons/user-add-two.svg') }}"
                                                                alt="a" class="img-fluid">Add Manually</a>
                                                    </div>
                                                </div>
                                                <!-- customer search form end -->

                                                <!-- selected customer start  -->
                                                <div class="row">
                                                    <!-- person -->
                                                    <div class="col-lg-6">
                                                        <div class="selected-profile-box">
                                                            <div class="media">
                                                                <img src="{{ url('uploads/users/avatar-19.png')}}"
                                                                    class="img-fluid avatar" alt="avatar">
                                                                <div class="media-body">
                                                                    <h3>Glenda Miller</h3>
                                                                    <p>Manager</p>
                                                                </div>
                                                                <a href="#">
                                                                    <img src="{{ url('/assets/images/icons/close-2.svg') }}"
                                                                        alt="a" class="img-fluid">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- person -->
                                                    <!-- person -->
                                                    <div class="col-lg-6">
                                                        <div class="selected-profile-box">
                                                            <div class="media">
                                                                <img src="{{ url('uploads/users/avatar-12.png') }}"
                                                                    class="img-fluid avatar" alt="avatar">
                                                                <div class="media-body">
                                                                    <h3>Glenda Miller</h3>
                                                                    <p>CEO</p>
                                                                </div>
                                                                <a href="#">
                                                                    <img src="{{ url('/assets/images/icons/close-2.svg') }}"
                                                                        alt="a" class="img-fluid">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- person -->
                                                </div>
                                                <!-- selected customer end  -->

                                                <!--collapse part start-->
                                                <div class="collapse" id="collapseTwo">
                                                    <div class="card-body">
                                                        <div class="modal-body">
                                                            {{-- <form action="" class="common-form">
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
                                                                                    <label for="avatar" class="avatar">
                                                                                        <img src="{{ url('/uploads/users/avatar-9.png') }}"
                                                                                            alt="avatar"
                                                                                            class="img-fluid">
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
                                                                        <div class="col-xl-6">
                                                                            <div class="form-group form-error">
                                                                                <label for="name">Name</label>
                                                                                <input type="text"
                                                                                    placeholder="Enter Name" id="name"
                                                                                    name="name"
                                                                                    class="form-control @error('name') is-invalid @enderror">
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-xl-6">
                                                                            <div class="form-group form-error">
                                                                                <label
                                                                                    for="designation">Designation</label>
                                                                                <input type="text"
                                                                                    placeholder="Enter Designation"
                                                                                    id="designation" name="designation"
                                                                                    class="form-control @error('name') is-invalid @enderror">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="form-group form-error">
                                                                                <label for="email">E-mail</label>
                                                                                <input type="email"
                                                                                    placeholder="Enter email address"
                                                                                    id="email" name="email"
                                                                                    class="form-control @error('name') is-invalid @enderror">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="form-group form-error">
                                                                                <label for="phone">Phone</label>
                                                                                <input type="number"
                                                                                    placeholder="Enter phone number"
                                                                                    id="phone" name="phone"
                                                                                    class="form-control @error('name') is-invalid @enderror">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="form-group form-error">
                                                                                <label for="location">Location</label>
                                                                                <input type="text"
                                                                                    placeholder="Enter location"
                                                                                    id="location" name="location"
                                                                                    class="form-control @error('name') is-invalid @enderror">
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
                                                                                            Active<i
                                                                                                class="fas fa-angle-down"></i>
                                                                                        </button>
                                                                                        <ul
                                                                                            class="dropdown-menu dropdown-menu-two dropdown-menu-three">
                                                                                            <li><a class="dropdown-item dropdown-item-two"
                                                                                                    href="#">Active<i
                                                                                                        class="fas fa-check"></i></a>
                                                                                            </li>
                                                                                            <li><a class="dropdown-item dropdown-item-two"
                                                                                                    href="#">Inactive</a>
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
                                                                                    class="form-control @error('name') is-invalid @enderror">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="form-group form-error">
                                                                                <label for="service">Service</label>
                                                                                <input type="text"
                                                                                    placeholder="Enter service"
                                                                                    id="service" name="service"
                                                                                    class="form-control @error('name') is-invalid @enderror">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="form-group form-error">
                                                                                <label for="company">Company</label>
                                                                                <input type="text"
                                                                                    placeholder="Enter company name"
                                                                                    id="company" name="company"
                                                                                    class="form-control @error('name') is-invalid @enderror">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-6">
                                                                            <div class="form-group form-error">
                                                                                <label for="website">Website</label>
                                                                                <input type="text"
                                                                                    placeholder="Enter website"
                                                                                    id="website" name="website"
                                                                                    class="form-control @error('name') is-invalid @enderror">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group form-error">
                                                                                <label for="details">Details</label>
                                                                                <textarea name="details" id="details"
                                                                                    rows="7"
                                                                                    class="form-control @error('name') is-invalid @enderror"
                                                                                    placeholder="Enter details"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form> --}}
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
                                        <button type="button" class="btn btn-cancel">Cancel</button>
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

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let priorityInput = document.getElementById("priority");
        let dropdownItemsFilter = document.querySelectorAll(".filterItem"); 

        dropdownItemsFilter.forEach(item => {
            item.addEventListener("click", function(e) {
                e.preventDefault();
                priorityInput.value = this.getAttribute("data-value"); 
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {  
        let searchInput = document.getElementById("search");

        searchInput.addEventListener('input', function() {
            var search = searchInput.value.trim();
            fetchSearchResults(search);
        });

        function fetchSearchResults(searchTerm) {
            let currentURL = window.location.href;
            const baseUrl = currentURL.split('/').slice(0, 3).join('/');

            fetch(`${baseUrl}/projects/search-customers/${searchTerm}`, {
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
                selectedProfileBox.innerHTML = '';
                console.error('Error fetching search results:', error);
            });
        }

        function displaySearchResults(customers) {
            var selectedProfileBox = document.querySelector('.selected-profile-box');
            selectedProfileBox.innerHTML = '';

            customers.forEach(function(customer) {
                var profileMarkup = `
                    <div class="media">
                        <img src="${customer.avatar ? customer.avatar : '{{ url('uploads/users/avatar-19.png')}}'}" class="img-fluid avatar" alt="avatar">
                        <div class="media-body">
                            <h3>${customer.name}</h3>
                            <p>${customer.designation}</p>
                        </div>
                        <a href="#">
                            <img src="{{ url('/assets/images/icons/close-2.svg') }}" alt="a" class="img-fluid">
                        </a>
                    </div>
                `;
                selectedProfileBox.insertAdjacentHTML('beforeend', profileMarkup);
            });
        }

    });
</script>

@endsection