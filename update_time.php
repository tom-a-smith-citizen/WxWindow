<?php
// update_time.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $key = $_POST['key'] ?? null;
    $field = $_POST['field'] ?? null;
    $value = $_POST['value'] ?? null;

    if (!$key || !$field || !$value) {
        echo "Invalid entry!";
        exit;
    }

    // Read the current JSON data
    $jsonFile = 'times.json';
    $data = json_decode(file_get_contents($jsonFile), true);

    // Check if the key exists and update the field
    if (isset($data[$key])) {
        $data[$key][$field] = $value;

        // Write back to the JSON file
        file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT));
        echo "Entry updated!";
    } else {
        echo "Entry not found!";
    }
}
?>
