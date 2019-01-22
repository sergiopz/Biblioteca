/*Eliminar con ajax*/
$("document").ready(function(){

    $(".borrarInstituto").click(function() {

       var idInstituto=$(this).attr("value");

        $("."+idInstituto).remove();

        cadena = "<?php echo site_url('Institutos/EliminarInstituto'); ?>/"+idInstituto;

        alert(cadena);

        $.ajax({
        url: cadena
         });


       });



});