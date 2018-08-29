<?php
/**
* Simple php script to generate watermak images with php
* 
* @author Pedro Ventura
* @link http://www.pedroventura.com/php/crear-marcas-de-agua-con-php/
* @version 1.0
* 
* Feel free to improve this code or add some notes.
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="robots" content="noindex,follow"/>
	<title>Example images with watermark</title>
</head>
<body>
	<h1>Example images with watermark</h1>
	<p>Without</p>
	<img src="assets/products-example/starcraft-2-wings-of-liberty-pc.png" />

	<p>With</p>
	<img src="watermark.php?i=starcraft-2-wings-of-liberty-pc.png" />
	<pre>
		the SRC of image is: watermark.php?i=starcraft-2-wings-of-liberty-pc.png
	</pre>
</body>
</html>