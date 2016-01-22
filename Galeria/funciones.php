<?php
    include 'variables.php';
    function subir_foto($foto){
        if (is_uploaded_file($foto['tmp_name'])){
            if ( ($foto['type'] == "image/gif") || ($foto['type'] == "image/jpeg") || ($foto['type'] == "image/jpg") || ($foto['type'] == "image/png") || ($foto['type'] == "image/bmp") ){
                move_uploaded_file($foto['tmp_name'], $dir.$foto['name']);
            }else
                $errimg="Solo se aceptan imagenes.";
        }
        else
           $errimg="Error al subir la imagen.";
    }
    function crear_mini($rutafoto, $rutamini, $miniancho){        
        $info = pathinfo($rutafoto);             
        if ( (strtolower($info['extension']) == 'jpg') || (strtolower($info['extension']) == 'jpeg') ) 
            {
            $img = imagecreatefromjpeg( $rutafoto );
            $width = imagesx( $img );
            $height = imagesy( $img );
            // calcula el tamaño
            $new_width = $miniancho;
            $new_height = floor( $height * ( $miniancho / $width ) );
            // crea una nueva imagen de manera temporal
            $tmp_img = imagecreatetruecolor( $new_width, $new_height );
            // copia y dedimensiona la nueva imagen en la temporal que hemos creado
            imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
            // guarda el thumbnail en un archivo
            imagejpeg( $tmp_img, $rutamini.$info['basename'] );
            }        
    }    
?>

