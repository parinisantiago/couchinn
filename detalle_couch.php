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

		<title> el mejor couch </title>
	</head>

	<body>
      <div class="container">
          <?php foreach ( mysqli_fetch_array($resultado) as $couch ) { ?>

         <?php   }    ?>
      </div>
    </body>

</html>