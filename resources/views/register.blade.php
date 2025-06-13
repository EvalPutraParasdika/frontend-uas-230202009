<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register - SB Admin 2</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- SB Admin 2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@5.0.7/css/sb-admin-2.min.css" rel="stylesheet" />
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-7 col-md-8">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-5">

                        <div class="text-center mb-4">
                            <h1 class="h4 text-gray-900">Buat Akun</h1>
                        </div>

                        <form action="{{ route('register.submit') }}" method="POST" class="user">
                            @csrf

                            <div class="mb-3">
                                <input type="text" name="username" class="form-control form-control-user"
                                    id="username" placeholder="Username" required autofocus>
                            </div>

                            <div class="mb-3">
                                <input type="email" name="email" class="form-control form-control-user"
                                    id="email" placeholder="Email Address" required>
                            </div>

                            <div class="mb-3 position-relative">
                                <input type="password" name="password" class="form-control form-control-user"
                                    id="password" placeholder="Password" required>
                                <span class="position-absolute top-50 end-0 translate-middle-y pe-3"
                                    style="cursor: pointer;" onclick="togglePassword()">
                                    👁️
                                </span>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Registrasi Akun
                            </button>
                        </form>

                        <hr>

                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">Sudah punya akun? Login</a>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SB Admin 2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@5.0.7/js/sb-admin-2.min.js"></script>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const icon = event.target;
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.textContent = "🙈";
            } else {
                passwordInput.type = "password";
                icon.textContent = "👁️";
            }
        }
    </script>
</body>

</html>
