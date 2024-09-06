<?php
$password1 = 'faza123';
$password2 = 'jesi123';
$password3 = 'fajesnih';
$salt = 'fajes'; // Contoh salt

// Enkripsi password
$hashed_password1 = crypt($password1, $salt);
$hashed_password2 = crypt($password2, $salt);
$hashed_password3 = crypt($password3, $salt);

// Tampilkan hasil hash 
echo "Hashed Password faza123: " . $hashed_password1 . "<br>";
echo "Hashed Password jesi123: " . $hashed_password2 . "<br>";
echo "Hashed Password fajesnih: " . $hashed_password3 . "<br>";
?>
