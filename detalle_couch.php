<?php

include("conectarBD.php");

session_start(); 

if (isset($_SESSION["anonimo"]) && !isset($_SESSION["admin"])){ //!isset($_SESSION["admin"]) forma rebuscada de verificar que "anonimo"
    $_SESSION["id_usuario"] = -1;                               //esta en false (se lo setea a false en logueo_usuario.php)
}

$query= "SELECT * FROM couch INNER JOIN tipo ON (couch.id_tipo = tipo.id_tipo) INNER JOIN usuario ON (couch.id_usuario = usuario.id_usuario) WHERE (couch.id_couch ='".$_GET["id"]."' AND couch.eliminado_couch = 0)";
$resultado= mysqli_query($conexion, $query);
$row = mysqli_fetch_array($resultado);
$first= true; //control para las imagenes
$esDuenio = false;
if ($_SESSION["id_usuario"] == $row["id_usuario"])
{
    $esDuenio = true;
}
$query= "SELECT * FROM couch INNER JOIN tipo ON (couch.id_tipo = tipo.id_tipo) INNER JOIN usuario ON (couch.id_usuario = usuario.id_usuario) WHERE (couch.id_couch ='".$_GET["id"]."' AND couch.eliminado_couch = 0)";
$resultado= mysqli_query($conexion, $query);
if (mysqli_num_rows($resultado) == 1){
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="default.css" rel="stylesheet"><link rel="icon" href="img/logo.png">
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
<div class="container">
    <?php while ( $couch = mysqli_fetch_array($resultado)) {

        //busca las fotos del couch para agregarlas al carousel
        $query_foto="SELECT ruta FROM foto WHERE id_couch='".$_GET["id"]."'";
        $resultado_foto=mysqli_query($conexion, $query_foto);
        $cant_fotos=mysqli_num_rows($resultado_foto);
        ?>



                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">

                                        <?php for($i = 0; $i < $cant_fotos; $i++){ ?>

                                            <li data-target="#myCarousel" data-slide-to=<?php echo($i); if($i == 0){ echo(" class=active");} ?>></li>

                                        <?php } ?>

                                    </ol>

                                    <?php if ($cant_fotos != 0){ ?>
                                        <!-- Wrapper for slides class="img-responsive center-block"-->
                                        <div class="carousel-inner" role="listbox">
                                            <?php while ( $foto = mysqli_fetch_array($resultado_foto)) {
                                                if( $first){ $first=false;?>
                                                    <div class="item active">
                                                        <img  src=<?php echo($foto["ruta"]);?> >
                                                    </div>
                                                <?php } else {?>
                                                    <div class="item">
                                                        <img  src=<?php echo($foto["ruta"]);?> >
                                                    </div>
                                                <?php }
                                            } ?>

                                        </div>
                                    <?php } else { ?>
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active">
                                                <img  src=<?php echo("img/logo.png");?> >
                                            </div>
                                        </div>
                                    <?php }        ?>
                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                                <p class="h2 col-md-offset-4"> Datos del Couch</p>

                                <!-- infromacion del couch -->

                                <div class="col-md-offset-2 col-md-6 inf_couch">
                                    <d1 class="dl-horizontal">
                                        <dt> Título: </dt>
                                        <dd> <?php echo($couch["titulo"]) ?></dd>
                                        <dt> Descripción: </dt>
                                        <dd> <?php echo($couch["descripcion"]) ?></dd>
                                        <dt> Tipo:</dt>
                                        <dd> <?php echo($couch["nombre_tipo"]) ?></dd>
                                        <dt> Ubicación: </dt>
                                        <dd> <?php echo($couch["ubicacion"]) ?></dd>
                                        <dt> Dirección: </dt>
                                        <dd> <?php echo($couch["direccion"]) ?></dd>
                                        <dt> Capacidad: </dt>
                                        <dd> <?php echo($couch["capacidad"]) ?></dd>

                                 <!-- puntaje promedio -->
                                    <?php
                                        $promedioQuery= "SELECT AVG(puntaje) AS promedio FROM puntoscouch WHERE id_couch ='". $_GET['id'] ."'";
                                        $promedioConsulta= mysqli_query($conexion, $promedioQuery);
                                        while ($promedio = mysqli_fetch_array($promedioConsulta)) {

                                           //controla que haya puntajes
                                            if($promedio['promedio'] == NULL){ ?>

                                           <dt>Puntaje promedio: </dt>
                                           <dd> 0 </dd>

                                     <?php       } else {
                                    ?>
                                          <dt> <a href=<?php echo("listadoPuntajes.php?idCouch=".$_GET['id']);?>> Puntaje promedio: </a> </dt>
                                          <dd> <?php echo(substr($promedio['promedio'], 0, 4)); ?></dd>
                                       <?php }}
                                    ?>
                                    </d1>
                                </div>

                                <p class="h2 col-md-offset-4"> Datos del usuario</p>

                                <!-- informacion del usuario, ni idea porque no se lista igual que el couch -->

                                <div class="col-md-offset-2 col-md-6 inf_couch">
                                    <d1 class="dl-horizontal">
                                        <dt> Nombre: </dt>
                                        <dd> <?php echo($couch["nombre"]) ?> <?php echo($couch["apellido"]) ?></dd>
                                    </d1>
                                </div>

                            <?php   }    ?>
                                <?php   if (isset($_SESSION["admin"]) && !$esDuenio && !$_SESSION["admin"]) {  ?>
                                    <?php include("reservar_couch.php");?>
                                    <a class="btn btn-default" href="#" data-toggle="modal" data-target="#modalReservarCouch"> Reservar</a>

                                <?php   }  ?>
                                <?php if($esDuenio){  ?>
                                    <!-- Inicio de aceptar o rechazar reservas -->
                                    <div class="col-md-7">

                                        <div class="panel panel-primary">

                                            <div class="panel-heading">
                                                Listado de reservas en espera por este couch.
                                            </div>
                                            <?php
                                            include_once("conectarBD.php");
                                            //Se fija cuales de las reservas estan pasadas de fecha para ponerlas como vencidas.
                                            $queryReservasVencidas = "UPDATE reserva SET estado = 'Vencida' WHERE ((finicio < CURDATE()) AND (estado='En espera'))";
                                            mysqli_query($conexion, $queryReservasVencidas);
                                            //Ltsta todas las reservas que están en espera de ser aceptadas o rechazadas
                                            $queryReservasEnEspera = "SELECT * FROM reserva NATURAL JOIN usuario WHERE ((id_couch = '".$_GET["id"]."') AND (estado = 'En espera'))";
                                            $resultadoReservasEnEspera = mysqli_query($conexion, $queryReservasEnEspera);
                                            ?>
                                            <form name="formularioReservasEnEspera" action="consultas/aceptar_rechazar_reserva.php" method="POST">
                                                <?php    while ($rowReservas = mysqli_fetch_array($resultadoReservasEnEspera)) {
                                                    ?>


                                                    <input type="hidden" name="idCouch" class="form-control" id="idCouch" value="<?php echo($_GET["id"])?>">


                                                    <div class="form-group" id="">
                            <?php  echo("Solicitud de ".$rowReservas["nombre"]." ".$rowReservas["apellido"]." del ".$rowReservas["finicio"]." al ".$rowReservas["ffin"]);?>
                            <button type="submit" class="btn btn-sm btn-primary glyphicon glyphicon-ok" name = "aceptar" id="aceptar.<?php  echo($rowReservas["id_reserva"]); ?>" onclick="return confirm('¿Esta seguro de que desea aceptar la reserva?')" value="<?php  echo($rowReservas["id_reserva"]); ?>" class="btn btn-default"> Aceptar</button>
                            <button type="submit" class="btn btn-sm btn-danger glyphicon glyphicon-remove" name = "rechazar" id = "rechazar.<?php  echo($rowReservas["id_reserva"]); ?>" onclick="return confirm('¿Esta seguro de que desea rechazar la reserva?')" value="<?php  echo($rowReservas["id_reserva"]); ?>" class="btn btn-default"> Rechazar</button>
                            <hr>    
                        </div> 
                            <?php   }
                            ?>
                            
                            
                            </form>

                </div>

            </div>
            <!-- Fin de aceptar o rechazar reservas -->
            <?php }  ?>
            <a class="btn btn-default" href="index.php">Volver</a>


    <!--Listado de reservas realizadas -->
    <?php
        $queryRervasFin="SELECT id_puntajeCouch, id_reserva, DATE_FORMAT(finicio, '%d-%m-%y') AS finicio, DATE_FORMAT(ffin,'%d-%m-%y') AS ffin FROM reserva WHERE id_couch='".$_GET['id']."' AND estado='Finalizada' AND id_usuario='". $_SESSION['id_usuario'] ."'";
        $consultaReservasFin= mysqli_query($conexion, $queryRervasFin);
        while( $reservasFin = mysqli_fetch_array($consultaReservasFin)) {
            if (!isset($reservasFin['id_puntajeCouch'])) {
                ?>

                <div class="panel panel-primary puntajeCouch">
                    <div class="panel-heading">
                        <p>Puntúe su estadía del dia: <?php echo($reservasFin['finicio']); ?> hasta el
                            dia: <?php echo($reservasFin['ffin']); ?> </p>
                    </div>
                    <div class="panel-body">
                        <form method="get" action="consultas/alta_puntajeCouch.php" class="form-horizontal">
                            <div class="form-group">
                                <label for="puntReser" class="control-label">Puntua tu estadía: </label>
                                <input type="range" min="1" max="5" name="puntReser" id="puntReser"
                                       onchange="changeValue('puntReser' , 'puntReserShow')">
                                <input type="text" id="puntReserShow" size="2" maxlength="1" min="1" max="5"
                                       onkeypress="return is1to5(event)"
                                       onchange="changeValue('puntReserShow', 'puntReser')" required>
                            </div>
                            <div class="form-group">
                                <label for="puntReserCont" class="control-label">Deje su comentario sobre la
                                    estadía: </label>
                                <textarea class="form-control" rows="5" cols="50" maxlength="250" name="puntReserCont"
                                          id="puntReserCont"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Puntuar</button>
                            </div>
                            <input type="hidden" name="id_couch" value=<?php echo($_GET['id']); ?>>
                            <input type="hidden" name="id_reserva" value=<?php echo($reservasFin['id_reserva']); ?>>
                            <input type="hidden" name="id_usuario" value=<?php echo($_SESSION['id_usuario']); ?>>
                        </form>
                    </div>
                </div>

            <?php }
        }
    ?>

            <!-- Lista de preguntas y respuestas -->
    <h3> Preguntas de los usuarios: </h3>


    <?php

        $preguntasQuery="SELECT * FROM pregunta WHERE id_couch='" .$_GET['id'] ."'";
        $consulta= mysqli_query($conexion, $preguntasQuery);
        while($preguntas = mysqli_fetch_array($consulta)){
    ?>
            <ul class="list-group lista-preguntas">

        <li class="list-group-item">
           <!-- seccion de pregunta -->
            <div>
                
            <p class="text-left"> El usuario pregunta: </p>
            <?php echo($preguntas['contenidopregunta']) ?>


            </div>

           <!-- seccion de respiesta -->
            <div class="text-center respuesta">

                <?php if($preguntas['contenidorespuesta'] != null){
                    echo("<hr>");
                    echo("<p class="."text-left"."> Respuesta: </p>");
                    echo($preguntas['contenidorespuesta']);
                } else if($esDuenio){ ?>
                <hr>
                <button class="btn btn-primary">Responder</button>

             <?php   }  ?>

            </div>

        </li>
    </ul>

    <?php } ?>


    <!-- Text area para hacer preguntas en caso de que no sea el dueño del Couch -->

    <?php if(!$esDuenio){

        ?>


        <form name="form-preguntas" class="form-horizontal" method="GET" action="consultas/altaPregunta.php">
            <div class="form-group">
                <label class="control-label" for="preguntaCouch">Haga su pregunta al dueño: </label>
                <textarea class="form-control" rows="5" cols="50" maxlength="250" name="preguntaCouch" id="preguntaCouch" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default">Preguntar</button>
            </div>
            <input type="hidden" name="idCouch" value=<?php echo($_GET['id']); ?>>
            <input type="hidden" name="idUsuario" value=<?php echo($_SESSION['id_usuario']); ?>>
        </form>

    <?php } ?>
</div>
</body>

</html>
<?php } else { 
    echo("Este Couch ha sido eliminado"); ?>
    <br><a class="btn btn-default" href="index.php">Volver</a>

<?php } ?>


