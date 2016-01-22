<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>ÍNDICE DE MASA CORPORAL (FORMULARIO)</h2>
        <fieldset>
            <legend>Formulario</legend>
        <form action="calcular.php" method="POST" />
            Peso: <input type="text" name="peso" size="4" /> Kg<br/>
            Altura: <input type="text" name="altura" size="4" /> cm<br/>
            <input type="submit" name="calcular" value="Calcular"/>
            <input type="reset" />
        </form>
        </fieldset>
        <?php
        // put your code here
        ?>
    </body>
</html>
