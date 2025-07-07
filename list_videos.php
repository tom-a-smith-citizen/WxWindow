<?php
$videoDir = __DIR__ . "/videos/";
$videos = [];

if (is_dir($videoDir)) {
    foreach (scandir($videoDir) as $file) {
        if (preg_match('/\.(mp4|webm|avi|mov)$/i', $file)) {
            $videos[] = $file;
        }
    }
}

header("Content-Type: application/json");
echo json_encode($videos);
?>
