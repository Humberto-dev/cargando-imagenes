<!--<?php session_start();
	$kdt = $_SESSION['alu_id'];
 
?>-->
<?php
 
if(isset($_POST['submit'])){ // comprobamos que se ha enviado el formulario
 
    // comprobar que han seleccionado una foto
    if($_FILES['foto']['name'] != ""){ // El campo foto contiene una imagen...
 
        // Primero, hay que validar que se trata de un JPG/GIF/PNG
        $allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "GIF", "PNG");
        $extension = end(explode(".", $_FILES["foto"]["name"]));
        if ((($_FILES["foto"]["type"] == "image/gif")
                || ($_FILES["foto"]["type"] == "image/jpeg")
                || ($_FILES["foto"]["type"] == "image/png")
                || ($_FILES["foto"]["type"] == "image/pjpeg"))
                && in_array($extension, $allowedExts)) {
            // el archivo es un JPG/GIF/PNG, entonces...
 
            $extension = end(explode('.', $_FILES['foto']['name']));
            $foto = $kdt.".".jpg;
            $directorio ='/imagenes_guardadas'; // directorio de tu elección
 
            // almacenar imagen en el servidor
            move_uploaded_file($_FILES['foto']['tmp_name'], $directorio.'/'.$foto);
  			$minFoto = $kdt.$foto;
            $resFoto = $kdt.$foto;
            resizeImagen($directorio.'/', $foto, 65, 65,$minFoto,$extension);
            resizeImagen($directorio.'/', $foto, 500, 500,$resFoto,$extension);
            unlink($directorio.'/'.$foto);
 
 
        } else { // El archivo no es JPG/GIF/PNG
            $malformato = $_FILES["foto"]["type"];
            header("Location: FrmAlumno.php?error=noFormato&formato=$malformato");
 
          }
 
    } else { // El campo foto NO contiene una imagen
        header("Location: FrmAlumno.php?error=noImagen");
 
    }
       //echo $foto; 
 
} // fin del submit
 
function resizeImagen($ruta, $nombre, $alto, $ancho,$nombreN,$extension){
    $rutaImagenOriginal = $ruta.$nombre;
    if($extension == 'GIF' || $extension == 'gif'){
    $img_original = imagecreatefromgif($rutaImagenOriginal);
    }
    if($extension == 'jpg' || $extension == 'JPG'){
    $img_original = imagecreatefromjpeg($rutaImagenOriginal);
    }
    if($extension == 'png' || $extension == 'PNG'){
    $img_original = imagecreatefrompng($rutaImagenOriginal);
    }
    $max_ancho = $ancho;
    $max_alto = $alto;
    list($ancho,$alto)=getimagesize($rutaImagenOriginal);
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
    $tmp=imagecreatetruecolor($ancho_final,$alto_final);
    imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
    imagedestroy($img_original);
    $calidad=70;
    imagejpeg($tmp,$ruta.$nombreN,$calidad);
 
}
 
 if(isset($_POST['submit'])) { ?>
            <div>El archivo ha sido cargado satisfactoriamente.</div>
            <?php }
  ?>

  <body>
    <form id="formulario1"   method="POST" enctype="multipart/form-data">
        <div class='row-fluid'>
            <div class='span2' align='left'>
                    <b>ingrese su fotografia:</b>
                <div><input type="file" name="foto" /></div>
                <div style="margin-top: 10px;"><input type="submit" name="submit"></div>
                    <!--<?php echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=http:ver.php\">"; ?>   -->
            </div>
        </div>
    </form>
 
 
</body>