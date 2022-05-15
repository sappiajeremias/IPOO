<?php

class Viaje
{

    //Atributos de la clase
    private $codigo;
    private $destino;
    private $maxPasajeros;
    private $pasajeros;
    private $responsableV;
    private $importe;
    private $idaYVuelta;

    //Metodo constructor
    public function __construct($pCod, $pDestino, $pMaxPasajeros, $aPasajeros, $pResponsableV, $pImporte, $pIdaYVuelta)
    {
        $this->codigo = $pCod;
        $this->destino = $pDestino;
        $this->maxPasajeros = $pMaxPasajeros;
        $this->pasajeros = $aPasajeros;
        $this->responsableV = $pResponsableV;
        $this->importe = $pImporte;
        $this->idaYVuelta = $pIdaYVuelta;
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

    /**
     * Metodo que retorna el importe del viaje
     * @return double
     */
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Metodo que retorna si el viaje es ida y vuelta
     * @return boolean
     */
    public function getIdaYVuelta()
    {
        return $this->idaYVuelta;
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
    public function setResponsable($pResponsable)
    {
        $this->responsableV = $pResponsable;
    }

    /**
     * Metodo que modifica el importe
     * @param double $pImporte
     */
    public function setImporte($pImporte)
    {
        $this->importe = $pImporte;
    }

    /**
     * Metodo que modifica si el viaje es ida y vuelta
     * @param boolean $pIdaYVuelta
     */
    public function setIdaYV($pIdaYVuelta)
    {
        $this->idaYVuelta = $pIdaYVuelta;
    }

    //Metodo toString

    public function __toString()
    {
        $cadena = "";
        for ($i = 0; $i < count($this->pasajeros); $i++) {
            $cadena = $cadena . "Pasajero en el asiento " . $i+1 . ": \nNombre: " . $this->pasajeros[$i]->getNombre() . " " . $this->pasajeros[$i]->getApellido(). ".\nDNI: " . $this->pasajeros[$i]->getDni() . ".\nTelefono: " . $this->pasajeros[$i]->getTelefono() . ".\n";
        }
        if ($this->getIdaYVuelta() == true) {
            return "\nVuelo " . $this->getCodigo() . ".\nDestino: " . $this->getDestino() . "\nCantidad maxima de pasajeros: " . $this->getMaxPasajeros() . ".\nResponsable del vuelo: " . $this->getResponsableV() . ".\nEl importe del viaje es de: " . $this->getImporte() . ".\nEl viaje es de ida y vuelta.\n Pasajeros:\n" . $cadena;
        } else {
            return "\nVuelo " . $this->getCodigo() . ".\nDestino: " . $this->getDestino() . "\nCantidad maxima de pasajeros: " . $this->getMaxPasajeros() . ".\nResponsable del vuelo: " . $this->getResponsableV() . ".\nEl importe del viaje es de: " . $this->getImporte() . ".\nEl viaje es solo de ida.\n Pasajeros:\n" . $cadena;
        }
    }

    //Metodos propios

    /**
    * Modulo que verifica si se puede agregar un nuevo pasajero
    * @return boolean
    */
    public function hayPasajesDisponibles()
    {
        if (count($this->getPasajeros()) < $this->getMaxPasajeros()) {
            $verif = true;
            echo "\nQuedan " . ( $this->getMaxPasajeros() - count($this->getPasajeros()) ) . " asientos disponibles.";
        } else {
            echo "\nEl vuelo se encuentra lleno.";
            $verif = false;
        }
        return $verif;
    }




}
