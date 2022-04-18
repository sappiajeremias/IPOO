<?php 

//el número de empleado, número de licencia, nombre y apellido.

class ResponsableV {

    private $nroEmpleado;
    private $nroLicencia;
    private $nombre;
    private $apellido;

    //Metodo constructor

    public function __construct($pNroE, $pNroL, $pNombre, $pApellido){
        $this->nroEmpleado = $pNroE;
        $this->nroLicencia = $pNroL;
        $this->nombre = $pNombre;
        $this->apellido = $pApellido;
    }

    //Metodos observadores
    
    /**
     * Metodo que retorna el numero de empleado
     * @return int
     */
    public function getNroEmpleado (){
        return $this->nroEmpleado;
    }

    /**
     * Metodo que retorna el numero de licencia
     * @return int
     */
    public function getNroLicencia (){
        return $this->nroLicencia;
    }

    /**
     * Metodo que retorna el nombre
     * @return string
     */
    public function getNombre (){
        return $this->nombre;
    }

    /**
     * Metodo que retorna el numero de empleado
     * @return string
     */
    public function getApellido (){
        return $this->apellido;
    }

    //Metodos Modificadores

    /**
     * Metodo que modifica el numero de empleado
     * @param int $pNroE
     */
    public function setNroEmp ($pNroE){
        $this->nroEmpleado = $pNroE;
    }

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
}