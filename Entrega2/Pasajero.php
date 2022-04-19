<?php

/*
Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje. 
Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.*/


class Pasajero {

    //Atributos de la clase
    private $nombre;
    private $apellido;
    private $dni;
    private $telefono;

    //Metodo constructor
    public function __construct($pNombre, $pApellido, $pDni, $pTelefono){
        $this->nombre = $pNombre;
        $this->apellido = $pApellido;
        $this->dni = $pDni;
        $this->telefono = $pTelefono;
    }

    //Metodos observadores

    /**
     * Metodo que retorna el nombre
     * @return string
     */
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * Metodo que retorna el apellido
     * @return string
     */
    public function getApellido (){
        return $this->apellido;
    }

    /**
     * Metodo que retorna el dni
     * @return int
     */
    public function getDni(){
        return $this->dni;
    }

    /**
     * Metodo que retorna el telefono
     * @return int
     */
    public function getTelefono(){
        return $this->telefono;
    }

    //Metodos modificadores

    /**
     * Metodo que modifica el nombre
     * @param string $pNombre
     */
    public function setNombre($pNombre){
        $this->nombre = $pNombre;
    }

    /**
     * Metodo que modifica el apellido
     * @param string $pApellido
     */
    public function setApellido($pApellido){
        $this->nombre = $pApellido;
    }

    /**
     * Metodo que modifica el dni en caso de ser mal ingresado
     * @param int $pDni
     */
    public function setDni ($pDni) {
        $this->dni = $pDni;
    }

    /**
     * Metodo que modifica el telefono
     * @param int $pTelefono
     */
    public function setTelefono($pTelefono){
        $this->telefono = $pTelefono;
    }

    //Metodo toString

    public function __toString(){
        return "\nNombre y apellido: " . $this->getNombre() . " " . $this->getApellido() . ".\nDNI: " . $this->getDni() . ".\nTelefono: " . $this->telefono . ".\n";
    }
}