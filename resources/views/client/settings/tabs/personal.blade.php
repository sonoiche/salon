<div class="tab-pane {{ isset($active) ? 'show active': '' }}" id="personal-info" role="tabpanel">
    <div class="p-sm-3 p-0 col-8">
        <form action="{{ url('client/settings/users') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h6 class="fw-medium mb-3">
                Photo:
            </h6>
            <div class="mb-4 d-sm-flex align-items-center">
                <div class="mb-0 me-5">
                    <span class="avatar avatar-xxl avatar-rounded">
                        <img src="{{ url('backend/images/faces/9.jpg') }}" alt="" id="profile-img" />
                        <a href="javascript:void(0);" class="badge rounded-pill bg-primary avatar-badge">
                            <input type="file" name="photo" class="position-absolute w-100 h-100 op-0" id="profile-change" />
                            <i class="fe fe-camera"></i>
                        </a>
                    </span>
                </div>
                <div class="btn-group">
                    <button class="btn btn-light" onclick="removePhoto()">Remove</button>
                </div>
            </div>
            <h6 class="fw-medium mb-3">
                Profile:
            </h6>
            <div class="row gy-4 mb-4">
                <div class="col-xl-4">
                    <label for="first-name" class="form-label">First Name</label>
                    <input type="text" name="fname" class="form-control rounded-0" id="first-name" placeholder="First Name" value="{{ auth()->user()->fname }}" />
                </div>
                <div class="col-xl-4">
                    <label for="middle-name" class="form-label">Middle Name</label>
                    <input type="text" name="mname" class="form-control rounded-0" id="middle-name" placeholder="Middle Name" value="{{ auth()->user()->mname }}" />
                </div>
                <div class="col-xl-4">
                    <label for="last-name" class="form-label">Last Name</label>
                    <input type="text" name="lname" class="form-control rounded-0" id="last-name" placeholder="Last Name" value="{{ auth()->user()->lname }}" />
                </div>
                <div class="col-xl-6">
                    <label for="birthdate" class="form-label">Date of Birth</label>
                    <input type="date" name="birthdate" class="form-control rounded-0" id="birthdate" max="{{ now()->subYears(13)->format('Y-m-d') }}" placeholder="Date of Birth" value="{{ auth()->user()->birthdate }}" />
                </div>
                <div class="col-xl-6">
                    <label for="contact_number" class="form-label">Contact Number</label>
                    <input type="text" name="contact_number" class="form-control rounded-0" id="contact_number" placeholder="Contact Number" value="{{ auth()->user()->contact_number }}" />
                </div>
            </div>
            <h6 class="fw-medium mb-3">
                Personal information:
            </h6>
            <div class="row gy-4 mb-3">
                <div class="col-xl-12">
                    <label for="complete_address" class="form-label">Complete Address</label>
                    <input type="text" name="address" class="form-control rounded-0" id="complete_address" value="{{ auth()->user()->address }}" />
                </div>
                <div class="col-xl-6">
                    <label for="city" class="form-label">City</label>
                    <input type="text" name="city" class="form-control rounded-0" id="city" placeholder="City" value="{{ auth()->user()->city }}" />
                </div>
                <div class="col-xl-6">
                    <label for="zip_code" class="form-label">Zip Code</label>
                    <input type="number" name="zip_code" class="form-control rounded-0" id="zip_code" placeholder="Zip Code" value="{{ auth()->user()->zip_code }}" />
                </div>
            </div>
            <div class="row gy-4 mb-3">
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>