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
                            <a href = "#" class="dropdown-toggle" data-toggle= "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false" > Generar Listados <span class="caret" ></span ></a >
                            <ul class="dropdown-menu" >
                                <li>
                                <a href="listado_aceptadas_finalizadas_admin.php">Reservas</a>
                                </li>
                                <li>
                                <a href="manejo_usuarios.php">Usuarios</a>
                                </li>
                                <li>
                                <a href="listado_ganancias_admin.php">Ganancias</a>
                                </li>
                            </ul >

                        </li >
                        <li class="dropdown" >
                            <a href = "#" class="dropdown-toggle" data-toggle= "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false" > Administrador <span class="caret" ></span ></a >
                            <ul class="dropdown-menu" >
                                <li ><a href = "#" > Ver perfil </a ></li >
                                <li ><a href = "user_modForm.php" > Modificar perfil </a ></li >
                            </ul >

                        </li >
                        
                        
                    </ul >

                    <form id="user-session" class="form-inline pull-right" method="post" action="consultas/cerrar_sesion.php">
                        <button type="submit" class="btn btn-primary">Cerrar Sesion</button>
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
                    $esPremium = true;
                        //Si no es premium, mostrar boton para hacerse premium, estaria agregar un mensaje de que ya es premium en el caso de que lo sea con un else
                            include_once("conectarBD.php");
                            $query= "SELECT id_usuario FROM premium WHERE id_usuario='".$_SESSION['id_usuario']."'";
                            $resultado_navbar= mysqli_query($conexion, $query);

                            if(mysqli_num_rows($resultado_navbar) == 0){ $esPremium = false;
                    ?>

                                <li ><a href = "hacerse_premium.php" > Ser Premium</a ></li >

                    <?php }  ?>
                    <li class="dropdown">
                        <a href = "#" class="dropdown-toggle" data-toggle= "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false" > Mis Couchs <span class="caret" ></span ></a >
                        <ul class="dropdown-menu" >
                            <li ><a href = "altaCouch.php" > Crear couch </a ></li >
                            <li ><a href = "listado_mis_couchs.php" > Ver mis couch </a ></li >
                        </ul>
                    </li>
                    <li class="dropdown" >
                        <a href = "#" class="dropdown-toggle" data-toggle= "dropdown" role = "button" aria-haspopup = "true" aria-expanded = "false" ><?php if($esPremium) { echo("<i class='glyphicon glyphicon-star-empty'></i>");} ?> <?php echo($_SESSION["nombre_completo"])?> <span class="caret" ></span ></a >
                        <ul class="dropdown-menu" >
                            <li ><a href = "verPerfil.php" > Ver perfil </a ></li >
                            <li ><a href = "user_modForm.php" > Modificar perfil </a ></li >
                        </ul >
                    </li >
                    <li>
                        <a href="puntuarHuespedes.php">Ver húespedes</a>
                    </li>
                    <li>
                        <a href="mis_reservas_realizadas.php">Mis reservas realizadas</a>
                    </li>
                    <li>
                        <a href="listadoMisHospedajes.php">Mis hospedajes</a>
                    </li>
                </ul >

                <form id="user-session" class="form-inline pull-right" method="post" action="consultas/cerrar_sesion.php">
                    
                    <button type="submit" class="btn btn-primary">Cerrar Sesion</button>
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
                    <button type="submit" class="btn btn-primary">Registrarse </button>
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
                    <button type="submit" class="btn btn-primary">Iniciar Sesion</button>

                </form>
            </div>
        </div>
    </nav>

<?php } ?>

    <div class="" id="img-header">

    </div>
