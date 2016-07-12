
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="default.css" rel="stylesheet">
    <link rel="icon" href="img/logo.png">
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
    <h1 class="text-center"> Couchs donde me aloje </h1>
    <?php
    include("conectarBD.php");
    $queryHospedajes = "SELECT nombre_tipo, couch.id_usuario, titulo, descripcion,capacidad, couch.id_couch, ubicacion, direccion,  DATE_FORMAT(finicio, '%d-%m-%y') AS finicio, DATE_FORMAT(ffin,'%d-%m-%y') AS ffin FROM reserva INNER JOIN couch ON (reserva.id_couch = couch.id_couch) INNER JOIN tipo ON (couch.id_tipo = tipo.id_tipo) WHERE estado='finalizada' AND reserva.id_usuario='" . $_SESSION['id_usuario'] . "' ";
    $consultaHospedajes = mysqli_query($conexion, $queryHospedajes);

    if (mysqli_num_rows($consultaHospedajes) == 0) {
        ?>

        <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert alert-warning">
            No existen couchs en los que se haya hospedado
        </div>

    <?php } else { ?>
    <div class="col-md-12">
        <div class="list-group">


            <?php   while ($hospedaje = mysqli_fetch_array($consultaHospedajes)) { ?>
                <a class=list-group-item href="detalle_couch.php?id=<?php echo($hospedaje['id_couch']) ?>" class="list-group-item">

                    <div class="row" style="padding-left:10px">
                        <div class="pull-left ">
                            <?php   $queryPremium = "SELECT id_usuario FROM premium WHERE id_usuario='" . $hospedaje['id_usuario'] . "'";
                            $consultaPremium = mysqli_query($conexion, $queryPremium);

                            if ($premium = mysqli_fetch_array($consultaPremium)) {

                                $queryFoto = "SELECT ruta FROM couch NATURAL JOIN foto WHERE couch.id_couch='" . $hospedaje['id_couch'] . "'";
                                $consultaFoto = mysqli_query($conexion, $queryFoto);

                                if ($foto = mysqli_fetch_array($consultaFoto)) { ?>
                                    <img class="img-circle" height="130" width="180"  src="<?php echo $foto['ruta'] ?>">

                                <?php } else { ?>
                                    <img class="img-circle" height="130" width="180" src="img/logoPremium.jpg">
                                    <?php
                                }

                            } else { ?>

                                <img class="img-circle" height="130" width="180" src="img/logo.png">

                                <?php
                            } ?>
                        </div>
                        <div class="col-md-6" style="padding-left: 50px"><h4 class="list-group-item-heading"><?php echo($hospedaje['titulo']); ?></h4>
                            <p class="list-group-item-text"><?php echo ("<strong>Descripción: </strong>".$hospedaje['descripcion']."<br> <strong>Ubicación: </strong>".$hospedaje['ubicacion']."<br> <strong>Dirección: </strong>".$hospedaje['direccion']."<br> <strong>Capacidad: </strong> para ".$hospedaje['capacidad']." personas. <br> <strong>Tipo: </strong>".$hospedaje['nombre_tipo']). "<br><strong> Inicio estadia: </strong>".$hospedaje['finicio']."<br><strong>Fin estadia: </strong>". $hospedaje['ffin']; ?> </p>
                        </div>

                    </div>

                </a>
            <?php } ?>


        </div>
        <?php } ?>
        <div class = "container">
             <a href="index.php" class="btn btn-primary">Volver</a>
        </div>
    </div>
</body>
</html>
