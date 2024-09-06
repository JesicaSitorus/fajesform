<?php
session_start();

// Mengecek apakah user sudah login
if (!isset($_SESSION['user'])) {
    die("Maaf, Anda tidak dapat mengakses dashboard , Anda harus login terlebih dahulu, klik  <a href='login.php'><b>login</b></a>");
}

// Daftar user dengan path foto masing-masing dan kelas
$user_info = [
    'Faaza Haqqiya' => ['photo' => 'imgs/faza.jpg', 'class' => 'XII RPL 1'],
    'Jesica Anastasya' => ['photo' => 'imgs/jesi.jpg', 'class' => 'XII RPL 1'],
    'Fajes' => ['photo' => 'imgs/fajes.jpg', 'class' => 'XII RPL 1'],
];

// Mendapatkan nama pengguna yang sedang login
$current_user = $_SESSION['user'];

// Tentukan path foto dan kelas berdasarkan user yang login
$user_data = isset($user_info[$current_user]) ? $user_info[$current_user] : ['photo' => 'imgs/default.jpg', 'class' => 'Kelas Tidak Diketahui'];
$user_photo = $user_data['photo'];
$user_class = $user_data['class'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: 'Josefin Sans';
            background-color: #f4f4f4; 
            color: #333; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff; 
            padding: 20px;
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            text-align: center;
        }
        .profile-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .profile-container img {
            border-radius: 50%;
            margin-right: 15px;
            border: 3px solid #ddd; 
        }
        .profile-info {
            font-size: 18px;
            text-align: left;
        }
        button {
            background-color: #9f000f; 
            color: #fff; 
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        /* button:hover {
            background-color: #0056b3; } 
         */
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang User, <?= htmlspecialchars($current_user); ?>!</h1>
        <div class="profile-container">
            <img src="<?= htmlspecialchars($user_photo); ?>" alt="User Photo" width="100" height="100">
            <div class="profile-info">
                <p>Nama: <?= htmlspecialchars($current_user); ?></p>
                <p>Kelas: <?= htmlspecialchars($user_class); ?></p>
            </div>
        </div>
        <b>Selamat datang di laman User.</b>
        
        <!-- Tombol Logout -->
        <form method="post" action="logout.php">
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
