<?php  
		if($_POST){ 
		// Creamos la cadena aletoria 
			$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
			$cad = ""; 
				for($i=0;$i<12;$i++) { 
					$cad .= substr($str,rand(0,62),1); 
			} 
			
			// Fin de la creacion de la cadena aletoria 
				$tamano = $_FILES [ 'file' ][ 'size' ]; // Leemos el tamaño del fichero 
				$tamaño_max="5000000"; // Tamaño maximo permitido 
				
					if( $tamano < $tamaño_max){ // Comprovamos el tamaño  
						$destino = 'imagen_descargada' ; // Carpeta donde se guardata 

						$sep=explode('image/',$_FILES["file"]["type"]); // Separamos image/ 

							$tipo=$sep[1]; // Optenemos el tipo de imagen que es 

								if( $tipo == "png" || $tipo == "jpeg" ){ // Si el tipo de imagen a subir es el mismo de los permitidos, segimos. Puedes agregar mas tipos de imagen 
//debo trabajar mi imagen generando transparencia 
									move_uploaded_file ( $_FILES [ 'file' ][ 'tmp_name' ], $destino . '/' .$cad.'.'.$tipo);  // Subimos el archivo
 								//cargo la ruta de la imagen 
						$imagen =  $destino."/" .$cad. "." . $tipo  ;							
 
						$archivo = getimagesize($imagen);
						 $ancho = $archivo[0] ;
						 $alto = $archivo[1];
						 
						//creo una variable para renombrar la imagen
						$trans = 'transparencia_'.$cad;
						
						/*$NuevoTamanio= Tamanio($destino.'/',$cad,$ancho,$alto,$trans,$tipo);
						echo "este es el tamaño de imagen convertida <br>";
						echo $ancho2= $NuevoTamanio[0]. "<br>";
						 echo $altura2= $NuevoTamanio[1];
						  //exit;*/
				

						//llamo a la funcion transparencia 
						 transparencia($destino.'/',$cad,$ancho,$altura,$trans,$tipo);//llamado de la funsion
					include('post.html'); // Incluimos la plantilla 
					
} 
else echo "el tipo de archivo no es de los permitidos";// Si no es el tipo permitido lo desimos 
} 
else echo "El archivo supera el peso permitido.";// Si supera el tamaño de permitido lo desimos 
} 


function Tamanio($directorio,$nombreImg,$ancho,$alto,$renom,$extension){
	
	$rutaOriginal= $directorio.$nombreImg.'.'.$extension;
	
	 $max_ancho = $ancho;
    $max_alto = $alto;
	
    list($ancho,$alto)=getimagesize($rutaOriginal);
    $x_ratio = $max_ancho / $ancho;
    $y_ratio = $max_alto / $alto;
    if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
  	$ancho_final = $ancho;
		$alto_final = $alto;
	} elseif (($x_ratio * $alto) < $max_alto){
		$alto_final = ceil($x_ratio * $alto);
		$ancho_final = $max_ancho;
	} else{
		$ancho_final = ceil($y_ratio * $ancho);
		$alto_final = $max_alto;
	}
	$arreglo[0]=$ancho_final;
	$arreglo[1]=$alto_final;
	
	return($arreglo);
    /*$tmp=imagecreatetruecolor($ancho_final,$alto_final);
    imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
    imagedestroy($img_original);
    $calidad=70;
    imagejpeg($tmp,$ruta.$nombreN,$calidad);*/
	}


function transparencia($directorio,$nombreImg,$ancho,$alto,$renom,$extension){
	
	 $rutaOriginal= $directorio.$nombreImg.'.'.$extension;
	 //cargo la imagen	
 	if($extension == 'jpeg' || $extension == 'JPEG'){
     $imagenPng = imagecreatefromjpeg($rutaOriginal);
    }
    if($extension == 'png' || $extension == 'PNG'){
    $imagenPng= imagecreatefrompng($rutaOriginal);
    }
			// creo el lienzo y genero mi transparencia  
		$lnImage= imagecreatetruecolor($ancho,$alto);	
		imagesavealpha($lnImage,true);
		$alpha = imagecolorallocatealpha($lnImage,0,0,0,127);
		imagefill($lnImage,0,0,$alpha);
		
		//agr
		imagecopy($lnImage,$imagenPng,0,0,0,0,$ancho,$alto);
		
		$nuevaRuta= $directorio.$renom.'.'.$extension;
		imagepng($lnImage,$nuevaRuta);
		imagedestroy($lnImage);
		
		//devuelve la nueva ruta de la imagen
		//return($renom);	
	}
	
	function convertir_PNG_JEPG($directorio,$nombreImg,$ancho,$alto,$renom,$extension){
	
	 $rutaOriginal= $directorio.$nombreImg.'.'.$extension;
	 //cargo la imagen	
 	if($extension == 'jpeg' || $extension == 'JPEG'){
    	    $imagenjpg = imagecreatefromjpeg($rutaOriginal);
	 
	 	// creo el lienzo y genero mi transparencia  
		$lnImage= imagecreatetruecolor($ancho,$alto);	
		imagesavealpha($lnImage,true);
		$alpha = imagecolorallocatealpha($lnImage,0,0,0,127);
		imagefill($lnImage,0,0,$alpha);
		
		//agr
		imagecopy($lnImage,$imagenjpg,0,0,0,0,$ancho,$alto);
		
		$nuevaRuta= $directorio.$renom.'.'.'png';
		imagejpeg($lnImage,$nuevaRuta);
		imagedestroy($lnImage);
    }
    elseif($extension == 'png' || $extension == 'PNG'){
   		 	$imagenPng= imagecreatefrompng($rutaOriginal);
		
		// creo el lienzo y genero mi transparencia  
		$lnImage= imagecreatetruecolor($ancho,$alto);	
		imagesavealpha($lnImage,true);
		$alpha = imagecolorallocatealpha($lnImage,0,0,0,127);
		imagefill($lnImage,0,0,$alpha);
		
		//agr
		imagecopy($lnImage,$imagenPng,0,0,0,0,$ancho,$alto);
		
		$nuevaRuta= $directorio.$renom.'.'.'jpeg';
		imagepng($lnImage,$nuevaRuta);
		imagedestroy($lnImage);
    }else{
		echo "no se pudo convertir la imagen";
		}
		
		
		//devuelve la nueva ruta de la imagen
		//return($renom);	
	}
	
	
	
	function marcaDeAgua($Rutaimagen,$RutamarcaAgua){
				// cargando imagen 	
			$img = imagecreatefromjpeg($Rutaimagen);		
			
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
				
				imagejpeg($img,$NuevaRutaImagen,100);
				imagedestroy($img);
		}
		
		function marcaAguaTexto($RutaImagen,$texto){
				//Cargamos la imagen
			$imagen = imagecreatefromjpeg($RutaImagen);

			$color = imagecolorallocate($imagen,131,131,131);
    		
				//escribo una cadena de texto o paso ua variable que contenga el texto
			imagestring($imagen,50,50,100,$texto,$color);

    			//Guardo la imagen y especifico la ruta	
    		imagejpeg($imagen,$NuevaImagenRuta);
    
    			//libero memoria
			imagedestroy($imagen);
			
			}
			
			function convierteFormato(){
				
				}
?>