<?php

if(isset($_GET['submit'])) {
    include_once("../conectarBD.php");
    var_dump(($_GET)); die();
    $idUsuario=$_GET['id_usuario'];
    $idReserva=$_GET['id_reserva'];
    $idCouch=$_GET['id_couch'];
    $puntaje=$_GET['puntReser'];

    //guarda el puntaje para el usuario
    $queryPuntaje ="INSERT INTO puntos_usuario(id_usuario, puntuacion) VALUES ($idUsuario, $puntaje)";
    mysqli_query($conexion, $queryPuntaje);

    //actualiza la reserva
    $queryReserva= "UPDATE reserva SET id_puntajeUsuario='$idUsuario'";
    mysqli_query($conexion, $queryReserva);

    header("Location: ../puntuarHuespedes.php?msg=Su opinion ha sido registrada&&class=alert-success");

}else{

    echo("que haces pillin? ;)");
}