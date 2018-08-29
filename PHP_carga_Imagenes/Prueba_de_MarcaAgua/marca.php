<?php

	// cargando imagen 	
 $img = imagecreatefromjpeg("ImagenCargada/tux.jpg");		
			
    //cargando marca de agua
$marca= imagecreatefrompng("ImagenMarca/agotado_trans.png");	
    //obteniendo el alto y ancho de la imagen
$AltImg= imagesx($img);
$AnchImg= imagesy($img);

    //obteniendo el alto y ancho de la marca de Agua
$AltMar= imagesx($marca);
$anchMarc= imagesy($marca);
    
    //margen de la marca de agua 
$margen= 70;

    //calculando coordenadas		
$x =  $AltImg - $AltMar ;
$y =  $AnchImg - $anchMarc ;

    //Colocamos la marca de agua en el centro
imagecopy($img,$marca,$margen,$margen,0,0,$AltMar,$anchMarc);

    //Guardamos y liberamos el objeto
    
    imagejpeg($img,"ImagenConMarca/ProductoAgotado8.png",100);
    imagedestroy($img);
?>