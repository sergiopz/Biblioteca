<!--<html class="no-js demo-1">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		Estilos y archivos necesarios para la animacion de BookBlock, el plugin encargado de la funcion de pasar pagina
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/BookBlock/default.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/BookBlock/bookblock.css');?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/BookBlock/demo1.css');?>" />
		<script src="<?php echo base_url('js/BookBlock/modernizr.custom.js');?>"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="<?php echo base_url('js/BookBlock/jquerypp.custom.js');?>" ></script>
		<script src="<?php echo base_url('js/BookBlock/jquery.bookblock.js');?>" ></script>
		Archivo necesario para el plugin de zoom
		<script src="<?php echo base_url('js/wheelzoom.js');?>"></script>
		<script>
 		$( document ).ready(function() {
			//Seleccionamos todos los nodos de imagen
			wheelzoom(document.querySelectorAll('img'));
			// Creamos variables de control de paginas y se le asigna el total de pagina al input
			pagina=1;
			paginaTotal= document.querySelectorAll('img').length;
			$("#paginaTotal").val(paginaTotal);
			//Variable creada unicamente para el control de tiempo de los eventos de tecla
			cambiar=true;
			
			//Creacion de los componentes esperados por la libreria BookBlock
			var Page = (function() {
				var config = {
						$bookBlock : $( '#bb-bookblock' ),
						$navNext : $( '#bb-nav-next' ),
						$navPrev : $( '#bb-nav-prev' ),
						$navFirst : $( '#bb-nav-first' ),
						$navLast : $( '#bb-nav-last' )
					},
					//Configuracion de la velocidad y las sombras al pasar de pagina
					init = function() {
						config.$bookBlock.bookblock( {
							speed : 700,
							shadowSides : 0.8,
							shadowFlip : 0.7
						} );
						initEvents();
					},
					initEvents = function() {
						
						var $slides = config.$bookBlock.children();

						// Parte de la funcion encargada de pasar la pagina hacia la siguiente
						//Wheelzoom.reset se encarga de restaurar el zoom base al nodo
						config.$navNext.on( 'click touchstart', function() {
							nodo="img.zoom"+pagina;
							if(pagina!=paginaTotal){
								document.querySelector(nodo).dispatchEvent(new CustomEvent('wheelzoom.reset'));
								pagina++;
								$("#pagina").val(pagina);
							}else{
								document.querySelector(nodo).dispatchEvent(new CustomEvent('wheelzoom.reset'));
								
							}
							config.$bookBlock.bookblock('next');		
							$("#bb-nav-next").css("pointer-events", "none");
							setTimeout(function(){$("#bb-nav-next").css("pointer-events", "auto");}, 1000);
							return false;
						} );

						// Parte de la funcion encargada de pasar la pagina hacia la anterior
						config.$navPrev.on( 'click touchstart', function() {
							nodo="img.zoom"+pagina;
							if(pagina!=1){
								document.querySelector(nodo).dispatchEvent(new CustomEvent('wheelzoom.reset'));
								pagina--;
								$("#pagina").val(pagina);
								
							}else{
								document.querySelector(nodo).dispatchEvent(new CustomEvent('wheelzoom.reset'));
								
							}
							config.$bookBlock.bookblock( 'prev' );
							$("#bb-nav-prev").css("pointer-events", "none");
							setTimeout(function(){$("#bb-nav-prev").css("pointer-events", "auto");}, 1000);
							return false;
						} );

						// Parte de la funcion encargada de pasar a la primera pagina
						config.$navFirst.on( 'click touchstart', function() {
							nodo="img.zoom"+pagina;
							document.querySelector(nodo).dispatchEvent(new CustomEvent('wheelzoom.reset'));
							pagina=1;
							$("#pagina").val(pagina);
							config.$bookBlock.bookblock( 'first' );
							return false;
						} );


						// Parte de la funcion encargada de pasar a la ultima pagina
						config.$navLast.on( 'click touchstart', function() {
							nodo="img.zoom"+pagina;
							document.querySelector(nodo).dispatchEvent(new CustomEvent('wheelzoom.reset'));
							pagina=paginaTotal;
							$("#pagina").val(pagina);
							config.$bookBlock.bookblock( 'last' );
							return false;
						} );
			
						// Añadimos Eventos de tecla
						$( document ).keydown( function(e) {
							//Esta parte se encarga de aplicar un tiempo de espera entre tecla y tecla al menos para la izquierda y la derecha
							if(!cambiar)return false;

						
							setTimeout(function(){
								cambiar=true;
							}, 800);
							cambiar=false;

							var keyCode = e.keyCode || e.which,
								arrow = {
									left : 37,
									up : 38,
									right : 39,
									down : 40,
									enter : 13
								};

							switch (keyCode) {
								//Evento realizado para pasar a la anterior pagina con la tecla izquierda
								case arrow.left:
										nodo="img.zoom"+pagina;
									if(pagina!=1){
										document.querySelector(nodo).dispatchEvent(new CustomEvent('wheelzoom.reset'));
										pagina--;
										$("#pagina").val(pagina);
										config.$bookBlock.bookblock( 'prev' );
										
									}else{
										document.querySelector(nodo).dispatchEvent(new CustomEvent('wheelzoom.reset'));
										config.$bookBlock.bookblock( 'prev' );
									}
									
									break;
									
									//Evento realizado para pasar a la pagina siguiente con la tecla derecha
								case arrow.right:
										nodo="img.zoom"+pagina;
									if(pagina!=paginaTotal){
										document.querySelector(nodo).dispatchEvent(new CustomEvent('wheelzoom.reset'));
										pagina++;
										$("#pagina").val(pagina);
										config.$bookBlock.bookblock( 'next' );
										
									}else{
										document.querySelector(nodo).dispatchEvent(new CustomEvent('wheelzoom.reset'));
										config.$bookBlock.bookblock( 'next' );
									}
									
									break;
									
									//Evento realizado para que cuando pulsemos el enter recoja el valor del input y vaya a una pagina en concreto
								case arrow.enter:
									nodo="img.zoom"+pagina;
									document.querySelector(nodo).dispatchEvent(new CustomEvent('wheelzoom.reset'));
									actual=$("#pagina").val();
								if( (actual>=1) &&(actual<=paginaTotal)){
									$("#pagina").val(actual);		
									config.$bookBlock.bookblock('jump', actual);
								}							
									cambiar=true;
								break;

								default:
									cambiar=true;
									
								break;
							}
						} );
					};

					return { init : init };

			})();
			
			Page.init();
		});
 
  </script>

	</head>-->
	<body>
	
	<?php 


	//Metodo de php para coger las medidas de una imagen la cual utilizaremos a posterior para crear el contenedor dinamicamente
		$data = getimagesize("assets/libros/".$id."/1.jpg");

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
	<!--</body>
</html>