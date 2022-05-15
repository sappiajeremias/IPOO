<?php
include_once "ViajeFeliz.php";

class Aereo extends Viaje
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

    public function getNroVuelo()
    {
        return $this->nroVuelo;
    }

    public function getCategoriaAsiento()
    {
        return $this->categoriaAsiento;
    }

    public function getNombreAero()
    {
        return $this->nombreAerolinea;
    }

    public function getEscalas()
    {
        return $this->escalas;
    }

    //Metodos setters

    public function setNroVuelo($pNro)
    {
        $this->nroVuelo = $pNro;
    }

    public function setCategoria($pCategoria)
    {
        $this->categoriaAsiento = $pCategoria;
    }

    public function setNombreAero($pNombre)
    {
        $this->nombreAerolinea = $pNombre;
    }

    public function setEscalas($pEscalas)
    {
        $this->escalas = $pEscalas;
    }

    //Metodo toString

    public function __toString()
    {
        $cadena = parent::__toString();
        return "El numero del vuelo es: " . $this->getNroVuelo . ".\nLa categoria del asiento es: " . $this->getCategoriaAsiento() . ".\nAerolinea " . $this->getNombreAero() . ".\nEscalas: " . $this->getEscalas() . ".\n" . $cadena;
    }

    //Propios del tipo

    /**
    * Modulo que se encarga de vender un pasaje aéreo
    * @param Pasajero $pPasajero
    * @return double
    */
    public function venderPasaje($aPasajero)
    {
        echo "\nEl importe final del viaje es de: " . $this->getImporte() . ".\n";

        $pasajeros = $this->getPasajeros();
        $pasajeros[count($pasajeros)] = $aPasajero;
        $this->setPasajeros($pasajeros);

        return $this->getImporte();
    }

    /**
     * Modulo que se encarga de actualizar el precio del viaje
     */
    public function actualizarImporte()
    {
        $importe = $this->getImporte();
        if (($this->getCategoriaAsiento() == "Primera Clase") && $this->getEscalas() == 0) {
            if ($this->getIdaYVuelta()) {
                $importe = $importe * 1.90;
            } else {
                $importe = $importe * 1.40;
            }
        } elseif (($this->getCategoriaAsiento() == "Primera Clase") && $this->getEscalas() != 0) {
            if ($this->getIdaYVuelta()) {
                $importe = $importe * 2.10;
            } else {
                $importe = $importe * 1.60;
            }
        } elseif (($this->getCategoriaAsiento() == "Clase Turista") && $this->getIdaYVuelta()) {
            $importe = $importe * 1.50;
        }
    
        echo "\nEl importe final del pasaje es " . $importe ;

        $this->setImporte($importe);
    }
}
