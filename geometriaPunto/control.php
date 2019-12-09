<?php
require_once("modelo.php");

if (isset($_POST['act']) == "actualizar") {
    $rectangulo = new Rectangulo($_POST['orix'],$_POST['oriy'],$_POST['ancho'], $_POST['alto']);
    $origenx = $rectangulo->getOrigenX();
    $origeny = $rectangulo->getOrigenY();
    $ancho = $rectangulo->getAncho();
    $alto = $rectangulo->getAlto();
    echo json_encode(array(
        'origenx' => $origenx,
        'origeny'=>  $origeny,
        'ancho' => $ancho,
        'alto'=>$alto));
}

if (isset($_POST['posicion']) == "posicion") {
    $rectangulo = new Rectangulo($_POST['orix'],$_POST['oriy'],$_POST['ancho'], $_POST['alto']);
    $origenx = $rectangulo->getOrigenX();
    $origeny = $rectangulo->getOrigenY();
    $ancho = $rectangulo->getAncho();
    $alto = $rectangulo->getAlto();

    $res =$rectangulo->getPosicionPunto($_POST['cox'],$_POST['coy']);
    echo json_encode(array('success' => $res));
}



?>