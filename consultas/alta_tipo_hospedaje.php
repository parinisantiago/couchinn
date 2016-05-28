<?php
    include_once("../conectarBD.php");

    $nombre= $_POST['nomTipo'];

    $queryNombreTipo="SELECT nombre FROM tipo WHERE nombre='".$nombre."'";
    $resultadoNombreTipo= mysqli_query($conexion, $queryNombreTipo);

    if((mysqli_num_rows($resultadoNombreTipo) == 0)){
        $insert="INSERT INTO tipo(nombre) VALUES('".$nombre."')";
        mysqli_query($conexion,$insert);
    } else {
        $update="UPDATE tipo SET eliminado=0 WHERE nombre='".$nombre."' AND eliminado=1";
        mysqli_query($conexion, $update);
        header("Location: ../alta_tipos_hospedaje_form.php?msg=Su tipo se ha creado correctamente&&class=alert-success");
    } 
    header("Location: ../alta_tipos_hospedaje_form.php?msg=Su tipo se ha creado correctamente&&class=alert-success");
    
   