<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

@include('backend.utils.header_css')

<body class="bg-white">

    <div class="row authentication mx-0">

        <div class="col-xxl-5 col-xl-5 col-lg-12">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-xxl-6 col-xl-9 col-lg-6 col-md-6 col-sm-8 col-12">
                    <div class="card custom-card shadow-none my-4">
                        <div class="card-body p-4">
                            <div class="mb-3 d-flex justify-content-center">
                                <a href="{{ url('/') }}">
                                    <img src="{{ url('assets/images/bb-logo.png') }}" alt="logo" class="authentication-brand desktop-logo">
                                    <img src="{{ url('assets/images/bb-logo.png') }}" alt="logo" class="authentication-brand desktop-dark">
                                </a>
                            </div>
                            <p class="h5 mb-2 text-center">Sign In</p>
                            <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome back Jhon !</p>
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="row gy-3">
                                    <div class="col-xl-12">
                                        <label for="signin-username" class="form-label text-default">Email Address</label>
                                        <input type="email" name="email" class="form-control rounded-0 @error('email') is-invalid @enderror" id="signin-username" placeholder="Email Address" />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-12 mb-2">
                                        <label for="signin-password" class="form-label text-default d-block">Password<a href="{{ route('password.request') }}" class="float-end text-danger">Forget password ?</a></label>
                                        <div class="position-relative">
                                            <input type="password" name="password" class="form-control rounded-0 @error('password') is-invalid @enderror" id="signin-password" placeholder="Password">
                                            <a href="javascript:void(0);" class="show-password-button text-muted" onclick="createpassword('signin-password', this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></a>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert" style="display: block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                                    Remember password?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-lg btn-primary">Sign In</button>
                                </div>
                            </form>
                            <div class="text-center">
                                <p class="text-muted mt-3 mb-0">Dont have an account? <a href="{{ route('register') }}" class="text-primary">Sign Up</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-7 col-xl-7 col-lg-7 d-xl-block d-none px-0">
            <div class="authentication-cover bg-primary">
                <div>
                    <div class="authentication-cover-image">
                        <img src="{{ url('assets/images/bb-logo.png') }}" alt="">
                    </div>
                    <div class="text-center mb-4">
                        <h1 class="text-fixed-white">Sign In</h1>
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