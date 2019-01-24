<!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
    <link rel="shortcut icon" href="https://iescelia.org/web/wp-content/uploads/2015/05/escudo.png">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url('css/estiloMaterialize.css');?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administracion</title>
</head>
<body class="#424242 grey darken-3">





<div class="row"></div>
    <div class="row container">
      <div class="col s12 m12 #536dfe indigo accent-2 z-depth-1 " id="capaAdmin">




<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryMaterialize.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryInstitutos.js"></script>-->
<script>
  $("document").ready(function(){

   $(".borrarInstituto").click(function() {

   var idInstituto=$(this).attr("value");

    $("."+idInstituto).remove();

    cadena = "<?php echo site_url('Editoriales/EliminarEditorial'); ?>/"+idInstituto;

    $.ajax({
    url: cadena
     });


   });



   });
</script>
        <table class="highlight responsive-table #536dfe indigo accent-2 ">
          <thead>
            <tr class="#536dfe indigo accent-2">
              <th class="#000000 black-text">Nombre</th>
              <th><a href="#insert" class="btn btn-large pulse #00e676 green accent-3 modal-trigger"><i class="material-icons" title="Insertar">add_box</i></a></th>
            </tr>
          </thead>
          <tbody>
            
            <?php
              for ($i = 0; $i < count($listaEditoriales); $i++) {
              $editorial = $listaEditoriales[$i];
              echo form_open("Editoriales/ModificarEditorial");
              echo "<div class='info'>
              <tr class='$editorial->id'>
              <input hidden type='text' name='id' value='$editorial->id'>
              <td><input class='#ffffff white-text' type='text' name='nombre' value='$editorial->nombre'></td>
              <td><input type='Submit' name='Modificar' value='Modificar'/></td>" ;

                echo "<td><a value='$editorial->id' class='btn btn-floating #d32f2f red darken-2 borrarInstituto' ><i class='material-icons' title='Eliminar'>delete</i></a><td>
                  </div>
                  </form>
                  </tr>
                ";
              }
        ?>
            <script>
              $("document").ready(function(){
                $("#prueba").click(function(){
                  var datos=$("#pf").serialize();
                  alert(datos);
                });
              });

              </script>
       
          </tbody>
        </table>

      </div>

    </div>

        <!--Contenido de la ventana modal de insercion-->
 



  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>










