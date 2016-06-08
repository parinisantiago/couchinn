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
    $baseDir="img/".$idUser;

    //validaciones de la imagen del couch
    $imgCouchDir=$baseDir . basename($_FILES['imgCouch']['name']);
    $imgCouchType= pathinfo($imgCouchDir, PATHINFO_EXTENSIONH);

    //valida se es una imagen

    $check = getimagesize($_FILES["imgCouch"]["tmp_name"]);
    if($check !== true) header("redirect: ../altaCouch.php?variable=algo");