<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

@include('backend.utils.header_css')

<body class="bg-white">

    <div class="row authentication mx-0">

        <div class="col-xxl-6 col-xl-6 col-lg-12">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-xxl-8 col-xl-9 col-lg-6 col-md-6 col-sm-8 col-12">
                    <div class="card custom-card shadow-none my-4">
                        <div class="card-body p-4">
                            <div class="mb-3 d-flex justify-content-center">
                                <a href="index.html">
                                    <img src="{{ url('backend/images/brand-logos/desktop-logo.png') }}" alt="logo" class="authentication-brand desktop-logo">
                                    <img src="{{ url('backend/images/brand-logos/desktop-dark.png') }}" alt="logo" class="authentication-brand desktop-dark">
                                </a>
                            </div>
                            <p class="h5 mb-2 text-center">Sign Up</p>
                            <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome & Join us by creating a free account!</p>
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="row gy-3">
                                    <div class="col-xl-6">
                                        <label for="signup-firstname" class="form-label text-default">First Name<sup class="text-danger">*</sup></label>
                                        <input type="text" name="fname" class="form-control rounded-0 @error('fname') is-invalid @enderror" id="signup-firstname" placeholder="First Name">
                                        @error('fname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="signup-lastname" class="form-label text-default">Last Name<sup class="text-danger">*</sup></label>
                                        <input type="text" name="lname" class="form-control rounded-0 @error('lname') is-invalid @enderror" id="signup-lastname" placeholder="Last Name">
                                        @error('lname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-12">
                                        <label for="signup-email" class="form-label text-default">Email Address<sup class="text-danger">*</sup></label>
                                        <input type="email" name="email" class="form-control rounded-0 @error('email') is-invalid @enderror" id="signup-email" placeholder="Email Address">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="signup-password" class="form-label text-default">Password<sup class="text-danger">*</sup></label>
                                        <div class="position-relative">
                                            <input type="password" name="password" class="form-control rounded-0 @error('password') is-invalid @enderror" id="signup-password" placeholder="Password">
                                            <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('signup-password', this)"  id="button-addon2"><i class="ri-eye-off-line align-middle"></i></a>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6 mb-2">
                                        <label for="signup-confirmpassword" class="form-label text-default">Confirm Password<sup class="text-danger">*</sup></label>
                                        <div class="position-relative">
                                            <input type="password" name="password_confirmation" class="form-control rounded-0" id="signup-confirmpassword" placeholder="Confirm password">
                                            <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('signup-confirmpassword', this)"  id="button-addon21"><i class="ri-eye-off-line align-middle"></i></a>
                                        </div>
                                        {{-- <div class="form-check mt-3">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                                By creating a account you agree to our <a href="terms_conditions.html" class="text-success"><u>Terms & Conditions</u></a> and <a class="text-success"><u>Privacy Policy</u></a>
                                            </label>
                                        </div> --}}
                                    </div>
                                    <div class="col-xl-12">
                                        <label for="signup-role" class="form-label text-default">Role<sup class="text-danger">*</sup></label>
                                        <select name="role" id="signup-role" class="form-select rounded-0 @error('role') is-invalid @enderror">
                                            <option value=""></option>
                                            <option value="Customer">Customer</option>
                                            <option value="Client">Client</option>
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-lg btn-primary">Create Account</button>
                                </div>
                            </form>
                            <div class="text-center">
                                <p class="text-muted mt-3 mb-0">Already have an account? <a href="{{ route('login') }}" class="text-primary">Sign In</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-6 col-xl-6 col-lg-6 d-xl-block d-none px-0">
            <div class="authentication-cover bg-primary">
                <div>
                    <div class="authentication-cover-image">
                        <img src="{{ url('backend/images/media/media-67.png') }}" alt="">
                    </div>
                    <div class="text-center mb-4">
                        <h1 class="text-fixed-white">Sign Up</h1>
                    </div>
                    <div class="btn-list text-center">
                        <a href="javascript:void(0);" class="btn btn-icon authentication-cover-icon btn-wave">
                            <i class="ri-facebook-line fw-bold"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-icon authentication-cover-icon btn-wave">
                            <i class="ri-twitter-line fw-bold"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-icon authentication-cover-icon btn-wave">
                            <i class="ri-instagram-line fw-bold"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-icon authentication-cover-icon btn-wave">
                            <i class="ri-github-line fw-bold"></i>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-icon authentication-cover-icon btn-wave">
                            <i class="ri-youtube-line fw-bold"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('backend.utils.footer_js')

</body>
</html>