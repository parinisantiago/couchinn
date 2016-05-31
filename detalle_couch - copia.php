<?php

    include("conectarBD.php");

    $query= "SELECT * FROM couch INNER JOIN tipo ON (couch.id_tipo = tipo.id_tipo) INNER JOIN foto ON (couch.id_couch = foto.id_couch) INNER JOIN usuario ON (couch.id_usuario = usuario.id_usuario) WHERE couch.id_couch ='".$_GET["id"]."'";
    $resultado= mysqli_query($conexion, $query);

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

    <title> Couchinn </title>
</head>

<body>

<?php include("navbar.php"); ?>
<div class="container">
          <?php while ( $couch = mysqli_fetch_array($resultado)) { ?>

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
                      <dd> <?php echo($couch["fNac"]) ?></dd>
                  </d1>
              </div>

         <?php   }    ?>
      </div>
    </body>

</html>