<?php

    include_once("../conectarBD.php");

    $email= $_POST['email'];
    $clave= $_POST['clave'];

    $query= "SELECT id_usuario,email,clave FROM usuario WHERE email='".$email."' AND clave='".$clave."'";
    $resultado=mysqli_query($conexion, $query);


    $queryAdmin= "SELECT * FROM admin WHERE email='".$email."' AND clave='".$clave."'";
    $resultadoAdmin=mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) == 1) {
        session_start();
        $row= mysqli_fetch_array($resultado);
        $_SESSION["sesion_usuario"] = true;
        $_SESSION["id_usuario"]= $row['id_usuario'];
        $_SESSION['admin'] = false;
        $class="alert-success";
        $msg="Se ha iniciado sesión correctamente";

    // si no es usuario comun se fija si es admin
    } else {
        $queryAdmin = "SELECT * FROM admin WHERE email='". $email ."' AND clave='".$clave."'";
        $resultadoAdmin = mysqli_query($conexion, $queryAdmin);
        if (mysqli_num_rows($resultadoAdmin) == 1) {
            session_start();
            $rowAdmin = mysqli_fetch_array($resultadoAdmin);
            $_SESSION["sesion_usuario"] = true;
            $_SESSION["id_usuario"] = $rowAdmin['id_admin'];
            $_SESSION['admin'] = true;
            $class = "alert-success";
            $msg = "Se ha iniciado sesión correctamente como administrador";

        //si no es ninguno de los dos tira error
        } else {
            $class = "alert-danger";
            $msg = "<strong>Error al iniciar sesión</strong>. Usuario o contraseña incorrecta";
        }
    }
  header("Location: ../index.php?class=".$class."&&msg=".$msg);