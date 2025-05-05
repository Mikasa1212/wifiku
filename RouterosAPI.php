<?php
class RouterosAPI {
    public function connect($ip, $username, $password) {
        // Dummy for simulation, replace with real connection code
        return true;
    }
    public function comm($command, $params) {
        // Dummy for simulation, replace with real API call
        echo "Perintah ke MikroTik: " . $command . "\n";
    }
    public function disconnect() {
        // Disconnect simulation
    }
}
?>
