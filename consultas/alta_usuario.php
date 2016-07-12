<?php
    include_once("../conectarBD.php");

    $email= $_POST['emailUser'];

    $queryAdmin="SELECT email FROM admin WHERE email='".$email."'";
    $resultadoAdmin= mysqli_query($conexion, $queryAdmin);

    $query= "SELECT email FROM usuario WHERE email='".$email."' AND eliminado  = 0";
    $resultado= mysqli_query($conexion, $query);

    if((mysqli_num_rows($resultado) == 0) && (mysqli_num_rows($resultadoAdmin) == 0)){


        $nombre=$_POST['nomUser'];
        $apellido=$_POST['apUser'];
        $clave=$_POST['passUser'];
        $fNac=$_POST['fNacUser'];
        $tel=$_POST['numUser'];

        $insert="INSERT INTO usuario(email,nombre, apellido, fnac, telefono, clave) VALUES('".$email."','".$nombre."','".$apellido."','".$fNac."','".$tel."','".$clave."')";

        mysqli_query($conexion,$insert);
        header("Location: ../index.php?msg=Su usuario se ha creado correctamente&&class=alert-success");

    } else {

        header("Location: ../user_form.php?msg=Ya existe un usuario que posee ese nombre mail&&class=alert-danger");

    }