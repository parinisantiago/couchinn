<?php
    if(isset($_GET['submit'])) {
        include("../conectarBD.php");
        $puntaje= $_GET['puntReser'];
        $contenido= $_GET['puntReserContenido'];
        $idCouch= $_GET['id_couch'];
        $idReserva= $_GET['id_reserva'];
        $idUsuario= $_GET['id_usuario'];
        
        //agrega el puntaje a la bd

        if($contenido == ""){

            $queryPregunta = "INSERT INTO puntoscouch(id_usuario, id_couch, puntaje) VALUES ('" . $idUsuario . "', '" . $idCouch . "', '" . $puntaje . "')";

        } else {

            $queryPregunta = "INSERT INTO puntoscouch(id_usuario, id_couch, comentario, puntaje) VALUES (id_usuario='" . $idUsuario . "', id_couch='" . $idCouch . "', comentario='" . $contenido . "', puntaje='" . $puntaje . "')";

        }
        mysqli_query($conexion, $queryPregunta);

        //cambiar estado de la reserva
    } else {
        echo("que intentas hacer pillin?");
    }