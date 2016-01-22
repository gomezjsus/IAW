<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Índice de masa corporal</title>
    </head>
    <body>
        <h2>ÍNDICE DE MASA CORPORAL (RESULTADO)</h2> 
        <?php
        if ( (int)($_POST['peso']) && (int)($_POST['altura']) ) {
            $imc=round($_POST['peso'] / ($_POST['altura'] * $_POST['altura'])*10000);
            // echo $imc;
            echo "<p>Con un peso de ".$_POST['peso']." y una altura de ".($_POST['altura']/100)."m, tu indice de masa muscular es ".$imc.".";
            echo "<br/>Los valores normales del IMC estan entre 20 y 25.<br/></p>";
            if ($imc > 25)
                echo "<br/><p>Valores por encima de lo normal.</p>";
            if ($imc < 20)
                echo "<br/><p>Valores por debajo de lo normal.</p>";
            if ( ($imc == 20) || ($imc == 25) )
                echo "<p>$imc esta a los limites de los valores normales.</p>";
        }
        else {
            echo "<p>No has introducido correctamente alguno de los valores.</p>";
        }
        
        ?>
        <br/>
        <br/>
        <a href="index.php">Volver a formulario</a>
    </body>
</html>