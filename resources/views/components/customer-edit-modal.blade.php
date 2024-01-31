<div class="custom-modal">
    <div class="modal fade" id="customerEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                        Edit Customer
                    </h1>
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="fas fa-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('customers.update', $customer->customer_id) }}"
                        class="common-form" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="status" id="statusEdit" value="active">
                        <div class="add-customer-form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="avatar">Profile Image</label>
                                        <input type="file" name="avatar" id="avatar" class="d-none">
                                        <!-- upload avatar -->
                                        <div class="d-flex">
                                            <label for="avatar" class="avatar" id="avatarLabel2">
                                                <img src="{{ $customer->avatar ? asset($customer->avatar) : 'uploads/users/avatar-9.png' }}"
                                                    alt="avatar" class="img-fluid" id="avatarPreview2">
                                                <span class="avatar-ol">
                                                    <img src="{{ url('/assets/images/icons/camera.svg') }}" alt="camera"
                                                        class="img-fluid">
                                                </span>
                                            </label>
                                            <label for="avatar">
                                                <p><img src="{{ url('/assets/images/icons/anchor.svg') }}" alt="anchor"
                                                        class="img-fluid">
                                                    Upload</p>
                                            </label>
                                        </div>
                                        <!-- upload avatar -->
                                        @error('avatar')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="name">Name</label>
                                        <input type="text" placeholder="Enter Name" id="name" name="name"
                                            class="form-control"
                                            value="{{ $customer->name ? $customer->name : old('designation') }}" />
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="designation">Designation</label>
                                        <input type="text" placeholder="Enter Designation" id="designation"
                                            name="designation" class="form-control"
                                            value="{{ $customer->designation ? $customer->designation : old('designation') }}" />

                                        @error('designation')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="email">E-mail</label>
                                        <input type="email" placeholder="Enter email address" id="email" name="email"
                                            class="form-control"
                                            value="{{ $customer->email ? $customer->email : old('email') }}" />
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="phone">Phone</label>
                                        <input type="number" placeholder="Enter phone number" id="phone" name="phone"
                                            class="form-control"
                                            value="{{ $customer->phone ? $customer->phone : old('phone') }}" />

                                        @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="location">Location</label>
                                        <input type="text" placeholder="Enter location" id="location" name="location"
                                            class="form-control"
                                            value="{{ $customer->location ? $customer->location : old('location') }}" />
                                        @error('location')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="website">Active Status</label>
                                        <div class="common-dropdown common-dropdown-two common-dropdown-three">
                                            <div class="dropdown dropdown-two dropdown-three">
                                                <button class="btn w-100" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <div id="setEditStatus">{{ Str::ucfirst($customer->status) }}</div>
                                                    <i class="fas fa-angle-down"></i>
                                                </button>

                                                <ul class="dropdown-menu dropdown-menu-two dropdown-menu-three">
                                                    <li>
                                                        <a class="dropdown-item dropdown-item-two status-update"
                                                            data-status="active" href="#">Active

                                                            @if ($customer->status == 'active')
                                                            <i class="fas fa-check"></i>
                                                            @endif
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item dropdown-item-two status-update"
                                                            data-status="inactive" href="#">Inactive

                                                            @if ($customer->status == 'inactive')
                                                            <i class="fas fa-check"></i>
                                                            @endif
                                                        </a>
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="company">KVK</label>
                                        <input type="text" placeholder="Enter kvk number" id="kvk" name="kvk"
                                            class="form-control"
                                            value="{{ $customer->kvk ? $customer->kvk : old('kvk') }}" />
                                        @error('kvk')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="service_type_id2">Service</label>
                                        <input type="hidden" name="service_type_id" id="service_type_id2" value="{{ $customer->service_type_id }}">
                                        <div class="common-dropdown common-dropdown-two common-dropdown-three">
                                            <div class="dropdown dropdown-two dropdown-three">
                                                @php
                                                    $serviceTypeId = $customer->service_type_id;
                                                    $serviceType = App\Models\ServiceType::find($serviceTypeId);
                                                    $serviceTypeTitle = $serviceType->name;
                                                @endphp
                                                <button class="btn w-100" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <div id="setType2">{{ $serviceTypeTitle ?? "Select Below"}}</div><i
                                                        class="fas fa-angle-down"></i>

                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-two dropdown-menu-three">
                                                    @foreach ($services_types as $serviceType)
                                                    <li>
                                                        <a class="dropdown-item dropdown-item-two select-serv"
                                                            href="javascript:;"
                                                            data-id="{{ $serviceType->service_type_id }}">{{
                                                            $serviceType->name }}

                                                            @if ($customer->service_type_id ==
                                                            $serviceType->service_type_id)
                                                            <i class="fas fa-check"></i>
                                                            @endif
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                        @error('service_type_id')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="company">Company</label>
                                        <input type="text" placeholder="Enter company name" id="company" name="company"
                                            class="form-control"
                                            value="{{ $customer->company ? $customer->company : old('company') }}" />
                                        @error('company')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="website">Website</label>
                                        <input type="text" placeholder="Enter website" id="website" name="website"
                                            class="form-control"
                                            value="{{ $customer->website ? $customer->website : old('website') }}" />
                                        @error('website')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group form-error">
                                        <label for="lead_type_id">Leads Type</label>
                                        <input type="hidden" name="lead_type_id" id="lead_type_id2" value="{{ $customer->lead_type_id }}">
                                        <div class="common-dropdown common-dropdown-two common-dropdown-three">
                                            <div class="dropdown dropdown-two dropdown-three">
                                                <button class="btn" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <div id="setLeadType2">Select Below</div><i
                                                        class="fas fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-two dropdown-menu-three">
                                                    @foreach ($lead_types as $leadType)
                                                    <li>
                                                        <a class="dropdown-item dropdown-item-two lead-type2"
                                                            href="javascript:;"
                                                            data-id="{{ $leadType->lead_type_id }}">{{
                                                            $leadType->name }}

                                                            @if ($customer->lead_type_id ==
                                                            $leadType->lead_type_id)
                                                            <i class="fas fa-check"></i>
                                                            @endif
                                                        </a>
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
                                        <textarea name="details" id="details" rows="7" class="form-control"
                                            placeholder="Enter details">{{ $customer->details ? $customer->details : old('details') }}</textarea>
                                        @error('details')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-bttn">
                                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-bttn">
                                        <button type="submit" class="btn btn-submit">
                                            Update
                                        </button>
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


<script>
    $(document).on('click', '.status-update', function(event) {
        event.preventDefault();
        var newStatus = $(this).data('status');
        $("#statusEdit").val(newStatus);
        var capitalizeStatus = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
        $("#setEditStatus").html(capitalizeStatus);
    });

  {{-- customer avatar js --}}
    // Get references to elements
    const avatarInput2 = document.getElementById('avatar');
    const avatarPreview2 = document.getElementById('avatarPreview2');
    const avatarLabel2 = document.getElementById('avatarLabel2');

    // Add event listener to file input
    avatarInput2.addEventListener('change', function(event) {
    const file2 = event.target.files[0]; // Get the first file selected by the user

    // Check if a file is selected
    if (file2) {
        // Read the file as a data URL
        const reader2 = new FileReader();
        reader2.onload = function(e) {
            // Update the preview image source with the data URL
            avatarPreview2.src = e.target.result;
        };
        reader2.readAsDataURL(file2);
    }
    });

    // Optional: Add event listener to reset the file input
    avatarLabel2.addEventListener('click', function() {
    avatarInput2.value = ''; // Clear the file input
    avatarPreview2.src = '{{ url('/uploads/users/avatar-9.png') }}'; // Reset the preview image to default
    });



{{-- select services type js --}}


       
        let serviceTypeId2 = document.getElementById("service_type_id2"); 
        let setType2 = document.getElementById("setType2"); 
        let selectServ = document.querySelectorAll(".select-serv"); 

        selectServ.forEach(item => {
            item.addEventListener("click", function(e) {
                e.preventDefault(); 
                setType2.innerHTML = this.innerHTML;
                serviceTypeId2.value = this.getAttribute("data-id");
            });
        }); 


{{-- select leads type js --}}


        let leadTypeId2 = document.getElementById("lead_type_id2"); 
        let setLeadType2 = document.getElementById("setLeadType2"); 
        let leadTypes2 = document.querySelectorAll(".lead-type2"); 


        leadTypes2.forEach(item => {
            item.addEventListener("click", function(e) {
                e.preventDefault();
                setLeadType2.innerHTML = this.innerHTML;
                leadTypeId2.value = this.getAttribute("data-id");
            });
        });

</script>