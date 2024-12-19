<?php

ob_start(); // Start output buffering

include './src/helpers.php';
include './connect-mysql.php';

session_start();

// File upload handling
$targetDir = "uploads/"; // Create a directory named "uploads" in your project
$targetFile = $targetDir . basename($_FILES["image"]["name"]);
$uploadOk = 1;

// Obtain file extension using pathinfo
$imageExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if the image file is a valid image
$check = getimagesize($_FILES["image"]["tmp_name"]);
if ($check === false) {
    echo "File is not a valid image.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
$allowedExtensions = ["jpg", "jpeg", "png", "gif"];
if (!in_array($imageExtension, $allowedExtensions)) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    // Generate dynamic image name with extension
    $dynamicImageName = $_POST["make"] . "_" . $_POST["model"] . "_" . $_SESSION["userId"] . "." . $imageExtension;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetDir . $dynamicImageName)) {
        echo "The file " . htmlspecialchars($dynamicImageName) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Continue with the rest of your code
$recordInserted = addCar(
    $_SESSION['userId'],
    $_POST["make"],
    $_POST["model"],
    intval($_POST["year"]),
    $_POST["fuelType"],
    intval($_POST["mileage"]),
    intval($_POST["power"]),
    $_POST["transmission"],
    $_POST["nctExpiry"],
    intval($_POST["roadTax"]),
    intval($_POST["price"]),
    $dynamicImageName // Use the dynamic image name
);

if ($recordInserted) {
    header('Location: ./listing.php');
} else {
    header('Location: ./add-car.php');
}

ob_end_flush(); // Flush the output buffer at the end

?>
