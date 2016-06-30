<?php 
                //Para evitar error de undefined index.
                if (!isset($_GET["titulo"])){ $_GET["titulo"] = '';}
                if (!isset($_GET["ubicacion"])){ $_GET["ubicacion"] = '';}
                if (!isset($_GET["descripcion"])){ $_GET["descripcion"] = '';}
                if (!isset($_GET["capacidad"])){ $_GET["capacidad"] = '';}
                if (!isset($_GET["tipo"])){ $_GET["tipo"] = '';}
                 ?>
<div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading" align = "center">Armá tu búsqueda personalizada!</div>
      <div class="panel-body">
        <form class="form-horizontal" role="form" method="GET" action="index.php">
        <div class="form-group">    
        </div>
        <div class="form-group">
          <label for="contain">Titulo</label>
          <input class="form-control input-sm" type="text" value="<?php echo($_GET["titulo"]) ?>" name="titulo" id="titulo" maxlength="100" placeholder="Cualquiera" />
        </div>
        <div class="form-group">
          <label for="contain">Descripción</label>
          <input class="form-control input-sm" type="text" value="<?php echo($_GET["descripcion"]) ?>" name="descripcion" id="descripcion" maxlength="500" placeholder="Cualquiera" />
        </div>
        <div class="form-group">
          <label for="contain">Tipo</label>
          <select class="form-control input-sm" name="tipo" id="tipo" maxlength="25">
              
              <?php if ($_GET["tipo"] == ''){ ?>
                    <option selected>Cualquiera</option>

              <?php } else { ?>
                        <option hidden selected><?php echo($_GET["tipo"]) ?></option>
                        <option>Cualquiera</option>
                      <?php }?>
              <?php 
                  include("conectarBD.php");
                  $queryDropdownTipos = "SELECT nombre_tipo FROM tipo";
                  $resultadoDropdownTipos = mysqli_query($conexion, $queryDropdownTipos);
                  while ($row = mysqli_fetch_array($resultadoDropdownTipos)) { 
              ?>
                    <option><?php echo($row["nombre_tipo"]); ?></option>
              <?php } ?>
              
          </select>
        </div>
        <div class="form-group">
          <label for="contain">Ubicación</label>
          <input class="form-control input-sm" type="text"  value="<?php echo($_GET["ubicacion"]) ?>" name="ubicacion" id="ubicacion" maxlength="100" placeholder="Cualquiera"/>
        </div>
        <div class="form-group">
          <label for="contain">Capacidad</label>
          <input class="form-control input-sm" type="text"  value="<?php echo($_GET["capacidad"]) ?>" name="capacidad" id="capacidad" onkeypress="return isNumberKey(event)" maxlength="2" placeholder="Cualquiera"/>
        </div>
        <div class="container">
            <button type="button" class="btn btn-primary btn-sm   " onclick="return limpiar();"><i class = "glyphicon glyphicon-refresh"></i> Limpiar</button>
            <button type="submit" id="btnBuscar" class="btn btn-primary btn-sm "><i class = "glyphicon glyphicon-search"></i> Buscar</span></button>
        </div>
      </form>
      </div>
    </div>
    <script type="text/javascript">
      function limpiar(){
             document.getElementById("titulo").value="";
             document.getElementById("descripcion").value="";
             document.getElementById("ubicacion").value="";
             document.getElementById("capacidad").value="";
             document.getElementById("tipo").value="Cualquiera";
             //Luego de limpiar todo, vuelve a listar todos los couch haciendo click automáticamente en buscar
             document.getElementById("btnBuscar").click();
             
      }
    </script>
</div>
