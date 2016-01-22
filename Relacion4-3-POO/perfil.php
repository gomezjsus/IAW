<!DOCTYPE html>
    <?php
        //Obligatorio cargar las clases. Y el session_start va despues de cargar las clases.    
        function cargar_clases($clase) {
//            require 'class/' . $clase . '.class.php';
            require $clase . '.class.php';
        }
        spl_autoload_register('cargar_clases');
        session_start();
                       
        if (!isset($_SESSION['usu1'])){
            header('Location: index.php');
        }
        
        if (isset($_POST['guardar'])){
//            foreach ($_POST as $clave=>$valor)
//                $_SESSION['usu1']->__set($clave,$valor);
            $_SESSION['usu1']->__set('login',$_POST['login']);
            $_SESSION['usu1']->__set('nombre',$_POST['nombre']);
                        
            //TRATO LA IMAGEN                
                if (isset($_FILES['foto']))
                    $newimagen=$_FILES['foto'];
                if (is_uploaded_file($newimagen['tmp_name'])){
                    if ( ($newimagen['type'] == "image/jpeg") || ($newimagen['type'] == "image/jpg") ){
                        if ( is_file("images/".$newimagen['name']) )
                            $errimg="La imagen ya existe.";
                        else{
                            move_uploaded_file($newimagen['tmp_name'], "images/".$newimagen['name']);
                            $_SESSION['usu1']->__set('foto',"images/".$newimagen['name']);
                            crear_mini("images/".$newimagen['name'], "images/mini/", 100);
                        }
                    } 
                    else
                        $errimg="Solo se aceptan imagenes jpeg o jpg.";
                }
                else
                    $errimg="Error al subir la foto.";                            
            }
            
            //Redirección al index
            header('Location: index.php');
        
        
        if (isset($_POST['cancelar'])){            
            header('Location: index.php');
        }
                                
    ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
   <body>		
        <center>
	<form method="post" action=""  enctype="multipart/form-data">
            Login:<input type="text" name="login" value="<?=isset($_SESSION['usu1']) ? $_SESSION['usu1']->login : '' ?>" /><br>
            Nombre:<input type="text" name="nombre" value="<?=isset($_SESSION['usu1']) ? $_SESSION['usu1']->nombre : '' ?>" /><br>
            Fotos:
            <?php
                
            ?>
            Nueva foto:<input type="file" name="newimagen" value="" /><?=isset($errimg) ? $errimg : "" ?><br>                                   
            <input type="submit" name="guardar" value="Guardar"/>
            <input type="submit" name="cancelar" value="Cancelar"/></br>
        </form>
        </center>
   </body>
</html>