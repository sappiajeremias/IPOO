<?php

class ViajeFeliz
{

    //Atributos de la clase
    private $codigo;
    private $destino;
    private $maxPasajeros;
    private $pasajeros;
    private $responsableV;

    //Metodo constructor
    public function __construct($pCod, $pDestino, $pMaxPasajeros, $aPasajeros, $pResponsableV)
    {
        $this->codigo = $pCod;
        $this->destino = $pDestino;
        $this->maxPasajeros = $pMaxPasajeros;
        $this->pasajeros = $aPasajeros;
        $this->responsableV = $pResponsableV;
    }

    //Metodos observadores

    /**
     * Metodo que retorna el codigo del vuelo
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Metodo que retorna el destino del vuelo
     * @return string
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * Metodo que retorna el maximo de pasajeros del avion
     * @return int
     */
    public function getMaxPasajeros()
    {
        return $this->maxPasajeros;
    }

    /**
     * Metodo que retorna la coleccion de los pasajeros del vuelo
     * @return array
     */
    public function getPasajeros()
    {
        return $this->pasajeros;
    }

    /**
     * Metodo que retorna el responsable del vuelo
     * @return object
     */
    public function getResponsableV()
    {
        return $this->responsableV;
    }

    //Metodos Modificadores
    //El codigo no se modifica ya que es la clave del vuelo

    /**
     * Metodo que modifica el destino del vuelo
     * @param string $pDestino
     */
    public function setDestino($pDestino)
    {
        $this->destino = $pDestino;
    }

    /**
     * Metodo que modifica el maximo de pasajeros del avion
     * @param int $pMax
     */
    public function setMaxPasajeros($pMax)
    {
        $this->maxPasajeros = $pMax;
    }

    /**
     * Metodo que modifica el arreglo de los pasajeros del avion
     * @param array $asientoPasajero
     */
    public function setPasajeros($aPasajeros)
    {
        $this->pasajeros = $aPasajeros;
    }

    /**
     * Metodo que modifica al responsable del vuelo
     * @param ResponsableV $pResp
     */
    public function setResponsable($pResponsable){
        $this->responsableV = $pResponsable;
    }

    //Metodo toString

    public function __toString()
    {
        $cadena = "";
        for ($i = 0; $i < count($this->pasajeros); $i++) {
            $cadena = $cadena . "Pasajero en el asiento " . $i+1 . ": \nNombre: " . $this->pasajeros[$i]->getNombre() . " " . $this->pasajeros[$i]->getApellido(). ".\nDNI: " . $this->pasajeros[$i]->getDni() . ".\nTelefono: " . $this->pasajeros[$i]->getTelefono() . ".\n";
        }
        return "\nVuelo " . $this->getCodigo() . ".\nDestino: " . $this->getDestino() . "\nCantidad maxima de pasajeros: " . $this->getMaxPasajeros() . ".\nResponsable del vuelo: " . $this->getResponsableV() . "\nPasajeros:\n" . $cadena;
    }
}
