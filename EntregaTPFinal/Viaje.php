<?php

include_once "BaseDatos.php";
include "Responsable.php";
include "Pasajero.php";

class Viaje{

    private $idviaje;
    private $vdestino;
    private $vcantmaxpasajeros;
    private $colpasajeros;
    private $vimporte;
    private $tipoAsiento;
    private $idayvuelta;
    private $vresponsable;
    private $mensajeoperacion;

    public function __construct(){
        $this->idviaje="";
        $this->vdestino="";
        $this->vcantmaxpasajeros="";
        $this->colpasajeros="";
        $this->vimporte="";
        $this->tipoAsiento="";
        $this->idayvuelta="";
        $this->vresponsable="";
    }

    public function cargar($pid, $pdestino, $pcantidad, $pcol, $pimporte, $pasiento, $pidayvuelta, $presp){
        $this->setID($pid);
        $this->setDestino($pdestino);
        $this->setCantidad($pcantidad);
        $this->setColeccion($pcol);
        $this->setImporte($pimporte);
        $this->setAsiento($pasiento);
        $this->setIdaYVuelta($pidayvuelta);
        $this->setResponsable($presp);
    }

    public function getID(){
        return $this->idviaje;
    }

    public function getDestino(){
        return $this->vdestino;
    }

    public function getCantidad(){
        return $this->vcantmaxpasajeros;
    }

    public function getColeccion(){
        return $this->colpasajeros;
    }

    public function getImporte(){
        return $this->vimporte;
    }

    public function getAsiento(){
        return $this->tipoAsiento;
    }

    public function getIdaYVuelta(){
        return $this->idayvuelta;
    }

    public function getMensajeOperacion(){
        return $this->mensajeoperacion;
    }

    public function getResponsable(){
        return $this->vresponsable;
    }

    public function setID($pid){
        $this->idviaje = $pid;
    }

    public function setDestino($pdest){
        $this->vdestino = $pdest;
    }

    public function setCantidad($pcant){
        $this->vcantmaxpasajeros = $pcant;
    }

    public function setColeccion($pcol){
        $this->colpasajeros = $pcol;
    }

    public function setImporte($pimp){
        $this->vimporte = $pimp;
    }

    public function setAsiento($pasiento){
        $this->tipoAsiento = $pasiento;
    }

    public function setIdaYVuelta($piyv){
        $this->idayvuelta = $piyv;
    }

    public function setmensajeoperacion($pmensaje){
        $this->mensajeoperacion = $pmensaje;
    }

    public function setResponsable($presp){
        $this->vresponsable = $presp;
    }



    public function __toString(){
        $cadena = "";
        $colpasajeros = $this->getColeccion();
        foreach($colpasajeros as $pasajero){
            $cadena .= "\n" . $pasajero;
        }
        return "\nID Viaje: " . $this->getID() . ".\nDestino: " . $this->getDestino() . ".\nCantidad Maxima: " . $this->getCantidad() . ".\nImporte: " . $this->getImporte() . ".\nTipo de asiento: " . $this->getAsiento() . ".\nIda y Vuelta: " . $this->getIdaYVuelta() . ".\nResponsable: " . $this->getResponsable() . ".\nPasajeros: \n" . $cadena;
    }
}