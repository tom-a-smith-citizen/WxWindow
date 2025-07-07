<?php
$filename = "times.json";

// Load existing JSON
$data = file_exists($filename) ? json_decode(file_get_contents($filename), true) : [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"] ?? "";
    $time = $_POST["time"] ?? "";

    if ($action === "add") {
        $preset = $_POST["preset"] ?? "";
        $enabled = filter_var($_POST["enabled"], FILTER_VALIDATE_BOOLEAN);
        $data[$time] = ["preset" => $preset, "enabled" => $enabled];
    } elseif ($action === "update") {
        $field = $_POST["field"] ?? "";
        $value = $_POST["value"] ?? "";
        if ($field && isset($data[$time])) {
            $data[$time][$field] = ($field === "enabled") ? filter_var($value, FILTER_VALIDATE_BOOLEAN) : $value;
        }
    } elseif ($action === "remove") {
        unset($data[$time]);
    }

    // Save the updated JSON
    file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));
    echo "Success";
}
?>
