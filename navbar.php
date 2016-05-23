<?php
session_start();
if( isset($_SESSION['sesion_usuario']) ){

    //si es administrador muestra esta barra
    if( isset($_SESSION['admin'])) {
    ?>

        <nav class="navbar navbar-inverse navbar-fixed-top" >
            <div class="container" >
                <div id = "navbar" class="navbar-collapse collapse" >

                    <ul class="nav navbar-nav" >
                        <li ><a href = "index.php" > Home</a ></li >

                        <li ><a href = "listado_tipos_hospedajes.php" > Listado de tipos de hospedajes</a ></li >
                        <li class="dropdown" >
                            <a href = "#" class="dropdown-toggle" data-toggle= "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false" > Mi perfil <span class="caret" ></span ></a >
                            <ul class="dropdown-menu" >
                                <li ><a href = "#" > Ver perfil </a ></li >
                                <li ><a href = "user_modForm.php" > Modificar perfil </a ></li >
                            </ul >
                        </li >
                    </ul >

                    <form id="user-session" class="form-inline pull-right" method="post" action="consultas/cerrar_sesion.php">
                        <button type="submit" class="btn btn-default">Close Session</button>
                    </form>

                </div >
            </div >
        </nav >

    <?php
        //si no es admin muestra la pagina de usuario comun
        } else {

    ?>

    <nav class="navbar navbar-inverse navbar-fixed-top" >
        <div class="container" >
            <div id = "navbar" class="navbar-collapse collapse" >

                <ul class="nav navbar-nav" >
                    <li ><a href = "index.php" > Home</a ></li >

                    <?php

                        //Si no es premium, mostrar boton para hacerse premium, estaria agregar un mensaje de que ya es premium en el caso de que lo sea con un else
                            include_once("conectarBD.php");
                            $query= "SELECT id_usuario FROM premium WHERE id_usuario='".$_SESSION['id_usuario']."'";
                            $resultado= mysqli_query($conexion, $query);
                            
                            if(mysqli_num_rows($resultado) == 0){
                    ?>

                                <li ><a href = "hacerse_premium.php" > Ser Premium</a ></li >

                    <?php }  ?>
                    <li class="dropdown" >
                        <a href = "#" class="dropdown-toggle" data-toggle= "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false" > Mi perfil <span class="caret" ></span ></a >
                        <ul class="dropdown-menu" >
                            <li ><a href = "#" > Ver perfil </a ></li >
                            <li ><a href = "user_modForm.php" > Modificar perfil </a ></li >
                        </ul >
                    </li >
                </ul >

                <form id="user-session" class="form-inline pull-right" method="post" action="consultas/cerrar_sesion.php">
                    <button type="submit" class="btn btn-default">Close Session</button>
                </form>

            </div >
        </div >
    </nav >

<?php }  } else {?>

    <nav class="navbar navbar-inverse navbar-fixed-top" >
        <div class="container">
            <div id="navbar" class="navbar-collapse collapse">

                <ul class="nav navbar-nav">
                    <li ><a href = "index.php" > Home</a ></li >
                    <li ><a href = "#" > About</a ></li >
                    <li ><a href = "#" > Contact</a ></li >
                </ul>

                <form id="register" class="form-inline pull-right" method="get" action="user_form.php">
                    <button type="submit" class="btn btn-default">Registrarse </button>
                </form>

                <form id="user-session" class="form-inline pull-right" method="post" action="consultas/logueo_usuario.php">
                    <div class="form-group">
                        <label class="sr-only" for="emailLoggin">Email address</label>
                        <input type="email" name="email" class="form-control" id="emailLoggin" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="claveLoggin">Password</label>
                        <input type="password" name="clave" class="form-control" id="claveLoggin" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-default">Sign in</button>
                </form>
            </div>
        </div>
    </nav>

<?php } ?>

    <div class="" id="img-header">
        <img class="img-responsive center-block" src="img/header.png">
    </div>
