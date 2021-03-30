<?php

/**
 * Start the session.
 */
session_start();

/**
 * Check if the user is logged in.
 */
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}

require_once('database.php');

// Get IDs
$phone_id = filter_input(INPUT_POST, 'phone_id', FILTER_VALIDATE_INT);
$os_id = filter_input(INPUT_POST, 'os_id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($phone_id != false && $os_id != false) {
    $query = "DELETE FROM phones
              WHERE phoneID = :phone_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':phone_id', $phone_id);
    $statement->execute();
    $statement->closeCursor();
}

// display the Product List page
include('index.php');
?>