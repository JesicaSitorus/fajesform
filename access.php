<?php
session_start();

// Salt (data tambahan yang unik dan acak)
$salt = 'fajes'; 

// Fungsi untuk mengenkripsi password dengan salt tetap
function hash_password($password) {
    global $salt;
    return crypt($password, $salt);
}

// Daftar user dengan password yang telah dienkripsi menggunakan salt tetap
$users = [
    'Faaza Haqqiya' => ['username' => 'Faaza Haqqiya', 'password' => hash_password('fazanih')],
    'Jesica Anastasya' => ['username' => 'Jesica Anastasya', 'password' => hash_password('jesinih')],
    'Fajes' => ['username' => 'Fajes', 'password' => hash_password('fajesnih')],
];

$lockout_time = 60; // 1 menit
$max_attempts = 3; // Maksimal 3 kali percobaan

// Jika sudah terkunci sebelumnya
if (isset($_SESSION['locked']) && (time() - $_SESSION['locked']) < $lockout_time) {
    die("Harap tunggu 1 menit lagi untuk mencoba.");
} elseif (isset($_SESSION['locked']) && (time() - $_SESSION['locked']) >= $lockout_time) {
    // Reset percobaan setelah lockout berakhir
    unset($_SESSION['locked']);
    $_SESSION['attempts'] = 0;
}

// Mengecek jika ada submission login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifikasi reCAPTCHA
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $secretKey = '6LclfTUqAAAAAA53oub4Gf-dqUgi03bd8UnxY74t';
    $verifyUrl = "https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}";

    $response = file_get_contents($verifyUrl);
    $responseKeys = json_decode($response, true);

    if ($responseKeys["success"]) {
        // Validasi user
        if (isset($users[$username])) {
            $hashed_password = $users[$username]['password'];
            if (hash_equals($hashed_password, crypt($password, $hashed_password))) {
                $_SESSION['user'] = $username;
                header("Location: dashboard.php");
                exit();
            }
        }

        if (!isset($_SESSION['attempts'])) {
            $_SESSION['attempts'] = 0;
        }
        $_SESSION['attempts']++;

        // Jika percobaan login melebihi batas maksimal
        if ($_SESSION['attempts'] >= $max_attempts) {
            $_SESSION['locked'] = time();
            die("Harap tunggu 1 menit lagi untuk mencoba, silahkan <a href='login.php'><b>kembali</b></a>");
        }

        echo "Login tidak valid. Username atau password salah. Anda memiliki " . ($max_attempts - $_SESSION['attempts']) . " kesempatan lagi, " . "silahkan " . "<a href='login.php'><b>login kembali</b></a>";
    } else {
        echo "Verifikasi reCAPTCHA gagal. silahkan <a href='login.php'><b>kembali</b></a>";
    }
} else {
    echo "Metode permintaan tidak valid.";
}
?>
