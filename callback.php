<?php
require("mikrotik_api.php"); // File koneksi ke router

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if ($data['status'] === 'PAID') {
    $username = 'wifi_' . substr($data['merchant_ref'], 3); // contoh: wifi_651246123
    $duration = 3600; // 1 jam (dalam detik)

    // Panggil fungsi untuk aktifkan user
    aktifkan_user_mikrotik($username, $duration);
}
?>
