<?php
include_once("../conectarBD.php");

//datos enviados por POST
$idCouch= $_POST['idCouch'];
$idUser= $_POST["idUser"];
$titCouch= $_POST['titCouch'];
$descCouch= $_POST['descCouch'];
$ubCouch= $_POST['ubCouch'];
$dirCouch= $_POST['dirCouch'];
$capCouch= $_POST['capCouch'];
$tipCouch= $_POST['tipCouch'];
$fPublicacion= date('Y-m-d');

//Checkea que el couch no exista en la bd.
$validoCouch="SELECT titulo, id_tipo, id_usuario, eliminado_couch FROM couch WHERE (titulo = '" . $titCouch ." ' AND id_tipo = '" . $tipCouch ." ' AND id_usuario = '" . $idUser ." ' AND id_couch <> '" . $idCouch ." ' AND eliminado_couch = 0)";
$resultadoValidoCouch=mysqli_query($conexion, $validoCouch);
//Si no existe un couch igual
if (mysqli_num_rows($resultadoValidoCouch) == 1) {
    header("Location: ../index.php?msg=No se pudo modificar su couch, ya tiene uno publicado con el mismo titulo y tipo&&class=alert-danger"); 
} //Lo agrego despues de validar
 else { 

		//PARA AGREGAR NUEVAS FOTOS
		$warning = false;
		//direccion base para los couch, se crea una carpeta para cada usuario
		$dirBase = "../fotos_hospedajes/" . $idUser . "/". $idCouch . "/";
		$dirBase2 = "fotos_hospedajes/" . $idUser . "/". $idCouch . "/";
		//si el usuario no posee una carpeta para guardar sus fotos, la crea
		 if( ! file_exists($dirBase)) { mkdir($dirBase, 0777);}

		//valida las imagenes una por una
		$total = count($_FILES['imgCouch']['name']);
		for ( $i = 0; $i < $total; $i++){

			$ok=true;

			//ruta propiamente de la imagen
			$dirCompleta = $dirBase . basename($_FILES["imgCouch"]["name"][$i]);

			//valida que sea es una imagen
			$tipoImgCouch = $_FILES['imgCouch']['type'][$i];
			if (!($tipoImgCouch == 'image/png' || $tipoImgCouch == 'image/jpg' || $tipoImgCouch == 'image/jpeg')) { $ok = false; }

			//valida que la imagen no exista
		    if (file_exists($dirCompleta)) { $ok=false;}

		    if($ok){
		        move_uploaded_file($_FILES['imgCouch']['tmp_name'][$i], $dirCompleta);
		        $dir2= $dirBase2.basename($_FILES["imgCouch"]["name"][$i]);
		        $query="INSERT INTO foto(id_couch, ruta) VALUES ('".$idCouch."','".$dir2."')";
		        mysqli_query($conexion, $query);
		    }
		    else { $warning= true;}

		}

		//PARA BORRAR FOTOS
		$query= "SELECT id_foto,ruta FROM foto WHERE id_couch='".$idCouch."'";
		$resultado= mysqli_query($conexion, $query);
		while ($row = mysqli_fetch_array($resultado))
		{
			$imagenSelec = "imagenSeleccionada_".$row["id_foto"];
			if (isset($_POST[$imagenSelec]))
			{
				$ruta = "../".$row["ruta"];
				unlink($ruta);
				$delete= "DELETE FROM foto WHERE id_foto='".$row['id_foto']."'";
				mysqli_query($conexion,$delete);
			}
		}

		//PARA ACTUALIZAR RESTO DE DATOS
		$query= "SELECT * FROM couch WHERE id_couch='".$idCouch."'";
		$resultado= mysqli_query($conexion, $query);
		$row=mysqli_fetch_array($resultado);
		if($row != 0) {
		   $update="UPDATE couch SET titulo='".$titCouch."' ,descripcion='".$descCouch."' ,ubicacion='".$ubCouch."' ,direccion='".$dirCouch."' ,capacidad='".$capCouch."',id_tipo='".$tipCouch."' WHERE id_couch='".$idCouch."'";
		    mysqli_query($conexion,$update);
		    if($warning){
		        header("Location: ../listado_mis_couchs.php?msg=Su couch se ha modificado correctamente salvo algunas fotos que no se pudieron agregar por tener un formato invalido&&class=alert-warning");
		    } else { header("Location: ../listado_mis_couchs.php?msg=Su couch se ha modificado correctamente&&class=alert-success");}

		}
		else
		{
		    header("Location: ../listado_mis_couchs.php?msg=Su couch no se ha podido modificar&&class=alert-danger");
		}
}
