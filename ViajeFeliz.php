<?php

class ViajeFeliz {

    //Atributos de la clase
    private $codigo;
    private $destino;
    private $maxPasajeros;
    private $pasajeros;

    //Metodo constructor
    public function __construct($pCod, $pDestino, $pMaxPasajeros, $aPasajeros){
        $this->codigo = $pCod;
        $this->destino = $pDestino;
        $this->maxPasajeros = $pMaxPasajeros;
        $this->pasajeros = $aPasajeros;
    }

    //Metodos observadores

    /**
     * Metodo que retorna el codigo del vuelo
     * @return string
     */
    public function getCodigo(){
        return $this->codigo;
    }

    /**
     * Metodo que retorna el destino del vuelo
     * @return string
     */
    public function getDestino(){
        return $this->destino;
    }

    /**
     * Metodo que retorna el maximo de pasajeros del avion
     * @return int
     */
    public function getMaxPasajeros(){
        return $this->maxPasajeros;
    }

    /**
     * Metodo que retorna los pasajeros del vuelo
     * @return string
     */
    public function getPasajeros(){
        return $this->pasajeros;
    }

    //Metodos Modificadores
    //El codigo no se modifica ya que es la clave del vuelo

    /**
     * Metodo que modifica el destino del vuelo
     * @param string $pDestino
     */
    public function setDestino ($pDestino){
        $this->destino = $pDestino;
    }

    /**
     * Metodo que modifica el maximo de pasajeros del avion
     * @param int $pMax
     */
    public function setMaxPasajeros ($pMax){
        $this->maxPasajeros = $pMax;
    }

    /**
     * Metodo que modifica un pasajero en un asiento del avion
     * @param int $asientoPasajero
     */
    public function setPasajeros($aPasajeros){
        $this->pasajeros = $aPasajeros;
    }

    //Metodo toString

    public function __toString(){
        $cadena = "";
        for($i = 0; $i < count($this->pasajeros); $i++){
            $cadena = $cadena . "Pasajero en el asiento " . $i+1 . ": \nNombre: " . $this->pasajeros[$i]["nombre"] . " " . $this->pasajeros[$i]["apellido"] . ".\nDNI: " . $this->pasajeros[$i]["documento"] . ".\n";
        }
        return "\nVuelo " . $this->getCodigo() . ".\nDestino: " . $this->getDestino() . ".\nPasajeros:\n" . $cadena;
    }
}

?>