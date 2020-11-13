<?php
function mostrarError($errores, $campo){
    $alerta="";
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo]."</div>";
    }
    return $alerta;
    
}


function borrarError() {
    $bor = false;
    if (isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        $bor = ($_SESSION['errores']);
    }


    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        $compleado = ($_SESSION['completado']);
    }

    



    return $bor;
    return $completado;
}


