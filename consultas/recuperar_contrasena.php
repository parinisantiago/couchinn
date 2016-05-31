<?php
    include_once("../conectarBD.php");

    $email= $_POST["emailUser"];

    $query= "SELECT * FROM usuario WHERE email='".$_POST['emailUser']."'";

    $resultado= mysqli_query($conexion, $query);
    $row=mysqli_fetch_array($resultado);

    if($row["email"] == $email) {
        echo "<script>
        alert('Se ha enviado a su mail: ".$email." la siguiente contraseña: ".$row["clave"]."');
        window.location.href='../index.php';
        </script>";
    }else {
        header("Location: ../user_recuperarContrasena_form.php?msg=No existe un email que posee ese nombre&&class=alert-danger");
    }
    