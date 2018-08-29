<?php

	//Creo un lienzo
   /* $imagen= imagecreatetruecolor(300,300);
			
    //indocamos que el lienzo tiene el canal alfa activo
imagesavealpha($imagen,true);

    //generamos un color 100% transparente
    // el 127 indica el valor minimmo de opacidad 0 100% de tranparencia 
$alpha = imagecolorallocatealpha($imagen,0,0,0,127);	

    //Rellenamos el lienzo  con el color alpha
imagefill($imagen,0,0,$alpha);*/

    //definimos el color negro

$imagen = imagecreatefromjpeg("ImagenCargada/tux.jpg");

$color = imagecolorallocate($imagen,131,131,131);
    //escribo una cadena de texto o paso ua variable que contenga el texto
imagestring($imagen,50,50,100,"esta es una PRUEBA",$color);

    //Guardo la imagen y especifico la ruta	
    imagejpeg($imagen,"ImagenConMarca/Marcatexto_tux.jpg");
    
    //libero memoria
imagedestroy($imagen);

echo 'marca de texto exitoso';
?>