<?php
class MaquinaCafetera {
    private $cafe;
    private $azucar;
    private $vasos;
    private $precioBaseCafe;
    private $egresos;
    private $ingresos;
    private $gananciasBrutas;
    private $impuestos;
    private $gananciasNetas;


    public function __construct()
    {
        $this->cafe = 100;
        $this->azucar = 100;
        $this->vasos = 100;
        $this->precioBaseCafe=0;
        $this->egresos=0;
        $this->ingresos=100;
        $this->gananciasBrutas=0;
        $this->impuestos=0;
        $this->gananciasNetas=0;
    }

    /*Metodos GET*/
    public function getCafe() {
        return $this->cafe;
    }

    public function setCafe($cafe) {
        $this->cafe = $cafe;
    }

    public function getAzucar() {
        return $this->azucar;
    }

    public function setAzucar($azucar) {
        $this->azucar = $azucar;
    }

    public function getVasos() {
        return $this->vasos;
    }

    public function setVasos($vasos) {
        $this->vasos = $vasos;
    }

    public function getPrecioBaseCafe() {
        return $this-> precioBaseCafe;
    }

    public function setPrecioBaseCafe($precioBaseCafe) {
        $this->precioBaseCafe = $precioBaseCafe;
    }

    public function getEgresos() {
        return $this->egresos;
    }

    public function setEgresos($egresos) {
        $this->egresos = $egresos;
    }

    public function getIngresos() {
        return $this->ingresos;
    }

    public function setIngresos($ingresos) {
        $this->ingresos = $ingresos;
    }

    public function getGananciasBrutas() {
        return $this->gananciasBrutas;
    }

    public function setGananciasBrutas($gananciasBrutas) {
        $this->gananciasBrutas = $gananciasBrutas;
    }

    public function getImpuestos() {
        return $this->impuestos;
    }

    public function setImpuestos($impuestos) {
        $this->impuestos = $impuestos;
    }

    public function getGananciasNetas() {
        return $this->gananciasNetas;
    }

    public function setGananciasNetas($gananciasNetas) {
        $this->gananciasNetas = $gananciasNetas;
    }

    //complete metodos GET / SET
    public function calcularPrecio($tipoCafe, $cantidadAzucar) {
        $precio=0;
        $precio=($this->precioBaseCafe/1000)*(55*$tipoCafe);
        $precio+=(($precio*(($cantidadAzucar-1)*5))/100);
        $precio+=(($precio*15)/100);
        return $precio;
        //complete
    }

    public function recargarCafe($cantidadCafe, $costoCompraCafe) {
            $this->cafe+=$cantidadCafe;
            $this->egresos= $costoCompraCafe;
            $this->gananciasBrutas+= $this->ingresos - $this->egresos;
            $this->impuestos+=$this->ingresos*(16/100);
            $this->gananciasNetas=$this->gananciasBrutas-$this->impuestos;
            $recarga=true;
        return $recarga;
        //complete
    }

    public function recargarAzucar($cantidadAzucar, $costoCompraAzucar) {
        $this->azucar+= $cantidadAzucar;
        $this->egresos= $costoCompraAzucar;
        return false;
        //complete
    }

    public function recargarVasos($cantidadVasos, $costoCompraVasos) {
        $this->vasos+= $cantidadVasos;
        $this->egresos= $costoCompraVasos;
        return false;
        //complete
    }

    public function prepararCafe($tipoCafe, $cantidadAzucar) {
        $puedePreparar= $this->vasos>0;
        switch($tipoCafe){
            case 1: switch($cantidadAzucar){
                case 1:
                    $puedePreparar=$puedePreparar && $this->cafe>=55;
                    break;
                case 2:
                    $puedePreparar= $puedePreparar && $this->cafe>=55 && $this->azucar>=5;
                    break;
                case 3:
                    $puedePreparar= $puedePreparar && $this->cafe>=55 && $this->azucar>=10;
                    break;
            }
                break;
            case 2:switch($cantidadAzucar){
                case 1:
                    $puedePreparar= $puedePreparar && $this->cafe>=110;
                    break;
                case 2:
                    $puedePreparar= $puedePreparar && $this->cafe>=110 && $this->azucar>=5;
                    break;
                case 3:
                    $puedePreparar= $puedePreparar && $this->cafe>=110 && $this->azucar>=10;
                    break;

            }
                break;
            case 3:switch($cantidadAzucar){
                case 1:
                    $puedePreparar= $puedePreparar && $this->cafe>=165;
                    break;
                case 2:
                    $puedePreparar= $puedePreparar && $this->cafe>=165 && $this->azucar>=5;
                    break;
                case 3:
                    $puedePreparar= $puedePreparar && $this->cafe>=165 && $this->azucar>=10;
                    break;

            }
                break;
            //complete
        }
        if($puedePreparar){
            $this->cafe-=$tipoCafe*55;
            $this->azucar-=($cantidadAzucar-1)*5;
            $this->vasos--;
            //$aux=calcularPrecio($tipoCafe,$cantidadAzucar);
            //$this->registrarFactura($aux);
        }
        return $puedePreparar;
    }

    public function registrarFactura($valorFactura) {
        $this->ingresos+=$valorFactura;
        $this->gananciasBrutas=$valorFactura;
        $this->impuestos=(($this->gananciasBrutas*16)/100);
        $this->gananciasNetas=($this->gananciasBrutas-($this->impuestos));
        //complete
    }
}
?>