<?php
class GeometriaCuadrante {
    private $x1;
    private $y1;
    private $x2;
    private $y2;
    

    public function __construct($x1,$y1, $x2,$y2)
    {
        $this->x1 = $x1;
        $this->y1 = $y1;
        $this->x2 = $x2;
        $this->y2 = $y2;

    }
    public function getUbicacion() {
        $ubicacion = "Error, es imposible";
        if ($this->estaEnCuadranteI()) {
            $ubicacion = "Cuadrante I";
        }
        if ($this->estaEnCuadranteII()) {
            $ubicacion = "Cuadrante II";
        }
        if ($this->estaEnCuadranteIII()) {
            $ubicacion = "Cuadrante III";
        }
        if ($this->estaEnCuadranteIII()) {
            $ubicacion = "Cuadrante IV";
        }
        //Complete para que la salida se lo esperado por los test...
        return $ubicacion;
    }//fin getUbicacion

    public function getCuantosCuadrantes() {
        $cont = 0;
        if ($this->estaEnCuadranteI()) {
            $cont++;
        }
        if ($this->estaEnCuadranteII()) {
            $cont++;
        }
        if ($this->estaEnCuadranteIII()) {
            $cont++;
        }
        if ($this->estaEnCuadranteIV()) {
            $cont++;
        }
        return $cont;
        //complete
    }//fin getCuantosCuadrantes

    public function estaEnCuadranteI() {
        $x = $this->x1 >= 0 && $this->y1 >= 0;
        $y = $this->x2 >= 0 && $this->y2 >= 0;
        return $primerCuadrante = ($x || $y) || (($this->estaEnCuadranteII() && $this->estaEnCuadranteIV()) && ($this->getfunctionersectoY() > 0));
        /*complete*/
    }//fin estaEnCuadranteI

    public function estaEnCuadranteII() {
        $x = $this->x1 < 0 && $this->y1 >= 0;
        $y = $this->x2 < 0 && $this->y2 >= 0;
        return $segundoCuadrante = ($x || $y) || (($this->estaEnCuadranteIII()) && ($this->getfunctionersectoY() > 0));
        /*complete*/
    }//fin estaEnPrimerCuadranteII

    public function estaEnCuadranteIII() {
        $x = $this->x1 < 0 && $this->y1 < 0;
        $y = $this->x2 < 0 && $this->y2 < 0;
        return $tercerCuadrante = ($x || $y) || (( $this->estaEnCuadranteIV()) && ($this->getfunctionersectoY() != 0));
        /*complete*/  
    }//fin estaEnCuadranteIII

    public function estaEnCuadranteIV() {
        $x = $this->x1 >= 0 && $this->y1 < 0;
        $y = $this->x2 >= 0 && $this->y2 < 0;
        return $cuartoCuadrante = ($x || $y)  && ($this->getfunctionersectoY() != 0);
        /*complete*/
    }//fin estaEnCuadranteIV

    public function getPendiente() {
        return $pendiente = ($this->y2 - $this->y1) / ($this->x2 - $this->x1);
        /*complete*/
    }

    public function getfunctionersectoY() {
        $pendiente = $this->getPendiente();
        return $functionersecto = $this->y1 / ($pendiente * $this->x1);
        /*complete*/
    }

    /*complete GET/SET*/

    //Start GetterSetterExtension Code
    /**Getter method x1*/
    public function getX1(){
        return $this->x1;
    }//end method getX1

    /**Setter method x1*/
    public function setX1($x1){
        $this->x1 = $x1;
    }//end method setX1

    /**Getter method y1*/
    public function getY1(){
        return $this->y1;
    }//end method getY1

    /**Setter method y1*/
    public function setY1($y1){
        $this->y1 = $y1;
    }//end method setY1

    /**Getter method x2*/
    public function getX2(){
        return $this->x2;
    }//end method getX2

    /**Setter method x2*/
    public function setX2($x2){
        $this->x2 = $x2;
    }//end method setX2

    /**Getter method y2*/
    public function getY2(){
        return $this->y2;
    }//end method getY2

    /**Setter method y2*/
    public function setY2($y2){
        $this->y2 = $y2;
    }//end method setY2
    //End GetterSetterExtension Code  

}
?>