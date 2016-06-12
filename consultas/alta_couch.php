<?php
include_once("../conectarBD.php");

//datos enviados por POST
$idUser= $_POST['idUser'];
$titCouch= $_POST['titCouch'];
$descCouch= $_POST['descCouch'];
$ubCouh= $_POST['ubCouch'];
$dirCouch= $_POST['dirCouch'];
$capCouch= $_POST['capCouch'];
$tipCouch= $_POST['tipCouch'];
$warning= false;


//direccion base para los couch, se crea una carpeta para cada usuario
$dirBase = "../fotos_hospedajes/" . $idUser . "/";

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

    if($ok){ move_uploaded_file($_FILES['imgCouch']['tmp_name'][$i], $dirCompleta);}
    else { $warning= true; echo"no pudo agregar";}
}

