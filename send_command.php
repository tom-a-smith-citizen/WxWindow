<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $video = $_POST["video"] ?? "";

    if (!empty($video) && file_exists(__DIR__ . "/" . $video)) {
        file_put_contents("command.txt", $video);
        echo "Command saved: " . $video;
    } else {
        echo "Error: Invalid video file.";
    }
}
?>
