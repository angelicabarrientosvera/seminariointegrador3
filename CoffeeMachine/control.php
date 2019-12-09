<?php
require_once("modelo.php");
$maquina = new MaquinaCafetera();
if (isset($_GET['funcion']) == "ini") {
    $cantidadCafe = $maquina->getCafe();
    $azucar = $maquina->getAzucar();
    $vasos =$maquina->getVasos();
    $baseCafe= $maquina->getPrecioBaseCafe();
    $egresos= $maquina->getEgresos();
    $ingresos=$maquina->getIngresos();
    $gananciasBrutas= $maquina->getGananciasBrutas();
    $impuestos= $maquina->getImpuestos();

    echo json_encode(array(
        'cafe' => $cantidadCafe,
        'azucar'=>$azucar,
        'vasos' =>$vasos,
        'base' =>$baseCafe,
        'egresos'=>$egresos,
        'ingresos' => $ingresos,
        'ganancias' => $gananciasBrutas,
        'impuestos' => $impuestos));
}

if (isset($_POST['funcion']) == "cafe") {
    $maquina->setEgresos($_POST['egresos']);
    $maquina->setEgresos($_POST['ingresos']);
    $sum = (float)$maquina->getEgresos() + ((float)$_POST['precioC']*(float)$_POST['cafe']);
    $maquina->recargarCafe($_POST['cafe'],$sum);
    $res= $maquina->getCafe();
    $egre= $maquina->getEgresos();
    $ganB = $maquina->getGananciasBrutas();
    $imp = $maquina->getImpuestos();
    $ganN = $maquina->getGananciasNetas();
    echo json_encode(array(
        'success' => $res,
        'egresos' =>$egre,
        'gananciasB' => $ganB,
        'impuestos' => $imp,
        'gananciasN' => $ganN));
}

if (isset($_POST['act']) == "preparar") {
            $maquina->setCafe($_POST['ccafe']);
            $maquina->setAzucar($_POST['cazucar']);
            $maquina->setVasos($_POST['cvasos']);
            $maquina->setEgresos($_POST['egresos']);
            $maquina->setIngresos($_POST['ingresos']);
            $maquina->setGananciasBrutas($_POST['ganaciasB']);
            $maquina->setPrecioBaseCafe($_POST['precioBase']);
            $maquina->setImpuestos($_POST['impuestos']);
            $maquina->setGananciasNetas($_POST['neto']);
    if ($maquina->prepararCafe($_POST['x'],$_POST['y'])){
        $precio= $maquina->calcularPrecio($_POST['x'],$_POST['y']);
        $maquina->registrarFactura($precio);
        $cafe = $maquina->getCafe();
        $azucar = $maquina->getAzucar();
        $vasos = $maquina->getVasos();
        $egresos = $maquina->getEgresos();
        $ingresos = $maquina->getIngresos();
        $gananciasBrutas = $maquina->getGananciasBrutas();
        $precioBase =$maquina->getPrecioBaseCafe();
        $impuestos = $maquina->getImpuestos();
        $ganNe = $maquina->getGananciasNetas();
        echo json_encode(array(
            'success' => $precio,
            'cafe' => $cafe,
            'azucar'=>$azucar,
            'vasos' =>$vasos,
            'egresos' => $egresos,
            'ingresos' =>$ingresos,
            'ganancias' =>$gananciasBrutas,
            'base'=>$precioBase,
            'impuestos'=>$impuestos,
            'neto'=>$ganNe));
    }

}

    if (isset($_POST['acto']) == "precio") {

            $maquina->setPrecioBaseCafe($_POST['precio']);
            $precioC = $maquina->getPrecioBaseCafe();
            echo json_encode(array('success' => $precioC));
    }


if (isset($_POST['fun']) == "azucar") {
    $maquina->setEgresos($_POST['egresos']);
    $sum = (float)$maquina->getEgresos()+( (float)$_POST['precioC']*(float)$_POST['azucar']);
    $maquina->recargarAzucar($_POST['azucar'], $sum);
    $az= $maquina->getAzucar();
    $egre= $maquina->getEgresos();
    echo json_encode(array(
        'success' => $az,
        'egresos' =>$egre));
}

if (isset($_POST['func']) == "vasos") {
    $maquina->setEgresos($_POST['egresos']);
    $sum = $sum = (float)$maquina->getEgresos()+( (float)$_POST['precioC']*(float)$_POST['vasos']);
    $maquina->recargarVasos($_POST['vasos'],$sum);
    $va= $maquina->getVasos();
    $egre = $maquina->getEgresos();
    echo json_encode(array(
        'success' => $va,
        'egresos' => $egre));
}



?>