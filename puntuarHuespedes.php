<?php
if(!isset($_SESSION['sesion_usuario'])){
    session_start();
}
if($_SESSION['id_usuario'] == true && $_SESSION['admin'] == false){
include_once("conectarBD.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="default.css" rel="stylesheet">
    <link rel="icon" href="img/logo.png">
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/altaValidaciones.js"></script>
    <script src="js/puntajesValidaciones.js"></script>
    <title> Couchinn </title>
</head>

<body>

<?php include("navbar.php"); ?>
<div class="container">
    <?php if (isset($_GET['msg'])) { ?>
        <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET["class"]); ?>">
            <?php echo($_GET['msg']); ?>
        </div>
    <?php } ?>
</div>
<h2 align = "center"> Huespedes por puntuar </h2>
<hr size = "3">
<div class="container">
    <?php
    $queryRervasFin = "SELECT titulo,nombre, apellido,reserva.id_couch, id_reserva, reserva.id_usuario, DATE_FORMAT(finicio, '%d-%m-%y') AS finicio, DATE_FORMAT(ffin,'%d-%m-%y') AS ffin FROM reserva INNER JOIN couch ON (reserva.id_couch = couch.id_couch) INNER JOIN usuario ON (reserva.id_usuario = usuario.id_usuario ) WHERE eliminado = 0 AND (estado='Finalizada' AND id_puntajeUsuario IS NULL AND reserva.id_couch IN (SELECT id_couch FROM couch WHERE id_usuario ='" . $_SESSION['id_usuario'] . "'))";
    $consultaReservasFin = mysqli_query($conexion, $queryRervasFin);

    if (mysqli_num_rows($consultaReservasFin) == 0) { ?>
        <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert alert-warning">
            No posee huespedes para puntuar
        </div>
    <?php }

    while ($reservasFin = mysqli_fetch_array($consultaReservasFin)) {
        if (!isset($reservasFin['id_puntajeUsuario'])) {
            ?>
            <br>
            <div class="panel panel-primary puntajeCouch">

                <div class="panel-heading">
                    <p>Puntúe la estadía de su huesped: <?php echo $reservasFin['nombre'].' '.$reservasFin['apellido']; ?> para el couch: <?php echo $reservasFin['titulo']; ?> del
                        dia: <?php echo($reservasFin['finicio']); ?> hasta el
                        dia: <?php echo($reservasFin['ffin']); ?> </p>
                </div>
                <div class="panel-body">
                    <form method="get" action="consultas/alta_puntajeUsuario.php" class="form-horizontal">
                        <div class="form-group">
                            <label for="puntReser" class="control-label">Puntua tu estadía: </label>
                            <input type="range" min="1" max="5" name="puntReser" id="puntReser"
                                   onchange="changeValue('puntReser' , 'puntReserShow')">
                            <input type="text" id="puntReserShow" value="3" size="1" maxlength="1" min="1" max="5"
                                   onkeypress="return is1to5(event)"
                                   onchange="changeValue('puntReserShow', 'puntReser')" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Puntuar</button>
                        </div>
                        <input type="hidden" name="id_couch" value=<?php echo($reservasFin['id_couch']); ?>>
                        <input type="hidden" name="id_reserva" value=<?php echo($reservasFin['id_reserva']); ?>>
                        <input type="hidden" name="id_usuario" value=<?php echo($reservasFin['id_usuario']); ?>>
                    </form>
                </div>
            </div>
            
        <?php }
    } ?>
    <hr size = "3">
    <h2 align = "center"> Huespedes puntuados </h2>
    <hr size = "3">
    <?php include ("listadoHuesped.php");
    ?>
    <a class="btn btn-primary" href="index.php">Volver</a>
</div>
<?php } else {
    header("Location: index.php?msg=No posee permiso para puntuar usuarios&&class=alert-danger");
}?>