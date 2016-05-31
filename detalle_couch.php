<?php

include("conectarBD.php");

$query= "SELECT * FROM couch INNER JOIN tipo ON (couch.id_tipo = tipo.id_tipo) INNER JOIN usuario ON (couch.id_usuario = usuario.id_usuario) WHERE couch.id_couch ='".$_GET["id"]."'";
$resultado= mysqli_query($conexion, $query);
$first= true; //control para las imagenes
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

                    <li data-target="#carousel-example-generic" data-slide-to=<?php echo($i); if($i == 0){ echo(" class=active");} ?>></li>

                <?php } ?>

            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php while ( $foto = mysqli_fetch_array($resultado_foto)) {
                    if( $first){ $first=false;?>
                    <div class="item active">
                        <img src=<?php echo("fotos_hospedajes/".$foto["ruta"]);?> >
                     </div>
                <?php } else {?>
                    <div class="item">
                        <img src=<?php echo("fotos_hospedajes/".$foto["ruta"]);?> >
                    </div>
                <?php }
                } ?>

            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <p class="h2 col-md-offset-4"> Datos del Couch</p>

        <!-- infromacion del couch -->

        <div class="col-md-offset-2 col-md-6 inf_couch">
            <d1 class="dl-horizontal">
                <dt> título: </dt>
                <dd> <?php echo($couch["titulo"]) ?></dd>
                <dt> descripción: </dt>
                <dd> <?php echo($couch["descripcion"]) ?></dd>
                <dt> tipo:</dt>
                <dd> <?php echo($couch["nombre_tipo"]) ?></dd>
                <dt> ubicación: </dt>
                <dd> <?php echo($couch["ubicacion"]) ?></dd>
                <dt> dirección: </dt>
                <dd> <?php echo($couch["direccion"]) ?></dd>
                <dt> capacidad: </dt>
                <dd> <?php echo($couch["capacidad"]) ?></dd>
                <dt> fecha: </dt>
                <dd> <?php echo(date("d/m/y", $couch["fecha"])) ?></dd>
            </d1>
        </div>

        <p class="h2 col-md-offset-4"> Datos del usuario</p>

        <!-- informacion del usuario, ni idea porque no se lista igual que el couch -->

        <div class="col-md-offset-2 col-md-6 inf_couch">
            <d1 class="dl-horizontal">
                <dt> nombre: </dt>
                <dd> <?php echo($couch["nombre"]) ?> <?php echo($couch["apellido"]) ?></dd>
                <dt> email:</dt>
                <dd> <?php echo($couch["email"]) ?></dd>
                <dt> teléfono:</dt>
                <dd> <?php echo($couch["telefono"]) ?></dd>
                <dt> fecha de nacimiento:</dt>
                <dd> <?php echo(date("d/m/y",$couch["fNac"])) ?></dd>
            </d1>
        </div>

    <?php   }    ?>
</div>
</body>

</html>