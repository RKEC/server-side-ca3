<footer>
<h4><a href="add_phone_form.php"><img src="./image_uploads/add.png" width="25px" height="25px">Add Phone</a></h4>
<h4><a href="os_list.php"><img src="./image_uploads/edit.png" width="25px" height="25px">Manage Operating Systems</a></h4>

<h4 id="contact"><a href="contact.php"><img src="./image_uploads/contact.png" width="25px" height="25px">Contact Me</a></h4>
<p>&copy; <?php echo date("Y"); ?> Phone Shop, Richard Collins</p>
</footer>
</div><!-- close div container -->
<script language="JavaScript">
var frmvalidator  = new Validator("contactform");
frmvalidator.addValidation("name","req","Please provide your name"); 
frmvalidator.addValidation("email","req","Please provide your email"); 
frmvalidator.addValidation("email","email","Please enter a valid email address"); 
</script>
</body>
</html>