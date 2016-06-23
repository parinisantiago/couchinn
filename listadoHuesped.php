<?php
session_start();
if($_SESSION['id_usuario'] == true && $_SESSION['admin'] == false) {
    include_once("conectarBD.php");

    $queryPuntajes = "SELECT titulo, puntuacion, nombre, apellido,reserva.id_couch, id_reserva, reserva.id_usuario, DATE_FORMAT(finicio, '%d-%m-%y') AS finicio, DATE_FORMAT(ffin,'%d-%m-%y') AS ffin FROM reserva INNER JOIN usuario ON (reserva.id_usuario = usuario.id_usuario ) INNER JOIN puntos_usuario ON(reserva.id_puntajeUsuario = puntos_usuario.id_usuario) INNER JOIN couch ON (reserva.id_couch = couch.id_couch) WHERE id_puntajeUsuario IS NOT NULL AND reserva.id_couch IN (SELECT id_couch FROM couch WHERE id_usuario ='" . $_SESSION['id_usuario'] . "')";
    $consultaPuntajes = mysqli_query($conexion, $queryPuntajes);
    if (mysqli_num_rows($consultaPuntajes) == 0) { ?>
        <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert alert-warning">
            No posee huespedes con puntaje.
        </div>
    <?php }
    while ($puntajes = mysqli_fetch_array($consultaPuntajes)) {
        ?>

        <div class="panel panel-primary ">
            <div class="panel-heading">
                <p> Puntaje para el usuario <?php echo($puntajes['nombre'] . " " . $puntajes['apellido']); ?>: </p>
            </div>
            <div class="panel-body">
                <p>Estadía: <?php echo $puntajes['titulo']; ?></p>
                <p>Período de estadía:<?php echo $puntajes['finicio'] . "-" . $puntajes['ffin']; ?></p>
                <p>Puntaje otorgado: <?php echo($puntajes['puntuacion']); ?> puntos</p>
                <?php
                $promedioQuery = "SELECT AVG(puntuacion) AS promedio FROM puntos_usuario WHERE id_usuario ='" . $puntajes['id_usuario'] . "'";
                $promedioConsulta = mysqli_query($conexion, $promedioQuery);
                if ($promedio = mysqli_fetch_array($promedioConsulta)) {
                    ?>
                    <p> Puntaje promedio: <?php echo $promedio["promedio"]; ?></p>
                    <?php
                }
                ?>
                <p></p>
            </div>
        </div>

    <?php }
} else{
    header("Location: /index.php?msg=No posee permiso para puntuar usuarios&&class=alert-danger");
}?>