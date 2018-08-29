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
				$tamaño_max="50000000000"; // Tamaño maximo permitido 
					if( $tamano < $tamaño_max){ // Comprovamos el tamaño  
						$destino = 'imagen_descargada' ; // Carpeta donde se guardata 

						$sep=explode('image/',$_FILES["file"]["type"]); // Separamos image/ 

							$tipo=$sep[1]; // Optenemos el tipo de imagen que es 

								if( $tipo == "png" ){ // Si el tipo de imagen a subir es el mismo de los permitidos, segimos. Puedes agregar mas tipos de imagen 
//debo trabajar mi imagen generando transparencia 
									move_uploaded_file ( $_FILES [ 'file' ][ 'tmp_name' ], $destino . '/' .$cad.'.'.$tipo);  // Subimos el archivo
 								//cargo la ruta de la imagen 
						$imagen =  $destino."/" .$cad. "." . $tipo  ;
 
						$archivo = getimagesize($imagen);
						$ancho = $archivo[0];
						$alto = $archivo[1];
						//creo una variable para renombrar la imagen
						$trans = 'transparencia_'.$cad;

						//llamo a la funcion transparencia 
				 transparencia($destino.'/',$cad,$ancho,$alto,$trans,$tipo);//llamado de la funsion
					include('post.html'); // Incluimos la plantilla 
					
}else if( $tipo == "jpeg"){
	} 
else echo "el tipo de archivo no es de los permitidos";// Si no es el tipo permitido lo desimos 
} 
else echo "El archivo supera el peso permitido.";// Si supera el tamaño de permitido lo desimos 
} 


function transparencia($directorio,$nombreImg,$ancho,$alto,$renom,$extension){
	
	echo $rutaOriginal= $directorio.$nombreImg.'.'.$extension;
	

	
			//cargo la imagen	
		//$imagenPng= imagecreatefrompng($rutaOriginal);
		$imagenPng= imagecreatefrompng($rutaOriginal);
	
		
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
?>