<?php



// class ImageController{

    // public function plantilla(){
    //     require_once("view/subirImagen.php");
    //     include "view/subirImagen.php";
    // }


    // public function GetValues(){
     // Creamos la cadena aletoria 
    	$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
		$cad = ""; 
        
        for($i=0;$i<12;$i++) { 
			$cad .= substr($str,rand(0,62),1); 
		} 
         

       $F_name = $_FILES ['file']['name'] ;
       $f_type = $_FILES ['file']['type'];
       $f_tempName = $_FILES ['file']['tmp_name'];
       $f_error = $_FILES ['file']['error'];
       $f_size = $_FILES ['file']['size'];

       $sep=explode('image/',$_FILES["file"]["type"]);
       $tipo = $sep[1];
       
       $destino='../imagenes/Imagen_normal';

       $tamanio_max="200000";

       if($f_size<$tamanio_max){

            if($tipo=="png"||$tipo=="jpeg"){
                // echo $destino;
                // exit;
                move_uploaded_file ( $_FILES [ 'file' ][ 'tmp_name' ], $destino . '/' .$cad.'.'.$tipo); 
                  
                    if ($_POST['transpa'] !=false ){
                        require_once("../models/model.php");
                        $consulta = new ImageModel();
                        $consulta = $consulta->transparencia($destino.'/',$cad,$tipo);
                        //echo $cad;
        
         
                    }if($_POST['conver'] !=false ){
                        require_once("../models/model.php");
                        $destino2='../imagenes/Imagen_tranparencia';
                        $consulta = new ImageModel();
                        $consulta = $consulta->convertir_PNG_JEPG($destino.'/',$cad,$tipo);
                        //echo $cad;
        
                    }if ($_POST['marag'] !=false ){
                         require_once("../models/model.php");
                         $destino3='../imagenes/Imagen_convertida';
                         $dirMarca='../imagenes/Imagen_marca_agua/j8WmoxBjCBw9.jpg';
                         $consulta = new ImageModel();
                         $consulta = $consulta->marcaDeAgua($destino3.'/',$cad,'jpg',$dirMarca);
                      
     
                    }if($_POST['textma'] !=false ){
        
        
                    }else{
                        echo "fallo la conversion";
                    }
                }else echo "el formato no es compatible";        

         }else echo "la imagen exede el tamaño requerido" ;        

         
      
    //    echo "<pre>";
    //   print_r($_POST);
    //   echo "</pre>";
        exit;



        


        // require_once("../models/model.php");
        // $consulta = new ImageModel();
        // $consulta = $consulta->transparencia($);
    // }

// }

?>