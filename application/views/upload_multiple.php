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
        <li><a href="<?php echo site_url('Libros/VistaAjax');?>" class="waves-effect waves-light btn #8c9eff indigo accent-1 libro">Volver</a></li>
      </ul>
      
    </div>
  </nav>

<body >

        <div class="container ">
            <br /><br /><br />
            <h3 >Subida múltiple de imagenes para un libro</h3><br />
            
            <form action="#">
                <div class="file-field input-field ">
                    <div class="btn #3d5afe indigo accent-3">
                        <span>File</span>
                        <input type="file"  id="files" multiple>
                    </div>
                    <div class="file-path-wrapper ">
                        <input class="file-path validate " type="text" placeholder="Sube una o mas imágenes en formato JPG o PNG">
                    </div>
                </div>
            </form>

            <div id="enviarDiv" >
                <button id="enviar_f" class=" btn #3d5afe indigo accent-3 white-text z-depth-1 botonesSubida"><i class='material-icons' title='Subir archivos'>cloud_upload</i></button>
            </div>

            <div class="row">
            <div class="col m5 offset-3"></div>
            <div class="col m12" id="mensajeEspera" hidden><h5 >Espere a la subida de todas las imagenes antes de salir.</h5></div>
            <div class="barraProgreso">

            </div>
            <div class="col m7 offset-5 animacionExito" hidden>
              <svg id="successAnimation" class="animated black-text" xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70">
                <path id="successAnimationResult" fill="#D8D8D8" d="M35,60 C21.1928813,60 10,48.8071187 10,35 C10,21.1928813 21.1928813,10 35,10 C48.8071187,10 60,21.1928813 60,35 C60,48.8071187 48.8071187,60 35,60 Z M23.6332378,33.2260427 L22.3667622,34.7739573 L34.1433655,44.40936 L47.776114,27.6305926 L46.223886,26.3694074 L33.8566345,41.59064 L23.6332378,33.2260427 Z"/>
                <circle id="successAnimationCircle" cx="35" cy="35" r="24" stroke="#979797" stroke-width="2" stroke-linecap="round" fill="transparent"/>
                <polyline id="successAnimationCheck" stroke="#979797" stroke-width="2" points="23 34 34 43 47 27" fill="transparent"/>
              </svg>
            </div>
            </div>


            <div id="uploaded_images"></div>
            <div class="row"></div>
        </div>
    </body>
</html>


<script>

    var enviando = 0;

    $(document).ready(function(){
      
      $(".botonFile").click(function(){
        $("#enviar_f").removeClass("disabled");
      });



      $('#enviar_f').click(function(){ 
       
        var files = $('#files')[0].files;
        var error = '';
        var count=0;
        var form_data = new Array();
        for(count; count<files.length; count++){ 
            var name = files[count].name;
            var extension = name.split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['jpg','png','jpeg']) == -1){
              $('#uploaded_images').append("<label class='text-success'> Se ha producido un error en la subida de tus ficheros. Archivo con extensión no válida ( solo jpg o png) </label>" );
            }else{
                var formulario = new FormData();
                formulario.append("files", files[count]);
                var posicion = form_data.push(formulario);
               
             //   $('#uploaded_images').append("Subiendo imagen " + name + "...<br>");
                
            }
            
        }
        $('.barraProgreso').append(" <div class='progress'><div class='indeterminate #3d5afe indigo accent-3' ></div></div>");
        subirUnicoArchivo(form_data, name,files);
        
    });


    var contador=0;

    function subirUnicoArchivo(form_data, name, files) {
      
        if (contador<files.length){

            //Informacion sobre las imagenes que subimos
            console.log(form_data[contador].get("files"));
            $.ajax({
                url:"<?php echo site_url("Libros/Upload/$id"); ?>", 
                method:"POST",
                data:form_data[contador],
                contentType:false,
                cache:false,
                processData:false,
                error : function(){
                    alert("ERROR");
                  $('#uploaded_images').append("<label class='text-success'> Se ha producido un error en la subida de tus ficheros </label>");
                },
                success:function(){
                  $("#mensajeEspera").removeAttr("hidden");
                  contador++;
                  subirUnicoArchivo(form_data, name, files);
                }
                
               });
               
               
        } else {
          $("#mensajeEspera").attr("hidden",true);
          $(".animacionExito").removeAttr("hidden");
          $( ".barraProgreso" ).remove();

        }

         }
        
    });
  
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