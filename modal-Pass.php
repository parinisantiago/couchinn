<?php if (!isset($_SESSION['sesion_usuario'])){ ?>

    <div id="modalRecPass" class="modal fade" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="control-label" for="emailUser">Ingrese su e-mail de registro en el que recibira el link para recuperar contraseña</label>
                </div>
                <div class="modal-body">
                    <form class="form-inline" name="recuperarContrasena" method="post" onsubmit="return valRecuperarContraseña()" action="consultas/recuperar_contrasena.php">
                        <div class="form-group">
                            <input type="email" name="emailUser" class="form-control" id="emailUser" maxlength="30" placeholder="Email" aria-describedby="helpBlock-email" required>
                            <span id="glyphicon-email" aria-hidden="true"></span>
                            <span id="helpBlock-email" class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Recuperar Contraseña</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>