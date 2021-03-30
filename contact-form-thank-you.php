<div class="container">
    <?php
    include('includes/header.php');
    ?>


<body>
<h1>Thank you!</h1>
I will contact you soon!

<p>Web page redirects after 5 seconds</p>

<script>    
 setTimeout(function(){
            window.location.href = 'index.php';
         }, 5000);</script>
<?php
    include('includes/footer.php');
    ?>