<?php 
                //Para evitar error de undefined index.
                if (!isset($_GET["nombre"])){ $_GET["nombre"] = '';}
                if (!isset($_GET["apellido"])){ $_GET["apellido"] = '';}
                if (!isset($_GET["email"])){ $_GET["email"] = '';}
                if (!isset($_GET["telefono"])){ $_GET["telefono"] = '';}
                 ?>
<div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">Armá tu búsqueda personalizada!</div>
      <div class="panel-body">
        <form class="form-horizontal" role="form" method="GET" action="index.php">
        <div class="form-group">    
        </div>
        <div class="form-group">
          <label for="contain">Nombre</label>
          <input class="form-control input-sm" type="text" value="<?php echo($_GET["nombre"]) ?>" name="nombre" id="nombre" maxlength="100" placeholder="Cualquiera" />
        </div>
        <div class="form-group">
          <label for="contain">Apellido</label>
          <input class="form-control input-sm" type="text"  value="<?php echo($_GET["apellido"]) ?>" name="apellido" id="apellido" maxlength="100" placeholder="Cualquiera"/>
        </div>
        <div class="form-group">
          <label for="contain">Email</label>
          <input class="form-control input-sm" type="text" value="<?php echo($_GET["email"]) ?>" name="email" id="email" maxlength="500" placeholder="Cualquiera" />
        </div>
        <div class="form-group">
          <label for="contain">Telefono</label>
          <input class="form-control input-sm" type="text"  value="<?php echo($_GET["telefono"]) ?>" name="telefono" id="telefono" onkeypress="return isNumberKey(event)" maxlength="25" placeholder="Cualquiera"/>
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
             document.getElementById("nombre").value="";
             document.getElementById("email").value="";
             document.getElementById("apellido").value="";
             document.getElementById("telefono").value="";
             //Luego de limpiar todo, vuelve a listar todos los couch haciendo click automáticamente en buscar
             document.getElementById("btnBuscar").click();
             
      }
    </script>
</div>
