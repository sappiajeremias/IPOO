<?php

include "ViajeTerrestre.php";
include "ViajeAereo.php";
include "Pasajero.php";
include "ResponsableV.php";

/**
 * Modulo para crear un viaje aereo hecho previamente
 * @return Aereo
 */
function crearPredeterminadoAereo()
{
    $colecPersonas[0] = new Pasajero("Jeremias", "Sappia", 4546454, 299654646);
    $colecPersonas[1] = new Pasajero("Lionel", "Messi", 2565655, 299456544);
    $colecPersonas[2] = new Pasajero("Julian", "Alvarez", 4245645, 2991123132);
    $colecPersonas[3] = new Pasajero("Gonzalo", "Montiel", 3824645, 297456465);
    $colecPersonas[4] = new Pasajero("Matias", "Suarez", 2402353, 294565623);
    $responsable = new ResponsableV(145, 456789787, "Lionel", "Scaloni");
    $vueloP = new Aereo(123, "Qatar", 50, $colecPersonas, $responsable, 12500, true, 44756, "Primera Clase", "Qatar Airways", 0);
    $vueloP->actualizarImporte();
    return $vueloP;
}

/**
 * Modulo para crear un viaje terrestre hecho previamente
 * @return Terrestre
 */
function crearPredeterminadoTerrestre()
{
    $colecPersonas[0] = new Pasajero("Jeremias", "Sappia", 4546454, 299654646);
    $colecPersonas[1] = new Pasajero("Lionel", "Messi", 2565655, 299456544);
    $colecPersonas[2] = new Pasajero("Julian", "Alvarez", 4245645, 2991123132);
    $colecPersonas[3] = new Pasajero("Gonzalo", "Montiel", 3824645, 297456465);
    $colecPersonas[4] = new Pasajero("Matias", "Suarez", 2402353, 294565623);
    $responsable = new ResponsableV(145, 456789787, "Lionel", "Scaloni");
    $viaje1T = new Terrestre(1234, "Rio de Janeiro", 45, $colecPersonas, $responsable, 10500, true, "Cama");
    $viaje1T->actualizarImporte();
    return $viaje1T;
}

/**
 * Modulo que se encarga de decidir que viaje crear predeterminado
 * @return ViajeFeliz
 */
function crearViajePre()
{
    echo "\nIngrese 'Aereo' o 'Terrestre' según corresponda: ";
    $tipo = trim(fgets(STDIN));
    if ($tipo == "Aereo") {
        $viaje1 = crearPredeterminadoAereo();
    } else {
        $viaje1 = crearPredeterminadoTerrestre();
    }
    $viaje1->actualizarImporte();
    return $viaje1;
}

/**
 * Modulo que se encarga de decidir que viaje crear
 * @return ViajeFeliz
 */
function crearViaje()
{
    echo "\nIngrese 'Aereo' o 'Terrestre' según corresponda: ";
    $tipo = trim(fgets(STDIN));
    if ($tipo == "Aereo") {
        $viaje1 = crearVueloNuevo();
    } else {
        $viaje1 = crearTerrestreNuevo();
    }
    return $viaje1;
}

/**
 * Modulo para crear un nuevo viaje aereo desde 0
 * @return Aereo
 */
function crearVueloNuevo()
{
    echo "\nIngrese el codigo del vuelo: ";
    $cod = trim(fgets(STDIN));
    echo "Luego, ingrese el destino del vuelo: ";
    $dest = trim(fgets(STDIN));
    echo "Ingrese la cantidad maxima de pasajeros del vuelo: ";
    $max = trim(fgets(STDIN));
    echo "Ingrese el importe del viaje: ";
    $pImporte = trim(fgets(STDIN));
    echo "Ingrese 'true'(Si el viaje es ida y vuelta), sino, ingrese 'false': ";
    $pIYV = trim(fgets(STDIN));
    echo "Ingrese 'Primera Clase' o 'Clase Turista': ";
    $pClase = trim(fgets(STDIN));
    echo "Ingrese el numero de vuelo: ";
    $pNroVuelo = trim(fgets(STDIN));
    echo "Ingrese el nombre de la aerolinea: ";
    $pNombre = trim(fgets(STDIN));
    echo "Ingrese la cantidad de escalas del vuelo: ";
    $pEscalas = trim(fgets(STDIN));

    $arregloPasajeros = [];
    $responsable = crearResponsable();

    
    $vuelo = new Aereo($cod, $dest, $max, $arregloPasajeros, $responsable, $pImporte, $pIYV, $pNroVuelo, $pClase, $pNombre, $pEscalas);
   

    return $vuelo;
}

/**
 * Modulo para crear un nuevo viaje terrestre desde 0
 * @return Terrestre
 */
function crearTerrestreNuevo()
{
    echo "\nIngrese el codigo del viaje: ";
    $cod = trim(fgets(STDIN));
    echo "Luego, ingrese el destino del viaje: ";
    $dest = trim(fgets(STDIN));
    echo "Ingrese la cantidad maxima de pasajeros del viaje: ";
    $max = trim(fgets(STDIN));
    echo "Ingrese el importe del viaje: ";
    $pImporte = trim(fgets(STDIN));
    echo "Ingrese 'true'(Si el viaje es ida y vuelta), sino, ingrese 'false': ";
    $pIYV = trim(fgets(STDIN));
    echo "Ingrese 'Coche Cama' o 'Semi Cama': ";
    $pClase = trim(fgets(STDIN));

    $arregloPasajeros = [];
    $responsable = crearResponsable();

    $terrestre = new Terrestre($cod, $dest, $max, $arregloPasajeros, $responsable, $pImporte, $pIYV, $pClase);
    
    return $terrestre;
}

/**
 * Modulo que crea un responsable para el vuelo
 * @return ResponsableV
 */
function crearResponsable()
{
    echo "\nPor favor ingrese el nombre del responsable del viaje: ";
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
            echo "\nSu cantidad de pasajeros no se encuentra entre la cantidad del viaje, intente de nuevo.";
        }
    }
    return $cantPasajeros;
}

/**
 * Modulo que verifica si se puede agregar un nuevo pasajero
 * @param VueloFeliz $vuelo
 * @return boolean
*/

function verificaVueloCompleto($vuelo)
{
    if (count($vuelo->getPasajeros()) == $vuelo->getMaxPasajeros()) {
        echo "\nEl viaje se encuentra completo, debe aumentar la cantidad maxima de pasajeros.";
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
        echo "\nIngrese la nueva cantidad maxima de pasajeros del viaje: ";
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
function modificarResponsable($vuelo)
{
    echo "\nPor favor ingrese el nombre del nuevo responsable del viaje: ";
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
 * Modulo que se encarga de crear y retornar un pasajero nuevo
 * @return Pasajero
 */
function crearPasajero()
{
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
    
    return $pasajeroNuevo;
}




/**
 * PROGRAMA PRINCIPAL
 */

//boolean $seguir
$seguir = true;

do {
    echo "\n*****************************************   MENU   *****************************************\n
    1. Crear viaje nuevo.\n
    2. Usar viaje con valores predeterminados.\n
    3. Vender pasajes.\n
    4. Modificar un pasajero del viaje.\n
    5. Mostrar los datos del viaje.\n
    6. Modificar los datos del viaje.\n
    7. Modificar el responsable del viaje. \n
    8. Salir.\n
    Opcion: ";
    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case 1:{
            $viaje1 = crearViaje();
            
            break;
        }
        case 2:{
            $viaje1 = crearViajePre();
            
            break;
        }
        case 3: {
            //Primero verificamos si el viaje se encuentra lleno
            if ($viaje1->hayPasajesDisponibles()) {
                //En caso de tener lugar, pedimos los datos del pasajero
                $pPasajero = crearPasajero();
                $viaje1->venderPasaje($pPasajero);
            }
            break;
        }
        case 4: {
            modificarPasajero($viaje1);
            break;
        }
        case 5: {
            echo $viaje1;
            break;
        }
        case 6: {
            $viaje1->actualizarDatos();
            break;
        }
        case 7:{
            modificarResponsable($viaje1);
            break;
        }
        case 8: {
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
