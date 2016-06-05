<div class="input-group" id="adv-search">
                <?php 
                //Para evitar error de undefined index.
                if (!isset($_GET["titulo"])){ $_GET["titulo"] = '';}
                if (!isset($_GET["ubicacion"])){ $_GET["ubicacion"] = '';}
                if (!isset($_GET["descripcion"])){ $_GET["descripcion"] = '';}
                if (!isset($_GET["capacidad"])){ $_GET["capacidad"] = '';}
                if (!isset($_GET["tipo"])){ $_GET["tipo"] = '';}
                 ?>
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span>  Búsqueda personalizada</button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form" method="GET" action="index.php">
                                  <div class="form-group">
                                    <label for="filter">A continuación podrás establecer filtros de búsqueda personalizados!</label>     
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Titulo</label>
                                    <input class="form-control" type="text" name="titulo" id="titulo" maxlength="40" placeholder="Cualquiera" />
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Descripción</label>
                                    <input class="form-control" type="text" name="descripcion" id="descripcion" maxlength="60" placeholder="Cualquiera" />
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Tipo</label>
                                    <input class="form-control" type="text" name="tipo" id="tipo" maxlength="30" onkeypress="return isLetterKey(event)" placeholder="Cualquiera"/>
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Ubicación</label>
                                    <input class="form-control" type="text"  name="ubicacion" id="ubicacion" maxlength="70" placeholder="Cualquiera"/>
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Capacidad</label>
                                    <input class="form-control" type="text"  name="capacidad" id="capacidad" onkeypress="return isNumberKey(event)" maxlength="2" placeholder="Cualquiera"/>
                                  </div>
                                  
                                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"> Buscar</span></button>
                                </form>
                            </div>
                        </div>
                        <form class="form-horizontal" role="form" method="GET" action="index.php">
                          <input type="text" class="form-control" name="titulo" id="titulo" method="GET" action="index.php" placeholder="¿Qué estás buscando?" />
                          <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                        </form>
                    </div>
                </div>
</div>
          
    