<?php
      
    echo "<div class='formularioInsercion' id='oculto' style='display:none'>
        <h1>Insertar un Instituto</h1>";
        
    echo form_open_multipart("Institutos/InsertarInstituto");

?>

<script>
    $(document).ready(function (){
        $("#btnNuevoUsuario1").click(function() {
            $('#oculto').toggle();
            $('#oculto').text(texto) 
        });

    });  
           	
</script>

<?php

    echo "<fieldset>
                
            nombre : <input type='text' name='nombre'/><br/>
            localidad: <input type='text'name='localidad'/><br/>
            direccion: <input type='text' name='direccion'/><br/>
            cp: <input type='text' name='cp'/><br/> 
            provincia: <input type='text' name='provincia'/><br/>
    ";
    echo "<br/>
            </fieldset>
    ";

    echo"<input  type='submit' name='Enviar' value='Insertar'/>
            </form>
    ";
           
    echo "<br></div>";

    echo "<a href='#' id='btnNuevoUsuario1'>Mostrar</a>";
      
         
    echo "<span>nombre</span>
            <span>localidad</span>
            <span>direccion</span>
            <span>cp</span>
            <span>provincia</span>                  
    ";

    echo "<br>";   
    echo "<br>";   
            
    for ($i = 0; $i < count($listaInstitutos); $i++) {
        $instituto = $listaInstitutos[$i];

        echo form_open("Institutos/ModificarInstituto");
        echo "<div class='info'>
            <input type='text' name='id' hidden value='$instituto->id'>
            <input type='text' name='nombre' value='$instituto->nombre'>
            <input type='text' name='localidad'value='$instituto->localidad'>
            <input type='text' name='direccion'value='$instituto->direccion'>
            <input type='text' name='cp'value='$instituto->cp'>
            <input type='text' name='provincia'value='$instituto->provincia'>
            <input type='Submit' name='Modificar' value='Modificar'/>
                     
         " ;
 
        echo "<button><a href='".site_url('Institutos/EliminarInstituto/'.$instituto->id)."'>Eliminar</a></button>
            </div>
            </form>
        ";
    }
   
    echo "<div>          
            <a href='".site_url("Usuarios/cerrar_sesion")."'>Cerrar sesión</a>
            </div>
    ";
              
