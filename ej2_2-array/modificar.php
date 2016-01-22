<html>
    <head>
        <meta charset="UTF-8">
        <title>Dar de baja alumno</title>
    </head>
    <body>
                <form action="" method="POST">              
                    <?php desplegar_alumnos($alumnos); ?>
                    <input type="hidden" name="newalumnos" value="<?=isset($newalumnos) ? $newalumnos : "" ?>" />
                    <input type="submit" name="eliminar" value="Eliminar">          
                </form>
                <hr>
        <?php
                
        if (isset($_POST["eliminar"])) {
            ?>
            <form action="" method="POST">              
                <?php desplegar_alumnos($alumnos); ?>
                <input type="hidden" name="newalumnos" value="<?=isset($newalumnos) ? $newalumnos : "" ?>" />
                <input type="submit" name="eliminar" value="Eliminar">          
            </form>
            <hr>
            <?php
            unset($alumnos[$_POST['alu']]);
        }
        ?>
    </body>
</html>