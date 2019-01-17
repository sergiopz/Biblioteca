<?php
      
     echo "<div class='formularioInsercion' style='display:none'>
            <h1>Insertar un Usuarios</h1>";
        
     echo form_open_multipart("Categorias/InsertarCategoria");

     echo "
            <fieldset>
                
                nombre : <input type='text' name='nombre'/><br/>";
                
     echo "
          <br/>
               </fieldset>";

     echo"       
                <input  type='submit' name='Enviar' value='Insertar'/>
                </form>
        ";
            echo "<br></div>";

        echo "<a href='#' id='btnNuevoUsuario'>Nuevo</a>";
         
         echo " 
                <span>id</span>
                <span>nombre</span>          
                 ";

          echo "<br>";   
          echo "<br>";   
            

            for ($i = 0; $i < count($listaCategorias); $i++) {
                $usuario = $listaCategorias[$i];

                echo form_open("Categorias/ModificarCategorias");
                echo "
                <div class='info'>
                <input type='text' name='id' value='$usuario->id'>
                <input type='text' name='nombre' value='$usuario->nombre'>
                <input type='hidden' name='do' value='ModificarPeliculas' />
                <input type='Submit' name='Modificar' value='Modificar'/>
                     
                " ;
              
                
                 //echo "<img src='".base_url($peliculas->cartel)."' width='100px'>";
                
               

                  echo "<button><a href='".site_url('Administrador/EliminarUsuarios/'.$usuario->id)."'>Eliminar</a></button>
                  </div>

                  </form>
                  ";
            }
   
            echo "<div>
                
            <a href='".site_url("Usuarios/cerrar_sesion")."'>Cerrar sesión</a>

            </div>";
              
