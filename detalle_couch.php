<?php

include("conectarBD.php");
session_start();
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
    <link href="default.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <title> couchinn </title>
</head>

<body>

<?php include("navbar.php"); ?>
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

            <!-- Wrapper for slides class="img-responsive center-block"-->
            <div class="carousel-inner" role="listbox">
                <?php while ( $foto = mysqli_fetch_array($resultado_foto)) {
                    if( $first){ $first=false;?>
                    <div class="item active">
                        <img  src=<?php echo("fotos_hospedajes/".$foto["ruta"]);?> >
                     </div>
                <?php } else {?>
                    <div class="item">
                        <img  src=<?php echo("fotos_hospedajes/".$foto["ruta"]);?> >
                    </div>
                <?php }
                } ?>

            </div>
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
            </d1>
        </div>

        <p class="h2 col-md-offset-4"> Datos del usuario</p>

        <!-- informacion del usuario, ni idea porque no se lista igual que el couch -->

        <div class="col-md-offset-2 col-md-6 inf_couch">
            <d1 class="dl-horizontal">
                <dt> Nombre: </dt>
                <dd> <?php echo($couch["nombre"]) ?> <?php echo($couch["apellido"]) ?></dd>
                <dt> Email:</dt>
                <dd> <?php echo($couch["email"]) ?></dd>
                <dt> Teléfono:</dt>
                <dd> <?php echo($couch["telefono"]) ?></dd>
                <dt> Fecha de nacimiento:</dt>
                <dd> <?php echo($couch["fnac"]) ?></dd>
            </d1>
        </div>
        
    <?php   }    ?>
    <?php   if (!$esDuenio && !$_SESSION["admin"]) {  ?>
                <a class="btn btn-default" href="index.php">Reservar</a>
        <?php   }  ?>
</div>
</body>

</html>
<?php } else { 
    echo("Este Couch ha sido eliminado"); ?>
    <br><a class="btn btn-default" href="index.php">Volver</a>
<?php } ?>


