<?php
require_once("modelo.php");

if (isset($_POST['opc1']) == "opc1") {
    $casa = new CasaCambio($_POST['pbscompra'],$_POST['pbsventa'],0,0,0,0);
    if($casa->cambiarPrecioDelBolivar($_POST['pbscompra'],$_POST['pbsventa'])){
        $compra = $casa->getPrecioDeCompra();
        $venta = $casa->getPrecioDeVenta();
        $ganancia = $casa->getGananciaEnUnBolivar();
    }
    echo json_encode(array(
        'bscompra' => $compra,
        'bsventa'=>  $venta,
        'bsganancia' =>$ganancia));
}

if (isset($_POST['opc2']) == "opc2") {
    $casa = new CasaCambio(0,0,0,0,0,$_POST['pesos']);
    $pesos = $casa->getPesosEnCaja();
    echo json_encode(array(
        'pesos' => $pesos));
}

if (isset($_POST['opc3']) == "opc3") {
    $casa = new CasaCambio(0,0,0,0,$_POST['bolivares'],0);
    $bolivares = $casa->getBolivaresEnCaja();
    echo json_encode(array(
        'bolivares' => $bolivares));
}

if (isset($_POST['opc4']) == "opc4") {
    $casa = new CasaCambio($_POST['bscompra'],0,$_POST['bscomprados'],0,$_POST['bscaja'],$_POST['pscaja']);
    $bolivares = $casa->comprarBolivares($_POST['bolivaresC']);
    $bscomprados = $casa->getBolivaresComprados();
    $bolcaja =$casa->getBolivaresEnCaja();
    $pecaja = $casa->getPesosEnCaja();
        echo json_encode(array(
            'success' => $bolivares,
            'bscomprados' => $bscomprados,
            'bscaja' =>$bolcaja,
            'pscaja' =>$pecaja));

}

if (isset($_POST['opc5']) == "opc5") {
    $casa = new CasaCambio($_POST['bscompra'],$_POST['bsventa'],$_POST['bscomprados'],$_POST['bsvendidos'],$_POST['bscaja'],$_POST['pscaja']);
    $bolivares = $casa->venderBolivares($_POST['bolivaresV']);
    $bsvendidos = $casa->getBolivaresVendidos();
    $bolicaja =$casa->getBolivaresEnCaja();
    $pescaja = $casa->getPesosEnCaja();
    $impuestos = $casa->getImpuestos();
    $ganancias = $casa->getGanancias();

        echo json_encode(array(
            'success' => $bolivares,
            'bsvendidos' => $bsvendidos,
            'bsocaja' =>$bolicaja,
            'psocaja' =>$pescaja,
            'impuestos' =>$impuestos,
            'ganancias' =>$ganancias
            ));


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