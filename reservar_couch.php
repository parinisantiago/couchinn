<?php $today= date('Y-m-d');?>
<script src="js/altaValidaciones.js"></script>
    <div id="modalReservarCouch" class="modal fade" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="control-label" for="emailUser">Seleccione la fecha en que desea alojarse.</label>
                </div>
                <div class="modal-body">
                    <form class="form-inline" name="reservar_couch" method="post" onsubmit="return fechasReserva()" action="consultas/reserva_couch.php">
                        <div class="form-group">

                              
                              <input type="hidden" value="<?php echo($_GET["id"]);?>" id="id_couch" name="id_couch">
                              <label class="control-label" for="fIng">Fecha de Ingreso<span style="color:red;"> *</span></label>
                              <input type="date" name="fIng" class="form-control" id="fIng" placeholder="Desde" min="<?php echo $today ?>" aria-describedby="helpBlock-fIng" required>
                              <span id="glyphicon-fIng" aria-hidden="true"></span>
                              <span id="helpBlock-fIng" class="help-block"></span>

                              <label class="control-label" for="fEgre">Fecha de Egreso<span style="color:red;"> *</span></label>
                              <input type="date" name="fEgre" class="form-control" id="fEgre" placeholder="Hasta" min="<?php echo $today ?>" aria-describedby="helpBlock-fEgre" required>
                              <span id="glyphicon-fEgre" aria-hidden="true"></span>
                              <span id="helpBlock-fEgre" class="help-block"></span>
                              <button type="submit" class="btn btn-primary">Solicitar reserva</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
