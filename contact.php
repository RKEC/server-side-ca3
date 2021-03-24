<head>
    <link rel="icon" href="image_uploads/favicon.png" type="png" sizes="16x16">
    <script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>
</head>



<div class="container">
    <?php
    include('includes/header.php');
    ?>


<h1>Contact us</h1>
<form method="POST" name="contactform" action="contact-form-handler.php"> 
<p>
<label for='name'>Your Name:</label> <br>
<input type="text" name="name" required>
</p>
<p>
<label for='email'>Email Address:</label> <br>
<input type="text" name="email" required> <br>
</p>
<p>
<label for='message'>Message:</label> <br>
<textarea name="message" required></textarea>
</p>
<input type="submit" value="Submit"><br>
</form>


    <?php
    include('includes/footer.php');
    ?>