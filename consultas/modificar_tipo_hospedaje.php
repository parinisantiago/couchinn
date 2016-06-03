<?php
    session_start();
    include_once("../conectarBD.php");

    $nombre= $_POST["nomTipo"];

    $queryRestoDeTipos = "SELECT nombre_tipo from tipo WHERE '".$nombre."'= nombre_tipo";
    $resultadoRestoDeTipos = mysqli_query($conexion, $queryRestoDeTipos);
    if (mysqli_num_rows($resultadoRestoDeTipos) == 0)
    {
        $update="UPDATE tipo SET nombre_tipo='".$nombre."' WHERE id_tipo='".$_POST['idTipo']."'";
        mysqli_query($conexion,$update);
        header("Location: ../listado_tipos_hospedajes.php?msg=Su tipo se ha modificado correctamente&&class=alert-success");
    }
    else
    {
        header("Location: ../listado_tipos_hospedajes.php?msg=Ya existe un tipo que posee ese nombre&&class=alert-danger");
    }

    