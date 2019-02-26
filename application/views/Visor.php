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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="<?php echo base_url('js/BookBlock/jquerypp.custom.js');?>" ></script>
		<script src="<?php echo base_url('js/BookBlock/jquery.bookblock.js');?>" ></script>
		<!--Archivo necesario para el plugin de zoom-->
		<script src="<?php echo base_url('js/wheelzoom.js');?>"></script>
		<script src="<?php echo base_url('js/scriptVisor.js');?>"></script>

	</head>
	<body>
	
	<?php 
	//Metodo de php para coger las medidas de una imagen la cual utilizaremos a posterior para crear el contenedor dinamicamente
		$data = getimagesize("assets/libros/12/1.jpg");
		$width = $data[0];
		$height = $data[1];
		
	?>
	<!-- Todas las clases usadas son dictadas por la libreria BookBlock para realizar las animaciones de pasar de pagina,
			 Las clases que no pertenecen a estas son las creadas dinamicamente como zoom1,zoom2... y los identificadores m1,m2...-->
		<div class="container">
			<header class="cabecera">
				<h1>Nombre del Libro a elegir</h1>	
			</header>
			<div class="main clearfix">
				<div class="bb-custom-wrapper">
					<div id="bb-bookblock" class="bb-bookblock">
					<?php 
					//Saber cuantos archivos estan en una carpeta especifica y no contamos ni la portada frontal ni la trasera
					//Dependiendo del tamaño de la foto crearemos unas medidas modificado los estilos necesarios o no
					for ($i = 1; $i <count(glob('assets/libros/12/{*.jpg,*.gif,*.png}',GLOB_BRACE))-1; $i++) {
						
						echo"<div class='bb-item'>";
						if($width<3000){
							echo"	<img class='zoom$i' src=".base_url("assets/libros/12/$i.jpg")." width='750px' height='530px' />";
						}else {
							echo"	<img class='zoom$i' src=".base_url("assets/libros/12/$i.jpg")." width='1050px' height='530px' />";
							echo"<style>.bb-bookblock {width: 1050px;} .bb-custom-wrapper {width: 1090px;}</style>";
						}
				
						echo"</div>
						";
					}
					?>
					</div>
					<!-- Navegacion con los botones configurados de BookBlock que se encargaran de realizar las funciones escritas, ademas de los
							 dos input creados para almacenar la pagina actual y la pagina Total-->
					<nav>
						<a id="bb-nav-first" href="#" class="bb-custom-icon bb-custom-icon-first">First page</a>
						<a id="bb-nav-prev" href="#" class="bb-custom-icon bb-custom-icon-arrow-left">Previous</a>
						<input type='text' class="an" id='pagina' value="1">
						<input type='text' class="de" id='paginaTotal' readonly>
						<a id="bb-nav-next" href="#" class="bb-custom-icon bb-custom-icon-arrow-right">Next</a>
						<a id="bb-nav-last" href="#" class="bb-custom-icon bb-custom-icon-last">Last page</a>
					</nav>
				</div>
			</div>
		</div>
	</body>
</html>