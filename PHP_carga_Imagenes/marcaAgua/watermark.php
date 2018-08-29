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

// project root. You must change this
define('BASE_DIR','YOUR/PROJECT/ROOT/PATH');

// define your custom watermak image
define ('WATERMARK_IMAGE', BASE_DIR . 'assets/watermark-images/agotado_trans.png');
// define the path where all images will be stored
define ('IMAGES_PATH', BASE_DIR . 'assets/products-example/');

// the image you want to add the watermark. This will be passed on url via GET
$newImage = $_GET['i'];

$imagePath = IMAGES_PATH . "/" . $newImage;

$im = imagecreatefrompng(WATERMARK_IMAGE);

$ext = substr($imagePath, -3);

if (strtolower($ext) == "gif") {
	if (!$im2 = imagecreatefromgif($imagePath)) {
		echo "Error opening $imagePath!"; exit;
	}
} else if(strtolower($ext) == "jpg") {
	if (!$im2 = imagecreatefromjpeg($imagePath)) {
		echo "Error opening $imagePath!"; exit;
	}
} else if(strtolower($ext) == "png") {
	if (!$im2 = imagecreatefrompng($imagePath)) {
		echo "Error opening $imagePath!"; exit;
	}
} else {
	die;
}

imagecopy($im2, $im, (imagesx($im2)/2)-(imagesx($im)/2), (imagesy($im2)/2)-(imagesy($im)/2), 0, 0, imagesx($im), imagesy($im));
$last_modified = gmdate('D, d M Y H:i:s T', filemtime ($imagePath));

// asign header and print image
header("Last-Modified: $last_modified");
header("Content-Type: image/jpeg");
imagejpeg($im2,NULL,95);
imagedestroy($im);
imagedestroy($im2);