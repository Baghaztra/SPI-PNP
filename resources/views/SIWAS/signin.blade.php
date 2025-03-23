<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo.png') }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom Styles (Jika Masih Perlu) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/yourrepo/yourproject/styles.min.css">

    <style>
        #togglePassword:hover i {
            color: #ff6b2b;
        }

        .btn-outline-primary {
            background-color: #ff6b2b;
            color: white;
            border-color: white
        }
        .btn-outline-primary:hover {
            background-color: white;
            color: ff6b2b;
        }
        .form-control:focus {
            border-color: #ff6b2b;
            box-shadow: 0 0 0 0.25rem rgba(255, 107, 43, 0.25);
        }
        .invalid-feedback {
            display: block;
        }
    </style>

</head>

<body>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center">
                                    <img src="{{ asset('assets/images/logo.png') }}" width="50" height="50" alt="Logo">
                                </div>


                                <p class="text-center fw-bold mt-3">SIWAS</p>

                                <!-- Login Form -->
                                <form action="{{ route('proses-signin') }}" method="POST" autocomplete="off" novalidate style="color: #ff6b2b;">
                                    @csrf

                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <!-- Email Input -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" placeholder="name@example.com"
                                            value="{{ old('email') }}" aria-describedby="emailError">
                                        @error('email')
                                            <div class="invalid-feedback" id="emailError">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Password Input -->
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="password" placeholder="Password" aria-describedby="passwordError">
                                            <button type="button" class="btn btn-outline-primary" id="togglePassword">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback" id="passwordError">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Links -->
                                    {{-- <div class="d-flex align-items-center justify-content-between mb-4">
                                        <a href="{{ route('home') }}" class="text-primary fw-bold">Kembali</a>
                                        <a class="text-primary fw-bold" href="{{ route('password.request') }}">Lupa Password?</a>
                                    </div> --}}

                                    <!-- Submit Button -->
                                    <button class="btn w-100 py-8 fs-6 mb-4 rounded-2"
                                        type="submit" style="background-color: #ff6b2b; color: white;">Sign In</button>
                                </form>
                                <!-- End Login Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle password visibility
        document.getElementById("togglePassword").addEventListener("click", function () {
            const passwordField = document.getElementById("password");
            const icon = this.querySelector("i");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        });
    </script>
</body>

</html>
