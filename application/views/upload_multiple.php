<html>
    <head>
        <title>Upload Multiple Files in Codeigniter using Ajax JQuery</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> 
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
       
    </head>
    <!doctype html>
<html>
<head>
<title>Sliding</title>
<meta charset="utf-8" />
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>





<body>
         <style>
         .text
            .mensaje_final{
                background: #000000bd !important;
                width: 625px;
                height: auto;
                font-size: 45px;
                border-radius: 5px;
                margin: 0 auto;
                padding: 10px;
        }
        </style>
        <div class="container">
            <br /><br /><br />
            <h3 align="center">Subida múltiple de imagenes para un libro</h3><br />
            
            <div class="col-md-6" align="right">
                <label>Subida múltiple de imagenes para un libro</label>
            </div>
            <div class="col-md-6">
                <input type="file" name="files" id="files" multiple />
            </div>
            <div id="enviar">
                <button id="enviar_f">Enviar formulario</button>
            </div>
            <div style="clear:both"></div>
                <br />
                <br />
            <div id="uploaded_images"></div>
            <div style="padding:20px;" id="mensaje"></div>
           
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
               alert("hasta aqui");
            var name = files[count].name;
            var extension = name.split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['odt','pdf']) == -1){
                    alert("hasta aqui2");
                error += "Archivo con extensión no válida ( solo jpg) " + count + " Image File"
            }else{
                //while (enviando == 1) {}
                var form_data = new FormData();
                form_data.append("files", files[count]);
                //enviando = 1;
                $('#uploaded_images').append("Subiendo imagen " + name + "...<br>");
                enviar_fichero_por_ajax(form_data, name);
                sleep(1000);

            }
            
        }
    });

    function enviar_fichero_por_ajax(form_data, name) {
        alert(form_data);
            $.ajax({
                url:"<?php echo site_url("Prueba/Upload"); ?>", 
                method:"POST",
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                beforeSend:function()
                {
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
</body>
</html>
