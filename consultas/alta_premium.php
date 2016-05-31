<?php
    // session_start();
    // include_once("../conectarBD.php");

    // $nroTarjeta=$_POST['nroTarjeta'];
    // $idUsuario=$_SESSION['id_usuario'];
    // $query= "SELECT nro_tarjeta FROM tarjetas WHERE nro_tarjeta='".$nroTarjeta."'";
    // $resultado=mysqli_query($conexion, $query);

    // if (mysqli_num_rows($resultado) == 1) {
    //     $insert= "INSERT INTO premium(id_usuario,tarjeta,f_incripcion) VALUES('".$idUsuario."', '".$nroTarjeta."',CURRENT_DATE())";
    //     mysqli_query($conexion, $insert);
       
    //     header("Location: ../index.php?msg=Ya es usuario Premium!&&class=alert-success");
    // } else {
    //     header("Location: ../index.php?msg=No se pudo dar de alta como Premium. Nº de tarjeta incorrecta&&class=alert-danger");
    // }

    session_start();
    include_once("../conectarBD.php");

    $nroTarjeta=$_POST['nroTarjeta'];
    $idUsuario=$_SESSION['id_usuario'];

    if (isset($_POST["hacersePremium"]))
    {
        $insert= "INSERT INTO premium(id_usuario,tarjeta,f_incripcion) VALUES('".$idUsuario."', '".$nroTarjeta."',CURRENT_DATE())";
        mysqli_query($conexion, $insert);
       
        header("Location: ../index.php?msg=Ya es usuario Premium!&&class=alert-success");
    }
    else{
        header("Location: ../hacerse_premium.php?msg=Error al hacerse premium!&&class=alert-danger");
    }
?>