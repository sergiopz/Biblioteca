<body  class="imgFondo" >
<script>

//------------------------------------------------------
//                  Equivalente en JQUERY!             |
//------------------------------------------------------
/*
$(document).ready(function() {
    $("#usuario").blur(function() {
        $("#mensajeAjax").load('<?php //echo site_url("login/checkUsuario/");?>' + $("#usuario").val());
    }
});*/
/*public function checkUsuario($usuario) {
        $this->load->model("usuarioModel");
        $r = $this->usuarioModel->checkUsuario($usuario);
        if ($r){
            $this->output->set_output("Nombre no existe");
        }
        else{
            $this->output->set_output("Nombre correcto");
        }
    }*/

peticionHttp = new XMLHttpRequest();

function comprobarUsuario(){

var queryString;
var usuario;

usuario = document.getElementById('usuario');
//queryString = '&usuario=' + encodeURIComponent(usuario.value);

peticionHttp.onreadystatechange = muestraResultadoComprobacionUsuario;
peticionHttp.open('GET', '<?php echo site_url("login/checkUsuario/");?>' + usuario.value, true);
//peticionHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
peticionHttp.send(null);
}

function muestraResultadoComprobacionUsuario(){
if(peticionHttp.readyState == 4) {
if(peticionHttp.status == 200) {
document.getElementById("mensajeAjax").innerHTML = peticionHttp.responseText;
}
}
}

</script>
 <div id="imagenBuscador" style="background-image: url('<?php echo base_url(); ?>imgs/utilidadesFront/fondo.png')">
<nav id=""class=" navbar navbar-expand-md navbar-dark">
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
        <a class="nav-link elementosNav" href="<?php echo base_url('index.php/Buscador/Categoria'); ?>">Categorias</a>
      </li>


    </ul>
    <ul class="navbar-nav justify-content-end ml-auto">
     
      <li class="nav-item ">
        <a id="botonInicio" href="" class="nav-link elementosNav"   data-toggle="modal" data-target="#modalInicio">Iniciar sesión</a>
      </li>

      <li class="nav-item justify-content-end">
        <a id="" href="" class="nav-link elementosNav"  data-toggle="modal" data-target="#modalRegistro">Registrarse</a>
      </li>

    </ul>
  </div> 
</nav>


  <nav  class="navbar navbar-expand-lg navbar-light barraNavegacion" >
    
    <div class=" " id="navbarSupportedContent">
      <ul class="navbar-center">
        <li class="nav-content liBuscador">
          <form name="formularioBuscador" action="<?php echo base_url(); ?>index.php/Buscador/buscador" class="form-inline" method="post" accept-charset="utf-8">
            <input id="buscador" name="buscador" class="form-control mr-sm-2" type="search" placeholder="Titulo, autor, categoria..." aria-label="Search">
          </form>
        </li>
      </ul>
    </div>

  </nav>
  </div>

    <div class="row"></div>

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
            <?php echo form_open("RegistroUsuarios/InsertarUsuarios") ?>
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
                        <label >E-mail</label>
                        <input type="email" name="correo" class="form-control" <?php echo set_value('correo') ?> placeholder="E-mail" required>
                    </div>

                    <div class="form-group">
                        <label class="estiloLabel">Teléfono</label>
                        <div class="row"></div>
                        <input type="text" class="form-control" name="telefono" <?php echo set_value('telefono') ?> placeholder="Teléfono" pattern="^[9|8|7|6]\d{8}$" required>
                    </div>
                    <div class="form-group contenidoModal">
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

<div class="container">
  <div  class="col-md-11 col-sm-11 col-xs-11 offset-1">
    <form name="formularioBuscador" action="<?php echo base_url(); ?>index.php/Buscador/buscador" class="form-inline" method="post" accept-charset="utf-8">
      <input id="buscador3" name="buscador" class="form-control mr-sm-2" type="search" placeholder="Titulo, autor, categoria..." aria-label="Search">
    </form>
  </div>
  <div class="row"><p></p></div>
    <h2 id="lastBooks" class="display-1 text-center">Últimos Libros</h2>
       <section class="">
          <div class="row">
          
         <?php
         
         for ($i = 0; $i < count($ultimosLibros); $i++) {
        
          $libro = $ultimosLibros[$i];
          
          $ultimaPag = count(glob('assets/libros/'.$libro->id.'/{*.jpg,*.gif,*.png}',GLOB_BRACE))-1;

          echo"

          <div class='col-md-3 col-sm-4 col-xs-12 margenTarjeta '>
            <div class='card tamañoTarjeta'>

              <a href='".site_url("Buscador/Visor/$libro->id")."'><img class='card-img-top imgTarjeta' id='$libro->id' name='$ultimaPag'  src='".base_url("assets/libros/".$libro->id."/0.jpg")."' ></a>

					    <div class='card-body'>
					      <h5 class='card-title tituloTarjeta text-center'>$libro->titulo</h5> 
					      <a href='".site_url("Buscador/Visor/$libro->id")."'><h5 class='botonTarjeta text-center'>Ver libro</h5></a>
              </div>
 
				    </div>
          </div>
          <div class='col-md-1 col-sm-2'></div>";

      }
        
          ?>

          </div>
        </section>
          <script>
 
            $("document").ready(function(){

              var direccion= '<?php echo base_url("assets/libros/"); ?>'

                $(".imgTarjeta").hover(function(){

                    var ultimaPag = $(this).attr("name");
                    var carpetaImg = $(this).attr("id");
                
                      $("#"+carpetaImg).attr("src",direccion+carpetaImg+"/"+ultimaPag+".jpg");
  
                });

                $(".imgTarjeta").mouseout(function(){

                  var carpetaImg = $(this).attr("id"); 
                  $("#"+carpetaImg).attr("src",direccion+carpetaImg+"/0.jpg");
                 
                });

            });
                
          </script>
  <div class="row"><p></p></div>
</div>