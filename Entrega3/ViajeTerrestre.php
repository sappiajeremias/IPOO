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
        if (($this->getComodidad() == "Coche Cama")) {
            if ($this->getIdaYVuelta()) {
                $importe = $importe * 1.75;
            } else {
                $importe = $importe * 1.25;
            }
        } elseif ($this->getIdaYVuelta()) {
            $importe = $importe * 1.50;
        }

        echo "\nEl importe final del pasaje es " . $importe ;
        $this->setImporte($importe);
    }

    /**
    * Modulo que se encarga de actualizar los datos del vuelo
    * @param Terrestre $pViaje
    */
    public function actualizarDatos($pViaje)
    {
        echo "Luego, ingrese el destino del vuelo: ";
        $dest = trim(fgets(STDIN));
        echo "Ingrese la cantidad maxima de pasajeros del vuelo: ";
        $max = trim(fgets(STDIN));
        echo "Ingrese el importe del viaje: ";
        $pImporte = trim(fgets(STDIN));
        echo "Ingrese 'true'(Si el viaje es ida y vuelta), sino, ingrese 'false': ";
        $pIYV = trim(fgets(STDIN));
        echo "Ingrese 'Coche Cama' o 'Semi Cama': ";
        $pComodidad = trim(fgets(STDIN));
        
        $this->setDestino($dest);
        $this->setMaxPasajeros($max);
        $this->actualizarImporte();
        $this->setIdaYV($pIYV);
        $this->setComodidad($pComodidad);
        
    }
}
