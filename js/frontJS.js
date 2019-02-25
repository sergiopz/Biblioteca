$(document).ready(function(){

    $('.slider1').slick({
        slidesToShow: 5,
        slidesToScroll: 2,
        autoplay: false,
        adaptiveHeight: true,
        infinite: true,
        rlt: true,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 2
            }
        }]
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