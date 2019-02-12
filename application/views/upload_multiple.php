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
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>



    <script type="text/javascript">
        $(document).ready(function (){

          $(".usuarios").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Usuarios/VistaAjax"); ?>", function() { });
            $(".usuarios").removeClass("#8c9eff indigo accent-1").addClass("#304ffe indigo accent-4");
            $(".categoria").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".editorial").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".autor").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".institutos").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".libro").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
          });
          //$("#btnNuevoUsuario".click(function() {alert("Boton nuevo usuario");}));
           $(".categoria").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Categorias/VistaAjax"); ?>", function() { });
            $(".categoria").removeClass("#8c9eff indigo accent-1").addClass("#304ffe indigo accent-4");
            $(".usuarios").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".editorial").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".autor").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".institutos").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".libro").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
          });

          $(".editorial").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Editoriales/VistaAjax"); ?>", function() { });
            $(".editorial").removeClass("#8c9eff indigo accent-1").addClass("#304ffe indigo accent-4");
            $(".usuarios").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".categoria").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".autor").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".institutos").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".libro").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
          });

        
          $(".autor").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Autores/VistaAjax"); ?>", function() { });
            $(".autor").removeClass("#8c9eff indigo accent-1").addClass("#304ffe indigo accent-4");
            $(".usuarios").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".editorial").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".categoria").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".institutos").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".libro").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
          });


          $(".institutos").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Institutos/VistaAjax"); ?>", function() { });
            $(".institutos").removeClass("#8c9eff indigo accent-1").addClass("#304ffe indigo accent-4");
            $(".usuarios").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".editorial").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".autor").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".categoria").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".libro").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
          });

      });
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administracion</title>
</head>
<body class="gradiente">

  <nav>
    <div class="nav-wrapper #616161 grey darken-2">
      <ul class="center">
        <li><a href="<?php echo site_url('Libros/VistaAjax');?>" class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down libro">Volver</a></li>
      </ul>
      
      <ul class=" hide-on-med-and-up show-on-medium-and-down">
        <li><a class="dropdown-trigger waves-effect waves-light btn #8c9eff indigo accent-1" data-target="dropdown1">Administracion</a></li>
      </ul>

      <ul id='dropdown1' class='dropdown-content #8c9eff indigo accent-1'>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 usuarios" style="color:white" >Usuarios</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 institutos" style="color:white">Institutos</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 autor" style="color:white">Autores</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 libro" style="color:white">Libros</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 categoria" style="color:white">Categorias</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 editorial" style="color:white">Editorial</a></li>
       
      </ul>
    </div>
  </nav>

<body >

        <div class="container ">
            <br /><br /><br />
            <h3 >Subida múltiple de imagenes para un libro</h3><br />
            

            <form action="#">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" id="files" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Sube una o mas imágenes en formato JPG o PNG">
                    </div>
                </div>
            </form>

            <div id="enviar">
                <button id="enviar_f"class=" btn #26a69a teal lighten-1 white-text z-depth-1"><i class='material-icons' title='Subir archivos'>cloud_upload</i></button>
            </div>
            <div class="row">
                <div class="col m5 offset-3"></div>
            <div class="col m3 animacion" id="preloader_3" hidden ></div>
      </div>

            <div id="uploaded_images"></div>
            <div class="row"></div>
           
        </div>
    </body>
</html>


<script>

    var enviando = 0;

    $(document).ready(function(){
      
        
        $('#enviar_f').click(function(){
       
        var files = $('#files')[0].files;
        var error = '';
        for(var count = 0; count<files.length; count++){ 

            var name = files[count].name;
            var extension = name.split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['jpg','png','jpeg']) == -1){
                    alert("Error en la subida");
                error += "Archivo con extensión no válida ( solo jpg) " + count + " Image File";
            }else{
                //while (enviando == 1) {}
                var form_data = new FormData();
                form_data.append("files", files[count]);
                //enviando = 1;
               
                $('#uploaded_images').append("Subiendo imagen " + name + "...<br>");
                enviar_fichero_por_ajax(form_data, name,count,files);
                sleep(1000);

                 $(".animacion").removeAttr("hidden");

            }
            
        }

    });

    function enviar_fichero_por_ajax(form_data, name,count,files) {

            
    


            $.ajax({
                url:"<?php echo site_url("Libros/Upload/$id"); ?>", 
                method:"POST",
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                beforeSend:function(){
                    
                    $('#uploaded_images').html("<label class='text-success'>Subiendo archivo " + name + "...</label>");    
                },
                error : function(){
                    alert("ERROR");
                  $('#uploaded_images').html("<label class='text-success'> Se ha producido un error en la subida de tus ficheros </label>");
                }
               }).done(function( data ) {
                    $('#uploaded_images').html(data);
                    $('#files').val('');
                    
                    //enviando = 0;
                })



               
               if(count==(files.length-1)){
                
                alert("entro");
                alert((count==(files.length-1)));

                 $(".animacion").attr("hidden",true);
               }



     
         }
        
    });
  
    function sleep(milliseconds) {
      var start = new Date().getTime();
      for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds){
          break;
        }
      }
    }
</script>
    <footer class = "page-footer #616161 grey darken-2 z-depth-1">
            <div class = "row">
               <div class = "col s12 m6 l6">
                  <h5 class = "pie">Panel de Administración</h5>
            </div>
               
            <div class = "col">
                <ul>
                    <li><a href = "#" class = " text-lighten-4 right ">
                        <span class="pie">Biblioteca Celia Viñas</span></a></li>
                    <li><a href = "#" class = " text-lighten-4 right ">
                        <span class="pie">Terminos y privacidad</span></a></li>
                  </ul>
               </div>
            </div>
            
            <div class = "footer-copyright">
               <div class = "container">
                <span class="pie">© 2019 Copyright Information</span>
                <a class = "text-lighten-4 right" href = "#!"><span class="pie">2DAW</span></a>
               </div>
            </div>         
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</body>
</html>