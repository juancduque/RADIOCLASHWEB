
<?php

// Set email variables
$email_to = 'radioclashbanda@gmail.com';
$email_subject = 'Form submission';

// Set required fields
$required_fields = array('fullname','email','comment');

// set error messages
$error_messages = array(
	'fullname' => 'Please enter a Name to proceed.',
	'email' => 'Please enter a valid Email Address to continue.',
	'comment' => 'Please enter your Message to continue.'
);

// Set form status
$form_complete = FALSE;

// configure validation array
$validation = array();

// check form submittal
if(!empty($_POST)) {
	// Sanitise POST array
	foreach($_POST as $key => $value) $_POST[$key] = remove_email_injection(trim($value));
	
	// Loop into required fields and make sure they match our needs
	foreach($required_fields as $field) {		
		// the field has been submitted?
		if(!array_key_exists($field, $_POST)) array_push($validation, $field);
		
		// check there is information in the field?
		if($_POST[$field] == '') array_push($validation, $field);
		
		// validate the email address supplied
		if($field == 'email') if(!validate_email_address($_POST[$field])) array_push($validation, $field);
	}
	
	// basic validation result
	if(count($validation) == 0) {
		// Prepare our content string
		$email_content = 'New Website Comment: ' . "\n\n";
		
		// simple email content
		foreach($_POST as $key => $value) {
			if($key != 'submit') $email_content .= $key . ': ' . $value . "\n";
		}
		
		// if validation passed ok then send the email
		mail($email_to, $email_subject, $email_content);
		
		// Update form switch
		$form_complete = TRUE;
	}
}

function validate_email_address($email = FALSE) {
	return (preg_match('/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i', $email))? TRUE : FALSE;
}

function remove_email_injection($field = FALSE) {
   return (str_ireplace(array("\r", "\n", "%0a", "%0d", "Content-Type:", "bcc:","to:","cc:"), '', $field));
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<!-- Contact Form Designed by James Brand @ dreamweavertutorial.co.uk -->
<!-- Covered under creative commons license - http://dreamweavertutorial.co.uk/permissions/contact-form-permissions.htm -->

	<title>Contact Form</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<link href="contact/css/contactform.css" rel="stylesheet" type="text/css" />
	
	<script type="text/javascript">
		var nameError = '<?php echo $error_messages['fullname']; ?>';
		var emailError = '<?php echo $error_messages['email']; ?>';
		var commentError = '<?php echo $error_messages['comment']; ?>';
	</script>

</head>
<body>
<div class="container-fluid">
  
  
  <nav align="center">	
<a href="biografia.html"><img src="images/bio.png" width="71" height="41" class="menuBut-" alt="biografia"/></a>
<a href="integrantes.html"><img src="images/integrantes.png" width="189" height="44" class="menuBut-" alt="integrantes"/></a>
<a href="repertorio.html"><img src="images/repertorio.png" width="165" height="44" class="menuBut-" alt="repertorio"/></a>
<a href="envivo.html"><img src="images/envivo.png" width="120" height="44" class="menuBut-" alt="en vivo"/></a>
<a href="contacto.html"><img src="images/contacto.png" width="142" height="44" class="menuButOff" alt="contacto"/></a>
  </nav>
    <header align="center"><img class="logo" src="images/RClogo.png" alt="Radio Clash logo"/></a>
    </header>
</div>
	<!-- 
  Replace form-handler.php with URL where to send the form-data when the form is submitted
  Goto http://w3c.github.io/html-reference/input.text.html#input.text for more information on all attributes that can be used with text input field
-->
<form method="post" action="form-handler.php">
  <div>

    <label for="name">Nombre: <span class="required">*</span> </label>
    <input type="text" id="name" name="name" value="" placeholder="Escriba su nombre" required="required" autofocus />
  </div>
  
  <div>

    <label for="email">Correo Electrónico: <span class="required">*</span> </label>
    <input type="email" id="email" name="email" value="" placeholder="su@correo.com" required="required" />
  </div>

  
  <div>

    <label for="message">Mensaje: <span class="required">*</span> </label>
    <textarea id="message" name="message" placeholder="Escriba su mensaje acá" required ></textarea>
  </div>
  

  
  <div>
    <input type="submit" value="Submit" id="submit" />
  </div>
</form>
</body>
</html>