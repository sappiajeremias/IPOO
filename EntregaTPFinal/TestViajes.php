<?php

include_once "Viaje.php";
include_once "Empresa.php";
include_once "Pasajero.php";
include_once "Responsable.php";

//MENU
$emp = new Empresa();
$viaje = new Viaje();
$responsable = new Responsable();
$pas = new Pasajero();




$seguir = true;

while ($seguir) {
    echo("\n*****************  MENU  *****************\n1. Crear empresa.\n2. Modificar empresa.\n3. Eliminar empresa.\n4. Crear Responsable.\n5. Modificar Responsable.\n6. Eliminar Responsable.\n7. Crear Viaje.\n8. Modificar Viaje.\n9. Eliminar Viaje.\n10. Crear Pasajero.\n11. Modificar Pasajero.\n12. Eliminar Pasajero.\n13. Mostrar Empresa.\n14. Mostrar Responsable.\n15. Mostrar Viaje.\n16. Mostrar Pasajero por DNI.\n17. Mostrar Pasajeros por ID del viaje.\n18. Salir.");
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
            if (verifEmp() && verifResp()) {
                crearViaje($viaje);
            } else {
                echo("\nEl viaje no se puede crear porque no existe la empresa o el responsable.");
            }
            break;
        }
        case 8: {
            //MODIFICACION DE VIAJE
            modificarViaje($viaje);
            break;
        }
        case 9: {
            //ELIMINACION DE VIAJE
            eliminarViaje($viaje);
            break;
        }
        case 10: {
            //CREACION DE PASAJERO
            if (verifVia()) {
                crearPasajero($pas);
            } else {
                echo ("\nEl pasajero no se pudo cargar porque no existe un viaje.");
            }   
            break;
        }
        case 11: {
            //MODIFICACION DE PASAJERO
            modificarPasajero($pas);
            break;
        }
        case 12: {
            //ELIMINACION DE PASAJERO
            eliminarPasajero($pas);
            break;
        }
        case 13:{
            //MOSTRAR EMPRESA
            mostrarEmpresa($emp);
            break;
        }
        case 14: {
            //MOSTRAR RESPONSABLE
            mostrarResponsable($responsable);
            break;
        }
        case 15: {
            //MOSTRAR VIAJE
            mostrarViaje($viaje);
            break;
        }
        case 16: {
            //MOSTRAR EL PASAJERO POR DNI
            mostrarPasajeroDni($pas);
            break;
        }
        case 17: {
            //MOSTRAR COLECCION DE PASAJEROS POR ID DEL VIAJE
            mostrarPasajerosId($pas);
            break;
        }
        case 18: {
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

function verifEmp(){
    $emp = new Empresa();
    $emp = $emp->listar();
    if($emp==null){
        return false;
    } else{
        return true;
    }
}

function verifResp(){
    $res = new Responsable();
    $res = $res->listar();
    if($res==null){
        return false;
    } else{
        return true;
    }
}

function verifVia(){
    $via = new Viaje();
    $via = $via->listar();
    if($via==null){
        return false;
    } else{
        return true;
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
    return $respuesta;
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
    echo("\nIngrese el id de la empresa a eliminar: ");
    $pID = trim(fgets(STDIN));
    $emp->buscar($pID);
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
    return $respuesta;
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
    echo("\nPor favor ingrese el numero de empleado del responsable a eliminar: ");
    $pNro = trim(fgets(STDIN));
    $responsable->buscar($pNro);
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

function crearViaje($viaje)
{
    echo("\nIngrese el destino del viaje: ");
    $dest = trim(fgets(STDIN));
    echo("\nIngrese la cantidad max. de pasajeros: ");
    $max = trim(fgets(STDIN));
    echo("\nIngrese el id de la empresa: ");
    $idEmp = trim(fgets(STDIN));
    $empresa = buscarEmpresaAux($idEmp);
    echo("\nIngrese el numero del empleado a asignar: ");
    $numEmp = trim(fgets(STDIN));
    $empleado = buscarRespAux($numEmp);
    echo("\nIngrese el importe del viaje: ");
    $import = trim(fgets(STDIN));
    echo("\nIngrese el tipo de asiento del viaje: ");
    $tipoAsiento = trim(fgets(STDIN));
    echo("\nIngrese si el viaje es ida y vuelta o solo ida: ");
    $ida = trim(fgets(STDIN));
    
    $viaje->cargar(0, $dest, $max, $import, $tipoAsiento, $ida, $empleado, $empresa);
    $respuesta = $viaje->insertar();
    
    if ($respuesta == true) {
        echo("\nEl viaje fue ingresada correctamente a la base.");
    } else {
        echo("\n" . $viaje->getmensajeoperacion());
    }
    return $respuesta;
}

function buscarRespAux($id)
{
    $respon = new Responsable();
    $nuevoResponsable = $respon->listar('rnumeroempleado=' . $id);
    return $nuevoResponsable[0];
}

function buscarEmpresaAux($id)
{
    $emp = new Empresa();
    $nuevaEmpresa = $emp->listar('idempresa='. $id);
    return $nuevaEmpresa[0];
}

function modificarViaje($viaje)
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
    echo("\nIngrese el id del viaje a eliminar: ");
    $pId = trim(fgets(STDIN));
    $viaje->buscar($pId);
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

function crearPasajero($pasajero)
{
    echo("\nIngrese el documento del pasajero: ");
    $pDni = trim(fgets(STDIN));
    echo("\nIngrese el nombre: ");
    $pNom = trim(fgets(STDIN));
    echo("\nIngrese el apellido del pasajero: ");
    $pApe = trim(fgets(STDIN));
    echo("\nIngrese el telefono: ");
    $pTel = trim(fgets(STDIN));
    echo("\nIngrese el id del viaje: ");
    $pId = trim(fgets(STDIN));
    $pViaje = buscarViajeAux($pId);

    
    $pasajero->cargar($pDni, $pNom, $pApe, $pTel, $pViaje);
    $respuesta = $pasajero->insertar();

    if ($respuesta == true) {
        echo("\nEl pasajero fue ingresada correctamente a la base.");
    } else {
        echo("\n" . $pasajero->getmensajeoperacion());
    }
    return $respuesta;
}

function buscarViajeAux($id)
{
    $viajeFinal = new Viaje();
    $viajeFinal = $viaje->listar('idviaje='. $id)[0];
    
    return $viajeFinal;
}

function modificarPasajero($pasajero)
{
    echo("\nSe va a modificar el nombre y el telefono del pasajero a 'Tomas' y 112844654");
    
    $pasajero->setNombre("Tomas");
    $pasajero->setTelefono(112844654);
    $respuesta = $pasajero->modificar();
    if ($respuesta == true) {
        echo("\nLa modificacion fue realizada correctamente.");
    } else {
        echo $pasajero->getmensajeoperacion();
    }
}

function eliminarPasajero($pasajero)
{
    echo("\nIngrese el documento del pasajero: ");
    $pDni = trim(fgets(STDIN));
    $pasajero->buscar($pDni);
    $respuesta = $pasajero->eliminar();
    if ($respuesta==true) {
        echo("\nLa eliminacion fue realizada correctamente.");
    } else {
        echo $pasajero->getmensajeoperacion();
    }
}

function mostrarPasajeroDni($pasajero)
{
    echo("\nIngrese el documento del pasajero a mostrar: ");
    $dni = trim(fgets(STDIN));
    $colPasa = $pasajero->listar('rdocumento=' . $dni);
    foreach ($colPasa as $pas) {
        echo $pas;
        echo " ----------- ";
    };
}

function mostrarPasajerosId($pasajero)
{
    echo("\nIngrese el id del viaje a listar: ");
    $id = trim(fgets(STDIN));
    $colPasa = $pasajero->listar('idviaje=' . $id);
    foreach ($colPasa as $pas) {
        echo $pas;
        echo " ----------- ";
    };
}
