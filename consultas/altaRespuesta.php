<?php
    if(isset($_GET['submit'])) {
        include_once("../conectarBD.php");

        $idCouch = $_GET['idCouch'];
        $respCouch = $_GET['respCouch'];
        $idResp = $_GET['idPregunta'];

        $respQuery = "UPDATE pregunta set contenidorespuesta='$respCouch' WHERE id_pregunta='$idResp'";
        mysqli_query($conexion, $respQuery);

        header("location: ../detalle_couch.php?id=$idCouch&&msg=su respuesta se guardo satisfactoriamente&&class=alert-success'");

    } else {
        header("location: ../index.php?msg=Que estas intentando hacer pillin?&&class=alert-warning");
    }