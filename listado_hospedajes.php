<?php	            	
	include_once("conectarBD.php");
	$esPremium = false;
	//Para que tome a "Cualquiera" como nulo cuando viene del index.
	if ($_GET["tipo"] == "Cualquiera"){
		$_GET["tipo"] = '';
	}
	$query= "SELECT * FROM couch NATURAL JOIN tipo WHERE (couch.despublicado = 0 AND couch.eliminado_couch = 0 AND couch.titulo LIKE '%".$_GET["titulo"]."%' AND couch.descripcion LIKE '%".$_GET["descripcion"]."%' AND couch.ubicacion LIKE '%".$_GET["ubicacion"]."%' AND couch.capacidad LIKE '%".$_GET["capacidad"]."%' AND tipo.nombre_tipo LIKE '%".$_GET["tipo"]."%')";
	$resultado= mysqli_query($conexion, $query);
	//Si no se arrojan resultados, se informa sobre lo ocurrido.
	if (mysqli_num_rows($resultado) == 0) { ?>
	<h4>No se encontraron couchs que coincidan con los criterios de búsqueda establecidos.</h4>	
	<?php } ?>


<div class="list-group">
	
    <?php while ($row = mysqli_fetch_array($resultado)){
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
					
		$es_premium_query= "SELECT id_usuario FROM premium WHERE id_usuario='".$id_usuario."'";
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

	