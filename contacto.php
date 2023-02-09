<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RADIO CLASH - Contacto</title>
    <!-- Bootstrap -->

  <link href="css/stylesInner.css" rel="stylesheet" type="text/css">
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