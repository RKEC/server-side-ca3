<?php
// Get the os data
$name = $name = filter_input(INPUT_POST, 'name');

// Validate inputs
if ($name == null) {
    $error = "Invalid os data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database
    $query = "INSERT INTO os (osName)
              VALUES (:name)";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();

    // Display the os List page
    include('os_list.php');
}
?>