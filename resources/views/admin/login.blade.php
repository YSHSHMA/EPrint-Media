<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title> Admin - Login</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/png" href="{{asset(configData()->favicon)}}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin-assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/pages/page-auth.css') }}" />
    <script src="{{ asset('admin-assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('admin-assets/js/config.js') }}"></script>
</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <div class="app-brand justify-content-center p-2">
                            <img width="180" height="35" src="{{ asset(configData()->header_logo) }}"
                                alt="">
                        </div>
                        @error('error')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <h4 class="mb-2">Welcome to {{ configData()->name }}! 👋</h4>
                        <form class="mb-3" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter your email"
                                    autofocus />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="">
                                    <input type="password" class="form-control" name="password"
                                        placeholder="**********" />
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Log in</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin-assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('admin-assets/js/main.js') }}"></script>
</body>

</html>
