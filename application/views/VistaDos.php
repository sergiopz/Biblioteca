     <body class="imgFondo">

       <nav id="barraSuperior" class=" navbar navbar-expand-md navbar-dark">
         <!-- Brand -->
         <a href="<?php echo base_url(); ?>"><?php echo "<img id='logo' class='nav-link' src='" . base_url("imgs/escudocv.png") . "'></a>"; ?>

           <!-- Toggler/collapsibe Button -->
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
             <span class="navbar-toggler-icon"></span>
           </button>

           <!-- Navbar links -->
           <div class="collapse navbar-collapse" id="collapsibleNavbar">
             <ul class="navbar-nav">

               <li class="nav-item">
                 <a class="enlacesDrop nav-link elementosNav" href="<?php echo base_url(); ?>">Inicio</a>
               </li>

               <li class="nav-item">
                 <a class="enlacesDrop nav-link elementosNav" href="<?php echo base_url(); ?>index.php/Buscador/Categoria">Categorías</a>
               </li>

               <?php
                if (($this->session->userdata('tipoUsuario') <= 2) &&(isset($this->session->loguedIn)) ) {
                  echo " <li class='nav-item'>
                  <a class='enlacesDrop nav-link elementosNav' href='" . site_url('Libros/favoritos/') . $this->session->userdata('idUsuario') . "'>Favoritos</a>
                </li>
              ";
                }
                ?>

             </ul>
             <ul class="navbar-center">
               <li class="nav-content buscadorCatBus">
                 <form name="formularioBuscador" action="<?php echo base_url(); ?>index.php/Buscador/buscador" class="form-inline" method="post" accept-charset="utf-8">
                   <input id="buscador2" name="buscador" class="form-control mr-sm-2" type="search" placeholder="Titulo, autor, categoria..." aria-label="Search">
                 </form>
               </li>
             </ul>


             </ul>
             <ul class="navbar-nav justify-content-end ml-auto">

             <?php
          if (!isset($this->session->loguedIn)) {
            echo "   <li class='nav-item'>
                             <a id='botonInicio' href='' class='enlacesDrop nav-link elementosNav'   data-toggle='modal' data-target='#modalInicio'>Iniciar sesión</a>
                          </li>
                          <li class='nav-item justify-content-end'>
                              <a id='' href='' class='enlacesDrop nav-link elementosNav'  data-toggle='modal' data-target='#modalRegistro'>Registrarse</a>
                          </li>";
          } else {
            if ( ($this->session->userdata('tipoUsuario') >=0)&&($this->session->userdata('tipoUsuario') <=1) ) {
              echo " <li class='nav-item justify-content-end'>
                        <a class='enlacesDrop nav-link elementosNav' href='" . site_url('Libros/VistaAjax') . "'>Admin</a>
                      </li>
                      <li class='nav-item justify-content-end'>
                        <a class='enlacesDrop nav-link elementosNav' href='" . site_url('Administrador/IndexRefresh') . "'>Cerrar sesión</a>
                      </li>
                  ";
             }
  
            else if ($this->session->userdata('tipoUsuario') == 2) {
              echo " <li class='nav-item justify-content-end'>
                            <a class='enlacesDrop nav-link elementosNav' href='" . site_url('Administrador/IndexRefresh') . "'>Cerrar sesión</a>
                          </li>
                        ";
            }
           }
          ?>
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
               <?php echo form_open("Administrador/ComprobarUsuario"); ?>
               <div class="form-group">
                 <label>Usuario</label>
                 <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
               </div>

               <div class="form-group">
                 <label>Contraseña</label>
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
       <script>
         $("document").ready(function() {

           var direccion = '<?php echo base_url("assets/libros/"); ?>'

           $(".imgTarjeta").hover(function() {

             var ultimaPag = $(this).attr("name");
             var carpetaImg = $(this).attr("id");

             $("#" + carpetaImg).attr("src", direccion + carpetaImg + "/" + ultimaPag + ".jpg");

           });

           $(".imgTarjeta").mouseout(function() {

             var carpetaImg = $(this).attr("id");
             $("#" + carpetaImg).attr("src", direccion + carpetaImg + "/0.jpg");

           });

           $(".favorito").click(function() {
             var idLibro = $(this).attr('value');
             var cadena = $("#prueba" + idLibro + " i").attr("class");
             var datos = "idUsuario=" + "<?php echo $this->session->userdata('idUsuario'); ?>" + "&idLibro=" + idLibro;


             if ("fas fa-star fav" == cadena) {
               $("#prueba" + idLibro + " i").attr("class", "fas fa-star nofav");

               var ruta = "<?php echo site_url("Libros/EliminarFavoritos/"); ?>";

               $.ajax({
                 type: "POST",
                 url: ruta,
                 data: datos,
                 success: function(data) {}
               });

             } else {
               $("#prueba" + idLibro + " i").attr("class", "fas fa-star fav");

               var ruta = "<?php echo site_url("Libros/InsertarFavoritos/"); ?>";

               $.ajax({
                 type: "POST",
                 url: ruta,
                 data: datos,
                 success: function(data) {}
               });
             }
           })

         });
       </script>
       <?php
        echo "<div class='container librosBuscados'>
            <div class='row'>";
        echo "<div  class='col-md-11 col-sm-11 col-xs-11 offset-1'>
              <form name='formularioBuscador' action='<?php echo base_url(); ?>index.php/Buscador/buscador' class='form-inline' method='post' accept-charset='utf-8'>
       <input id='buscador3' name='buscador' class='form-control mr-sm-2' type='search' placeholder='Titulo, autor, categoria...' aria-label='Search'>
       </form>
       </div>
       </div>";

        if (isset($listaCategoria)) {

          for ($i = 0; $i < count($listaCategoria); $i++) {
            $ca = $listaCategoria[$i];
            echo "<h2 id='lastBooks' class='display-4 text-center'>Busqueda: $ca->nombre </h2>";
          }
        }
        if (isset($tituloBusqueda)) {
          echo "<h2 id='lastBooks' class='display-4 text-center'>Busqueda: $tituloBusqueda </h2>";
        }
        echo "<div class='row' >";
        for ($i = 0; $i < count($listaBusqueda); $i++) {
          $bus = $listaBusqueda[$i];
          $ultimaPag = count(glob('assets/libros/' . $bus->id . '/{*.jpg,*.gif,*.png}', GLOB_BRACE)) - 1;
          echo " <div class='col-md-3 col-sm-4 col-xs-12 margenTarjeta'>
           <div class='card tamañoTarjeta'>

             <a href='" . site_url("Buscador/Visor/$bus->id/$bus->titulo") . "'><img id='$bus->id' name='$ultimaPag' class='card-img-top imgTarjeta' src='" . base_url("assets/libros/" . $bus->id . "/0.jpg") . "'></a>

             <div class='card-body'>
               <h5 class='card-title tituloTarjeta text-center'>$bus->titulo</h5>
               <a href='" . site_url("Buscador/Visor/$bus->id") . "'>
                 <h5 class='botonTarjeta text-center'>Ver libro</h5>
               </a>";

          if (($this->session->userdata('tipoUsuario') <= 2)&&(isset($this->session->loguedIn))) {

            for ($j = 0; $j < count($favoritos); $j++) {
              $favorito = $favoritos[$j];
              if ($bus->id == $favorito->idLibro) {
                echo "<button class='botonFavorito favorito' id='prueba$bus->id' value='$bus->id' class='favorito'><i class='fas fa-star fav'></i></button>";
                $j = count($favoritos);
              } else if ($j == count($favoritos) - 1) {
                echo "<button class='botonFavorito favorito' id='prueba$bus->id' value='$bus->id' class='favorito'><i class='fas fa-star nofav'></i></button>";
                $j = count($favoritos);
              }
            }
            if ( (count($favoritos) == 0) &&(isset($this->session->loguedIn))  )  {
              echo "<button class='botonFavorito favorito' id='prueba$bus->id' value='$bus->id' class='favorito'><i class='fas fa-star nofav'></i></button>";
            }
          }
          echo "
             </div>
           </div>
         </div>
         <div class='col-md-1 col-sm2 '></div>";
        }
        echo "</div>
         </div>";
        ?>