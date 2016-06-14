<?php
    var_dump($_GET);
    if( isset($_GET['submit'])) {
        include_once("../conectarBD.php");


        $idUsuario = $_GET['idUsuario'];
        $idCouch = $_GET['idCouch'];
        $preguntaCouch = $_GET['preguntaCouch'];


    } else{ echo("que estás intentando hacer pilluelo?");
    }