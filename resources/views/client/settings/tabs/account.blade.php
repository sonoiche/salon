<div class="tab-pane {{ isset($active) ? 'show active' : '' }}" id="account-settings" role="tabpanel">
    <div class="row gap-3 justify-content-between">
        <div class="col-xl-7">
            <div class="card custom-card shadow-none mb-0 border">
                <div class="card-body">
                    <form action="{{ url('client/settings/account') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-12 mb-2">
                                <label for="email-address" class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control rounded-0" id="email-address" placeholder="Email Address" value="{{ auth()->user()->email }}" />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <p class="fs-14 mb-3 fw-medium">Reset Password</p>
                            <div class="col-12 mb-2">
                                <label for="current-password" class="form-label">Current Password</label>
                                <input type="password" name="current_password" class="form-control rounded-0" id="current-password" placeholder="Current Password" />
                            </div>
                            <div class="col-6 mb-2">
                                <label for="new-password" class="form-label">New Password</label>
                                <input type="password" name="password" class="form-control rounded-0" id="new-password" placeholder="New Password" />
                            </div>
                            <div class="col-6 mb-0">
                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control rounded-0" id="confirm-password" placeholder="Confirm PAssword" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="hidden" name="id" value="{{ auth()->user()->id }}" />
                                <button class="btn btn-primary" type="submit">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            
        </div>
    </div>
</div>