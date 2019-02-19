<html class="no-js demo-1">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/BookBlock/default.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/BookBlock/bookblock.css');?>"/>
		<!-- custom demo style -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/BookBlock/demo1.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/visor.css');?>" />
		
		
		<script src="<?php echo base_url('js/BookBlock/modernizr.custom.js');?>"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="<?php echo base_url('js/BookBlock/jquerypp.custom.js');?>" ></script>
		<script src="<?php echo base_url('js/BookBlock/jquery.bookblock.js');?>" ></script>
		<script src="<?php echo base_url('js/wheelzoom.js');?>"></script>
		<script>
 		$( document ).ready(function() {
			wheelzoom(document.querySelectorAll('img'));
			pagina=1;
			paginaTotal= document.querySelectorAll('img').length;
			$("#paginaTotal").val(paginaTotal);
			cambiar=true;
			
			var Page = (function() {
				var config = {
						$bookBlock : $( '#bb-bookblock' ),
						$navNext : $( '#bb-nav-next' ),
						$navPrev : $( '#bb-nav-prev' ),
						$navFirst : $( '#bb-nav-first' ),
						$navLast : $( '#bb-nav-last' )
					},
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

						// Añadimos eventos de navegacion Siguiente,Anterior,Primera y ultima pagina
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

						config.$navFirst.on( 'click touchstart', function() {
							nodo="img.zoom"+pagina;
							document.querySelector(nodo).dispatchEvent(new CustomEvent('wheelzoom.reset'));
							pagina=1;
							$("#pagina").val(pagina);
							config.$bookBlock.bookblock( 'first' );
							return false;
						} );

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

	</head>
	<body>
	<?php 
		$data = getimagesize("assets/libros/12/1.jpg");
		$width = $data[0];
		$height = $data[1];
		
	?>
	
		<div class="container">
			<header>
				<h1>Nombre del Libro a elegir</h1>	
			</header>
			<div class="main clearfix">
				<div class="bb-custom-wrapper">
					<div id="bb-bookblock" class="bb-bookblock">
					<?php 
					
					for ($i = 1; $i <count(glob('assets/libros/12/{*.jpg,*.gif,*.png}',GLOB_BRACE))-1; $i++) {
						
						echo"<div class='bb-item zoom$i'>";
						if($width<3000){
							echo"	<img class='zoom$i' id='m$i' src=".base_url("assets/libros/12/$i.jpg")." width='750px' height='530px' />";
						}else {
							echo"	<img class='zoom$i' id='m$i' src=".base_url("assets/libros/12/$i.jpg")." width='1050px' height='530px' />";
							echo"<style>.bb-bookblock {width: 1050px;} .bb-custom-wrapper {width: 1090px;}</style>";
						}
				
						echo"</div>
						";
					}
					?>
					</div>
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
<!--
  Asi se encuentra la ruta de los libros en nuestro server
    echo base_url('assets/libros/12/1.jpg');
  Asi se cuenta el total de libros 
    $total_imagenes = count(glob('assets/libros/12/{*.jpg,*.gif,*.png}',GLOB_BRACE));
    echo "total_imagenes = ".$total_imagenes;
	contraseñas sa1 scriptar un script en php forma mas normal
 -->