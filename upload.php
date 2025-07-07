<?php
$target_dir = "videos/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Allow only MP4 files
if ($imageFileType != "mp4") {
    echo "Sorry, only an MP4 file can be uploaded.";
    $uploadOk = 0;
}

// Validate MIME type
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $_FILES["fileToUpload"]["tmp_name"]);
finfo_close($finfo);

if ($mime != "video/mp4") {
    echo "Invalid file type. Only MP4 videos are allowed.";
    $uploadOk = 0;
}

// Limit file size to 1GB
if ($_FILES["fileToUpload"]["size"] > 1073741824) { // 1GB limit
    echo "File is too large. Maximum allowed size is 1GB.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
