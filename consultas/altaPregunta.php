<?php
    var_dump($_GET);
    if( isset($_GET['submit'])) {
        include_once("../conectarBD.php");


        $idUsuario = $_GET['idUsuario'];
        $idCouch = $_GET['idCouch'];
        $preguntaCouch = $_GET['preguntaCouch'];

        $query="INSERT INTO pregunta(id_couch, id_usuariopregunta, contenidopregunta) VALUES ('". $idCouch ."','". $idUsuario ."','". $preguntaCouch ."')";
        echo($query);
        mysqli_query($conexion, $query);
        header("Location: ../detalle_couch.php?msg=Su pregunta se ha agregado con exito&&class=alert-success&&id=$idCouch");
    } else{ echo("que estás intentando hacer pilluelo?");
    }