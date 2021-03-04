<?php
    require_once('database.php');

    // Get all os
    $query = 'SELECT * FROM os
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
    <h1>Operating Systems List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($os as $os) : ?>
        <tr>
            <td><?php echo $os['osName']; ?></td>
            <td>
                <form action="delete_os.php" method="post"
                      id="delete_product_form">
                    <input type="hidden" name="os_id"
                           value="<?php echo $os['osID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <h2>Add OS</h2>
    <form action="add_os.php" method="post"
          id="add_os_form">

        <label>Name:</label>
        <input type="input" name="name" placeholder="Operating System" pattern=".{3,}" required>
        <input id="add_os_button" type="submit" value="Add">
    </form>
    <br>
    <p><a href="index.php">Homepage</a></p>

    <?php
include('includes/footer.php');
?>