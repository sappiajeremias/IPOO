<?php
include "ViajeFeliz.php";

/**
 * Modulo que crea y retorna un arreglo predeterminado de siete pasajeros
 * @return array
 */
function crearArreglo()
{
    //array $arregloPasajeros
    $arregloPasajeros[0] = ["nombre" => "Jeremias", "apellido" => "Sappia", "documento" => 41978161];
    $arregloPasajeros[1] = ["nombre" => "Lionel", "apellido" => "Messi", "documento" => 34457214];
    $arregloPasajeros[2] = ["nombre" => "Julian", "apellido" => "Alvarez", "documento" => 41754240];
    $arregloPasajeros[3] = ["nombre" => "Gonzalo", "apellido" => "Montiel", "documento" => 39457210];
    $arregloPasajeros[4] = ["nombre" => "Cristian", "apellido" => "Romero", "documento" => 36541721];
    $arregloPasajeros[5] = ["nombre" => "Rodrigo", "apellido" => "De Paul", "documento" => 33142678];
    $arregloPasajeros[6] = ["nombre" => "Franco", "apellido" => "Armani", "documento" => 29634578];
    return $arregloPasajeros;
}

/**
 * Modulo que pide el arreglo de pasajeros y modifica los datos de uno de ellos
 * @param VueloFeliz $vuelo
 */
function cambiarPasajero($vuelo)
{
    $pasajerosNuevo = $vuelo->getPasajeros();
    $asiento = verificarAsiento($vuelo);
    //Pedimos los datos del nuevo pasajero
    echo "\nIngrese el nombre del nuevo pasajero: ";
    $pNombre = trim(fgets(STDIN));
    echo "Luego ingrese el apellido: " ;
    $pApellido = trim(fgets(STDIN));
    echo "Por ultimo, ingrese el documento: ";
    $pDocumento = trim(fgets(STDIN));

    //Asignamos los datos al asiento ingresado por parametro
    $pasajerosNuevo[$asiento - 1]["nombre"] = $pNombre;
    $pasajerosNuevo[$asiento - 1]["apellido"] = $pApellido;
    $pasajerosNuevo[$asiento - 1]["documento"] = $pDocumento;

    //Devolvemos el arreglo a la clase para que lo modifique
    $vuelo->setPasajeros($pasajerosNuevo);
}

/**
 * Modulo que verifica que el asiento ingresado se encuentre dentro del maximo de pasajeros
 * @param VueloFeliz $vuelo
 * @return int
 */
function verificarAsiento($vuelo)
{
    //boolean $seguir
    $seguir = true;
    while($seguir){
        echo "\nPor favor ingrese el asiento a modificar: ";
        $asiento = trim(fgets(STDIN));
        if ($asiento <= $vuelo->getMaxPasajeros() && $asiento > 0){
            $seguir = false;
        } else {
            echo "\nEl numero ingresado no existe entre los asientos del avion, intente de nuevo.";
        }
    }
    return $asiento;
}

$jugadoresAfa = crearArreglo();
$vueloAfa = new ViajeFeliz("AC25432DX", "Qatar", 15, $jugadoresAfa);

echo $vueloAfa;

//Cambiar pasajero del asiento 4
cambiarPasajero($vueloAfa);

echo $vueloAfa; // Devuelve el arreglo con distinto pasajero del asiento 4
