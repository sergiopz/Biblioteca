<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Visor Vistar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Estilos del css del visor a continuacion-->
  
  <!-- Estilos del css del BookBlock a continuacion-->
  <link rel="stylesheet" href="<?php echo base_url('css/BookBlock/default.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('css/BookBlock/bookblock.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('css/BookBlock/demo1.css');?>">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <!-- Script de BookBlock el puglin para la animacion a continuacion-->
  <script src="<?php echo base_url('js\BookBlock/modernizr.custom.js');?>"></script>

  <script src="<?php echo base_url('js\BookBlock/jquerypp.custom.js');?>"></script>
  <script src="<?php echo base_url('js\BookBlock/bookblock.js');?>"></script>
  <script>
  </script>
</head>

<body>
  <?php 
  //Esto cuenta los archivos de una carpeta
  $total_imagenes = count(glob('assets/libros/12/{*.jpg,*.gif,*.png}',GLOB_BRACE));
  echo "total_imagenes = ".$total_imagenes;
  
  ?>
  <p>Hola soy la vista del Visor</p>
  <div class="main clearfix">
				<div class="bb-custom-wrapper">
					  <h3>Paginas del libro tal</h3>
					  <div id="bb-bookblock" class="bb-bookblock">
						    <div class="bb-item">
                  <img class='pag2' src="<?php echo base_url('assets/libros/12/1.jpg');?>" /> 
						    </div>
						    <div class="bb-item" >
                <img class='pag3' src="<?php echo base_url('assets/libros/12/2.jpg');?>" /> 
						    </div>
						    <div class="bb-item" >
						     
						    </div>
						    <div class="bb-item">
							    
						    </div>
						    <div class="bb-item">
							    
						    </div>
				      </div>
					<nav>
						<a id="bb-nav-first" href="#" class="bb-custom-icon bb-custom-icon-first">First page</a>
						<a id="bb-nav-prev" href="#" class="bb-custom-icon bb-custom-icon-arrow-left">Previous</a>
						<a id="bb-nav-next" href="#" class="bb-custom-icon bb-custom-icon-arrow-right">Next</a>
						<a id="bb-nav-last" href="#" class="bb-custom-icon bb-custom-icon-last">Last page</a>
					</nav>
				</div>
  </div>

  <script>
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
							speed : 800,
							shadowSides : 0.8,
							shadowFlip : 0.7
						} );
						initEvents();
					},
					initEvents = function() {
						
						var $slides = config.$bookBlock.children();

						// add navigation events
						config.$navNext.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'next' );
							return false;
						} );

						config.$navPrev.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'prev' );
							return false;
						} );

						config.$navFirst.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'first' );
							return false;
						} );

						config.$navLast.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'last' );
							return false;
						} );
						
						// add swipe events
						

						// add keyboard events
						$( document ).keydown( function(e) {
							var keyCode = e.keyCode || e.which,
								arrow = {
									left : 37,
									up : 38,
									right : 39,
									down : 40
								};

							switch (keyCode) {
								case arrow.left:
									config.$bookBlock.bookblock( 'prev' );
									break;
								case arrow.right:
									config.$bookBlock.bookblock( 'next' );
									break;
							}
						} );
					};

					return { init : init };

			})();
		</script>
		<script>
				Page.init();
		</script>
</body>
</html>
<!--
  Asi se encuentra la ruta de los libros en nuestro server
    echo base_url('assets/libros/12/1.jpg');
  Asi se cuenta el total de libros 
    $total_imagenes = count(glob('assets/libros/12/{*.jpg,*.gif,*.png}',GLOB_BRACE));
    echo "total_imagenes = ".$total_imagenes;
 -->