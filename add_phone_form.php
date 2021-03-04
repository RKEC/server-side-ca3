<?php
require('database.php');
$query = 'SELECT *
          FROM os
          ORDER BY osID';
$statement = $db->prepare($query);
$statement->execute();
$os = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
<div class="container">
    <?php
    include('includes/header.php');
    ?>
    <h1>Add New Phone</h1>
    <form action="add_phone.php" method="post" enctype="multipart/form-data" id="add_record_form">

        <lable>Date Added: &nbsp</lable>
        <input type="date" name="date" value="<?php echo date("Y-m-d") ?>" required>
        <br>

        <label>OS:</label>
        <select name="os_id">
            <?php foreach ($os as $os) : ?>
                <option value="<?php echo $os['osID']; ?>">
                    <?php echo $os['osName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Name:</label>
        <input type="input" name="name" placeholder="Phone Name" required>
        <br>

        <label>List Price:</label>
        <input type="input" name="price" placeholder="Phone Price" required>
        <br>

        <label>Image:</label>
        <input type="file" name="image" accept="image/*" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add phone">
        <br>
    </form>
    <p><a href="index.php?">View Homepage</a></p>
    <?php
    include('includes/footer.php');
    ?>