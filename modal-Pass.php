<?php if (!isset($_SESSION['sesion_usuario'])){ ?>

    <div id="modalRecPass" class="modal fade" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="control-label" for="emailUser">Ingrese su e-mail de registro en el que recibira el link para recuperar contraseña</label>
                </div>
                <div class="modal-body">
                    <form class="form-inline" name="recuperarContrasena" method="post" onsubmit="return valRecuperarContrasena()" action="consultas/recuperar_contrasena.php">
                        <div class="form-group">
                            <label class="control-label" for="emailRec">Email</label>
                            <input type="email" name="emailRec" class="form-control" id="emailRec" maxlength="30" placeholder="nombre_de_su_email@dominio.com" aria-describedby="helpBlock-email" required>
                            <span id="glyphicon-emailRec" aria-hidden="true"></span>
                            <span id="helpBlock-emailRec" class="help-block"></span>
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