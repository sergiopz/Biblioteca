<?php
      
      echo "<div class='formularioInsercion' id='oculto' style='display:none'>
            <h1>Insertar un Usuarios</h1>";
        
        echo form_open_multipart("Categorias/InsertarCategoria");
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
       ";
       echo "<br/>
              </fieldset>
       ";

       echo"<input  type='submit' name='Enviar' value='Insertar'/>
              </form>
       ";

       echo "<br></div>
       ";

       echo "<a href='#' id='btnNuevoUsuario1'>Mostrar</a>
       ";
      
         
       echo "<span>id</span>
              <span>nombre</span>
       ";

       echo "<br>";   
       echo "<br>";   
            
       for ($i = 0; $i < count($listaCategorias); $i++) {
              $categoria = $listaCategorias[$i];

              echo form_open("Categorias/ModificarCategoria");
              echo "<div class='info'>
                     <input type='text' name='id' hidden value='$categoria->id'>
                     <input type='text' name='nombre' value='$categoria->nombre'>
                     <input type='Submit' name='Modificar' value='Modificar'/>
              " ;
    
              echo "<button><a href='".site_url('Categorias/EliminarCategoria/'.$categoria->id)."'>Eliminar</a></button>
                     </div>
                     </form>
              ";
       }
   
       echo "<div>
              <a href='".site_url("Usuarios/cerrar_sesion")."'>Cerrar sesión</a>
              </div>
       ";
              
