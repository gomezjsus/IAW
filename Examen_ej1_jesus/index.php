<?php
include "datos.php";
include "funciones.php";

$contador1=0;
$contador2=0;
$num_alto=0;
foreach ($viviendas as $key => $value) {
    $contador1=$contador1+1;
    if ( $value["dir"]=="C/Miguel Hernández" ){
        $contador2=$contador2+1;
    }
    if ( $value["nro"] >= $num_alto )
            $num_alto = $value["nro"];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "<p>Total de viviendas: ".$contador1."</p>";
        echo "<p>Total de casas en C/Miguel Hernández: ".$contador2."</p>";
        echo "<p>La casa con el número más alto es: </br>";
        foreach ($viviendas as $key => $value) {
            if ($num_alto == $value['nro']){
                echo "Dirección: ".$value['dir']."</br>";
                echo "Número: ".$value['nro']."</br>";
                echo "Cod. Postal: ".$value['cdp']."</br>";
            }                               
        }
        echo "</p>";              
        ?>
        <form action="" method="POST">
            Dni del propietario:<input type="text" name="dni" value="<?=isset($_POST['dni']) ? $_POST['dni'] : '' ?>" />
            <input type="submit" name="aceptar" value="Aceptar" />
        </form>
        <?php
        //CON FUNCION BUSCAR ME FALLA ALGO EN EL RETURN
//        if ( isset($_POST['aceptar']) ) {            
//            if ( buscar($_POST['dni'], $viviendas) ) {
//                echo "Los datos de la vivienda del propietario: ".$_POST['dni']." son: </br>";
//                echo "Dirección: ".$viviendas[$_POST['dni']]['dir']."</br>";
//                echo "Número: ".$viviendas[$_POST['dni']]['nro']."</br>";
//                echo "Cod.Postal: ".$viviendas[$_POST['dni']]['cdp']."</br>";
//            }
//            else
//                echo "DNI no encontrado";
//        }
        
        if ( isset($_POST['aceptar']) ) {
            foreach ($viviendas as $key => $value) {
                if ( $_POST['dni'] == $key ) {
                    echo "Los datos de la vivienda del propietario con DNI ".$_POST['dni']." son: </br>";
                    echo "Dirección: ".$value['dir']."</br>";
                    echo "Número: ".$value['nro']."</br>";
                    echo "Cod.Postal: ".$value['cdp']."</br>";
                }
            }
        }
        ?>
    </body>
</html>
