<?php
include_once "Viaje.php";
include_once "Empresa.php";

$emp = new Empresa();

$colEmpresas =$emp->listar();
foreach ($colEmpresas as $em) {
    echo $em;
    echo " ----------- ";
};

echo ("\nIngrese el id de la empresa: ");
$idEmp = trim(fgets(STDIN));
echo ("\nIngrese el nombre de la empresa: ");
$nombEmp = trim(fgets(STDIN));
echo ("\nIngrese la direccion de la empresa: ");
$direEmp = trim(fgets(STDIN));

$emp->cargar($idEmp, $nombEmp, $direEmp);
$respuesta = $emp->insertar();

if ($respuesta == true) {
    echo ("\nLa empresa fue ingresada correctamente a la base.");
    $colEmpresas =$emp->listar();
    foreach ($colEmpresas as $em){
        echo $em;
        echo " ----------- ";
    }
}else {
    echo ("\n" . $obj->getmensajeoperacion());
}



// MODIFICACION 

$nuevoNomb = "La pequeña empresa";
$nuevaDirec = "Illia 1453";
$emp->setNombre($nuevoNomb);
$emp->setDireccion($nuevaDirec);
$respuesta = $emp->modificar();
if ($respuesta == true) {
    echo ("\nLa modificacion fue realizada correctamente.");
    $colEmpresas =$emp->listar();
    foreach ($colEmpresas as $em){
        echo $em;
        echo " ----------- ";
    }
}else{
    echo $obj->getmensajeoperacion();
}



//Eliminacion

$respuesta = $emp->eliminar();
if ($respuesta==true) {
    //Busco todas las personas almacenadas en la BD y veo la modificacion realizada
    echo ("\nLa eliminacion fue realizada correctamente.");
    $colEmpresas =$emp->listar();
    foreach ($colEmpresas as $em){
        echo $em;
        echo " ----------- ";
    }
}else{
    echo $obj->getmensajeoperacion();
}