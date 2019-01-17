<?php
      
       echo "<div class='formularioInsercion' id='oculto' style='display:none'>
              <h1>Insertar un Usuarios</h1>
       ";
        
       echo form_open_multipart("Administrador/InsertarUsuarios");

?>
<script>
       $(document).ready(function (){
              $("#btnNuevoUsuario").click(function() {
                     if( $("#oculto").attr("style")=="display:none"){ 
                            $("#oculto").css("display", "inline");
                     }
                     else{
                            $("#oculto").css("display", "none");
                     }
              });  
       });

</script>

<?php

       echo "<fieldset>
                
              nombre : <input type='text' name='nombre'/><br/>
              apellidos: <input type='text'name='apellidos'/><br/>
              nick: <input type='text' name='nick'/><br/>
              contrasena: <input type='text' name='contrasena'/><br/> 
              corrreo: <input type='text' name='correo'/><br/>
              telefono: <input type='text' name='telefono'/><br/>
              tipo: <input type='text' name='tipo'/><br/>
              idInstituto: <input type='text' name='Idinstituto'/><br/>
       ";
              
       echo "<br/>
              </fieldset>
       ";

       echo "<input type='hidden' name='do' value='InsertPelicula'/>
              <input  type='submit' name='Enviar' value='Insertar'/>
              </form>
              <br></div>
        ";

       echo "<a href='#' id='btnNuevoUsuario'>Nuevo</a>";
         
       echo "<span>id</span>
              <span>nombre</span>
              <span>apellidos</span>
              <span>nick</span>
              <span>contrasena</span>
              <span>correo</span>
              <span>telefono</span>
              <span>tipo</span>
              <span>idInstituto</span>  
              <br><br>
       ";

       for ($i = 0; $i < count($listaUsuarios); $i++) {
              $usuario = $listaUsuarios[$i];

              echo form_open("Administrador/ModificarUsuarios");

              echo "<div class='info'>
                     <input type='text' name='id' value='$usuario->id'>
                     <input type='text' name='nombre' value='$usuario->nombre'>
                     <input type='text' name='apellidos'value='$usuario->apellidos'>
                     <input type='text' name='nick'value='$usuario->nick'>
                     <input type='text' name='contrasena'value='$usuario->contrasena'>
                     <input type='text' name='correo'value='$usuario->correo'>
                     <input type='text' name='telefono'value='$usuario->telefono'>
                     <input type='text' name='tipo'value='$usuario->tipo'>
                     <input type='text' name='idInstituto'value='$usuario->idInstituto'>
                     <input type='hidden' name='do' value='ModificarPeliculas' />
                     <input type='Submit' name='Modificar' value='Modificar'/>   
              " ;
              echo "<button><a href='".site_url('Administrador/EliminarUsuarios/'.$usuario->id)."'>Eliminar</a></button>
                     </div>
                     </form>
              ";
            }

              echo "<div>
                     <a href='".site_url("Usuarios/cerrar_sesion")."'>Cerrar sesión</a>
                     </div>
              ";
              
