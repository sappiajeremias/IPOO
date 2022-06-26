<?php

include_once "Viaje.php";
include_once "Empresa.php";


//MENU
$emp = new Empresa();
$viaje = new Viaje();
$responsable = new Responsable();

$seguir = true;

while ($seguir) {
    echo ("\n*****************  MENU  *****************\n1. Crear empresa.\n2. Modificar empresa.\n3. Eliminar empresa.\n4. Crear Responsable.\n5. Modificar Responsable.\n6. Eliminar Responsable.\n7. Crear Viaje.\n8. Modificar Viaje.\n9. Eliminar Viaje.\n10. Mostrar Empresa.\n11. Mostrar Responsable.\n12. Mostrar Viaje.\n13. Salir.");
    echo("\nIngrese su operacion: ");
    $opciones = trim(fgets(STDIN));
    switch ($opciones) {
        case 1: {
            //CREACION DE EMPRESA
            crearEmpresa($emp);
            break;
        }
        case 2:{
            //MODIFICACION DE EMPRESA
            modificarEmpresa($emp);
            break;
        }
        case 3: {
            //ELIMINACION DE EMPRESA
            eliminarEmpresa($emp);
            break;
        }
        case 4: {
            //CREACION DE RESPONSABLE
            crearResponsable($responsable);
            break;
        }
        case 5: {
            //MODIFICACION DE RESPONSABLE
            modificarResponsable($responsable);
            break;
        }
        case 6: {
            //ELIMINACION DE RESPONSABLE
            eliminarResponsable($responsable);
            break;
        }
        case 7: {
            //CREACION DE VIAJE
            crearViaje($viaje, $responsable);
            break;
        }
        case 8: {
            //MODIFICACION DE VIAJE
            modificarViaje($viaje, $responsable);
            break;
        }
        case 9: {
            //ELIMINACION DE VIAJE
            eliminarViaje($viaje);
            break;
        }
        case 10:{
            //MOSTRAR EMPRESA
            mostrarEmpresa($emp);
            break;
        }
        case 11: {
            //MOSTRAR RESPONSABLE
            mostrarResponsable($responsable);
            break;
        }
        case 12: {
            //MOSTRAR VIAJE
            mostrarViaje($viaje);
            break;
        }
        case 13: {
            //SALIR DEL MENU
            echo("\nGracias por usar el servicio.");
            $seguir = false;
            break;
        }
        default: {
            echo("\nLa opcion ingresada no es correcta, intente de nuevo.");
            break;
        }
    }
}


function crearEmpresa($emp)
{
    
    echo("\nIngrese el nombre de la empresa: ");
    $nombEmp = trim(fgets(STDIN));
    echo("\nIngrese la direccion de la empresa: ");
    $direEmp = trim(fgets(STDIN));
    
    $emp->cargar(0, $nombEmp, $direEmp);
    $respuesta = $emp->insertar();
    
    if ($respuesta == true) {
        echo("\nLa empresa fue ingresada correctamente a la base.");
    } else {
        echo("\n" . $emp->getmensajeoperacion());
    }
}

function modificarEmpresa($emp)
{
    echo("\nSe modificara el nombre y la direccion de la empresa a: 'La pequeña empresa' y a 'Illia 1453' respectivamente.");
    $nuevoNomb = "La pequeña empresa";
    $nuevaDirec = "Illia 1453";
    $emp->setNombre($nuevoNomb);
    $emp->setDireccion($nuevaDirec);
    $respuesta = $emp->modificar();
    if ($respuesta == true) {
        echo("\nLa modificacion fue realizada correctamente.");
    } else {
        echo $emp->getmensajeoperacion();
    }
}

function eliminarEmpresa($emp)
{
    $respuesta = $emp->eliminar();
    if ($respuesta==true) {
        echo("\nLa eliminacion fue realizada correctamente.");
    } else {
        echo $emp->getmensajeoperacion();
    }
}

function mostrarEmpresa($emp)
{
    echo("\nIngrese el id de la empresa a mostrar: ");
    $id = trim(fgets(STDIN));
    $colEmpresas = $emp->listar('idempresa=' . $id);
    foreach ($colEmpresas as $em) {
        echo $em;
        echo " ----------- ";
    };
}

function crearResponsable($responsable)
{
    echo("\nIngrese el numero de licencia del responable: ");
    $lic = trim(fgets(STDIN));
    echo("\nIngrese el nombre del responsable: ");
    $nomb = trim(fgets(STDIN));
    echo("\nIngrese el apellido del responsable: ");
    $apellido = trim(fgets(STDIN));

    $responsable->cargar(0, $lic, $nomb, $apellido);
    $respuesta = $responsable->insertar();

    if ($respuesta == true) {
        echo("\nEl responsable se ingreso de manera correcta.");
    } else {
        echo $responsable->getmensajeoperacion();
    }
}

function modificarResponsable($responsable)
{
    echo("\nSe modificara el nombre y apellido del responsable a 'Juan Cruz' y su licencia a 909.");
    $responsable->setNombre("Juan");
    $responsable->setApellido("Cruz");
    $responsable->setNumeroL(909);
    $respuesta = $responsable->modificar();
    if ($respuesta == true) {
        echo("\nLa modificacion fue realizada correctamente.");
    } else {
        echo $responsable->getmensajeoperacion();
    }
}

function eliminarResponsable($responsable)
{
    $respuesta = $responsable->eliminar();
    if ($respuesta==true) {
        echo("\nLa eliminacion fue realizada correctamente.");
    } else {
        echo $responsable->getmensajeoperacion();
    }
}

function mostrarResponsable($responsable)
{
    echo("\nIngrese el numero de empleado del responsable a mostrar: ");
    $id = trim(fgets(STDIN));
    $colResponsable = $responsable->listar('rnumeroempleado=' . $id);
    foreach ($colResponsable as $res) {
        echo $res;
        echo " ----------- ";
    };
}

function crearViaje($viaje, $responsable)
{
    
    echo("\nIngrese el destino del viaje: ");
    $dest = trim(fgets(STDIN));
    echo("\nIngrese la cantidad max. de pasajeros: ");
    $max = trim(fgets(STDIN));
    echo("\nIngrese el id de la empresa: ");
    $idEmp = trim(fgets(STDIN));
    
    echo("\nIngrese el numero del empleado a asignar: ");
    $numEmp = trim(fgets(STDIN));
    $empleado = buscarRespAux($numEmp, $responsable);
    var_dump($empleado);
    echo("\nIngrese el importe del viaje: ");
    $import = trim(fgets(STDIN));
    echo("\nIngrese el tipo de asiento del viaje: ");
    $tipoAsiento = trim(fgets(STDIN));
    echo("\nIngrese si el viaje es ida y vuelta o solo ida: ");
    $ida = trim(fgets(STDIN));
    
    $viaje->cargar(0, $dest, $max, $import, $tipoAsiento, $ida, $empleado, $idEmp);
    var_dump($viaje);
    $respuesta = $viaje->insertar();
    
    if ($respuesta == true) {
        echo("\nEl viaje fue ingresada correctamente a la base.");
    } else {
        echo("\n" . $viaje->getmensajeoperacion());
    }
}

function buscarRespAux($id, $responsable){
    $nuevoResponsable = $responsable->listar('rnumeroempleado=' . $id);
    return $nuevoResponsable[0];
}

function modificarViaje($viaje, $responsable)
{
    echo("\nSe modificara el destino y el importe del viaje a 'Misiones' y 12500 respectivamente.");
    $viaje->setDestino("Misiones");
    $viaje->setImporte(12500);
    $respuesta = $viaje->modificar();
    if ($respuesta == true) {
        echo("\nLa modificacion fue realizada correctamente.");
    } else {
        echo $viaje->getmensajeoperacion();
    }
}

function eliminarViaje($viaje)
{
    $respuesta = $viaje->eliminar();
    if ($respuesta==true) {
        echo("\nLa eliminacion fue realizada correctamente.");
    } else {
        echo $viaje->getmensajeoperacion();
    }
}

function mostrarViaje($viaje)
{
    echo("\nIngrese el id del viaje a mostrar: ");
    $id = trim(fgets(STDIN));
    $colViajes = $viaje->listar('idviaje=' . $id);
    foreach ($colViajes as $via) {
        echo $via;
        echo " ----------- ";
    };
}

