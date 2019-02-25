<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="https://iescelia.org/web/wp-content/uploads/2015/05/escudo.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('css/estiloFront.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/slick.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('/css/slick-theme.css');?>">
    <script type="text/javascript" src="<?php echo base_url(); ?>js/slick.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/frontJS.js"></script>
    <title>Front</title>
</head>
<body style="background-image: url('<?php echo base_url(); ?>imgs/utilidadesFront/fondoweb.jpg')" class="imgFondo" >

    <nav id="barrasuperior" class="navbar navbar-expand-lg navbar-light">
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a href="<?php echo base_url(); ?>" ><img id="logo" class="nav-link" src="https://iescelia.org/web/wp-content/uploads/2015/05/escudo.png"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link elementosNav" href="#">Todos los libros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link elementosNav" href="#">Categorias</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="#">
                <button class="form-control mr-sm-2 btn-dark btnLog"   data-toggle="modal" data-target="#modalInicio" >Iniciar Sesion</button>
                <button class="form-control mr-sm-2 btn-dark btnLog"  data-toggle="modal" data-target="#modalRegistro" >Registrarse</button>
            </form>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light barraNavegacion" style="background-image: url('<?php echo base_url(); ?>imgs/utilidadesFront/fondo.jpg')">
    
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        
        <ul class="navbar-center">
          <li class="nav-content liBuscador">
            
            <form name="formularioBuscador" action="<?php echo base_url(); ?>index.php/Buscador/buscador" class="form-inline" method="post" accept-charset="utf-8">

              <input id="buscador" name="buscador" class="form-control mr-sm-2" type="search" placeholder="Titulo, autor, categoria..." aria-label="Search">

            </form>

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