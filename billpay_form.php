 
<?php
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

$tenPer = "€" . number_format(($phones['price']*.10), 2);
$fifteenPer = "€" . number_format(($phones['price']*.15), 2);
$twentyPer = "€" . number_format(($phones['price']*.20), 2);

include('includes/header.php');
?>

<h1>Bill Pay Calculator</h1>

<form action="billpay.php" method="post" enctype="multipart/form-data" id="add_phone_form">

    <label>Total Price</label>
    <br>
    <input type="hidden" name="totalBefore" value="<?php echo $phones['price']; ?>"><?php echo "€", $phones['price']; ?></input>
    <br>
    <br>
    <label>Time Plan</label><br>
    <input type="radio" id="1 year" name="time" value="12" required>
    <label for="1 year">1 year</label><br>
    <input type="radio" id="2 year" name="time" value="24">
    <label for="2 year">2 year</label><br>
    <input type="radio" id="3 year" name="time" value="36">
    <label for="3 year">3 year</label>
    <br>
    <br>
    <label width="200px">First Payment</label>
    <br>
    <input type="radio" id="10%" name="upfront" value="100" required><?php echo $tenPer?>
    <label for="10%">10%</label><br>
    <input type="radio" id="15%" name="upfront" value="150"><?php echo $fifteenPer?>
    <label for="15%">15%</label><br>
    <input type="radio" id="20%" name="upfront" value="200"><?php echo $twentyPer?>
    <label for="20%">20%</label>
    <br>
    <input id="buy_button" type="submit" value="Submit">
    <br>
</form>

<p><a href="index.php?">View Homepage</a></p>

<?php
include('includes/footer.php');
?>
