<?php
    session_start();
    include_once("../conectarBD.php");

    $nombre= $_POST["nomTipo"];

    $query= "SELECT nombre FROM tipo WHERE id_tipo='".$_POST['idTipo']."'";

    $resultado= mysqli_query($conexion, $query);
    $row=mysqli_fetch_array($resultado);

    if($row["nombre"] == $nombre) {

       $update="DELETE FROM tipo WHERE id_tipo='".$_POST['idTipo']."'";
        mysqli_query($conexion,$update);
        header("Location: ../listado_tipos_hospedajes.php?msg=Su tipo se ha eliminado correctamente&&class=alert-success");
    }else {
        header("Location: ../listado_tipos_hospedajes.php?msg=No existe un tipo que posee ese nombre&&class=alert-danger");
    }
    