<?php
class Rectangulo {

    /**Coordenada x del punto correspondiente a la esquina superior izquierda del Rectangulo*/
    private $origenX;
    /**Coordenada y del punto correspondiente a la esquina superior izquierda del Rectangulo*/
    private $origenY;
    /**Ancho del Rectangulo*/
    private $ancho;
    /**Alto del Rectangulo*/
    private $alto;

    /**
     * Constructor default
     */
    /**public function __construct(){
        $origenX = 0;
        $origenY = 0;
        $ancho = 0;
        $alto = 0;
        //COMPLETE para inicializar un Rectangulo en el origen 0,0 y dimensiones 0.
    }*/

    /**
     * Constructor con parámetros
     * @x el valor inicial para origenX
     * @y el valor inicial para origenY
     * @w el valor inicial para el ancho
     * @h el valor inicial para el alto
     */
    public function __construct($x, $y, $w, $h){
        $this->origenX =$x;
        $this->origenY = $y;
        $this->ancho = $w;
        $this->alto = $h;
        //COMPLETE para inicializar el Rectangulo con los valores de los parámetros
    }

/**
 * Determina la ubicación de unpunto con coordenadas x, y respecto al Rectangulo.
 * Las posibles salidas son:
 * "Punto Dentro del Rectángulo"
 * "Punto En Borde Superior"
 * "Punto en Borde Inferior"
 * "Punto en Borde Izquierdo"
 * "Punto en Borde Derecho"
 * "Punto Fuera del Rectánngulo"
 */
public function getPosicionPunto($x, $y) {
    $ubicacion = "Ubicación Desconocida";
    if ($this->puntoEstaDentro($x, $y)) {
        $ubicacion = "Punto Dentro del Rectángulo";
    } else if ($this->puntoEstaEnBordeSuperior($x, $y)) {
        $ubicacion = "Punto En Borde Superior";
    } else if ($this->puntoEstaEnBordeInferior($x, $y)) {
        $ubicacion = "Punto en Borde Inferior";
    } else if ($this->puntoEstaEnBordeIzquierdo($x, $y)) {
        $ubicacion = "Punto en Borde Izquierdo";
    } else if ($this->puntoEstaEnBordeDerecho($x, $y)) {
        $ubicacion = "Punto en Borde Derecho";
    } else {
        $ubicacion = "Punto Fuera del Rectángulo";
    }
        /*
         * Complete al algoritmo para que la variable local ubicacion tome alguno de estos valores:
         * Punto Dentro del Rectángulo
         * Punto En Borde Superior
         * Punto en Borde Inferior
         * Punto en Borde Izquierdo
         * Punto en Borde Derecho
         * Punto Fuera del Rectángulo
         */
        return $ubicacion;
    }//fin metodo getPosiciónPunto

/**
 * Determina si un punto de coordenadas x,y se encuentran dentro de este Rectangulo
 */
public function puntoEstaDentro($x, $y) {
    $estaDentro = false;
    return $estaDentro = (($x > $this->origenX) && ($x < ($this->origenX + $this->ancho)) && ($y < $this->origenY) && ($y > ($this->origenY - $this->alto)));
        //Complete algoritmo
    }//fin metodo puntoEstaDentro

/**
 * Determina si un punto de coordenadas x,y se encuentran en el Borde Superior de este Rectangulo
 */
public function puntoEstaEnBordeSuperior($x, $y) {
    $bordeSuperior = false;
    return $bordeSuperior = (($y == $this->origenY) && ($x > $this->origenX) && ($x < ($this->origenX + $this->ancho)));
        //Complete algoritmo
    }//fin puntoEstaEnBordeSuperior

/**
 * Determina si un punto de coordenadas x,y se encuentran en el Borde Inferior de este Rectangulo
 */
public function puntoEstaEnBordeInferior($x, $y) {
    $bordeInferior = false;
    return $bordeInferior = (($x > $this->origenX) && ($x < ($this->origenX + $this->ancho)) && ($y == ($this->origenY - $this->alto)));
        //Complete algoritmo
    }//fin puntoEstaEnBordeInferior

/**
 * Determina si un punto de coordenadas x,y se encuentran en el Borde Izquierdo de este Rectangulo
 */
public function puntoEstaEnBordeIzquierdo($x, $y) {
    $bordeIzquierdo = false;
    return $bordeIzquierdo = (($x == $this->origenX) && ($y < $this->origenY) && ($y > ($this->origenY - $this->alto)));
        //Complete algoritmo
    }//fin puntoEstaEnBordeIzquierdo

/**
 * Determina si un punto de coordenadas x,y se encuentran en el Borde Derecho de este Rectangulo
 */
public function puntoEstaEnBordeDerecho($x, $y) {
    $bordeDerecho = false;
    return $bordeDerecho = (($x == ($this->origenX + $this->ancho)) && (($y < $this->origenY) && ($y > ($this->origenY - $this->alto))));
        //Complete algoritmo
    }//fin puntoEstaEnBordeDerecho

/**
 * Determina si un punto de coordenadas x,y se encuentran fuera de este Rectangulo
 */
public function puntoEstaFuera($x, $y) {
    return $estaFuera = (($x < $this->origenX) || ($x > ($this->origenX + $this->ancho)) && ($y > $this->origenY) || ($y < ($this->origenY - $this->alto)));
        //Complete algoritmo
    }//fin puntoEstaFuera

/**Metodo de acceso a la propiedad origenX*/
public function getOrigenX(){
    return $this->origenX;
        //Complete algoritmo
    }//end method getOrigenX

/**Metodo de modificación a la propiedad origenX*/
public function setOrigenX($newOrigenX){
    $this->origenX = $newOrigenX;
        //Complete algoritmo
    }//end method setOrigenX

/**Metodo de acceso a la propiedad origenY*/
public function getOrigenY(){
    return $this->origenY;
        //Complete algoritmo
    }//end method getOrigenY

/**Metodo de modificación a la propiedad origenY*/
public function setOrigenY($newOrigenY){
    $this->origenY = $newOrigenY;
        //Complete algoritmo
    }//end method setOrigenY

/**Metodo de acceso a la propiedad ancho*/
public function getAncho(){
    return $this->ancho;
        //Complete algoritmo
    }//end method getAncho

/**Metodo de modificación a la propiedad ancho*/
public function setAncho($ancho){
    $this->ancho = $ancho;
        //Complete algoritmo
    }//end method setAncho

/**Metodo de acceso a la propiedad alto*/
public function getAlto(){
        return $this->alto;
        //Complete algoritmo
    }//end method getAlto

    /**Metodo de modificación a la propiedad alto*/
    public function setAlto($alto){
    $this->alto = $alto;
        //Complete algoritmo
    }//end method setAlto
}//fin clase Rectangulo

?>