<?php
$file = "imagenes/imagew3bguru.png";
$imagen = getimagesize($file);
$ancho = $imagen[0];
$alto = $imagen[1];

echo "Ancho: $ancho<br>";
echo "Alto: $alto";


$img1 = imagecreatefrompng('imagenes/imagew3bguru.png');

$lnImage= imagecreatetruecolor($ancho,$alto);	
		imagesavealpha($lnImage,true);
		$alpha = imagecolorallocatealpha($lnImage,0,0,0,127);
        imagefill($lnImage,0,0,$alpha);
        
        imagecopy($lnImage,$img1,0,0,0,0,$ancho,$alto);
		
		//$nuevaRuta= $directorio.$renom;
		imagepng($lnImage,'imagenes/imagew3bguru2.png');
		imagedestroy($lnImage);

?>