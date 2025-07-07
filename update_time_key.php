<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldTime = $_POST['oldTime'];
    $newTime = $_POST['newTime'];
    $video = $_POST['video'];

    // Read current times from JSON
    $times = json_decode(file_get_contents('times.json'), true);

    // Remove the old time entry
    unset($times[$oldTime]);

    // Add the new time entry
    $times[$newTime] = $video;

    // Save the updated times back to the JSON file
    file_put_contents('times.json', json_encode($times, JSON_PRETTY_PRINT));

    echo "Time key updated successfully.";
}
?>
