<?php
    session_start();
    if(isset($_SESSION['sesion_usuario'])){
        include_once ("conectarBD.php");
        $queryUsuario="SELECT email, nombre, apellido, telefono, DATE_FORMAT(fnac, '%d-%m-%y') AS fnacimiento FROM usuario WHERE id_usuario='".$_SESSION['id_usuario']."'";
        echo $queryUsuario;
        $resul= mysqli_query($conexion, $queryUsuario);

?>
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

    <title> Couchinn </title>
</head>

<body>

<?php
include("navbar.php");?>

<div class="container">
    <?php if (isset($_GET['msg'])) { ?>
    <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
        <?php echo($_GET['msg']); ?>
    </div>

 <!-- Datos personales del usuario       -->

<?php  } if ($consultaUsuario = mysqli_fetch_array($resul)){ ?>

        <div class="panel panel-primary ">
            <div class="panel-heading">
                <p> Datos Personales </p>
            </div>
            <div class="panel-body">

                <d1 class="dl-horizontal">
                    <dt> Nombre Completo:</dt>
                    <dd> <?php echo $consultaUsuario['nombre']." ".$consultaUsuario['apellido'] ?></dd>
                    <dt> Email: </dt>
                    <dd> <?php echo($consultaUsuario["email"]) ?></dd>
                    <dt> Fecha de Nacimiento: </dt>
                    <dd> <?php echo($consultaUsuario["fnacimiento"]) ?></dd>
                    <dt> Telefono: </dt>
                    <dd> <?php echo($consultaUsuario["telefono"]) ?></dd>
                </d1>

            </div>
        </div>

<?php } ?>

 <!-- Couchs del usuario       -->

<?php

   $couchQuery="SELECT id_couch,titulo,descripcion, ubicacion,descripcion ,capacidad, nombre_tipo FROM couch INNER JOIN tipo ON (couch.id_tipo = tipo.id_tipo) WHERE eliminado_couch='0' AND couch.id_usuario='".$_SESSION['id_usuario']."'";
   $resulCouch= mysqli_query($conexion, $couchQuery);

    if(mysqli_num_rows($resulCouch) != 0){ ?>
            <h1> Mis Couchs </h1>


        <div class="list-group">

            <?php while ($row = mysqli_fetch_array($resulCouch)){
                ?>

                <?php
                $titulo=$row["titulo"];
                $descripcion=$row["descripcion"];
                $ubicacion=$row["ubicacion"];
                $direccion=$row["direccion"];
                $capacidad=$row["capacidad"];
                $tipo=$row["nombre_tipo"];
                $id_couch=$row["id_couch"];
                $id_usuario=$row["id_usuario"];
                //

                $es_premium_query= "SELECT id_usuario FROM premium WHERE id_usuario='".$_SESSION['id_usuario']."'";
                $es_premium_query_res= mysqli_query($conexion, $es_premium_query);
                if(mysqli_num_rows($es_premium_query_res) == 0){
                    $esPremium=false;
                } else{
                    $esPremium=true;
                }

                ?>

                <a href="detalle_couch.php?id=<?php echo($id_couch) ?>" class="list-group-item">

                    <div class="row">
                        <div class="col-md-3"><img class="img-circle" height="130" width="180"  src="<?php
                            //Si es premium muestro la foto del hospedaje, si no muestro el logo de couchinn
                            if( (isset($esPremium)) && ($esPremium)){
                                $consultaFotos= "SELECT ruta FROM couch NATURAL JOIN foto WHERE couch.id_couch='".$id_couch."'";
                                $consulta_fotos_query= mysqli_query($conexion, $consultaFotos);
                                if(mysqli_num_rows($consulta_fotos_query) > 0){
                                    $rowRuta=mysqli_fetch_array($consulta_fotos_query);
                                    echo($rowRuta["ruta"]);

                                }
                                else
                                {
                                    echo("img/logoPremium.jpg");
                                }


                            }else{
                                echo("img/logo.png");

                            } ?>"></div>
                        <div class="col-md-6"><h4 class="list-group-item-heading"><?php echo($titulo) ?></h4>
                            <p class="list-group-item-text"><?php echo ("<strong>Descripción: </strong>".$descripcion."<br> <strong>Ubicación: </strong>".$ubicacion."<br> <strong>Dirección: </strong>".$direccion."<br> <strong>Capacidad: </strong> para ".$capacidad." personas. <br> <strong>Tipo: </strong>".$tipo); ?> </p></div>

                    </div>


                </a>


                <?php
            }

            ?>

        </div>
        
        
<?php        
    }
 ?>


</div>

</body>

</html>
<?php } else {
       header("Location: index.php?msg=Tiene que estar logueado para poder ver esta seccción&&class=alert-warning");

    }

?>