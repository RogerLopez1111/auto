<?php

// Prepara una cadena para imprimirla con echo
function LimpiaCadena($str)
{
    // Convertimos la cadena en UTF-8 derivado de la configuración actual
    $str = mb_convert_encoding($str, 'UTF-8', 'ISO-8859-1');
    return $str;
}

?>
