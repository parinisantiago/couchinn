<?php
    session_start();
    include_once("../conectarBD.php");

    $nombre= $_POST["nomTipo"];

    $query= "SELECT nombre_tipo FROM tipo WHERE id_tipo='".$_POST['idTipo']."'";
    echo($query);
    $resultado= mysqli_query($conexion, $query);
    $row=mysqli_fetch_array($resultado);
    if($row["nombre_tipo"] != $nombre) {

       $update="UPDATE tipo SET nombre_tipo='".$nombre."' WHERE id_tipo='".$_POST['idTipo']."'";
        echo("asdasd");
        mysqli_query($conexion,$update);
        header("Location: ../listado_tipos_hospedajes.php?msg=Su tipo se ha modificado correctamente&&class=alert-success");
    }else {
        header("Location: ../listado_tipos_hospedajes.php?msg=Ya existe un tipo que posee ese nombre&&class=alert-danger");
        // $query= "SELECT nombre FROM tipo WHERE nombre='".$_POST['nomTipo']."'";
        // $resultado= mysqli_query($conexion, $query);
        // if (mysqli_num_rows($resultado) == 0) {

        //     $update="UPDATE tipo SET nombre='".$nombre."' WHERE id_tipo='".$_POST['idTipo']."'";
        //     echo($update);
        //     echo("asdasd");
        //     mysqli_query($conexion, $update);
        //     //header("Location: ../listado_tipos_hospedajes.php?msg=Su tipo se ha modificado correctamente&&class=alert-success");

        // } else {

        //     //header("Location: modificar_tipo_hospedaje.php?msg=Ya existe un tipo que posee ese nombre&&class=alert-danger");

        // }
    }
    