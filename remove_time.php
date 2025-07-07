<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $key = $_POST['key'];

    // Read current times from JSON
    $times = json_decode(file_get_contents('times.json'), true);

    // Remove the entry
    unset($times[$key]);

    // Save the updated times back to the JSON file
    file_put_contents('times.json', json_encode($times, JSON_PRETTY_PRINT));

    echo "Time deleted successfully.";
}
?>
