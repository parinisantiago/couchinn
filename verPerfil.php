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

<a class="btn btn-primary" href="listado_mis_couchs.php?desde=Perfil"> Mis couchs </a>
<a class="btn btn-primary" href="mis_reservas_realizadas.php?desde=Perfil"> Mis reservas </a>
<a class="btn btn-primary" href="user_modForm.php"> Modificar </a>
<a class="btn btn-primary" href="index.php"> Volver </a>


</div>

</body>

</html>
<?php } else {
       header("Location: index.php?msg=Tiene que estar logueado para poder ver esta seccción&&class=alert-warning");

    }

?>