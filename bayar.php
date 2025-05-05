<?php
$merchantCode = "TRIPAYCODE";
$apiKey = "API_KEY_KAMU";
$privateKey = "PRIVATE_KEY_KAMU";

$data = [
    'method' => 'QRIS',
    'merchant_ref' => 'INV' . time(),
    'amount' => 2000,
    'customer_name' => 'Pelanggan Wifi',
    'order_items' => [[
        'sku' => 'wifi1jam',
        'name' => 'Paket WiFi 1 Jam',
        'price' => 2000,
        'quantity' => 1
    ]],
    'callback_url' => 'https://domainkamu.com/callback.php',
    'return_url' => 'https://domainkamu.com/sukses.html',
    'expired_time' => time() + (60 * 5)
];

$signature = hash_hmac('sha256', $data['merchant_ref'].$data['amount'], $privateKey);

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_FRESH_CONNECT  => true,
    CURLOPT_URL            => "https://tripay.co.id/api/transaction/create",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER         => false,
    CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => http_build_query($data)
]);

$response = curl_exec($curl);
curl_close($curl);

$json = json_decode($response, true);
header("Location: " . $json['data']['checkout_url']);
?>
