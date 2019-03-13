$(document).ready(function(){

    var alto_ventana = $(window).height();
    $("#imagenBuscador").css("height",alto_ventana-100);
    $(window).resize(function(){
        alto_ventana = $(window).height();
        $("#imagenBuscador").css("height",alto_ventana-100);
    });
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