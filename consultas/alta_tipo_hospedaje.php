<?php
    include_once("../conectarBD.php");

    $nombre= $_POST['nomTipo'];

    $queryNombreTipo="SELECT nombre FROM tipo WHERE nombre='".$nombre."'";
    $resultadoNombreTipo= mysqli_query($conexion, $queryNombreTipo);

    if((mysqli_num_rows($resultadoNombreTipo) == 0)){

        $insert="INSERT INTO tipo(nombre) VALUES('".$nombre."')";

        mysqli_query($conexion,$insert);
        header("Location: ../alta_tipos_hospedaje_form.php?msg=Su tipo se ha creado correctamente&&class=alert-success");

    } else {

        header("Location: ../alta_tipos_hospedaje_form.php?msg=Ya existe un tipo que posee ese nombre&&class=alert-danger");

    }