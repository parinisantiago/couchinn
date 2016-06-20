<?php
session_start();
include_once("../conectarBD.php");


$delete= "DELETE FROM foto WHERE ruta='".$_POST['eliminarFoto']."'";

mysqli_query($conexion,$delete);
header("Location: modificar_couch_form.php?msg=Su foto se ha eliminado correctamente&&class=alert-success");
