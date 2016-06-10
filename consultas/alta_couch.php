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


//direccion base para los couch, se crea una carpeta para cada usuario
$dirBase = "../fotos_hospedajes/" . $idUser . "/";
$dirCompleta = $dirBase . basename($_FILES["imgCouch"]["name"]);
$dirCompletaPrin=$dirBase . basename($_FILES['imgPrinCouch']['name']);
//si el usuario no posee una carpeta para guardar sus fotos, la crea
 if( ! file_exists($dirBase)) {
     echo("no existe la carpeta");
     mkdir($dirBase, 0777);
 } else { echo("existe la carpeta");}

//valida que sea es una imagen
$tipoImgCouch = $_FILES['imgCouch']['type'];
$tipoImgPrinCouch = $_FILES['imgPrinCouch']['type'];
if(! ( $tipoImgCouch == 'image/png' || $tipoImgCouch == 'image/jpg' || $tipoImgCouch == 'image/jpeg')){ header("redirect: ../altaCouch.php?variable=entro por el check");}
if(! ( $tipoImgPrinCouch == 'image/png' || $tipoImgPrinCouch == 'image/jpg' || $tipoImgPrinCouch == 'image/jpeg')){ header("redirect: ../altaCouch.php?variable=entro por el check");}

//valida que la imagen no exista
if (file_exists($dirCompleta)){ echo("algo"); }
if (file_exists($dirCompletaPrin)){ echo("algo"); }


//si pasa todas las validaciones intenta agrega la imagen
if (move_uploaded_file($_FILES["imgCouch"]["tmp_name"], $dirCompleta)) {
    echo "The file ". basename( $_FILES["imgCouch"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}

if (move_uploaded_file($_FILES["imgPrinCouch"]["tmp_name"], $dirCompletaPrin)) {
    echo "The file ". basename( $_FILES["imgPrinCouch"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}


