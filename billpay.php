
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

include('includes/header.php');


$total = filter_input(INPUT_POST, 'totalBefore');
$time = filter_input(INPUT_POST, 'time');
$upfront = filter_input(INPUT_POST, 'upfront', FILTER_VALIDATE_FLOAT);
$monthlyPay = ($total - $upfront) / $time;

?>

<h1>Bill Pay Calculator</h1>
<?php echo "€" , number_format($monthlyPay, 2) , " a month for " , $time , " months"; ?>
<p><a href="index.php?">View Homepage</a></p>
<?php include('includes/footer.php'); ?>
