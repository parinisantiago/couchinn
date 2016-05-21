<?php
//p

    include_once("../conectarBD.php");

    $email= $_POST['email'];
    $clave= $_POST['clave'];

    $query= "SELECT id_usuario,email,clave FROM usuario WHERE email='".$email."' AND clave='".$clave."'";
    $resultado=mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) == 1) {
        session_start();
        $row= mysqli_fetch_array($resultado);
        $_SESSION["sesion_usuario"] = true;
        $_SESSION["id_usuario"]= $row['id_usuario'];
        $class="alert-success";
        $msg="Se ha iniciado sesión correctamente";
    } else {
		$query= "SELECT id_admin,email,clave FROM admin WHERE email='".$email."' AND clave='".$clave."'";
		$resultado=mysqli_query($conexion, $query);

		if (mysqli_num_rows($resultado) == 1) {
			session_start();
			$row= mysqli_fetch_array($resultado);
			$_SESSION["sesion_usuario"] = true;
			$_SESSION["id_admin"]= $row['id_admin'];
			$class="alert-success";
			$msg="Se ha iniciado sesión correctamente como ADMIN";
		}
		else
		{
			$class="alert-danger";
			$msg="<strong>Error al iniciar sesión</strong>. Usuario o contraseña incorrecta";
		}
    }

    header("Location: ../index.php?class=".$class."&&msg=".$msg);
