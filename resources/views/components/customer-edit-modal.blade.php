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
                        <input type="text" name="status" id="statusEdit" value="active">
                        <div class="add-customer-form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Profile Image</label>
                                        <input type="file" name="avatar" id="avatar" class="d-none" />
                                        <!-- upload avatar -->
                                        <div class="d-flex">
                                            <label for="avatar" class="avatar">
                                                @if ($customer->avatar)
                                                    <img src="{{ asset('storage/' . $customer->avatar) }}"
                                                        alt="avatar" class="img-fluid" />
                                                @else
                                                    <span class="avatar-ol">
                                                        <img src="/assets/images/icons/camera.svg" alt="camera"
                                                            class="img-fluid" />
                                                    </span>
                                                @endif

                                            </label>
                                            <p>
                                                <img src="/assets/images/icons/anchor.svg" alt="anchor"
                                                    class="img-fluid" />
                                                Upload
                                            </p>
                                        </div>
                                        <!-- upload avatar -->
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
                                        <input type="email" placeholder="Enter email address" id="email"
                                            name="email" class="form-control"
                                            value="{{ $customer->email ? $customer->email : old('email') }}" />
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="phone">Phone</label>
                                        <input type="number" placeholder="Enter phone number" id="phone"
                                            name="phone" class="form-control"
                                            value="{{ $customer->phone ? $customer->phone : old('phone') }}" />

                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="location">Location</label>
                                        <input type="text" placeholder="Enter location" id="location"
                                            name="location" class="form-control"
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
                                                    <div id="setEditStatus">{{ Str::ucfirst($customer->status) }}</div><i
                                                        class="fas fa-angle-down"></i>
                                                </button>
                                                {{-- <ul class="dropdown-menu dropdown-menu-two dropdown-menu-three">
                                                    <li>
                                                        <a onclick="updateStatus('active')"class="dropdown-item dropdown-item-two"
                                                            href="javascript:;">Active<i class="fas fa-check"></i></a>
                                                    </li>
                                                    <li>
                                                        <a onclick="updateStatus('inactive')"
                                                            class="dropdown-item dropdown-item-two"
                                                            href="javascript:;">Inactive</a>
                                                    </li>
                                                </ul> --}}



                                                <ul class="dropdown-menu dropdown-menu-two dropdown-menu-three">
                                                    <li>
                                                        <a class="dropdown-item dropdown-item-two status-update" data-status="active" href="#">Active<i class="fas fa-check"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item dropdown-item-two status-update" data-status="inactive" href="#">Inactive</a>
                                                    </li>
                                                </ul>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="company">KVK</label>
                                        <input type="text" placeholder="Enter kvk number" id="kvk"
                                            name="kvk" class="form-control"
                                            value="{{ $customer->kvk ? $customer->kvk : old('kvk') }}" />
                                        @error('kvk')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="service">Service</label>
                                        <select class="form-control" name="service_type_id" id="">
                                            <option value="">-- Select Service --</option>
                                            @if (count($services_types) > 0)
                                                @foreach ($services_types as $serviceType)
                                                    <option value="{{ $serviceType->service_type_id }}"
                                                        {{ $customer->service_type_id == $serviceType->service_type_id ? 'selected' : '' }}>
                                                        {{ $serviceType->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('service')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="company">Company</label>
                                        <input type="text" placeholder="Enter company name" id="company"
                                            name="company" class="form-control"
                                            value="{{ $customer->company ? $customer->company : old('company') }}" />
                                        @error('company')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="website">Website</label>
                                        <input type="text" placeholder="Enter website" id="website"
                                            name="website" class="form-control"
                                            value="{{ $customer->website ? $customer->website : old('website') }}" />
                                        @error('website')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group form-error">
                                        <label for="details">Details</label>
                                        <textarea name="details" id="details" rows="7" class="form-control" placeholder="Enter details">{{ $customer->details ? $customer->details : old('details') }}</textarea>
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
                                            Submit
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
</script>

