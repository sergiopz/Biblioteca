     
<body style="background-image: url('<?php echo base_url(); ?>imgs/utilidadesFront/fondoweb.jpg')" class="imgFondo" >

<nav id="barraSuperior"class=" navbar navbar-expand-md navbar-dark">
  <!-- Brand -->
  <a href="<?php echo base_url(); ?>" ><?php echo"<img id='logo' class='nav-link' src='".base_url("imgs/escudocv.png")."'></a>"; ?>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">

       <li class="nav-item">
        <a class="nav-link elementosNav" href="<?php echo base_url(); ?>">Inicio</a>
      </li>

      <li class="nav-item">
        <a class="nav-link elementosNav" href="<?php echo base_url(); ?>index.php/Buscador/Categoria">Categorias</a>
      </li>

    </ul>
    <ul class="navbar-center">
      <li class="nav-content liBuscador">
        <form name="formularioBuscador" action="<?php echo base_url(); ?>index.php/Buscador/buscador" class="form-inline" method="post" accept-charset="utf-8">
          <input id="buscador2" name="buscador" class="form-control mr-sm-2" type="search" placeholder="Titulo, autor, categoria..." aria-label="Search">
        </form>
      </li>
    </ul>


    <ul class="navbar-nav justify-content-end ml-auto">
     
      <li class="nav-item ">
        <a id="botonInicio" href="" class="nav-link"   data-toggle="modal" data-target="#modalInicio">Iniciar sesión</a>
      </li>

      <li class="nav-item justify-content-end">
        <a id="botonRegistro" href="" class="nav-link"  data-toggle="modal" data-target="#modalRegistro">Registrarse</a>
      </li>

    </ul>
  </div> 
</nav>


    <div class="row">
    
    </div>

    <div class="modal fade tamañoModal" id="modalInicio">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header cabeceraModal">
              <h4 class="modal-title">Inicio de sesion</h4>
              <button type="button" class="close botonCerrar" data-dismiss="modal">×</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body ">
                <?php echo form_open("Administrador/ComprobarUsuario2");?>
                    <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                    </div>

                    <div class="form-group">
                        <label >Contraseña</label>
                        <input type="password" type="text" name="password" class="form-control" placeholder="Contraseña">
                    </div>

                    <div class="form-group">
                    <input type="submit" class="btn btn-dark">
                    </div>
                </form>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer pieModal" style="background-image: url('<?php echo base_url(); ?>imgs/utilidadesFront/recorteLibro.png')">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>

      <div class="modal fade tamañoModal" id="modalRegistro">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header cabeceraModal">
              <h4 class="modal-title">Registrarse</h4>
              <button type="button" class="close botonCerrar" data-dismiss="modal">×</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
            <?php echo form_open("envio_email/nuevo_usuario") ?>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" <?php echo set_value('nombre') ?> required>
                    </div>

                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" placeholder="Apellidos"<?php echo set_value('apellidos') ?> required>
                    </div>

                    <div class="form-group">
                        <label class="estiloLabel">Nombre de Usuario</label>
                        <input type="text" name="nick" class="form-control" <?php echo set_value('nick') ?> placeholder="Nombre de usuario" required>
                    </div>

                    <div class="form-group">
                        <label class="estiloLabel">Contraseña</label>
                        <div class="row"></div>
                        <input type="password" name="contrasena" class="form-control"  placeholder="Contraseña" <?php echo set_value('contrasena') ?> required>
                    </div>

                    <div class="form-group">
                        <label >Instituto</label>
                        <input type="text" name="instituto" class="form-control" <?php echo set_value('instituto') ?> placeholder="Instituto" required>
                    </div>



                    <div class="form-group">
                        <label >E-mail</label>
                        <input type="email" name="correo" class="form-control" <?php echo set_value('correo') ?> placeholder="E-mail" required>
                    </div>

                    <div class="form-group">
                        <label class="estiloLabel">Teléfono</label>
                        <div class="row"></div>
                        <input type="text" class="form-control" name="telefono" <?php echo set_value('telefono') ?> placeholder="Teléfono" pattern="^[9|8|7|6]\d{8}$" required>
                    </div>

                    <div class="">
                        <div class="g-recaptcha" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW"></div>
                    </div>
                    <div class="row contenidoModal">
                        <input type="submit" class="btn btn-dark">
                    </div>
                </form>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer pieModal" style="background-image: url('<?php echo base_url(); ?>imgs/utilidadesFront/recorteLibro.png')">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>
<!--fin ventana modal-->

     <?php
      echo "<div class='container librosBuscados'>";
      echo "<h2 id='lastBooks' class='display-4 text-left'>Busqueda: $tituloBusqueda</h2>";
      echo "<div class='row' >";
      for ($i = 0; $i < count($listaBusqueda); $i++) {
          $bus = $listaBusqueda[$i];

          echo"

          <div class='col-3 margenTarjeta'>
            <div class='card tamañoTarjeta'>

              <a href='".site_url("Buscador/Visor/$bus->id")."'><img class='card-img-top imgTarjeta'  src='".base_url("assets/libros/".$bus->id."/1.jpg")."' ></a>

					    <div class='card-body'>
					      <h5 class='card-title tituloTarjeta'>$bus->titulo</h5> 
					      <a href='#' class='botonTarjeta '>Ver libro</a>
              </div>
 
				    </div>
          </div>
          <div class='col-1'></div>";
          
        }
          echo "</div>
          </div>";
     ?>


