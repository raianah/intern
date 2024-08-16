<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check for upload errors
    if ($_FILES['fileUpload']['error'] !== UPLOAD_ERR_OK) {
        die("Upload failed with error code " . $_FILES['fileUpload']['error']);
    }

    $targetDir = "../img/";
    $originalFileName = basename($_FILES['fileUpload']['name']);
    $tmpFilePath = $_FILES['fileUpload']['tmp_name'];
    $imageFileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

    // Check if temporary file exists
    if (file_exists($tmpFilePath)) {
        // Validate if the file is an image
        $check = getimagesize($tmpFilePath);
        if ($check !== false) {
            // Handle file name collisions
            $targetFile = $targetDir . $originalFileName;
            if (file_exists($targetFile)) {
                $fileBaseName = pathinfo($originalFileName, PATHINFO_FILENAME);
                $targetFile = $targetDir . $fileBaseName . "_" . time() . "." . $imageFileType;
            }

            // Move the uploaded file to the target directory
            if (move_uploaded_file($tmpFilePath, $targetFile)) {
                echo "The file " . htmlspecialchars(basename($targetFile)) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
        }
    } else {
        die("Temporary file does not exist.");
    }
}
?>
