$(document).ready(function(){

    $('.slider1').slick({
        slidesToShow: 5,
        slidesToScroll: 3,
        autoplay: true,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        adaptiveHeight: true,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
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