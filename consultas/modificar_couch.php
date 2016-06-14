<?php
include_once("../conectarBD.php");

//datos enviados por POST
$idCouch= $_POST['idCouch'];
$titCouch= $_POST['titCouch'];
$descCouch= $_POST['descCouch'];
$ubCouch= $_POST['ubCouch'];
$dirCouch= $_POST['dirCouch'];
$capCouch= $_POST['capCouch'];
$tipCouch= $_POST['tipCouch'];
$fPublicacion= date('Y-m-d');


$query= "SELECT * FROM couch WHERE id_couch='".$idCouch."'";
$resultado= mysqli_query($conexion, $query);
$row=mysqli_fetch_array($resultado);
if($row != 0) {
   $update="UPDATE couch SET titulo='".$titCouch."' ,descripcion='".$descCouch."' ,ubicacion='".$ubCouch."' ,direccion='".$dirCouch."' ,capacidad='".$capCouch."',id_tipo='".$tipCouch."' WHERE id_couch='".$idCouch."'";
    mysqli_query($conexion,$update);
    header("Location: ../listado_mis_couchs.php?msg=Su couch se ha modificado correctamente&&class=alert-success");
}
else
{
    header("Location: ../listado_mis_couchs.php?msg=Su couch no se ha podido modificar&&class=alert-danger");
}