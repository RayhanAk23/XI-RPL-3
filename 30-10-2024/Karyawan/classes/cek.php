<?php   
$passwordInput = 'passwordAnda'; // Ganti dengan password yang Anda masukkan saat login
$hash = '$2y$10$33xbBIwyf5144RVpSJFS5.tgj0b8jgTDs59AVjYPkNc'; // Hash dari database

if (password_verify($passwordInput, $hash)) {
    echo "Password valid!";
} else {
    echo "Password tidak valid.";
}
