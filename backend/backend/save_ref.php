<?php
// backend/save_ref.php
header("Content-Type: application/json");

// Path to your log file
$logFile = __DIR__ . "/referrals.csv";

// Get JSON input
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["status" => "error", "message" => "No data received"]);
    exit;
}

// Extract fields
$source = $data["source"] ?? "unknown";
$medium = $data["medium"] ?? "direct";
$campaign = $data["campaign"] ?? "none";
$timestamp = $data["timestamp"] ?? date("c");
$ip = $_SERVER["REMOTE_ADDR"] ?? "unknown";

// Save to CSV
$line = [$timestamp, $ip, $source, $medium, $campaign];
$fp = fopen($logFile, "a");
fputcsv($fp, $line);
fclose($fp);

echo json_encode(["status" => "success"]);
?>
