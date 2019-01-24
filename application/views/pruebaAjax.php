<!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
    <link rel="shortcut icon" href="https://iescelia.org/web/wp-content/uploads/2015/05/escudo.png">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url('css/estiloMaterialize.css');?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function (){

          $(".administracion").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Administrador/main"); ?>", function() { });
            $(".administracion").removeClass("#8c9eff indigo accent-1").addClass("#304ffe indigo accent-4");
            $(".categoria").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".editorial").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".autor").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".institutos").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".libro").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
          });
          //$("#btnNuevoUsuario".click(function() {alert("Boton nuevo usuario");}));
           $(".categoria").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Categorias/VistaAjax"); ?>", function() { });
            $(".categoria").removeClass("#8c9eff indigo accent-1").addClass("#304ffe indigo accent-4");
            $(".administracion").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".editorial").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".autor").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".institutos").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".libro").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
          });

          $(".editorial").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Editoriales/VistaAjax"); ?>", function() { });
            $(".editorial").removeClass("#8c9eff indigo accent-1").addClass("#304ffe indigo accent-4");
            $(".administracion").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".categoria").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".autor").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".institutos").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".libro").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
          });

        
          $(".autor").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Autores/VistaAjax"); ?>", function() { });
            $(".autor").removeClass("#8c9eff indigo accent-1").addClass("#304ffe indigo accent-4");
            $(".administracion").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".editorial").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".categoria").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".institutos").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".libro").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
          });


          $(".institutos").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Institutos/VistaAjax"); ?>", function() { });
            $(".institutos").removeClass("#8c9eff indigo accent-1").addClass("#304ffe indigo accent-4");
            $(".administracion").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".editorial").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".autor").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".categoria").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".libro").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");

          });

          $(".libro").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Libros/VistaAjax"); ?>", function() { });
            $(".libro").removeClass("#8c9eff indigo accent-1").addClass("#304ffe indigo accent-4");
            $(".administracion").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".editorial").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".autor").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".institutos").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".categoria").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
          });
  
      });
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administracion</title>
</head>
<body class="#424242 grey darken-3">

  <nav>
    <div class="nav-wrapper #616161 grey darken-2">
      <ul class="center">
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down administracion" >Usuarios</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down institutos">Institutos</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down autor">Autores</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down libro">Libros</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down categoria">Categorias</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down editorial">Editorial</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down autoreslibros">AutoresLib</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down libroscategorias">LibrosCat</a></li>
      </ul>
      
      <ul class=" hide-on-med-and-up show-on-medium-and-down">
        <li><a class="dropdown-trigger waves-effect waves-light btn #8c9eff indigo accent-1" data-target="dropdown1">Administracion</a></li>
      </ul>

      <ul id='dropdown1' class='dropdown-content #8c9eff indigo accent-1'>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 administracion" style="color:white" >Usuarios</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 institutos" style="color:white">Institutos</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 autor" style="color:white">Autores</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 libro" style="color:white">Libros</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 categoria" style="color:white">Categorias</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 editorial" style="color:white">Editorial</a></li>
        <li><a class="waves-effect waves-lightwaves-effect waves-light btn #8c9eff indigo accent-1 autoreslibros" style="color:white">AutoresLib</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 libroscategorias" style="color:white">LibrosCat</a></li>
      </ul>
    </div>
  </nav>



<div class="row"></div>
    <div class="row container">
      <div class="col s12 m12 #536dfe indigo accent-2 z-depth-1 " id="capaAdmin">




<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryMaterialize.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryInstitutos.js"></script>-->
<script>
  $("document").ready(function(){

$(".borrarInstituto").click(function() {

   var idInstituto=$(this).attr("value");

    $("."+idInstituto).remove();

    cadena = "<?php echo site_url('Editoriales/EliminarEditorial'); ?>/"+idInstituto;

    $.ajax({
    url: cadena
     });


   });



});
</script>
        <table class="highlight responsive-table #536dfe indigo accent-2 ">
          <thead>
            <tr class="#536dfe indigo accent-2">
              <th class="#000000 black-text">Nombre</th>
              <th><a href="#insert" class="btn btn-large pulse #00e676 green accent-3 modal-trigger"><i class="material-icons" title="Insertar">add_box</i></a></th>
            </tr>
          </thead>
          <tbody>
            
            <?php
              for ($i = 0; $i < count($listaEditoriales); $i++) {
              $editorial = $listaEditoriales[$i];
              echo form_open("Editoriales/ModificarEditorial");
              echo "<div class='info'>
              <tr class='$editorial->id'>
              <input hidden type='text' name='id' value='$editorial->id'>
              <td><input class='#ffffff white-text' type='text' name='nombre' value='$editorial->nombre'></td>
              <td><input type='Submit' name='Modificar' value='Modificar'/></td>" ;

                echo "<td><a value='$editorial->id' class='btn btn-floating #d32f2f red darken-2 borrarInstituto' ><i class='material-icons' title='Eliminar'>delete</i></a><td>
                  </div>
                  </form>
                  </tr>
                ";
              }
        ?>
            <script>
              $("document").ready(function(){
                $("#prueba").click(function(){
                  var datos=$("#pf").serialize();
                  alert(datos);
                });
              });

              </script>
       <!-- 
            <tr class="">
              <td><input type="text" name="nombre"></td>
              <td><input type="text" name="localidad"></td>
              <td><input type="text" name="direccion"></td>
              <td><input type="text" name="cp"></td>
              <td><input type="text" name="provincia"></td>
              <td><a class="btn btn-floating #d32f2f red darken-2 botonD"><i class="material-icons" title="Eliminar">delete</i></a></td>
              <td><a class="btn btn-floating #e65100 orange darken-4"><i class="material-icons" title="Modificar">create</i></a></li></td>
            </tr>-->
           
          </tbody>
        </table>

      </div>

    </div>

        <!--Contenido de la ventana modal de insercion-->


        <div id="insert" class="modal" style="overflow-y: scroll">
         <?php    echo form_open_multipart("Editoriales/InsertarEditorial");?>
        
          <h5 class="modal-close">&#10005;</h5>
          <div class="modal-content center">
            <h4 class="flow-text #00e676 green-text text-accent-3">Insertar Registro</h4>
        
              <div class="input-field">
                <i class="material-icons prefix" style="color:royalblue">person</i>
                <input type="text" name="nombre" id="nombre">
                <label for="nombre"  style="color:royalblue">Nombre</label>
              </div>

              <div><input style="background-color:royalblue" type="submit" value="Insertar" class="btn btn-large"></div>
              <br>
              <br>

            </form>
          </div>
        </div>








      </div>
      
    </div>  
</div>




    <!--Pie de pagina-->

    <footer class = "page-footer #616161 grey darken-1 z-depth-1">
            <div class = "row">
               <div class = "col s12 m6 l6">
                  <h5 class = "pie">Panel de Administración</h5>
            </div>
               
            <div class = "col">
                <ul>
                    <li><a href = "#" class = " text-lighten-4 right ">
                        <span class="pie">Biblioteca Celia Viñas</span></a></li>
                    <li><a href = "#" class = " text-lighten-4 right ">
                        <span class="pie">Terminos y privacidad</span></a></li>
                  </ul>
               </div>
            </div>
            
            <div class = "footer-copyright">
               <div class = "container">
                <span class="pie">© 2019 Copyright Information</span>
                <a class = "text-lighten-4 right" href = "#!"><span class="pie">2DAW</span></a>
               </div>
            </div>         
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>










