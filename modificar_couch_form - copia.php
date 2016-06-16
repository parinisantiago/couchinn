<?php
session_start();
//if(isset($_SESSION['sesion_usuario'])) {
include_once("conectarBD.php");
$query= "SELECT id_tipo,nombre_tipo FROM tipo WHERE eliminado = 0";
$resultTipo=mysqli_query($conexion, $query);
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="default.css" rel="stylesheet">
    <link rel="icon" href="img/logo.png">
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/altaValidaciones.js"></script>
    <title> Couchinn </title>

</head>
<body>
<?php include("navbar.php") ?>
<?php
        include("conectarBD.php");
        $query = "SELECT * FROM couch WHERE id_couch='" . $_POST["couch"] . "'";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_array($result);
    ?>
<!-- hay un bardo con el formulario de iniciar sesion en la navbar, valida el html cuando no debería. -->
<div class="container">
    <?php if (isset($_GET['msg'])) { ?>
        <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
            <?php echo($_GET['msg']) ?>
        </div>
    <?php } ?>
    <form class="form-horizontal" name="altaCouch" method="post" action="consultas/modificar_couch.php" enctype="multipart/form-data">
        <div class="form-group">
            <span class="text-muted"><em><span style="color:red;">*</span> Estos campos son requeridos</em></span>
        </div>

        <!-- id dueno couch -->
        <div class="form-group">
            <label class="control-label" for="idUser"></label>
            <input type="hidden" name="idCouch" class="form-control" id="idCouch" value=<?php echo($row['id_couch'])?>>
        </div>

        <!-- titulo couch -->
        <div class="form-group">
            <label class="control-label" for="titCouch">Título<span style="color:red;">*</span></label>
            <input type="text" name="titCouch" class="form-control" id="titCouch" placeholder="El nombre de mi couch" onkeypress="return isLetterKey(event)" maxlength="100" aria-describedby="helpBlock-nom" value = "<?php echo($row['titulo']);?>"  required>
            <span id="glyphicon-titCouch" aria-hidden="true"></span>
            <span id="helpBlock-titCouch" class="help-block"></span>
        </div>

        <!-- descripcion couch -->
        <div class="form-group">
            <label class="control-label" for="descCouch">Descripción<span style="color:red;">*</span></label>
            <textarea name="descCouch" class="form-control" id="descCouch" maxlength="500" aria-describedby="helpBlock-nom"  rows="5" cols="50" required><?php echo($row['descripcion']);?></textarea>
            <span id="glyphicon-descCouch" aria-hidden="true"></span>
            <span id="helpBlock-descCouch" class="help-block"></span>
        </div>

        <!-- ubicacion couch -->
        <div class="form-group">
            <label class="control-label" for="ubCouch">Ubicación<span style="color:red;">*</span></label>
            <input type="text" name="ubCouch" class="form-control" id="ubCouch" placeholder="La Plata, Buenos aires, Argentina" onkeypress="return isLetterKey(event)" maxlength="100" value = "<?php echo($row['ubicacion']);?>" aria-describedby="helpBlock-nom" required>
            <span id="glyphicon-ubCouch" aria-hidden="true"></span>
            <span id="helpBlock-ubCouch" class="help-block"></span>
        </div>

        <!-- direccion couch -->
        <div class="form-group">
            <label class="control-label" for="dirCouch">Dirección<span style="color:red;">*</span></label>
            <input type="text" name="dirCouch" class="form-control" id="dirCouch" value = "<?php echo($row['direccion']);?>" placeholder="Santa Fe e/ Corrientes y Brasil n 1500" maxlength="100" aria-describedby="helpBlock-nom" required>
            <span id="glyphicon-dirCouch" aria-hidden="true"></span>
            <span id="helpBlock-dirCouch" class="help-block"></span>
        </div>

        <!-- capacidad couch -->
        <div class="form-group">
            <label class="control-label" for="capCouch">Capacidad<span style="color:red;">*</span></label>
            <select class="form-control" id="capCouch" name="capCouch">
                <?php for($i=1; $i <= 20; $i++){

                    if ($i == $row["capacidad"])
                    { ?>

                        <option selected value=<?php echo($i); ?>> <?php echo($i); ?> </option>
                    <?php
                    }
                    else
                    { ?>

                        <option  value=<?php echo($i); ?>> <?php echo($i); ?> </option>

                <?php } ?>
            <?php } ?>
            </select>
        </div>

        <!-- tipo couch -->
        <div class="form-group">
            <label class="control-label" for="tipCouch">Tipo de couch<span style="color:red;">*</span></label>
            <select class="form-control" id="tipCouch" name="tipCouch">
                <?php while ( $tipos = mysqli_fetch_array($resultTipo) ){

                    if ($tipos["id_tipo"] == $row["id_tipo"])
                    { ?>
                        <option selected value=<?php echo($tipos['id_tipo']); ?>> <?php echo($tipos['nombre_tipo']); ?> </option>
                    <?php
                    }
                    else
                    { ?>
                        <option  value=<?php echo($tipos['id_tipo']); ?>> <?php echo($tipos['nombre_tipo']); ?> </option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>

        <!-- imagen couch -->
        <div class="form-group">
            <label class="control-label" for="imgCouch">
                Añada nuevas fotos:
                <?php
                $query_premium="SELECT id_usuario FROM premium WHERE id_usuario='". $_SESSION['id_usuario'] ."'";
                $result_premium= mysqli_query($conexion, $query_premium);
                if (mysqli_num_rows($result_premium) > 0){ ?>

                    <span style="color: red"> Si todavia no ha subido imagenes, la primera imagen que suba se la considerará como portada del couch</span>

                <?php } ?>

            </label>
            <input type="file" name="imgCouch[]" id="imgCouch" multiple="multiple">
        </div>


        <!-- botones de envio -->
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="submit">Aceptar</button>
            <a class="btn btn-default" href="listado_mis_couchs.php">Cancelar</a>
        </div>
    </form>
</div>

</body>
</html>