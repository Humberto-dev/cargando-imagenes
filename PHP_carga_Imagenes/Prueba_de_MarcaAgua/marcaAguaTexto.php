<?php
	//Cargo la imagen
    $img = imagecreatefromjpeg("ImagenCargada/tux.jpg");
    //Creo un lienzo
$lienzo= imagecreatetruecolor(300,300);

    //indicamos que el lienzo tiene el canal alfa activo
imagesavealpha($lienzo,true);

    //generamos un color 100% transparente
    // el 127 indica el valor minimmo de opacidad 0 100% de tranparencia 
$alpha = imagecolorallocatealpha($lienzo,0,0,0,127);	

    //Rellenamos el lienzo  con el color alpha
imagefill($lienzo,0,0,$alpha);

    //definimos el color negro
$color = imagecolorallocate($lienzo,0,0,0);

    //escribo una cadena de texto o paso ua variable que contenga el texto
    //guardo en una variable el lienzo con el texto añadido
$marca= imagestring($lienzo,100,0,0,"esto es una PRUEBA",$color);
    
    //colocamos la marca de agua en la imagen
imagecopy($img,$marca,60,40,0,0,50,50);
    
    //Guardo la imagen y especifico la ruta	
    imagejpeg($img,"ImagenConMarca/NuevaMarca.jpg");
    
    //libero memoria
imagedestroy($img);
?>