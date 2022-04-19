<?php
include "ViajeFeliz.php";
include "Pasajero.php";
include "ResponsableV.php";

/**
 * Modulo para crear un nuevo viaje desde 0
 * @return ViajeFeliz
 */
function crearVueloNuevo()
{
    echo "\nIngrese el codigo del vuelo: ";
    $cod = trim(fgets(STDIN));
    echo "Luego, ingrese el destino del vuelo: ";
    $dest = trim(fgets(STDIN));
    echo "Ingrese la cantidad maxima de pasajeros del vuelo: ";
    $max = trim(fgets(STDIN));
    $arregloPasajeros = crearArregloPasajeros($max);
    $responsable = crearResponsable();
    $vuelo = new ViajeFeliz($cod, $dest, $max, $arregloPasajeros, $responsable);
    return $vuelo;
}

/**
 * Modulo que crea y retorna un arreglo de pasajeros
 * @param int $maximo
 * @return array
 */
function crearArregloPasajeros($maximo)
{
    $cant = verificarNumero($maximo);
    for ($i = 0; $i < $cant; $i++) {
        echo "\nIngrese el nombre del pasajero en el asiento " . $i+1 . ": ";
        $pNombre = trim(fgets(STDIN));
        echo "Ingrese el apellido del pasajero en el asiento " . $i+1 . ": ";
        $pApellido = trim(fgets(STDIN));
        echo "Ingrese el documento del pasajero en el asiento " . $i+1 . ": ";
        $pDocumento = trim(fgets(STDIN));
        echo "Ingrese el telefono del pasajero en el asiento " . $i+1 . ": ";
        $pTelefono = trim(fgets(STDIN));

        //Asignamos los datos al asiento ingresado por parametro
        $pasajeroNuevo = new Pasajero($pNombre, $pApellido, $pDocumento, $pTelefono);
        $arregloPasajeros[$i] = $pasajeroNuevo;
    }
    return $arregloPasajeros;
}

/**
 * Modulo que crea un responsable para el vuelo
 * @return ResponsableV
 */
function crearResponsable()
{
    echo "\nPor favor ingrese el nombre del responsable del vuelo: ";
    $pNombre = trim(fgets(STDIN));
    echo "Luego, ingrese su apellido: ";
    $pApellido = trim(fgets(STDIN));
    echo "Ahora ingrese el numero de licencia: ";
    $pNroLic = trim(fgets(STDIN));
    echo "Y por ultimo, ingrese el numero de empleado: ";
    $pNroEmp = trim(fgets(STDIN));
    $pResponsable = new ResponsableV($pNroEmp, $pNroLic, $pNombre, $pApellido);
    return $pResponsable;
}

/**
 * Modulo que verifica que la cantidad ingresada sea correcta
 * @param int $max
 * @return int
 */
function verificarNumero($max)
{
    //boolean $seguir
    $seguir = true;
    while ($seguir) {
        echo "\nIngrese la cantidad de pasajeros: ";
        $cantPasajeros = trim(fgets(STDIN));
        if ($cantPasajeros > 0 && $cantPasajeros <= $max) {
            $seguir = false;
        } else {
            echo "\nSu cantidad de pasajeros no se encuentra entre la cantidad del vuelo, intente de nuevo.";
        }
    }
    return $cantPasajeros;
}

/**
 * Modulo que agrega un nuevo pasajero al vuelo
 * @param VueloFeliz $vuelo
 */
function agregarPasajero($vuelo)
{
    if (verificaVueloCompleto($vuelo)) {
        $pasajeros = $vuelo->getPasajeros();
    
        //Pedimos los datos del nuevo pasajero
        echo "\nIngrese el nombre del nuevo pasajero: ";
        $pNombre = trim(fgets(STDIN));
        echo "Luego ingrese el apellido: " ;
        $pApellido = trim(fgets(STDIN));
        echo "Ahora, ingrese el documento: ";
        $pDocumento = trim(fgets(STDIN));
        echo "Por ultimo, ingrese el telefono del pasajero: ";
        $pTelefono = trim(fgets(STDIN));

        //Asignamos los datos al ultimo asiento
        $pasajeroNuevo = new Pasajero($pNombre, $pApellido, $pDocumento, $pTelefono);
        $pasajeros[count($pasajeros)] = $pasajeroNuevo;

        //Devolvemos el arreglo a la clase para que lo modifique
        $vuelo->setPasajeros($pasajeros);
    }
}

/**
 * Modulo que verifica si se puede agregar un nuevo pasajero
 * @param VueloFeliz $vuelo
 * @return boolean
 */
function verificaVueloCompleto($vuelo)
{
    if (count($vuelo->getPasajeros()) == $vuelo->getMaxPasajeros()) {
        echo "\nEl vuelo se encuentra completo, debe aumentar la cantidad maxima de pasajeros.";
        $verif = false;
    } else {
        $verif = true;
    }
    return $verif;
}

/**
 * Modulo que pide el arreglo de pasajeros y modifica los datos de uno de ellos
 * @param VueloFeliz $vuelo
 */
function modificarPasajero($vuelo)
{
    $pasajeros = $vuelo->getPasajeros();
    $asiento = verificarAsientoMod($vuelo);
    //Pedimos los datos del nuevo pasajero
    echo "\nIngrese el nombre del nuevo pasajero: ";
    $pNombre = trim(fgets(STDIN));
    echo "Luego ingrese el apellido: ";
    $pApellido = trim(fgets(STDIN));
    echo "Ahora, ingrese el documento: ";
    $pDocumento = trim(fgets(STDIN));
    echo "Por ultimo, ingrese el telefono: ";
    $pTelefono = trim(fgets(STDIN));

    //Asignamos los datos al asiento ingresado por parametro
    $pasajeroNuevo = new Pasajero($pNombre, $pApellido, $pDocumento, $pTelefono);
    $pasajeros[$asiento - 1] = $pasajeroNuevo;
    //Devolvemos el arreglo a la clase para que lo modifique
    $vuelo->setPasajeros($pasajeros);
}

/**
 * Modulo que verifica que el asiento ingresado se encuentre dentro del maximo de pasajeros y retorna el asiento correcto
 * @param VueloFeliz $vuelo
 * @return int
 */
function verificarAsientoMod($vuelo)
{
    //boolean $seguir
    $seguir = true;
    while ($seguir) {
        echo "\nPor favor ingrese el asiento a modificar: ";
        $asiento = trim(fgets(STDIN));
        if ($asiento <= count($vuelo->getPasajeros()) && $asiento > 0) {
            $seguir = false;
        } else {
            echo "\nEl numero ingresado no existe entre los asientos del avion, intente de nuevo.";
        }
    }
    return $asiento;
}

/**
 * Modulo que modifica que la nueva cantidad maxima de pasajeros sea correcta, es decir, mayor que la cantidad de pasajeros actual
 * @param VueloFeliz $vuelo
 * @return int
 */
function verificarNuevoMax($vuelo)
{
    //boolean $seguir
    $seguir = true;
    while ($seguir) {
        echo "\nIngrese la nueva cantidad maxima de pasajeros del vuelo: ";
        $nuevoMax = trim(fgets(STDIN));
        if ($nuevoMax >= count($vuelo->getPasajeros())) {
            $seguir = false;
        } else {
            echo "\nEl numero ingresado no es posible, intente de nuevo.";
        }
    }
    return $nuevoMax;
}

/**
 * Modulo que crea un nuevo responsable y modifica al del vuelo
 * @param ViajeFeliz $vuelo
 */
function modificarResponsable ($vuelo){
    echo "\nPor favor ingrese el nombre del nuevo responsable del vuelo: ";
    $pNombre = trim(fgets(STDIN));
    echo "Luego, ingrese su apellido: ";
    $pApellido = trim(fgets(STDIN));
    echo "Ahora ingrese el numero de licencia: ";
    $pNroLic = trim(fgets(STDIN));
    echo "Y por ultimo, ingrese el numero de empleado: ";
    $pNroEmp = trim(fgets(STDIN));
    $pResponsable = new ResponsableV($pNroEmp, $pNroLic, $pNombre, $pApellido);

    $vuelo->setResponsable($pResponsable);
}


/**
 * PROGRAMA PRINCIPAL
 */

$vuelo = crearVueloNuevo();
//boolean $seguir
$seguir = true;

do {
    echo "\n*****************************************   MENU   *****************************************\n
    1. Agregar un pasajero.\n
    2. Modificar un pasajero del vuelo.\n
    3. Mostrar los datos del vuelo.\n
    4. Modificar el destino del vuelo.\n
    5. Modificar la cantidad maxima de pasajeros.\n
    6. Modificar el responsable del vuelo. \n
    7. Salir.\n
    Opcion: ";
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1: {
            agregarPasajero($vuelo);
            break;
        }
        case 2: {
            modificarPasajero($vuelo);
            break;
        }
        case 3: {
            echo $vuelo;
            break;
        }
        case 4: {
            echo "\nIngrese el nuevo destino del vuelo: ";
            $nuevoDest = trim(fgets(STDIN));
            $vuelo->setDestino($nuevoDest);
            break;
        }
        case 5: {
            $nuevoMax = verificarNuevoMax($vuelo);
            $vuelo->setMaxPasajeros($nuevoMax);
            break;
        }
        case 6:{
            modificarResponsable($vuelo);
            break;
        }
        case 7: {
            echo "\nGracias por usar nuestro servicio!\n";
            $seguir = false;
            break;
        }
        default: {
            echo "\nLa opcion ingresada no existe, intente de nuevo.";
            break;
        }
    }
} while ($seguir);
