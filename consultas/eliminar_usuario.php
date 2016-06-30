<?php
    session_start();
    include_once("../conectarBD.php");

    $query= "SELECT * FROM usuario WHERE id_tipo='".$_POST['idTipo']."'";

    $resultado= mysqli_query($conexion, $query);
    $row=mysqli_fetch_array($resultado);

    if($row["nombre_tipo"] == $nombre) {

      $update="UPDATE tipo SET eliminado=1 WHERE id_tipo='".$_POST['idTipo']."'";
      mysqli_query($conexion,$update);
      header("Location: ../manejo_usuarios.php?msg=El Usuario se ha eliminado correctamente&&class=alert-success");
    }else {
      header("Location: ../manejo_usuarios.php?msg=ERROR&&class=alert-danger");
    }
    