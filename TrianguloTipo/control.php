<?php
require_once("modelo.php");

if (isset($_POST['act']) == "actualizar") {
    $triangulo = new Triangulo($_POST['x'],$_POST['y'],$_POST['z']);
    $lado1 = $triangulo->getLado1();
    $lado2 = $triangulo->getLado2();
    $lado3 = $triangulo->getLado3();
    echo json_encode(array(
        'lado1' => $lado1,
        'lado2'=>  $lado2,
        'lado3' => $lado3));
}

if (isset($_POST['tipo']) == "tipo") {
    $triangulo = new Triangulo($_POST['x'],$_POST['y'],$_POST['z']);
    $res =$triangulo->getTipo();
    echo json_encode(array('success' => $res));
}



?>