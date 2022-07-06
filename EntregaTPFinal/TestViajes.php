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
            crearEmpresa();
            break;
        }
        case 2:{
            //MODIFICACION DE EMPRESA
            modificarEmpresa();
            break;
        }
        case 3: {
            //ELIMINACION DE EMPRESA
            eliminarEmpresa();
            break;
        }
        case 4: {
            //CREACION DE RESPONSABLE
            crearResponsable();
            break;
        }
        case 5: {
            //MODIFICACION DE RESPONSABLE
            modificarResponsable();
            break;
        }
        case 6: {
            //ELIMINACION DE RESPONSABLE
            eliminarResponsable();
            break;
        }
        case 7: {
            //CREACION DE VIAJE
            if (verifEmp() && verifResp()) {
                crearViaje();
            } else {
                echo("\nEl viaje no se puede crear porque no existe la empresa o el responsable.");
            }
            break;
        }
        case 8: {
            //MODIFICACION DE VIAJE
            modificarViaje();
            break;
        }
        case 9: {
            //ELIMINACION DE VIAJE
            eliminarViaje();
            break;
        }
        case 10: {
            //CREACION DE PASAJERO
            if (verifVia()) {
                crearPasajero();
            } else {
                echo("\nEl pasajero no se pudo cargar porque no existe un viaje.");
            }
            break;
        }
        case 11: {
            //MODIFICACION DE PASAJERO
            modificarPasajero();
            break;
        }
        case 12: {
            //ELIMINACION DE PASAJERO
            eliminarPasajero();
            break;
        }
        case 13:{
            //MOSTRAR EMPRESA
            mostrarEmpresa();
            break;
        }
        case 14: {
            //MOSTRAR RESPONSABLE
            mostrarResponsable();
            break;
        }
        case 15: {
            //MOSTRAR VIAJE
            mostrarViaje();
            break;
        }
        case 16: {
            //MOSTRAR EL PASAJERO POR DNI
            mostrarPasajeroDni();
            break;
        }
        case 17: {
            //MOSTRAR COLECCION DE PASAJEROS POR ID DEL VIAJE
            mostrarPasajerosId();
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

function verifEmp()
{
    $emp = new Empresa();
    $emp = $emp->listar();
    if ($emp==null) {
        return false;
    } else {
        return true;
    }
}

function verifResp()
{
    $res = new Responsable();
    $res = $res->listar();
    if ($res==null) {
        return false;
    } else {
        return true;
    }
}

function verifVia()
{
    $via = new Viaje();
    $via = $via->listar();
    if ($via==null) {
        return false;
    } else {
        return true;
    }
}

function crearEmpresa()
{
    $emp = new Empresa();
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

function modificarEmpresa()
{
    echo("\nSe modificara el nombre y la direccion de la empresa a: 'La pequeña empresa' y a 'Illia 1453' respectivamente a la empresa con id 445657.");
    $nuevoNomb = "La empresa unida";
    $nuevaDirec = "Illia 1453";
    $emp = new Empresa();
    $emp->buscar(445657);
    $emp->setNombre($nuevoNomb);
    $emp->setDireccion($nuevaDirec);
    $respuesta = $emp->modificar();
    if ($respuesta == true) {
        echo("\nLa modificacion fue realizada correctamente.");
    } else {
        echo $emp->getmensajeoperacion();
    }
}

function eliminarEmpresa()
{
    echo("\nIngrese el id de la empresa a eliminar: ");
    $pID = trim(fgets(STDIN));
    $emp = new Empresa();
    $emp->buscar($pID);
    $respuesta = $emp->eliminar();
    if ($respuesta==true) {
        echo("\nLa eliminacion fue realizada correctamente.");
    } else {
        echo $emp->getmensajeoperacion();
    }
}

function mostrarEmpresa()
{
    $emp = new Empresa();
    echo("\nIngrese el id de la empresa a mostrar: ");
    $id = trim(fgets(STDIN));
    $colEmpresas = $emp->listar('idempresa=' . $id);
    foreach ($colEmpresas as $em) {
        echo $em;
        echo " ----------- ";
    };
}

function crearResponsable()
{
    $responsable = new Responsable();
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

function modificarResponsable()
{
    $resp = new Responsable();
    $resp->buscar(7);
    echo("\nSe modificara el nombre y apellido del responsable a 'Juan Cruz' y su licencia a 909, al empleado con numero 7.");
    $resp->setNombre("Juan");
    $resp->setApellido("Gonzalez");
    $resp->setNumeroL(909);
    $respuesta = $resp->modificar();
    if ($respuesta == true) {
        echo("\nLa modificacion fue realizada correctamente.");
    } else {
        echo $resp->getmensajeoperacion();
    }
}

function eliminarResponsable()
{
    echo("\nPor favor ingrese el numero de empleado del responsable a eliminar: ");
    $pNro = trim(fgets(STDIN));
    $responsable = new Responsable();
    $responsable->buscar($pNro);
    $respuesta = $responsable->eliminar();
    if ($respuesta==true) {
        echo("\nLa eliminacion fue realizada correctamente.");
    } else {
        echo $responsable->getmensajeoperacion();
    }
}

function mostrarResponsable()
{
    $responsable = new Responsable();
    echo("\nIngrese el numero de empleado del responsable a mostrar: ");
    $id = trim(fgets(STDIN));
    $colResponsable = $responsable->listar('rnumeroempleado=' . $id);
    foreach ($colResponsable as $res) {
        echo $res;
        echo " ----------- ";
    };
}

function crearViaje()
{
    $viaje = new Viaje();
    echo("\nIngrese el destino del viaje: ");
    $dest = trim(fgets(STDIN));
    if ($viaje->listar("vdestino='".$dest. "'") == null) {
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
    } else {
        echo ("\nEl viaje no fue creado debido a que ya existe un viaje a ese destino.");
        $respuesta=false;
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

function modificarViaje()
{
    echo("\nSe modificara el destino y el importe del viaje a 'Misiones' y 12500 respectivamente al viaje con id 11.");
    $via = new Viaje();
    $via->buscar(11);
    $via->setDestino("Misiones");
    $via->setImporte(12500);
    $respuesta = $via->modificar();
    if ($respuesta == true) {
        echo("\nLa modificacion fue realizada correctamente.");
    } else {
        echo $via->getmensajeoperacion();
    }
}

function eliminarViaje()
{
    $pas = new Pasajero();
    echo("\nIngrese el id del viaje a eliminar: ");
    $pId = trim(fgets(STDIN));
    if ($pas->listar('idviaje='.$pId) == null) {
        $viaje = new Viaje();
        $viaje->buscar($pId);
        $respuesta = $viaje->eliminar();
        if ($respuesta==true) {
            echo("\nLa eliminacion fue realizada correctamente.");
        } else {
            echo $viaje->getmensajeoperacion();
        }
    } else {
        echo ("\nEl viaje no se puede eliminar debido a que tiene pasajeros.");
    }
}

function mostrarViaje()
{
    $viaje = new Viaje();
    echo("\nIngrese el id del viaje a mostrar: ");
    $id = trim(fgets(STDIN));
    $colViajes = $viaje->listar('idviaje=' . $id);
    foreach ($colViajes as $via) {
        echo $via;
        echo " ----------- ";
    };
}

function crearPasajero()
{
    $pasajero = new Pasajero();
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
    $viajeFinal = $viajeFinal->listar('idviaje='. $id)[0];
    
    return $viajeFinal;
}

function modificarPasajero()
{
    echo("\nSe va a modificar el nombre y el telefono del pasajero a 'Tomas' y 112844654 con documento 41984524");
    $pas = new Pasajero();
    $pas->buscar(41984524);
    $pas->setNombre("Tomas");
    $pas->setTelefono(112844654);
    $respuesta = $pas->modificar();
    if ($respuesta == true) {
        echo("\nLa modificacion fue realizada correctamente.");
    } else {
        echo $pas->getmensajeoperacion();
    }
}

function eliminarPasajero()
{
    echo("\nIngrese el documento del pasajero: ");
    $pDni = trim(fgets(STDIN));
    $pasajero = new Pasajero();
    $pasajero->buscar($pDni);
    $pasajero->buscar($pDni);
    $respuesta = $pasajero->eliminar();
    if ($respuesta==true) {
        echo("\nLa eliminacion fue realizada correctamente.");
    } else {
        echo $pasajero->getmensajeoperacion();
    }
}

function mostrarPasajeroDni()
{
    $pasajero = new Pasajero();
    echo("\nIngrese el documento del pasajero a mostrar: ");
    $dni = trim(fgets(STDIN));
    $colPasa = $pasajero->listar('rdocumento=' . $dni);
    foreach ($colPasa as $pas) {
        echo $pas;
        echo " ----------- ";
    };
}

function mostrarPasajerosId()
{
    $pasajero = new Pasajero();
    echo("\nIngrese el id del viaje a listar: ");
    $id = trim(fgets(STDIN));
    $colPasa = $pasajero->listar('idviaje=' . $id);
    foreach ($colPasa as $pas) {
        echo $pas;
        echo " ----------- ";
    };
}
