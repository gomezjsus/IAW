<!DOCTYPE html>
    <?php
        function cargar_clases($clase) {
            require 'class/' . $clase . '.class.php';
        }
        spl_autoload_register('cargar_clases');
        session_start();  
        
      
        
        if (!isset($_SESSION['coche1'])){
            $_SESSION['coche1']= new Coche(21895, "Mercedes", "blanco", 5, 3);
        }
        
        if (isset($_POST['subir'])){
            if ($_SESSION['coche1']->subirMarcha()==false)
                echo "<span style='red'>Has llegado al número máximo de marchas permitido</span>";
        }
        
        if (isset($_POST['bajar'])){
            $_SESSION['coche1']->bajarMarcha();
        }
        
        if (isset($_POST['arrancar'])){
            if ($_SESSION['coche1']->getEstado()==0)
                $_SESSION['coche1']->arrancarEstado();
            else
                echo "Coche ya arrancado";
        }
        
        if (isset($_POST['parar'])){
            if ($_SESSION['coche1']->getEstado()==1)
                $_SESSION['coche1']->pararEstado();
            else
                echo "Coche ya parado";
        }
                        
    ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
   <body>		
        <center>
	<form method="post" action="">
            <?php 
            echo "<span style='color:green'>Color: </span>" . $_SESSION['coche1']->getColor() . "</br>
                  <span style='color:green'>Marca: </span>" . $_SESSION['coche1']->getMarca() . "</br>
                  <span style='color:green'>Número de bastidor: </span>" . $_SESSION['coche1']->getNbastidor() . "</br>
                  <span style='color:red'>Numero de Marchas: </span>" . $_SESSION['coche1']->getNmarchas() . "</br></br>
                  <b>Marcha actual:</b> " . $_SESSION['coche1']->getMarcha_actual() . "<br></br>";
            echo "<b>Estado actual:</b> " 
            ?>
            <?=($_SESSION['coche1']->getEstado()==0) ? 'Parado' : 'Arrancado' ?><br></br>                    
            <input type="submit" name="arrancar" value="Arrancar coche"/>&nbsp;
            <input type="submit" name="parar" value="Parar coche"/></br></br>

            <input type="submit" name="subir" value="Subir marcha"/>&nbsp;
            <input type="submit" name="bajar" value="Bajar marcha"/></br>
        </form>
        </center>
   </body>
</html>
