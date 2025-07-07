<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $key = $_POST['key'];
        $jsonFile = 'times.json';
        
        if (file_exists($jsonFile)) {
            $jsonData = json_decode(file_get_contents($jsonFile), true);
            unset($jsonData[$key]); // Remove the entry with the specified key
            
            file_put_contents($jsonFile, json_encode($jsonData, JSON_PRETTY_PRINT));
            echo "Entry with key $key deleted successfully.";
        } else {
            echo "Error: File not found.";
        }
    }
?>
