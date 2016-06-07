<?php
    session_start();
    if(isset($_SESSION['sesion_usuario'])) {
        ?>
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
        <!-- hay un bardo con el formulario de iniciar sesion en la navbar, valida el html cuando no debería. -->
    <div class="container">
        <?php if (isset($_GET['msg'])) { ?>
            <div id="alert" role="alert" class="col-md-offset-2 col-md-8 alert <?php echo($_GET['class']) ?>">
                <?php echo($_GET['msg']) ?>
            </div>
        <?php } ?>
        <form class="form-horizontal" name="altaCouch" method="post" onsubmit="return valCouch()" action="consultas/alta_couch.php">
            <div class="form-group">
                <span class="text-muted"><em><span style="color:red;">*</span> Estos campos son requeridos</em></span>
            </div>
            <div class="form-group">
                <label class="control-label" for="idUser"></label>
                <input type="hidden" name="idUser" class="form-control" id="idUser" value=<?php $_SESSION['id_usuario']?>>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Aceptar</button>
                <a class="btn btn-default" href="index.php">Cancelar</a>
            </div>
        </form>
    </div>

        <?php
    }else{
        header("Location: index.php?msg=debe estar logueado para ver esta pagina&&class=alert-warning");
    }