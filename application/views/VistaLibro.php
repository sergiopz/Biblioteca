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
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administracion</title>
</head>
<body class="gradiente">
<script>
  function cambiar(){
    var pdrs = document.getElementById('file-upload').files[0].name;
    document.getElementById('info').innerHTML = pdrs;
  }
</script>
  <nav>
    <div class="nav-wrapper #616161 grey darken-2">
      <ul class="center">
        <li><a href="<?php echo site_url('Libros/VistaAjax');?>" class="waves-effect waves-light btn #8c9eff indigo accent-1 libro">Volver</a></li>
      </ul>
      
    </div>
  </nav>

  <div class="container" >
        <div class="row"></div>
    <div class="row">
      <?php  
      
      $directorio = "assets/libros/".$id;
      
      $arrayPag = scandir($directorio);
      $num_pag = count($arrayPag)-1;
      echo $num_pag;

      
      for($i = 1;$i<$num_pag;$i++){

  echo "
  
  <div class='col m3 s6'>

    <div class='card'>
      <div class='card-image'>
        <img src='".base_url("assets/libros/$id/$i.jpg")."' height='250px' width='200px'>
        <span class='card-title'>Card Title</span>
      </div>
      <div class='card-content'>
      <p class='numeroPagina'>Página: $i</p>
      </div>
      <div class='card-action centrarBotones'>
        <a href='".site_url("Libros/cambiarIzquierda/$id/$i")."' class=' btn-floating #3d5afe indigo accent-3 white-text z-depth-1 '><i class='material-icons' title='Siguiente'>navigate_before</i></a>
        <a  href='".site_url("Libros/deletepag/$id/$i/$num_pag")."' class=' btn-floating #3d5afe indigo accent-3 white-text z-depth-1 '><i class='material-icons' title='Subir archivos'>delete</i></a>
        <a href='".site_url("Libros/cambiarDerecha/$id/$i")."' class=' btn-floating #3d5afe indigo accent-3 white-text z-depth-1 '><i class='material-icons' title='Siguiente'>navigate_next</i></a>
      </div>
    </div>

  </div>

  <input type='hidden' name='id' value=''>
  <input type='hidden' name='num_pag' value='$num_pag'>
  <input type='hidden' name='pagina_ant' value='".($i-1)."'>";


  echo "
      
 

      <div class='col m1 s6 '>";
        echo form_open_multipart('Libros/UploadPaginas');
       
        echo "
        <div class='subidaImagen'>
        <input type='text' hidden readonly name='idlibro' value='".$id."'/>
        <input type='text' hidden readonly name='pagina' value='".$i."'/>
       
      <label for='file-upload' class='subir'>
        <i class='material-icons'>add_circle</i>


      </label>



      <input type='file' name='files' />
      <div id='info'></div>








       
        <button class='btn waves-effect waves-light' type='submit' name='files'>Go!</button>
        </div>
        </form>
      </div>";
    }
    echo"
    </div>
  </div>";
  
  
  
          
      ?>
  
    <footer class = "page-footer #616161 grey darken-2 z-depth-1">
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</body>
</html>