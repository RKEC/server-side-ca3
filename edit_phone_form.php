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

require('database.php');

$phone_id = filter_input(INPUT_POST, 'phone_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM phones
          WHERE phoneID = :phone_id';
$statement = $db->prepare($query);
$statement->bindValue(':phone_id', $phone_id);
$statement->execute();
$phones = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
<div class="container">
       <?php
       include('includes/header.php');
       ?>
       <h1>Edit Phone</h1>
       <form action="edit_phone.php" method="post" enctype="multipart/form-data" id="add_record_form">
              <input type="hidden" name="original_image" value="<?php echo $phones['image']; ?>" />
              <input type="hidden" name="phone_id" value="<?php echo $phones['phoneID']; ?>">

              <label>Date Added:</label>
              <input type="date" name="date" value="<?php echo $phones['dateAdded']; ?>" required>
              <br>

              <label>OS:</label>
              <input type="os_id" name="os_id" value="<?php echo $phones['osID']; ?>" required>
              <br>

              <label>Name:</label>
              <input type="input" name="name" value="<?php echo $phones['name']; ?>" required>
              <br>

              <label>List Price:</label>
              <input type="input" name="price" value="<?php echo $phones['price']; ?>" required>
              <br>

              <label>Image:</label>
              <input type="file" name="image" accept="image/*" />
              <br>
              <?php if ($phones['image'] != "") { ?>
                     <p><img src="image_uploads/<?php echo $phones['image']; ?>" height="150" /></p>
              <?php } ?>

              <label>&nbsp;</label>
              <input type="submit" value="Save Changes">
              <br>
       </form>
       <p><a href="index.php">View Homepage</a></p>
       <?php
       include('includes/footer.php');
       ?>