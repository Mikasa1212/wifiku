<?php
require('RouterosAPI.php');

function aktifkan_user_mikrotik($username, $durasi) {
    $iprouter = "192.168.88.1";
    $user = "admin";
    $pass = "passwordkamu";
    $api = new RouterosAPI();

    if ($api->connect($iprouter, $user, $pass)) {
        $api->comm("/ip/hotspot/user/add", [
            "name" => $username,
            "limit-uptime" => $durasi,
            "profile" => "default"
        ]);
        $api->disconnect();
    }
}
?>
