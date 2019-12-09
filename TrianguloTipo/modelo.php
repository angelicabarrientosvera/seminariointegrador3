<?php
class Triangulo {
    private $lado1;
    private $lado2;
    private $lado3;
    private $tipo;
    //COMPLETE las tres propiedades

    public function __construct($lado1, $lado2, $lado3) {
        $this->lado1 = $lado1;
        $this->lado2 = $lado2;
        $this->lado3 = $lado3;
        $this->tipo = null;
    }

    /*complete GET/SET*/

    public function esEquilatero() {

    $esEquilatero = ($this->lado1 == $this->lado2) && ($this->lado2 == $this->lado3) && ($this->lado1 == $this->lado3);
        return $esEquilatero;
    }

    public function esEscaleno() {

    $esEscaleno = ($this->lado1 != $this->lado2) && ($this->lado2 != $this->lado3) && ($this->lado1 != $this->lado3);
        return $esEscaleno;
    }

    public function esIsosceles() {

    $esIsosceles = (($this->lado1 == $this->lado2) && $this->lado3 != $this->lado2) || (($this->lado2 == $this->lado3) && $this->lado2 != $this->lado1) || (($this->lado1 == $this->lado3) && $this->lado1 != $this->lado2);
        return $esIsosceles;
    }

    public function setLado1($lado1) {
    $this->lado1 = $lado1;
    }

    public function getLado1() {
    return $this->lado1;
    }

    public function setLado2($lado2) {
    $this->lado2 = $lado2;
    }

    public function getLado2() {
    return $this->lado2;
    }

    public function setLado3($lado3) {
    $this->lado3 = $lado3;
    }

    public function getLado3() {
    return $this->lado3;
    }

    public function getTipo() {
    $tipo = "Desconocido";
        if ($this->esEquilatero()) {
        $tipo = "Equilatero";
    } else {
        if ($this->esRectangulo() && $this->esIsosceles()) {
            $tipo = "Isosceles Rectangulo";
        }
            if ($this->esIsosceles() && !$this->esRectangulo()) {
            $tipo = "Isosceles";
        }
            if ($this->esEscaleno() && $this->esRectangulo()) {
            $tipo = "Escaleno Rectangulo";
        }
            if ($this->esEscaleno() && !$this->esRectangulo()) {
            $tipo = "Escaleno";
        }
        }
        return $tipo;
    }//fin método getTipo

    public function esRectangulo()
{
    $tipo1 = (($this->lado2 * $this->lado2) + ($this->lado3 * $this->lado3) - ($this->lado1 * $this->lado1)) / ((2 * ($this->lado2 * $this->lado3)));
        $tipo2 = (($this->lado1 * $this->lado1) + ($this->lado3 * $this->lado3) - ($this->lado2 * $this->lado2)) / ((2 * ($this->lado1 * $this->lado3)));
        $tipo3 = (($this->lado1 * $this->lado1) + ($this->lado2 * $this->lado2) - ($this->lado3 * $this->lado3)) / ((2 * ($this->lado1 * $this->lado2)));
        $esRectangulo = ($tipo1 == 0) || ($tipo2 == 0) || ($tipo3 == 0);
        return $esRectangulo;
        //complete
    }//fin método esRectangulo
}
?>