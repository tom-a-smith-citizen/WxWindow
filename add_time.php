<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $key = $_POST['key'];
        $preset = $_POST['preset'];
        $enabled = $_POST['enabled'];

        $jsonFile = 'times.json';

        if (file_exists($jsonFile)) {
            $jsonData = json_decode(file_get_contents($jsonFile), true);
            
            // Update or add the entry with the new key
            $jsonData[$key] = [
                'preset' => $preset,
                'enabled' => $enabled
            ];

            file_put_contents($jsonFile, json_encode($jsonData, JSON_PRETTY_PRINT));
            echo "Entry with key $key updated successfully.";
        } else {
            echo "Error: File not found.";
        }
    }
?>
