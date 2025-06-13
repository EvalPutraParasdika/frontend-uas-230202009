<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- SB Admin 2 CSS (Optional, you can link your own) -->
    <link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@5.0.7/css/sb-admin-2.min.css" rel="stylesheet" />
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-8">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-5">

                        <!-- Login Form -->
                        <div class="text-center mb-4">
                            <h1 class="h4 text-gray-900">Selamat Datang!</h1>
                        </div>

                        <form action="{{ route('login.submit') }}" method="POST" class="user">
                            @csrf

                            <div class="mb-3">
                                <input type="email" name="email" class="form-control form-control-user" id="email"
                                    aria-describedby="emailHelp" placeholder="Masukan Alamat Email..." required
                                    autofocus>
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
                                Login
                            </button>

                        </form>

                        <hr>

                        <div class="text-center">
                            <a class="small" href="{{ route('register') }}">Buat Akun</a>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap JS Bundle (Popper.js + Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SB Admin 2 JS (Optional) -->
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