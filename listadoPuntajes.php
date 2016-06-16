<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="default.css" rel="stylesheet"><link rel="icon" href="img/logo.png">
    <link rel="icon" href="img/logo.png">
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/altaValidaciones.js"></script>

    <title> Couchinn </title>
</head>

<body>

<?php
include("navbar.php");
?>
<div class="container">

    <?php

         include_once("conectarBD.php");

        $queryPuntajes="SELECT nombre,apellido,comentario,puntaje FROM puntoscouch INNER JOIN usuario ON (puntoscouch.id_usuario = usuario.id_usuario) WHERE puntoscouch.id_couch='".$_GET['idCouch']."'";
        $consultaPuntajes= mysqli_query($conexion, $queryPuntajes);
        while ($puntajes = mysqli_fetch_array($consultaPuntajes)){
    ?>

    <div class="panel panel-primary ">
        <div class="panel-heading">
            <p> El usuario <?php echo($puntajes['nombre']." ".$puntajes['apellido']);?> ha puntado: </p>
        </div>
        <div class="panel-body">
            <p> Puntaje otorgado: <?php echo($puntajes['puntaje']); ?> puntos</p>

            <p> Comentario:

                <?php
                if(!isset($puntajes['comentario'])) {
                    echo("El usuario no ha realizado ningún comentario");
                } else {
                   echo($puntajes['comentario']);
                }
                ?>
            </p>

        </div>
    </div>

    <?php } ?>
    <a class="btn btn-primary" href=<?php echo("detalle_couch.php?id=".$_GET['idCouch']); ?>>Volver</a>
</div>

</body>

</html>