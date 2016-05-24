<?php
    include_once("../conectarBD.php");

    $email= $_POST["emailUser"];

    $query= "SELECT * FROM usuario WHERE email='".$_POST['emailUser']."'";

    $resultado= mysqli_query($conexion, $query);
    $row=mysqli_fetch_array($resultado);

    if($row["email"] == $email) {
        header("Location: ../index.php?msg=Su contraseña se ha recuperado correctamente: ".$row["clave"]."&&class=alert-success");
    }else {
        header("Location: ../user_recuperarContrasena_form.php?msg=No existe un email que posee ese nombre&&class=alert-danger");
    }
    