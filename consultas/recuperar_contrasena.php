<?php
    include_once("../conectarBD.php");

    $email= $_POST["emailRec"];

    $query= "SELECT * FROM usuario WHERE email='".$_POST['emailRec']."' AND eliminado = 0";

    $resultado= mysqli_query($conexion, $query);
    $row=mysqli_fetch_array($resultado);

    if($row["email"] == $email) {
        echo "<script>
        alert('Se ha enviado a su mail: ".$email." la siguiente contraseña: ".$row["clave"]."');
        window.location.href='../index.php?msg=Se ha enviado su contraseña a su dirección de correo exitosamente&&class=alert-success';
        </script>";
    }else {
        header("Location: ../index.php?msg=No existe un email que posee ese nombre&&class=alert-danger");
    }
    