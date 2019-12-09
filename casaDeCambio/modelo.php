<?php
class CasaCambio {
    private $precioDeCompra;
    private $precioDeVenta;
    private $bolivaresComprados;
    private $bolivaresVendidos;
    private $bolivaresEnCaja;
    private $pesosEnCaja;


    public function __construct($precioDeCompra,$precioDeVenta, $bolivaresComprados,$bolivaresVendidos, $bolivaresEnCaja, $pesosEnCaja)
    {
        $this->precioDeCompra = $precioDeCompra;
        $this->precioDeVenta = $precioDeVenta;
        $this->bolivaresComprados = $bolivaresComprados;
        $this->bolivaresVendidos = $bolivaresVendidos;
        $this->bolivaresEnCaja = $bolivaresEnCaja;
        $this->pesosEnCaja = $pesosEnCaja;
    }

    /*Metodos GET*/
    public function getPrecioDeCompra(){
        return $this->precioDeCompra;
    }

    public function getPrecioDeVenta(){
        return $this->precioDeVenta;
    }

    public function getBolivaresComprados(){
        return $this->bolivaresComprados;
    }

    public function getBolivaresVendidos(){
        return $this->bolivaresVendidos;
    }

    public function getBolivaresEnCaja(){
        return $this->bolivaresEnCaja;
    }

    public function getPesosEnCaja(){
        return $this->pesosEnCaja;
    }

    /**
     * Calcula la ganancia de comprar un bolivar, es decir, la diferencia entre los previos de compra y venta...
     */
    public function getGananciaEnUnBolivar(){
        $gananciasBolivar = 0;
        return $gananciasBolivar = $this->precioDeVenta - $this->precioDeCompra;
    }//fin getGananciaEnUnBolivar


    /* Debe controlar que el precio no sea cero ni negativo y que los precios generen ganancias...
     * @param precioDeCompra
     * @param precioDeVenta
     * @return regresa true cuando pudo cambiar ambos precios, en caso contrario falla.
     */
    public function cambiarPrecioDelBolivar($precioDeCompra,$precioDeVenta){
        $previoValido= (($this->precioDeCompra < $this->precioDeVenta) && ($this->precioDeCompra > 0 && $this->precioDeVenta > 0));

        if($previoValido){
            $this->precioDeCompra =$precioDeCompra;
            $this->precioDeVenta =$precioDeVenta;
        }
        return $previoValido;
    }//fin cambiarPrecioDelBolivar


    /**
     * Registra la compra de bolivares
     * @param cantidad La cantidad de bolivares a comprar
     * @return true si pudo comprar
     */
    public function comprarBolivares($cantidad){
        $puedeComprar= $this->pesosEnCaja >= ($cantidad * $this->precioDeCompra);

        if($puedeComprar){
            $this->bolivaresComprados += $cantidad;
            $this->pesosEnCaja= ($this->pesosEnCaja - ($cantidad * $this->precioDeCompra));
            $this->bolivaresEnCaja= $this->bolivaresEnCaja + $cantidad;
        }
        return $puedeComprar;
    }//fin comprarBolivares


    public function venderBolivares($cantidad){
        $puedeVender= (($cantidad <= $this->bolivaresEnCaja) && ($this->precioDeVenta> $this->precioDeCompra));

        if($puedeVender){
            $this->bolivaresVendidos += $cantidad;
            $this->pesosEnCaja= ($this->pesosEnCaja + ($cantidad * $this->precioDeVenta));
            $this->bolivaresEnCaja= ($this->bolivaresEnCaja- ($cantidad));
        }
        return $puedeVender;
    }//fin venderBolivares


    /**
     * Calcula y regresa los impuestos, aunque no exista una propiedad llamada impuestos, no se necesita...
     * @return los impuestos, el 16% de los bolivares vendidos, convirtiendo a pesos
     */
    public function getImpuestos() {
        return $impuestos = ((($this->bolivaresVendidos * $this->precioDeVenta) * 16) / 100);
        //COMPLETE
    }//fin getImpuestos

    /**
     * Calcula y regresa las ganancias, aunque no exista una propiedad llamada ganancias, no se necesita...
     * @return las ganancias, que corresponden al dinero en pesos en caja menos los impuestos
     */
    public function getGanancias() {
        return $ganancias = (($this->bolivaresVendidos * $this->precioDeVenta) - $this->getImpuestos());
        //COMPLETE
    }//fin getGanancias

    /**
     * Aumenta la cantidad de pesos en caja, inyecta dinero al negocio
     * @param cantidad Debe validarse que la cantidad no sea  negativa...
     */
    public function inyectarPesos($cantidad) {
        if ($cantidad > 0) {
            $this->pesosEnCaja += $cantidad;
        }
        //COMPLETE
    }//fin inyectarPesos

    /**
     * Lo mismo que el anterior, pero con bolivares...
     * @param cantidad
     */
    public function inyectarBolivares($cantidad) {
        if ($cantidad > 0) {
            $this->bolivaresEnCaja += $cantidad;
        }
        //COMPLETE
    }





}
?>