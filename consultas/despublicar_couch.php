<?php
    session_start();
    include_once("conectarBD.php");

    
    $update="UPDATE couch SET despublicado=1 WHERE id_couch='".$_POST['couch']."'";
    mysqli_query($conexion,$update);
    header("Location: listado_mis_couchs.php?msg=Su couch se ha depublicado correctamente&&class=alert-success");