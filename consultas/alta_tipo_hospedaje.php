<?php
    include_once("../conectarBD.php");

    $nombre= $_POST['nomTipo'];

    $queryNombreTipo="SELECT nombre_tipo, eliminado FROM tipo WHERE nombre_tipo='".$nombre."'";
    $resultadoNombreTipo= mysqli_query($conexion, $queryNombreTipo);
    $row=mysqli_fetch_array($resultadoNombreTipo);
    $queryNombreTipo="SELECT nombre_tipo, eliminado FROM tipo WHERE nombre_tipo='".$nombre."'";
    $resultadoNombreTipo= mysqli_query($conexion, $queryNombreTipo);
    if((mysqli_num_rows($resultadoNombreTipo) == 0)){
        $insert="INSERT INTO tipo(nombre_tipo) VALUES('".$nombre."')";
        mysqli_query($conexion,$insert);
        header("Location: ../alta_tipos_hospedaje_form.php?msg=Su tipo se ha creado correctamente&&class=alert-success");
    } else {
        if ($row["eliminado"] == 1)
        { 
            $update="UPDATE tipo SET eliminado=0 WHERE nombre_tipo='".$nombre."' AND eliminado=1";
            mysqli_query($conexion, $update);
            header("Location: ../alta_tipos_hospedaje_form.php?msg=Su tipo se ha creado correctamente&&class=alert-success");
        }
        else
        {
            header("Location: ../alta_tipos_hospedaje_form.php?msg=Su tipo ya existe&&class=alert-danger");
        }
    } 
    
    
   