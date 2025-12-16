<!DOCTYPE html>
<!-- saved from url=(0052)https://zuramai.github.io/mazer/demo/auth-login.html -->
<html lang="en" data-bs-theme="light">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link rel="stylesheet" crossorigin="" href="{{ asset('assets/admin/compiled/css/app.css') }}">
    <link rel="stylesheet" crossorigin="" href="{{ asset('assets/admin/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" crossorigin="" href="{{ asset('assets/admin/compiled/css/auth.css') }}">
</head>

<body>
    <script src="{{ asset('assets/admin/static/js/initTheme.js') }}"></script>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                    </div>
                    <h1 class="auth-title">Login Pos App</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-xl"
                                placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl"
                                placeholder="Password" required autocomplete="current-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Log
                            in</button>
                    </form>
                    {{-- <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a
                                href="https://zuramai.github.io/mazer/demo/auth-register.html" class="font-bold">Sign
                                up</a>.</p>
                        <p><a class="font-bold"
                                href="https://zuramai.github.io/mazer/demo/auth-forgot-password.html">Forgot
                                password?</a>.</p>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>


    <span id="PING_IFRAME_FORM_DETECTION" style="display: none;"></span>
</body>

</html>
