<!DOCTYPE html>
    <?php
        function cargar_clases($clase) {
//            require 'class/' . $clase . '.class.php';
            require $clase . '.class.php';
        }
        spl_autoload_register('cargar_clases');
        session_start();                
        
        if (!isset($_SESSION['usu1'])){
            $_SESSION['usu1']= new Usuario("JGD", "Jesús Gómez", "images/foto2.jpg");
        }        
                        
    ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
   <body>		
        <center>
	<form method="post" action="perfil.php">
            <?php 
            echo "<span style='color:green'>Login: </span>" . $_SESSION['usu1']->__get('login') . "</br>
                  <span style='color:green'>Nombre: </span>" . $_SESSION['usu1']->__get('nombre') . "</br>
                  <span style='color:green'>Foto: </span></br>    
                  <img src='". $_SESSION['usu1']->__get('foto') . "' width=400 height=200 alt='' /></br>";                              
            ?>            
            <input type="submit" name="editar" value="Editar"/></br>           
        </form>
        </center>
   </body>
</html>
