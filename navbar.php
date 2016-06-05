<?php


if(!isset($_SESSION['sesion_usuario']) && !isset($_SESSION["anonimo"])){
    session_start();
    $_SESSION["anonimo"] = true;
}
if( isset($_SESSION['sesion_usuario'])){
    //si es administrador muestra esta barra
    if( isset($_SESSION['admin']) && ($_SESSION['admin'] == true)) {
        
    ?>
        
        <nav class="navbar navbar-inverse navbar-fixed-top" >
            <div class="container" >
                <div id = "navbar" class="navbar-collapse collapse" >

                    <ul class="nav navbar-nav" >
                        <li ><a href = "index.php" > <img class="img-responsive center-block" height = "40" width = "100" src="img/header.png"></a ></li >

                        <!--ASI ESTABA ANTES EL LISTADO DE TIPOS DE HOSPEDAJE, LO DEJO COMENTADO - LUCAS-->
                        <!--<li ><a href = "listado_tipos_hospedajes.php" > Listado de tipos de hospedajes</a ></li >
                        <li ><a href = "#" > Agregar tipos de hospedajes</a ></li >
                        <li ><a href = "#" > Modificar tipos de hospedajes</a ></li >
                        <li ><a href = "#" > Eliminar tipos de hospedajes</a ></li >-->
                        <li class="dropdown" >
                            <a href = "#" class="dropdown-toggle" data-toggle= "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false" > Manejar Tipos de Hospedaje <span class="caret" ></span ></a >
                            <ul class="dropdown-menu" >
                                <li ><a href = "listado_tipos_hospedajes.php" > Listado de tipos de hospedajes</a ></li >
                                <li ><a href = "alta_tipos_hospedaje_form.php" > Agregar tipos de hospedajes</a ></li >
                                <!--
                                <li ><a href = "modificar_tipos_hospedaje_form.php" > Modificar tipos de hospedajes</a ></li >
                                <li ><a href = "eliminar_tipos_hospedaje_form.php" > Eliminar tipos de hospedajes</a ></li >
                                -->
                            </ul >
                        </li >
                        <li class="dropdown" >
                            <a href = "#" class="dropdown-toggle" data-toggle= "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false" > Mi perfil <span class="caret" ></span ></a >
                            <ul class="dropdown-menu" >
                                <li ><a href = "#" > Ver perfil </a ></li >
                                <li ><a href = "user_modForm.php" > Modificar perfil </a ></li >
                            </ul >
                        </li >
                    </ul >

                    <form id="user-session" class="form-inline pull-right" method="post" action="consultas/cerrar_sesion.php">
                    
                        <span style="color:white;"><?php echo("Usted ha iniciado sesión como administrador")?></span> 
                        <button type="submit" class="btn btn-default">Cerrar Sesion</button>
                    </form>


                </div >
            </div >
        </nav >

    <?php
        //si no es admin muestra la pagina de usuario comun
         }else {
    ?>

    <nav class="navbar navbar-inverse navbar-fixed-top" >
        <div class="container" >
            <div id = "navbar" class="navbar-collapse collapse" >

                <ul class="nav navbar-nav" >
                    <li ><a href = "index.php" > <img class="img-responsive center-block" height = "40" width = "100" src="img/header.png"></a ></li >

                    <?php

                        //Si no es premium, mostrar boton para hacerse premium, estaria agregar un mensaje de que ya es premium en el caso de que lo sea con un else
                            include_once("conectarBD.php");
                            $query= "SELECT id_usuario FROM premium WHERE id_usuario='".$_SESSION['id_usuario']."'";
                            $resultado_navbar= mysqli_query($conexion, $query);

                            if(mysqli_num_rows($resultado_navbar) == 0){
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
                    <span style="color:white;"><?php echo("Usted ha iniciado sesión como ".$_SESSION["nombre_completo"])?></span>     
                    <button type="submit" class="btn btn-default">Cerrar Sesion</button>
                </form>

            </div >
        </div >
    </nav >

<?php }  } else { include("modal-Pass.php");?>

    <nav class="navbar navbar-inverse navbar-fixed-top" >
        <div class="container">
            <div id="navbar" class="navbar-collapse collapse">

                <ul class="nav navbar-nav">
                    <li ><a href = "index.php" > <img class="img-responsive center-block" height = "40" width = "100" src="img/header.png"></a ></li >
                    <li> <a href="#" data-toggle="modal" data-target="#modalRecPass"> Recuperar Contraseña </a>
                    </li>
                </ul>


                <form id="register" class="form-inline pull-right" method="get" action="user_form.php">
                    <button type="submit" class="btn btn-default">Registrarse </button>
                </form>


                <form id="user-session" class="form-inline pull-right" method="post"  action="consultas/logueo_usuario.php">
                    
                    <div class="form-group">
                        <label class="sr-only" for="emailLoggin">Email</label>
                        <input type="email" name="email" class="form-control" id="emailLoggin" placeholder="Email" maxlength="30" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="claveLoggin">Contraseña</label>
                        <input type="password" name="clave" class="form-control" id="claveLoggin" placeholder="Contraseña" maxlength="15" required>
                    </div>
                    <button type="submit" class="btn btn-default">Iniciar Sesion</button>

                </form>
            </div>
        </div>
    </nav>

<?php } ?>

    <div class="" id="img-header">

    </div>
