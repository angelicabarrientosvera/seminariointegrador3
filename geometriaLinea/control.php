<?php
require_once("modelo.php");

if (isset($_POST['act']) == "actualizar") {
    $cuadrante = new GeometriaCuadrante($_POST['punto1x'],$_POST['punto1y'],$_POST['punto2x'], $_POST['punto2y']);
    $punto1x = $cuadrante->getX1();
    $punto1y = $cuadrante->getY1();
    $punto2x = $cuadrante->getX2();
    $punto2y = $cuadrante->getY2();
    echo json_encode(array(
        'puntoux' => $punto1x,
        'puntouy'=>  $punto1y,
        'puntodx' => $punto2x,
        'puntody'=>  $punto2y));
}

if (isset($_POST['posicion']) == "posicion") {
    $cuadrante = new GeometriaCuadrante($_POST['punto1x'],$_POST['punto1y'],$_POST['punto2x'], $_POST['punto2y']);

    $res =$cuadrante->getUbicacion();
    echo json_encode(array('success' => $res));
}

?>