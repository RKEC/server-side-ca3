<?php
include('includes/header.php');
?>

<h1>Bill Pay Calculator</h1>

<form action="billpay.php" method="post" enctype="multipart/form-data" id="add_record_form">

    <label>Total Price</label>
    <br>
    <input type="input" name="totalBefore"></input>
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
    <label>Upfront Cost</label>
    <br>
    <input type="radio" id="10%" name="upfront" value="100">
    <label for="10%">10%</label><br>
    <input type="radio" id="15%" name="upfront" value="150">
    <label for="15%">15%</label><br>
    <input type="radio" id="20%" name="upfront" value="200">
    <label for="20%">20%</label>
    <br>
    <input type="submit" value="Submit">
    <br>
</form>

<p><a href="index.php?category_id=5">View Homepage</a></p>

<?php
include('includes/footer.php');
?>