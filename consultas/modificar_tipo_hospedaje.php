<?php
    session_start();
    include_once("../conectarBD.php");

    $nombre= $_POST["nomTipo"];

    $query= "SELECT nombre FROM tipo WHERE id_tipo=".$_POST['id_tipo']."";
    $resultado= mysqli_query($conexion, $query);
    $row=mysqli_fetch_array($resultado);

    if($row == $nombre) {

       $update="UPDATE tipo SET nombre='".$nombre."' WHERE id_tipo=".$_POST['id_tipo']."";
        echo($update);
        mysqli_query($conexion,$update);
        header("Location: ../listado_tipos_hospedajes.php?msg=Su tipo se ha modificado correctamente&&class=alert-success");
    }else {
        $query= "SELECT nombre FROM tipo WHERE nombre='".$_POST['nomTipo']."'";
        $resultado= mysqli_query($conexion, $query);
        if (mysqli_num_rows($resultado) == 0) {

            $update="UPDATE tipo SET nombre='".$nombre."' WHERE id_tipo=".$_POST['id_tipo']."";
            echo($update);
            mysqli_query($conexion, $update);
            header("Location: ../listado_tipos_hospedajes.php?msg=Su tipo se ha modificado correctamente&&class=alert-success");

        } else {

            header("Location: modificar_tipo_hospedaje.php?msg=Ya existe un tipo que posee ese nombre&&class=alert-danger");

        }
    }
    