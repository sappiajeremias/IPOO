<?php
include "ViajeFeliz.php";

class Aereo extends ViajeFeliz
{
    private $nroVuelo;
    private $categoriaAsiento;
    private $nombreAerolinea;
    private $escalas;

    //Metodo constructor

    public function __construct($pCod, $pDestino, $pMaxPasajeros, $aPasajeros, $pResponsableV, $pImporte, $pIdaYVuelta, $pNroVuelo, $pCatAsiento, $pNombreAerolineas, $pEscalas)
    {
        parent::__construct($pCod, $pDestino, $pMaxPasajeros, $aPasajeros, $pResponsableV, $pImporte, $pIdaYVuelta);

        $this->nroVuelo = $pNroVuelo;
        $this->categoriaAsiento = $pCatAsiento;
        $this->nombreAerolinea = $pNombreAerolineas;
        $this->escalas = $pEscalas;
    }

    //Metodos de acceso

    //Metodos getters

    public function getNroVuelo(){
        return $this->nroVuelo;
    }

    public function getCategoriaAsiento(){
        return $this->categoriaAsiento;
    }

    public function getNombreAero(){
        return $this->nombreAerolinea;
    }

    public function getEscalas(){
        return $this->escalas;
    }

    //Metodos setters

    public function setNroVuelo($pNro){
        $this->nroVuelo = $pNro;
    }

    public function setCategoria($pCategoria){
        $this->categoriaAsiento = $pCategoria;
    }

    public function setNombreAero($pNombre){
        $this->nombreAerolinea = $pNombre;
    }

    public function setEscalas($pEscalas){
        $this->escalas = $pEscalas;
    }

    //Metodo toString

    public function __toString(){
        $cadena = parent::__toString();
        return "El numero del vuelo es: " . $this->getNroVuelo . ".\nLa categoria del asiento es: " . $this->getCategoriaAsiento() . ".\nAerolinea " . $this->getNombreAero() . ".\nEscalas: " . $this->getEscalas() . ".\n" . $cadena;
    }
}