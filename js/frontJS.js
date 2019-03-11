$(document).ready(function(){

    var alto_ventana = $(window).height();
    $(".barraNavegacion").css("height",alto_ventana-50);

    function enviar_formulario(){
        document.formularioBuscador.submit()
    }

    var code = e.keyCode || e.which;

    $("#buscador").bind ('keypress', function(e){
        
        if (code == 13){
             enviar_formulario();
        }

    });

  


});