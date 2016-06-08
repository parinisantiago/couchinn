<?php
    session_start();
    include_once("conectarBD.php");

    
    $update="UPDATE couch SET despublicado=0 WHERE id_couch='".$_POST['couch']."'";
    mysqli_query($conexion,$update);
    header("Location: listado_mis_couchs.php?msg=Su couch se ha publicado correctamente&&class=alert-success");