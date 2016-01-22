<?php

function soloLetras($in){
  if (preg_match('/[^a-zA-Z ñáéíóúÁÉÍÓÚ]/',$in)) return false;
  else return true;
}
