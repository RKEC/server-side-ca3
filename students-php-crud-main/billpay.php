<?php
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
