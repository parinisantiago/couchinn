<?php
session_start();
if( isset($_SESSION['sesion_usuario']) ){
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
        <script src="js/altaValidaciones.js"></script>
        <title> el mejor couch </title>

    </head>
    

    <?php
        include("navbar.php");
        include("conectarBD.php");
        if(isset($_SESSION['admin'])){
            $query="SELECT * FROM admin WHERE id_admin='".$_SESSION['id_usuario']."'";
        } else {
            $query = "SELECT * FROM usuario WHERE id_usuario='" . $_SESSION['id_usuario'] . "'";
        }
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_array($result);
    ?>
    <!-- hay un bardo con el formulario de iniciar sesion en la navbar, valida el html cuando no debería. -->
    
    <body>
    <div class="container">
        <?php if (isset($_GET['msg'])) { ?>
            <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
                <?php echo($_GET['msg'])?>
            </div>
        <?php }
        if (isset($_SESSION['admin'])) {?>
        <form class="form-horizontal" name="altaUsuario" method="post" onsubmit="return valAdmin()" action="consultas/mod_usuario.php">
            <div class="form-group">
                <label class="control-label" for="passUser">Contraseña</label>
                <input type="password" name="passUser" class="form-control" id="passUser" placeholder="Contraseña" aria-describedby="helpBlock-pass" value="<?php echo($row['clave']); ?>" required>
                <span id="glyphicon-pass" aria-hidden="true"></span>
                <span id="helpBlock-pass" class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="rePassUser">Confirmar Contraseña</label>
                <input type="password" name="rePassUser" class="form-control" id="rePassUser" placeholder="Confirmar Contraseña" aria-describedby="helpBlock-rePass" value="<?php echo($row['clave']); ?>" required>
                <span id="glyphicon-rePass" aria-hidden="true"></span>
                <span id="helpBlock-rePass" class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="emailUser">Email</label>
                <input type="email" name="emailUser" class="form-control" id="emailUser" placeholder="Email" aria-describedby="helpBlock-email" value="<?php echo($row['email']); ?>"  required>
                <span id="glyphicon-email" aria-hidden="true"></span>
                <span id="helpBlock-email" class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="reEmailUser">Confirmar Email</label>
                <input type="email" name="reEmailUser" class="form-control" id="reEmailUser" placeholder="Confirmar Email" aria-describedby="helpBlock-reEmail" value="<?php echo($row['email']); ?>" required>
                <span id="glyphicon-reEmail" aria-hidden="true"></span>
                <span id="helpBlock-reEmail" class="help-block"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Registrarse</button>
                <button type="button" class="btn btn-default" href="index.php">Cancelar</button>
            </div>
        </form>
            <?php }else{ ?>
        <form class="form-horizontal" name="altaUsuario" method="post" onsubmit="return valUsuario()" action="consultas/mod_usuario.php">
            <div class="form-group">
                <label class="control-label" for="nomUser">Nombre</label>
                <input type="text" name="nomUser" class="form-control" id="nomUser" placeholder="Nombre" aria-describedby="helpBlock-nom" value="<?php echo($row['nombre']); ?>" required>
                <span id="glyphicon-nom" aria-hidden="true"></span>
                <span id="helpBlock-nom" class="help-block"></span>
            </div>1
            <div class="form-group">
                <label class="control-label" for="apUser">Apellido</label>
                <input type="text" name="apUser" class="form-control" id="apUser" placeholder="Apellido" aria-describedby="helpBlock-ap" value="<?php echo($row['apellido']); ?>" required>
                <span id="glyphicon-ap" aria-hidden="true"></span>
                <span id="helpBlock-ap" class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="passUser">Contraseña</label>
                <input type="password" name="passUser" class="form-control" id="passUser" placeholder="Contraseña" aria-describedby="helpBlock-pass" value="<?php echo($row['clave']); ?>" required>
                <span id="glyphicon-pass" aria-hidden="true"></span>
                <span id="helpBlock-pass" class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="rePassUser">Confirmar Contraseña</label>
                <input type="password" name="rePassUser" class="form-control" id="rePassUser" placeholder="Confirmar Contraseña" aria-describedby="helpBlock-rePass" value="<?php echo($row['clave']); ?>" required>
                <span id="glyphicon-rePass" aria-hidden="true"></span>
                <span id="helpBlock-rePass" class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="emailUser">Email</label>
                <input type="email" name="emailUser" class="form-control" id="emailUser" placeholder="Email" aria-describedby="helpBlock-email" value="<?php echo($row['email']); ?>"  required>
                <span id="glyphicon-email" aria-hidden="true"></span>
                <span id="helpBlock-email" class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="reEmailUser">Confirmar Email</label>
                <input type="email" name="reEmailUser" class="form-control" id="reEmailUser" placeholder="Confirmar Email" aria-describedby="helpBlock-reEmail" value="<?php echo($row['email']); ?>" required>
                <span id="glyphicon-reEmail" aria-hidden="true"></span>
                <span id="helpBlock-reEmail" class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="fNacUser">Fecha de Nacimiento</label>
                <input type="date" name="fNacUser" class="form-control" id="fNacUser" placeholder="Fecha de Nacimiento" max="<?php echo $today ?>" min="1900-01-01" aria-describedby="helpBlock-fNac" value="<?php echo($row['fnac']); ?>" required>
                <span id="glyphicon-fNac" aria-hidden="true"></span>
                <span id="helpBlock-fNac" class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="numUser">Telefono</label>
                <input type="text" name="numUser" class="form-control" id="numUser" placeholder="Telefono" aria-describedby="helpBlock-num" value="<?php echo($row['telefono']); ?>" required>
                <span id="glyphicon-num" aria-hidden="true"></span>
                <span id="helpBlock-num" class="help-block"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Registrarse</button>
                <button type="button" class="btn btn-default" href="index.php">Cancelar</button>
            </div>
        </form>
            <?php } ?>
    </div>

    </body>

    </html>



<?php
	//si no esta loggueado redirige al usuario al index y le manda por get el mensaje correspondiente y setea al error como un warning
	} else {
    header("Location: index.php?msg=debe estar logueado para ver esta pagina&&class=alert-warning");
}?>