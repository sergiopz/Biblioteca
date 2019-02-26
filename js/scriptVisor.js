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
			$bookBlock : $('#bb-bookblock' ),
			$navNext : $('#bb-nav-next'),
			$navPrev : $('#bb-nav-prev'),
			$navFirst : $('#bb-nav-first'),
			$navLast : $('#bb-nav-last')
        },
        
        //Configuracion de la velocidad y las sombras al pasar de pagina
        
		init = function() {
			config.$bookBlock.bookblock( {
				speed : 700,
				shadowSides : 0.8,
				shadowFlip : 0.7
			});
			initEvents();
		},
		initEvents = function() {
						
			var $slides = config.$bookBlock.children();

			// Parte de la funcion encargada de pasar la pagina hacia la siguiente
			//Wheelzoom.reset se encarga de restaurar el zoom base al nodo

			config.$navNext.on('click touchstart', function() {
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
			});

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
			});

			// Parte de la funcion encargada de pasar a la primera pagina

			config.$navFirst.on( 'click touchstart', function() {
				nodo="img.zoom"+pagina;
				document.querySelector(nodo).dispatchEvent(new CustomEvent('wheelzoom.reset'));
				pagina=1;
				$("#pagina").val(pagina);
				config.$bookBlock.bookblock( 'first' );
				return false;
			});

			// Parte de la funcion encargada de pasar a la ultima pagina

			config.$navLast.on( 'click touchstart', function() {
				nodo="img.zoom"+pagina;
				document.querySelector(nodo).dispatchEvent(new CustomEvent('wheelzoom.reset'));
				pagina=paginaTotal;
				$("#pagina").val(pagina);
				config.$bookBlock.bookblock('last');
				return false;
			});
			
			// Añadimos Eventos de tecla

			$(document).keydown(function(e){

                //Esta parte se encarga de aplicar un tiempo de espera entre tecla y tecla al menos para la izquierda y la derecha
                
				if(!cambiar)return false;
				setTimeout(function(){cambiar=true;},800);
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
						config.$bookBlock.bookblock('prev');
										
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

						default: cambiar=true;
                        break;
                        
						}
		});
	};
	return { init : init };
    })();
	Page.init();
});
 