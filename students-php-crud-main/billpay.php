
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

include('includes/header.php');


$total = filter_input(INPUT_POST, 'totalBefore');
$time = filter_input(INPUT_POST, 'time');
$upfront = filter_input(INPUT_POST, 'upfront', FILTER_VALIDATE_FLOAT);
$monthlyPay = ($total - $upfront) / $time;

?>

<h1>Bill Pay Calculator</h1>
<?php echo "€" , number_format($monthlyPay, 2) , " a month for " , $time , " months"; ?>
<p><a href="index.php?category_id=5">View Homepage</a></p>
<?php include('includes/footer.php'); ?>
