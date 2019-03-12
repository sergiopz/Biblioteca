
<body  class="imgFondo" >

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
        <a class="nav-link elementosNav" href="#">Categorias</a>
      </li>

    </ul>
    <ul class="navbar-center">
      <li class="nav-content buscadorCatBus">
        <form name="formularioBuscador" action="<?php echo base_url(); ?>index.php/Buscador/buscador" class="form-inline" method="post" accept-charset="utf-8">
          <input id="buscador2" name="buscador" class="form-control mr-sm-2" type="search" placeholder="Titulo, autor, categoria..." aria-label="Search">
        </form>
      </li>
    </ul>


    <ul class="navbar-nav justify-content-end ml-auto">
     
      <li class="nav-item ">
        <a id="botonInicio" href="" class="nav-link elementosNav"   data-toggle="modal" data-target="#modalInicio">Iniciar sesión</a>
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


<!--fin ventana modal-->

  <div class="container">
     <div class="row contenedorDiv ">
        <?php
        $colorCategoria = 0;
        for ($i = 0; $i < count($listaCategoria); $i++) {
          $ca = $listaCategoria[$i];
          
          if ($colorCategoria == 8){
            $colorCategoria = 0;
          }
         

          echo"
            <div class='col-md-3 col-sm-5 col-xs-8 d-block  divCategorias categoria$colorCategoria '>
              <a class='enlacesCategorias' href='".site_url("Buscador/BuscadorCategoria/$ca->nombre")."'>
                <h2 class='text-center' href='".site_url("Buscador/BuscadorCategoria/$ca->nombre")."'>$ca->nombre</h2>
              </a>
            </div>
            <div class='col-md-1 col-sm-1 col-xs-1'></div>
          ";

          $colorCategoria++;
        }


        ?>
    </div>
  </div>
  <script>
    $("document").ready(function(){
      $(".divCategorias").click(function(){

      })
    });
  </script>
     


