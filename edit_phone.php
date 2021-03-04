<?php

// Get the phone data
$phone_id = filter_input(INPUT_POST, 'phone_id', FILTER_VALIDATE_INT);
$os_id = filter_input(INPUT_POST, 'os_id', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
$date = filter_input(INPUT_POST, 'date');

// Validate inputs
if ($phone_id == NULL || $phone_id == FALSE || $os_id == NULL ||
$os_id == FALSE || empty($name) ||
$price == NULL || $price == FALSE) {
$error = "Invalid phone data. Check all fields and try again.";
include('error.php');
} else {

/**************************** Image upload ****************************/

$imgFile = $_FILES['image']['name'];
$tmp_dir = $_FILES['image']['tmp_name'];
$imgSize = $_FILES['image']['size'];
$original_image = filter_input(INPUT_POST, 'original_image');

if ($imgFile) {
$upload_dir = 'image_uploads/'; // upload directory	
$imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
$image = rand(1000, 1000000) . "." . $imgExt;
if (in_array($imgExt, $valid_extensions)) {
if ($imgSize < 5000000) {
if (filter_input(INPUT_POST, 'original_image') !== "") {
unlink($upload_dir . $original_image);                    
}
move_uploaded_file($tmp_dir, $upload_dir . $image);
} else {
$errMSG = "Sorry, your file is too large it should be less then 5MB";
}
} else {
$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}
} else {
// if no image selected the old image remain as it is.
$image = $original_image; // old image from database
}

/************************** End Image upload **************************/

// If valid, update the phone in the database
require_once('database.php');

$query = 'UPDATE phones
SET osID = :os_id,
name = :name,
price = :price,
image = :image,
dateAdded = :date
WHERE phoneID = :phone_id';
$statement = $db->prepare($query);
$statement->bindValue(':date', $date);
$statement->bindValue(':os_id', $os_id);
$statement->bindValue(':name', $name);
$statement->bindValue(':price', $price);
$statement->bindValue(':image', $image);
$statement->bindValue(':phone_id', $phone_id);
$statement->execute();
$statement->closeCursor();

// Display the Product List page
include('index.php');
}
?>