<html class="no-js demo-1">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<!--Estilos y archivos necesarios para la animacion de BookBlock, el plugin encargado de la funcion de pasar pagina-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/BookBlock/default.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/BookBlock/bookblock.css');?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/BookBlock/demo1.css');?>" />
		<script src="<?php echo base_url('js/BookBlock/modernizr.custom.js');?>"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="<?php echo base_url('js/BookBlock/jquerypp.custom.js');?>" ></script>
		<script src="<?php echo base_url('js/BookBlock/jquery.bookblock.js');?>" ></script>
		<!--Archivo necesario para el plugin de zoom-->
		<script src="<?php echo base_url('js/wheelzoom.js');?>"></script>
		<script src="<?php echo base_url('js/scriptVisor.js');?>"></script>
    	<link rel="shortcut icon" href="<?php echo base_url("imgs/escudocv.png")?>">
    	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    	<script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
    	<link rel="stylesheet" href="<?php echo base_url('css/estiloFront.css');?>">
    	<script type="text/javascript" src="<?php echo base_url(); ?>js/frontJS.js"></script>
    	<title>Front</title>
	</head>
	<body style="background-image: url('<?php echo base_url(); ?>imgs/utilidadesFront/fondoweb.jpg')" class="imgFondo">
	
	<?php 
	//Metodo de php para coger las medidas de una imagen la cual utilizaremos a posterior para crear el contenedor dinamicamente
		$data = getimagesize("assets/libros/$id/1.jpg");
		$width = $data[0];
		$height = $data[1];
		
	?>
	<!-- Todas las clases usadas son dictadas por la libreria BookBlock para realizar las animaciones de pasar de pagina,
			 Las clases que no pertenecen a estas son las creadas dinamicamente como zoom1,zoom2... y los identificadores m1,m2...-->
			 <div id="barraSuperior"class=" navbar navbar-expand-md navbar-dark">
  			
			 <a class="elementosNav nav-link" href="<?php echo base_url(); ?>" >Volver</a>		
			 <?php echo" <a class='nav-link text-center tituloLibro'>$titulo</a>"; ?>
			 <?php echo"<a class='nav-link elementosNav' href='".site_url("Buscador/cargarPdf/$id")."'>Generar PDF</a>";?>
			</div>
			<div class="container">
			<div class="main clearfix">
				<div class="bb-custom-wrapper">
					<div id="bb-bookblock" class="bb-bookblock">
					<?php 
					//Saber cuantos archivos estan en una carpeta especifica y no contamos ni la portada frontal ni la trasera
					//Dependiendo del tamaño de la foto crearemos unas medidas modificado los estilos necesarios o no
					for ($i = 1; $i <count(glob('assets/libros/'.$id.'/{*.jpg,*.gif,*.png}',GLOB_BRACE))-1; $i++) {
						
						echo"<div class='bb-item'>";
						if($width<3000){
							echo"	<img class='zoom$i' src=".base_url("assets/libros/$id/$i.jpg")." width='750px' height='530px' />";
						}else {
							echo"	<img class='zoom$i' src=".base_url("assets/libros/$id/$i.jpg")." width='1050px' height='530px' />";
							echo"<style>.bb-bookblock {width: 1050px;} .bb-custom-wrapper {width: 1090px;}</style>";
						}
				
						echo"</div>
						";
					}
					?>
					</div>
					<!-- Navegacion con los botones configurados de BookBlock que se encargaran de realizar las funciones escritas, ademas de los
							 dos input creados para almacenar la pagina actual y la pagina Total-->
					<nav id="margenPaginas">
						<a id="bb-nav-first" href="#" class="bb-custom-icon bb-custom-icon-first">First page</a>
						<a id="bb-nav-prev" href="#" class="bb-custom-icon bb-custom-icon-arrow-left">Previous</a>
						
						<a id="bb-nav-next" href="#" class="bb-custom-icon bb-custom-icon-arrow-right">Next</a>
						<a id="bb-nav-last" href="#" class="bb-custom-icon bb-custom-icon-last">Last page</a>
					</nav>
					<input type='text' class="an" id='pagina' value="1">
					<input type='text' class="de" id='paginaTotal' readonly>
				</div>
			</div>
		</div>	
		<footer id="margenPie" class="page-footerfont-small blue pt-4 estiloPie">

			<div class="container-fluid text-center text-md-left">

  				<div class="row">

    				<div class="col-md-6 mt-md-0 mt-3">

      					<h5 class="text-uppercase">Biblioteca Celia Viñas</h5>

    				</div>

    				<hr class="clearfix w-100 d-md-none pb-3">


    				<div class="col-md-3 mb-md-0 mb-3">


        				<h5 class="text-uppercase">Nosotros</h5>

        				<ul class="list-unstyled">
          					<li>
            					<a href="https://github.com/JuapiCallejon" class="elementosNav"><ion-icon name="logo-github"></ion-icon>Juan Callejón</a>
         					</li>
          					<li>
            					<a href="https://github.com/graciancristales" class="elementosNav"><ion-icon name="logo-github"></ion-icon>Gracián Ruíz</a>
          					</li>
          					<li>
            					<a href="https://github.com/sergiopz" class="elementosNav"><ion-icon name="logo-github"></ion-icon>Sergio Pérez</a>
          					</li>
        				</ul>

      				</div>

      				<div class="col-md-3 mb-md-0 mb-3">


        				<h5 class="text-uppercase">Links</h5>

        					<ul class="list-unstyled">
         						<li>
            						<a href="#!" class="elementosNav">Link 1</a>
          						</li>
          						<li>
            						<a href="#!" class="elementosNav">Link 2</a>
          						</li>
          						<li>
            						<a href="#!" class="elementosNav">Link 3</a>
          						</li>
          						<li>
            						<a href="#!" class="elementosNav">Link 4</a>
          						</li>
        					</ul>

      				</div>


  				</div>

			</div>

			<div class="footer-copyright text-center py-3 transparencia">© 2019 Copyright:
  				<a href="https://iescelia.org/web/" class="elementosNav">iescelia.org</a>
			</div>

		</footer>		
	</body>
</html>