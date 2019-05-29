<!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="shortcut icon" href="https://iescelia.org/web/wp-content/uploads/2015/05/escudo.png">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url('css/estiloMaterialize.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('css/jpages.css');?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Administracion</title>
</head>
<body>
<script>

   


  function cambiar(){
    var pdrs = document.getElementById('file-upload').files[0].name;
    document.getElementById('info').innerHTML = pdrs;
  }
  $("document").ready(function(){
    $("div.holder").jPages({
          containerID  : "itemContainer",
	        perPage      : 6,
	        startPage    : 1,
	        startRange   : 1,
	        midRange     : 5,
	        endRange     : 1
        });


     $('#recargar').click(function(){



        //location.reload(true);

       
        
        });

  		//location.reload(true);

  	

  $('.borrarOpcion').click(function(e){





   var r = confirm("Vas a eliminar un registro!\n¿Estás seguro?");
  if (r == false) {
   
  	e.preventDefault();

  }

  	window.location.reload(true);

  });

   });
</script>
  <nav>
    <div class="nav-wrapper navegadorUDT" >
      <ul class="center">
        <li><a href="<?php echo site_url('Libros/VistaAjax');?>" class="waves-effect waves-light  libro">Volver</a></li>
        <li>
          <?php

    if (isset($mensaje)){ ;

      if ($mensaje == 1){
        echo "<div id='alerta' style='color:white'> Eliminado correctamente.</div>";
      }else {
        echo "<div id='alerta' style='color:white'>Error en la eliminación de la página.</div>";
      }
    }
          ?> 

          

        </li>
      </ul>
      
    </div>
   

  </nav>

	<div class="container" >
        <div class="row"></div>
        <div class="holder"></div>
		<div class="row" id='itemContainer'>
     
      
			<?php  
			
			$directorio = "assets/libros/".$id;
			
			$arrayPag = scandir($directorio);
			$num_pag = count($arrayPag)-2;
      

			
			for($i = 0;$i<$num_pag;$i++){


        echo "
      <div  >
 

        <div class='col m1 s6 '>";
        echo "<div class='subidaImagen'>";
          echo form_open_multipart('Libros/UploadPaginas');
         
          echo "
          
          <input type='text' hidden readonly name='idlibro' value='".$id."'/>
          <input type='text' hidden readonly name='pagina' value='".$i."'/>
          
            <div class='file-field input-field botonFile'>
              <div class='btn #3d5afe indigo accent-3 '>
                <span>File</span>
                <input type='file'  name='files' multiple>
              </div>
              <div class='file-path-wrapper '>
                <input class='file-path validate' type='text'>
              </div>
            </div>
         
  
          <button class='btn waves-effect waves-light #3d5afe indigo accent-3 white-text' type='submit' name='files'><i class='material-icons' title='Subir archivos'>cloud_upload</i></button>
          </form>

        </div>

        </div>";


  echo "
  
  <div class='col m3 s6'>

    <div class='card'>
      <div class='card-image'>
        <img src='".base_url("assets/libros/$id/$i.jpg")."?time=".date("H:i:s")."' height='250px' width='200px'>
        <span class='card-title'></span>
      </div>
      <div class='card-content'>
      <p class='numeroPagina'>Página: $i</p>
      </div>
      <div class='card-action centrarBotones'>
        <a href='".site_url("Libros/cambiarIzquierda/$id/$i")."' class=' btn-floating #3d5afe indigo accent-3 white-text z-depth-1 '><i class='material-icons' title='Siguiente'>navigate_before</i></a>
        
        <a href='".site_url("Libros/deletepag/$id/$i/$num_pag")."' class=' btn-floating #3d5afe indigo accent-3 white-text z-depth-1 borrarOpcion' ><i class='material-icons' title='Subir archivos'>delete</i></a>
        <a href='".site_url("Libros/cambiarDerecha/$id/$i")."' class=' btn-floating #3d5afe indigo accent-3 white-text z-depth-1 '><i class='material-icons' title='Siguiente'>navigate_next</i></a>
      </div>
    </div>

  </div>
</div>
	<input type='hidden' name='id' value=''>
	<input type='hidden' name='num_pag' value='$num_pag'>
	<input type='hidden' name='pagina_ant' value='".($i-1)."'>";



    }
    echo"

    </div>

    <div class='holder'>
      
    </div>

  </div>";
  
	
	
					
			?>
	
    <footer  class="page-footer white">
          
      <div  id='textoPie'class="center-align black-text">© 2019 Copyright:
        <a id='pieMat' href="https://github.com/sergiopz/Biblioteca/"><ion-icon name="logo-github"></ion-icon>Github</a>
      </div>

    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url('js/jpages.js');?>"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
       
      });
    </script>
</body>
</html>