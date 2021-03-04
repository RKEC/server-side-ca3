<head>
<link rel="icon" href="image_uploads/favicon.png" type="png" sizes="16x16">
</head>

<?php
require_once('database.php');

// Get os ID
if (!isset($os_id)) {
    $os_id = filter_input(
        INPUT_GET,
        'os_id',
        FILTER_VALIDATE_INT
    );
    if ($os_id == NULL || $os_id == FALSE) {
        $os_id = 1;
    }
}

// Get name for current os
$queryos = "SELECT * FROM os
WHERE osID = :os_id";
$statement1 = $db->prepare($queryos);
$statement1->bindValue(':os_id', $os_id);
$statement1->execute();
$os = $statement1->fetch();
$statement1->closeCursor();
$os_name = $os['osName'];

// Get all os
$queryAllos = 'SELECT * FROM os
ORDER BY osID';
$statement2 = $db->prepare($queryAllos);
$statement2->execute();
$os = $statement2->fetchAll();
$statement2->closeCursor();

// Get phone for selected os
$queryPhones = "SELECT * FROM phones
WHERE osID = :os_id
ORDER BY phoneID";
$statement3 = $db->prepare($queryPhones);
$statement3->bindValue(':os_id', $os_id);
$statement3->execute();
$phones = $statement3->fetchAll();
$statement3->closeCursor();
?>
<div class="container">
    <?php
    include('includes/header.php');
    ?>
    <aside>
        <!-- display a list of os -->
        <BR>
        <BR>
        <h2>OPERATING SYSTEM</h2>
        <nav>
            <ul>
                <?php foreach ($os as $os) : ?>
                    <li><a href=".?os_id=<?php echo $os['osID']; ?>">
                            <?php echo $os['osName']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>

    <section>
        <!-- display a table of phones -->
        <h2><?php echo $os_name; ?></h2>
        <table>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Date Added</th>
                <th>Delete</th>
                <th>Edit</th>
                <th> Buy</th>
                
            </tr>
            <?php foreach ($phones as $phone) : ?>
                <tr>
                    <td><img src="image_uploads/<?php echo $phone['image']; ?>" width="140px" height="150px" /></td>
                    <td><?php echo $phone['name']; ?></td>
                    <td class="right"><?php echo "€" . $phone['price']; ?></td>
                    <td class="right"><?php echo $phone['dateAdded']; ?></td>
                    <td>
                        <form action="delete_phone.php" method="post" id="delete_phone_form">
                            <input type="hidden" name="phone_id" value="<?php echo $phone['phoneID']; ?>">
                            <input type="hidden" name="os_id" value="<?php echo $phone['osID']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                    <td>
                        <form action="edit_phone_form.php" method="post" id="delete_phone_form">
                            <input type="hidden" name="phone_id" value="<?php echo $phone['phoneID']; ?>">
                            <input type="hidden" name="os_id" value="<?php echo $phone['osID']; ?>">
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                    <td>
                        <form action="billpay_form.php" method="post" id="delete_phone_form">
                            <input type="hidden" name="phone_id" value="<?php echo $phone['phoneID']; ?>">
                            <input type="hidden" name="os_id" value="<?php echo $phone['osID']; ?>">
                            <input type="submit" value="Buy">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="add_phone_form.php">Add Phone</a></p>
        <p><a href="os_list.php">Manage Operating Systems</a></p>
    </section>
    <?php
    include('includes/footer.php');
    ?>