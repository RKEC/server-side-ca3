<?php
// Get ID
$os_id = filter_input(INPUT_POST, 'os_id', FILTER_VALIDATE_INT);

// Validate inputs
if ($os_id == null || $os_id == false) {
    $error = "Invalid os ID.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'DELETE FROM os
              WHERE osID = :os_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':os_id', $os_id);
    $statement->execute();
    $statement->closeCursor();

    // Display the os List page
    include('os_list.php');
}
?>
