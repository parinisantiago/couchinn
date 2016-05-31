<?php
    
    session_start();
    
    include_once("../conectarBD.php");

    $email= $_POST['emailUser'];
    if(!$_SESSION['admin']) {        
        $query= "SELECT email FROM usuario WHERE id_usuario='".$_SESSION['id_usuario']."'";
        $resultado= mysqli_query($conexion, $query);
        $row=mysqli_fetch_array($resultado);
        if($row["email"] == $email) {
            $nombre=$_POST['nomUser'];
            $apellido=$_POST['apUser'];
            $clave=$_POST['passUser'];
            $fNac=$_POST['fNacUser'];
            $tel=$_POST['numUser'];

           $update="UPDATE usuario SET email='".$email."' ,nombre='".$nombre."' ,apellido='".$apellido."' ,fnac='".$fNac."' ,telefono='".$tel."' ,clave='".$clave."' WHERE id_usuario='".$_SESSION['id_usuario']."'";
            echo($update);
            mysqli_query($conexion,$update);
            header("Location: ../index.php?msg=Su usuario se ha modificado correctamente&&class=alert-success");
        }else {
            $query= "SELECT email FROM usuario WHERE email='".$email."'";
            $resultado= mysqli_query($conexion, $query);
            if (mysqli_num_rows($resultado) == 0) {

                $nombre = $_POST['nomUser'];
                $apellido = $_POST['apUser'];
                $clave = $_POST['passUser'];
                $fNac = $_POST['fNacUser'];
                $tel = $_POST['numUser'];

                $update="UPDATE usuario SET email='".$email."' ,nombre='".$nombre."' ,apellido='".$apellido."' ,fnac='".$fNac."' ,telefono='".$tel."' ,clave='".$clave."' WHERE id_usuario='".$_SESSION['id_usuario']."'";
                echo($update);
                mysqli_query($conexion, $update);
                header("Location: ../index.php?msg=Su usuario se ha modificado correctamente&&class=alert-success");

            } else {

                header("Location: ../user_modForm.php?msg=Ya existe un usuario que posee ese mail&&class=alert-danger");

            }
        }
    } else{

        $query= "SELECT email FROM admin WHERE id_admin='".$_SESSION['id_usuario']."'";
        $resultado= mysqli_query($conexion, $query);
        $row=mysqli_fetch_array($resultado);
        if($row["email"] == $email) {
            $clave=$_POST['passUser'];
           $update="UPDATE admin SET email='".$email."' ,clave='".$clave."' WHERE id_admin='".$_SESSION['id_usuario']."'";
            echo($update);
            mysqli_query($conexion,$update);
            header("Location: ../index.php?msg=Su usuario administrador se ha modificado correctamente&&class=alert-success");
        }else {
            $query= "SELECT email FROM admin WHERE email='".$email."'";
            $resultado= mysqli_query($conexion, $query);
            if (mysqli_num_rows($resultado) == 0) {
                $clave = $_POST['passUser'];
                $update="UPDATE admin SET email='".$email."' , clave='".$clave."' WHERE id_admin='".$_SESSION['id_usuario']."'";
                echo($update);
                mysqli_query($conexion, $update);
                header("Location: ../index.php?msg=Su usuario administrador se ha modificado correctamente&&class=alert-success");

            } else {

                header("Location: ../user_modForm.php?msg=Ya existe un usuario administrador que posee ese mail&&class=alert-danger");

            }
        }
    }