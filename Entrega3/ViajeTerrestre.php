<?php
include "ViajeFeliz.php";

class Terrestre extends ViajeFeliz
{
    private $comodidad;

    //Metodo Constructor

    public function __construct($pCod, $pDestino, $pMaxPasajeros, $aPasajeros, $pResponsableV, $pImporte, $pIdaYVuelta, $pComodidad){
        parent::__construct($pCod, $pDestino, $pMaxPasajeros, $aPasajeros, $pResponsableV, $pImporte, $pIdaYVuelta);
        $this->comodidad = $pComodidad;
    }

    //Metodos de acceso

    //Metodos getters

    public function getComodidad(){
        return $this->comodidad;
    }

    //Metodos setters 

    public function setComodidad($pComodidad){
        $this->comodidad = $pComodidad;
    }

    //Metodo toString

    public function __toString()
    {
        $cadena = parent::__toString();
        return $cadena . "\nLa comodidad del viaje es: " . $this->getComodidad();
    }
}
