<?php
require('database.php');

$record_id = filter_input(INPUT_POST, 'record_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM records
          WHERE recordID = :record_id';
$statement = $db->prepare($query);
$statement->bindValue(':record_id', $record_id);
$statement->execute();
$records = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();

$tenPer = "€" . number_format(($records['price']*.10), 2);
$fifteenPer = "€" . number_format(($records['price']*.15), 2);
$twentyPer = "€" . number_format(($records['price']*.20), 2);

include('includes/header.php');
?>

<h1>Bill Pay Calculator</h1>

<form action="billpay.php" method="post" enctype="multipart/form-data" id="add_record_form">

    <label>Total Price</label>
    <br>
    <input type="input" name="totalBefore" value="<?php echo $records['price']; ?>"></input>
    <br>
    <br>
    <label>Time Plan</label><br>
    <input type="radio" id="1 year" name="time" value="12">
    <label for="1 year">1 year</label><br>
    <input type="radio" id="2 year" name="time" value="24">
    <label for="2 year">2 year</label><br>
    <input type="radio" id="3 year" name="time" value="36">
    <label for="3 year">3 year</label>
    <br>
    <br>
    <label width="200px">First Payment</label>
    <br>
    <input type="radio" id="10%" name="upfront" value="100"><?php echo $tenPer?>
    <label for="10%">10%</label><br>
    <input type="radio" id="15%" name="upfront" value="150"><?php echo $fifteenPer?>
    <label for="15%">15%</label><br>
    <input type="radio" id="20%" name="upfront" value="200"><?php echo $twentyPer?>
    <label for="20%">20%</label>
    <br>
    <input type="submit" value="Submit">
    <br>
</form>

<p><a href="index.php?category_id=5">View Homepage</a></p>

<?php
include('includes/footer.php');
?>