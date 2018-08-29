<?php

class ImageModel{

 
     function transparencia($directorio,$nombreImg,$extension){
	
        $rutaOriginal= $directorio.$nombreImg.'.'.$extension;
        // echo $rutaOriginal;
        // exit;
            //cargo la imagen	
            if($extension == 'jpeg' || $extension == 'JPEG'){
            $imagenPng = imagecreatefromjpeg($rutaOriginal);
            }
            if($extension == 'png' || $extension == 'PNG'){
            $imagenPng= imagecreatefrompng($rutaOriginal);
            
            }
                 
               $archivo = getimagesize($rutaOriginal);
               $ancho = $archivo[0];
			   $alto = $archivo[1];
                // creo el lienzo y genero mi transparencia  
               $lnImage= imagecreatetruecolor($ancho,$alto);	
               imagesavealpha($lnImage,true);
               $alpha = imagecolorallocatealpha($lnImage,0,0,0,127);
               imagefill($lnImage,0,0,$alpha);
               
               //agr
               imagecopy($lnImage,$imagenPng,0,0,0,0,$ancho,$alto);
               
               $nuevaRuta= '../imagenes/Imagen_tranparencia/'.$nombreImg.'.'.$extension;
            //    echo $nuevaRuta;
            //    exit;
               imagepng($lnImage,$nuevaRuta);
               imagedestroy($lnImage);
               
               //devuelve la nueva ruta de la imagen
               //return($renom);
               echo "transparencia exitosa <br>";	;
           }


           function convertir_PNG_JEPG($directorio,$nombreImg,$extension){
	
            $rutaOriginal= $directorio.$nombreImg.'.'.$extension;
           
            $archivo = getimagesize($rutaOriginal);
            $ancho = $archivo[0];
            $alto = $archivo[1];

            //cargo la imagen	
            // if($extension == 'jpeg' || $extension == 'JPEG'){
            //        $imagenjpg = imagecreatefromjpeg($rutaOriginal);
            
            //     // creo el lienzo y genero mi transparencia  
            //    $lnImage= imagecreatetruecolor($ancho,$alto);	
            //    imagesavealpha($lnImage,true);
            //    $alpha = imagecolorallocatealpha($lnImage,0,0,0,127);
            //    imagefill($lnImage,0,0,$alpha);
               
            //    //agr
            //    imagecopy($lnImage,$imagenjpg,0,0,0,0,$ancho,$alto);
               
            //    $nuevaRuta= '../imagenes/Imagen_convertida/'.$renom.'.'.'png';
            //    imagejpeg($lnImage,$nuevaRuta);
            //    imagedestroy($lnImage);
           //}
           if($extension == 'png' || $extension == 'PNG'){
                       $imagenPng= imagecreatefrompng($rutaOriginal);
               
               // creo el lienzo y genero mi transparencia  
               $lnImage= imagecreatetruecolor($ancho,$alto);	
               imagesavealpha($lnImage,true);
               $alpha = imagecolorallocatealpha($lnImage,0,0,0,127);
               imagefill($lnImage,0,0,$alpha);
               
               //agr
               imagecopy($lnImage,$imagenPng,0,0,0,0,$ancho,$alto);
               
               $nuevaRuta= '../imagenes/Imagen_convertida/'.$nombreImg.'.'.'jpg';
            //    echo $nuevaRuta;
            //    exit;
               imagepng($lnImage,$nuevaRuta);
               imagedestroy($lnImage);
               echo "imagen convertida <br>";
           }else{
               echo "no se pudo convertir la imagen";
               }
               
               
               //devuelve la nueva ruta de la imagen
               //return($renom);	
           }
         
            function marcaDeAgua($directorio,$nombreImg,$extension,$RutamarcaAgua){
             $Rutaimagen = $directorio.$nombreImg.'.'.$extension;
             Echo $Rutaimagen;
             // cargando imagen 	
             $img = imagecreatefrompng($Rutaimagen);		
        
             //cargando marca de agua
             $marca= imagecreatefrompng($RutamarcaAgua);	
             //obteniendo el alto y ancho de la imagen
             $AltImg= imagesx($img);
             $AnchImg= imagesy($img);
        
             //obteniendo el alto y ancho de la marca de Agua
             $AltMar= imagesx($marca);
             $anchMarc= imagesy($marca);
            
             //margen de la marca de agua 
             $margen= 10;
        
             //calculando coordenadas		
             $x = $AltImg - $AltMar - $margen;
             $y = $AnchImg - $anchMarc - $margen;
        
             //Colocamos la marca de agua en el centro
             imagecopy($img,$marca,0,0,0,0,$AltImg,$AnchImg);
        
             //Guardamos y liberamos el objeto
             $NuevaRutaImagen='../imagenes/Imagen_con_marca/'.$nombreImg.'.'.$extension;
             imagejpeg($img,$NuevaRutaImagen,100);
             imagedestroy($img);
             echo "marca de agua agregada <br>";
     }

}

?>