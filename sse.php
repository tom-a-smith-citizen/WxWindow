<?php
header("Content-Type: text/event-stream");
header("Cache-Control: no-cache");
header("Connection: keep-alive");

while (true) {
    clearstatcache();
    $commandFile = "command.txt";
    $command = file_exists($commandFile) ? trim(file_get_contents($commandFile)) : "";

    echo "data: " . json_encode(["command" => $command]) . "\n\n";
    ob_flush();
    flush();
    sleep(1);
}
?>