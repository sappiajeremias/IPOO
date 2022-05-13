<?php
include_once "ViajeFeliz.php";

class Terrestre extends Viaje
{
    private $comodidad;

    //Metodo Constructor

    public function __construct($pCod, $pDestino, $pMaxPasajeros, $aPasajeros, $pResponsableV, $pImporte, $pIdaYVuelta, $pComodidad)
    {
        parent::__construct($pCod, $pDestino, $pMaxPasajeros, $aPasajeros, $pResponsableV, $pImporte, $pIdaYVuelta);
        $this->comodidad = $pComodidad;
    }

    //Metodos de acceso

    //Metodos getters

    public function getComodidad()
    {
        return $this->comodidad;
    }

    //Metodos setters

    public function setComodidad($pComodidad)
    {
        $this->comodidad = $pComodidad;
    }

    //Metodo toString

    public function __toString()
    {
        $cadena = parent::__toString();
        return $cadena . "\nLa comodidad del viaje es: " . $this->getComodidad();
    }

    //Propios del tipo

    /**
    * Modulo que se encarga de vender un pasaje aéreo
    * @param Pasajero $pPasajero
    * @return double
    */
    public function venderPasaje($aPasajero)
    {
        $importe = $this->getImporte();
        if (($this->getComodidad() == "Coche Cama")) {
            if ($this->getIdaYVuelta()) {
                $importe = $importe * 1.25;
            } else {
                $importe = $importe * 1.75;
            }
        } elseif ($this->getIdaYVuelta()) {
            $importe = $importe * 1.50;
        }
    
        $pasajeros = $this->getPasajeros();
        $pasajeros[count($pasajeros)] = $aPasajero;
        $this->setPasajeros($pasajeros);

        return $importe;
    }
}
