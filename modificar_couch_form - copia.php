<?php
session_start();
//if(isset($_SESSION['sesion_usuario'])) {
include_once("conectarBD.php");
$query= "SELECT id_tipo,nombre_tipo FROM tipo WHERE eliminado = 0";
$resultTipo=mysqli_query($conexion, $query);
$idFotos = []; //Arreglo que guarda la id de las fotos del carousel para poder eliminarlas despues
$posActual = 0;
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

        <?php //CAROUSEL busca las fotos del couch para agregarlas al carousel
        $query_foto="SELECT ruta,id_foto FROM foto WHERE id_couch='".$row['id_couch']."'";
        $resultado_foto=mysqli_query($conexion, $query_foto);
        $cant_fotos=mysqli_num_rows($resultado_foto);
        $first = true;
        ?>


        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
            <!-- Indicators -->
            <ol class="carousel-indicators">

                <?php for($i = 0; $i < $cant_fotos; $i++){ ?>

                    <li data-target="#myCarousel" data-slide-to=<?php echo($i); if($i == 0){ echo(" class=active");} ?>></li>

                <?php } ?>

            </ol>

            <?php if ($cant_fotos != 0){ ?>
                <!-- Wrapper for slides class="img-responsive center-block"-->
                <div class="carousel-inner" role="listbox">
                    <?php while ( $foto = mysqli_fetch_array($resultado_foto)) {
                        if( $first){ $first=false;?>
                            <div class="item active">
                                <img  id = <?php echo($foto["id_foto"]); ?> src=<?php echo($foto["ruta"]);?> >
                            </div>
                        <?php } else {?>
                            <div class="item">
                                <img  id = <?php echo($foto["id_foto"]); ?> src=<?php echo($foto["ruta"]);?> >
                            </div>
                        <?php }
                        ?>
                        <button
                            type="submit" id = "<?php echo($foto["ruta"]);?>" class="btn btn-default center-block" form = "eliminarFoto"
                            name="eliminarFoto">Eliminar foto
                        </button>
                        <?php
                    } ?>
                    

                </div>
            <?php } else { ?>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img  src=<?php echo("img/logo.png");?> >
                    </div>
                </div>
            <?php }        ?>
            <!-- Controls -->
            <a class="left carousel-control" href="#myCarousel" id = "prev"  role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" id = "next"  role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <form class="form-horizontal" name="eliminarFoto" method="post" action="eliminarFoto.php">
        </form>
        <script type="text/javascript">
        function cambiarFotoSeleccionada(obj)
        {   
            var idFoto= <?php echo json_encode($idFoto); ?>; //TRADUCE DE ARRAY DE PHP A ARRAY DE JS
            if (obj.id = "prev")
            {

            }
            alert(document.getElementById(idFoto["fotos_hospedajes/10/foto2.jpg"]).src);
            
        }
        </script>
        <!-- botones de envio -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submit">Aceptar</button>
            <a class="btn btn-primary" href="listado_mis_couchs.php">Cancelar</a>
        </div>
    </form>
</div>

</body>
</html>