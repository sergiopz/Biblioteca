<body  class="imgFondo" >
<script>

  
  $(document).ready(function(){

    $("#contrasenaRepetida").keyup(function(){
      contrasena1 = $("#contrasenaRegistro").val();
      contrasena2 = $("#contrasenaRepetida").val();
      if(contrasena1 == contrasena2){
         $("#contrasenaRepetida").css("border", "2px solid green");
           $("#verificar").attr("value","2");
           $("#verificar2").attr("value","2");
           $("#verificar3").attr("value","2");

      } else {
         $("#contrasenaRepetida").css("border", "2px solid red");
                $("#verificar").attr("value","1");
                $("#verificar2").attr("value","1");
                $("#verificar3").attr("value","1");
      }
    });

      $("#nickRegistro").keyup(function(){
        valorNick = $("#nickRegistro").val();
        datos = "nick="+valorNick;
        $.ajax({
          url:"<?php echo site_url("RegistroUsuarios/ComprobarNick/"); ?>", 
          method:"POST",
          data:datos,
          success:function(data){
            if (data==1){
              $("#nickRegistro").css("border", "2px solid red");
              $("#verificar").attr("value","1");
              $("#verificar2").attr("value","1");
              $("#verificar3").attr("value","1");
            } else {

               $("#nickRegistro").css("border", "2px solid green");
               $("#verificar").attr("value","2");
               $("#verificar2").attr("value","2");
               $("#verificar3").attr("value","2");
    
            }
          }
        });
      });

      $("#correoRegistro").keyup(function(){
        valor = $("#correoRegistro").val();
        datos = "correo="+valor;
        $.ajax({
          url:"<?php echo site_url("RegistroUsuarios/ComprobarCorreo/"); ?>", 
          method:"POST",
          data:datos,
          success:function(data){
            if (data==1){
              $("#correoRegistro").css("border", "2px solid red");
               $("#verificar").attr("value","1");
               $("#verificar2").attr("value","1");
               $("#verificar3").attr("value","1");
            } else {

               $("#correoRegistro").css("border", "2px solid green");
                $("#verificar").attr("value","2");
                $("#verificar2").attr("value","2");
                $("#verificar3").attr("value","2");

            }
          }
        });
      });

      $("#telefonoRegistro").keyup(function(){
        valor = $("#telefonoRegistro").val();
        datos = "telefono="+valor;
        $.ajax({
          url:"<?php echo site_url("RegistroUsuarios/ComprobarTelefono/"); ?>", 
          method:"POST",
          data:datos,
          success:function(data){
            if (data==1){
              $("#telefonoRegistro").css("border", "2px solid red");
               $("#verificar").attr("value","1");
               $("#verificar2").attr("value","1");
               $("#verificar3").attr("value","1");
            } else {

               $("#telefonoRegistro").css("border", "2px solid green");
                $("#verificar").attr("value","2");
                $("#verificar2").attr("value","2");
                $("#verificar3").attr("value","2");


            }
          }
        });
      });

      $('#validarBoton').click(function(e){

        if ( ($("#verificar").val()==1) || ($("#verificar2").val()==1) || ($("#verificar3").val()==1) ) {
   
          e.preventDefault();

        }

      });


  });



</script>
 
<nav id="barraSuperior" class="  navbar navbar-expand-md navbar-dark">
  <!-- Brand -->
  <a href="<?php echo base_url(); ?>" ><?php echo"<img id='logo' class='nav-link' src='".base_url("imgs/escudocv.png")."'></a>"; ?>

  <!-- Toggler/collapsibe Button -->
  <button data-status="noPulsado" id="botonDropIndex" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">

    	 <li class="nav-item">
        <a class="enlacesDrop nav-link elementosNav" href="<?php echo base_url(); ?>">Inicio</a>
      </li>


      <li class="nav-item">
        <a class="enlacesDrop nav-link elementosNav" href="<?php echo base_url('index.php/Buscador/Categoria'); ?>">Categorias</a>
      </li>


    </ul>
    <ul class="navbar-nav justify-content-end ml-auto">
     
      <li class="nav-item ">
        <a id="botonInicio" href="" class="enlacesDrop nav-link elementosNav"   data-toggle="modal" data-target="#modalInicio">Iniciar sesión</a>
      </li>

      <li class="nav-item justify-content-end">
        <a id="" href="" class="enlacesDrop nav-link elementosNav"  data-toggle="modal" data-target="#modalRegistro">Registrarse</a>
      </li>

    </ul>
  </div> 
</nav>


  <nav id="imagenBuscador" style="background-image: url('<?php echo base_url(); ?>imgs/utilidadesFront/fondo.png')"  class="navbar navbar-expand-lg navbar-light barraNavegacion" >
    
    <div class="" id="navbarSupportedContent">
      <ul class="formularioBuscador navbar-center">
        <li class="nav-content liBuscador">
          <form name="formularioBuscador" action="<?php echo base_url(); ?>index.php/Buscador/buscador" class="form-inline" method="post" accept-charset="utf-8">
            <input id="buscador" name="buscador" class="form-control mr-sm-2" type="search" placeholder="Titulo, autor, categoria..." aria-label="Search">
          </form>
        </li>
      </ul>
    </div>

  </nav>
  

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
                <?php echo form_open("Administrador/ComprobarUsuario");?>
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
                        <input id="nombreRegistro" type="text" class="form-control" name="nombre" placeholder="Nombre"  required>
                        <input hidden id="verificar" value="">
                        <input hidden id="verificar2" value="">
                        <input hidden id="verificar3" value="">
                    </div>

                    <div class="form-group">
                        <label>Apellidos</label>
                        <input id="apellidosRegistro" type="text" class="form-control" name="apellidos" placeholder="Apellidos" required>
                    </div>

                    <div class="form-group">
                        <label class="estiloLabel">Nombre de Usuario</label>
                        <input id="nickRegistro" type="text" name="nick" class="form-control" <?php echo set_value('nick') ?> placeholder="Nombre de usuario" required>
                    </div>

                    <div class="form-group">
                        <label class="estiloLabel">Contraseña</label>
                        <input id="contrasenaRegistro" type="password" name="contrasena" class="form-control"  placeholder="Contraseña"  required>
                    </div>

                    <div class="form-group">
                        <label class="estiloLabel">Repita la contraseña</label>
                        <input id="contrasenaRepetida" type="password" name="contrasena2" class="form-control"  placeholder="Contraseña"  required>
                    </div>


                    <div class="form-group">
                        <label >E-mail</label>
                        <input id="correoRegistro" type="email" name="correo" class="form-control"  placeholder="E-mail" required>
                    </div>

                    <div class="form-group">
                        <label class="estiloLabel">Teléfono</label>
                        <input id="telefonoRegistro" type="text" class="form-control" name="telefono"  placeholder="Teléfono" pattern="^[9|8|7|6]\d{8}$" required>
                    </div>
                    <div class="form-group contenidoModal">
                        <input  id="validarBoton" type="submit" class="btn btn-dark">
                    </div>
                </form>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer pieModal" style="background-image: url('<?php echo base_url(); ?>imgs/utilidadesFront/recorteLibro.png')">
              <button type="button"  class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>
<!--fin ventana modal-->

<div class="container">
  <div class="row">
  <div  class="contenedorBuscador col-md-11 col-sm-11 col-xs-11 offset-1">
    <form name="formularioBuscador" action="<?php echo base_url(); ?>index.php/Buscador/buscador" class="form-inline" method="post" accept-charset="utf-8">
      <input id="buscador4" name="buscador" class="form-control mr-sm-2" type="search" placeholder="Titulo, autor, categoria..." aria-label="Search">
    </form>
  </div>
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