<div class="custom-modal custom-modal-leads">
    <div class="modal fade" id="staticBackdropFour" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropFourLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-leads">
                <div class="modal-header modal-header-leads">
                    <h1 class="modal-title fs-5" id="staticBackdropFourLabel">Add Leads</h1>
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="fas fa-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('lead.store') }}" class="common-form"
                        enctype="multipart/form-data">

                        @csrf
                        <div class="add-customer-form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Profile Image</label>
                                        <input type="file" name="avatar" id="avatar" class="d-none">
                                        <!-- upload avatar -->
                                        <div class="d-flex">
                                            <label for="avatar" class="avatar" id="avatarLabel">
                                                <img src="{{ url('/uploads/users/avatar-9.png') }}" alt="avatar"
                                                    class="img-fluid" id="avatarPreview">
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
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group form-error">
                                        <label for="name">Name</label>
                                        <input type="text" placeholder="Enter Name" id="name" name="name"
                                            class="form-control" value="{{ old('name') }}" />
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="phone">Phone</label>
                                        <input type="number" placeholder="Enter phone number" id="phone" name="phone"
                                            class="form-control" value="{{ old('phone') }}" />

                                        @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="email">E-mail</label>
                                        <input type="email" placeholder="Enter email address" id="email" name="email"
                                            class="form-control" value="{{ old('email') }}" />
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" placeholder="Enter Instagram" id="instagram" name="instagram"
                                            class="form-control" value="{{ old('instagram') }}" />
                                        @error('instagram')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="linkedin">LinkedIn</label>
                                        <input type="text" placeholder="Enter Linkedin" id="linkedin" name="linkedin"
                                            class="form-control" value="{{ old('linkedin') }}" />
                                        @error('linkedin')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="company">Company</label>
                                        <input type="text" placeholder="Enter company name" id="company" name="company"
                                            class="form-control" value="{{ old('company') }}" />
                                        @error('company')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="website">Website</label>
                                        <input type="text" placeholder="Enter website" id="website" name="website"
                                            class="form-control" value="{{ old('website') }}" />
                                        @error('website')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="company">KVK</label>
                                        <input type="text" placeholder="Enter kvk number" id="kvk" name="kvk"
                                            class="form-control" value="{{ old('kvk') }}" />
                                        @error('kvk')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="lead_type_id">Type of Lead</label>
                                        <input type="hidden" name="lead_type_id" id="lead_type_id" value="1">
                                        <div class="common-dropdown common-dropdown-two common-dropdown-three">
                                            <div class="dropdown dropdown-two dropdown-three">
                                                <button class="btn w-100" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <div id="setLeadType">Select Below</div><i
                                                        class="fas fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-two dropdown-menu-three w-100">
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
                                        <label for="note">Notes</label>
                                        <textarea name="note" id="note" rows="7" class="form-control"
                                            placeholder="Enter details">{{ old('note') }}</textarea>
                                        @error('note')
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


{{-- lead avatar js --}}
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

{{-- select leads type js --}}
<script>
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
</script>