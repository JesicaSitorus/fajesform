<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Form Login</title>
    <!-- reCAPTCHA v2 -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form id="login-form" action="access.php" method="post" enctype="multipart/form-data">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google fa-lg"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-square-facebook fa-lg"></i></a>
                    <a href="https://www.instagram.com/fza.hqiya?igshid=MzRlODBiNWFlZA==" class="icon"><i class="fa-brands fa-instagram fa-lg"></i></a>
                </div>
                <span>Use your username and password</span>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" id="password-log" required>
                <div onclick="togglePasswordlog()">
                    <i class="fa-regular fa-eye-slash fa-lg" id="eye-icon-log"></i>
                </div>
                <!-- Tambahkan elemen reCAPTCHA -->
                <div class="g-recaptcha" data-sitekey="6LclfTUqAAAAANDVyx9SUrfIruIX_yO7Cjz-dgKE"></div>
                <button name="login" type="submit">Log In</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Welcome!</h1>
                    <p>Please log in to enter your account</p>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function togglePasswordlog() {
            var password = document.getElementById("password-log");
            var eyeIcon = document.getElementById("eye-icon-log");

            if (password.type === "password") {
                password.type = "text";
                eyeIcon.classList.remove("fa-regular", "fa-eye-slash");
                eyeIcon.classList.add("fa-regular", "fa-eye");
            } else {
                password.type = "password";
                eyeIcon.classList.remove("fa-regular", "fa-eye");
                eyeIcon.classList.add("fa-regular", "fa-eye-slash");
            }
        }
    </script>

</body>

</html>
