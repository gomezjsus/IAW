<?php
function buscar($x,$lista){   
    foreach ($lista as $key) {
        if ($x == $key)
            return TRUE;
    }    
}


