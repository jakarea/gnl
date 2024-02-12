<div class="custom-modal custom-modal-leads ">
    <div class="modal fade lead-details-modal" id="staticBackdropFive" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropFiveLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-leads">
                <div class="modal-header modal-header-leads">
                    <h1 class="modal-title fs-5" id="staticBackdropFiveLabel">Edit Leads</h1>
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="fas fa-close"></i>
                    </button>
                </div>
                <div class="modal-body" id="leadDetails">
                    <form method="post" action="{{ route('lead.update') }}" class="common-form" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="lead_id" id="leadId" value="{{ $lead->lead_id }}">
                        <div class="add-customer-form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="avatar2">Profile Image</label>
                                        <input type="file" name="avatar" id="avatar2" class="d-none">
                                        <!-- upload avatar -->
                                        <div class="d-flex">
                                            <label for="avatar2" class="avatar" id="avatarLabel2">
                                                <img src="{{ $lead->avatar ? asset($lead->avatar) : asset('/uploads/users/avatar-9.png') }}" alt="avatar"
                                                    class="img-fluid" id="avatarPreview2">
                                                <span class="avatar-ol">
                                                    <img src="{{ asset('/assets/images/icons/camera.svg') }}" alt="camera"
                                                        class="img-fluid">
                                                </span>
                                            </label>
                                            <label for="avatar2">
                                                <p><img src="{{ asset('/assets/images/icons/anchor.svg') }}" alt="anchor"
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
                                        <input type="text" placeholder="Enter Name" id="name2" name="name"
                                            class="form-control" value="{{ $lead->name }}" />
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="phone">Phone</label>
                                        <input type="number" placeholder="Enter phone number" id="phone2" name="phone"
                                            class="form-control" value="{{ $lead->phone }}" />

                                        @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="email">E-mail</label>
                                        <input type="email" placeholder="Enter email address" id="email2" name="email"
                                            class="form-control" value="{{ $lead->email }}" />
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" placeholder="Enter Instagram" id="instagram2" name="instagram"
                                            class="form-control" value="{{ $lead->instagram }}" />
                                        @error('instagram')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="linkedin2">LinkedIn</label>
                                        <input type="text" placeholder="Enter Linkedin" id="linkedin2" name="linkedin"
                                            class="form-control" value="{{ $lead->linkedin }}" />
                                        @error('linkedin')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="company">Company</label>
                                        <input type="text" placeholder="Enter company name" id="company2" name="company"
                                            class="form-control" value="{{ $lead->company }}" />
                                        @error('company')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="website">Website</label>
                                        <input type="text" placeholder="Enter website" id="website2" name="website"
                                            class="form-control" value="{{ $lead->website }}" />
                                        @error('website')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="kvk">KVK</label>
                                        <input type="text" placeholder="Enter kvk number" id="kvk2" name="kvk"
                                            class="form-control" value="{{ $lead->kvk }}" />
                                        @error('kvk')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group form-error">
                                        <label for="lead_type_id2">Type of Lead</label>
                                        <input type="hidden" name="lead_type_id" id="lead_type_id2" value="{{ $lead->lead_type_id }}">
                                        <div class="common-dropdown common-dropdown-two common-dropdown-three">
                                            <div class="dropdown dropdown-two dropdown-three">
                                                <button class="btn w-100" type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    @php
                                                        $leadId = $lead->lead_type_id;
                                                        $leadType = App\Models\LeadType::find($leadId);
                                                        $leadTypeTitle = $leadType ? $leadType->name : "Select Below";
                                                    @endphp
                                                    <div id="setLeadType2">
                                                       {{ ucfirst( $leadTypeTitle . ' Lead') }}
                                                        </div><i class="fas fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-two dropdown-menu-three w-100">
                                                    @foreach ($lead_types as $leadType)
                                                    <li>
                                                        <a onclick="getLeadType('{{ $leadType->lead_type_id }}', '{{ $leadType->name.' Lead' }}')" class="dropdown-item dropdown-item-two lead-type-2"
                                                            href="javascript:;"
                                                            data-id="{{ $leadType->lead_type_id }}">{{
                                                            $leadType->name }} Lead</a>
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
                                        <textarea name="note" id="note2" rows="7" class="form-control"
                                            placeholder="Enter details">{{ $lead->note }}</textarea>
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






{{-- lead avatar js --}}
<script>
    // console.log('upload');
    // Get references to elements
    const avatarInput2 = document.getElementById('avatar2');
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

</script>

{{-- select leads type js --}}
<script>
    // let leadTypeId2 = document.getElementById("lead_type_id2");
    // let setLeadType2 = document.getElementById("setLeadType2");
    // let leadTypes2 = document.querySelectorAll(".lead-type-2");

    // leadTypes2.forEach(item => {
    //     item.addEventListener("click", function(e) {
    //         console.log(item)
    //         e.preventDefault();
    //         setLeadType2.innerHTML = this.innerHTML;
    //         leadTypeId2.value = this.getAttribute("data-id");
    //     });
    // });
</script>


