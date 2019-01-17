<?php
      
     echo "<div class='formularioInsercion' style='display:inline'>
            <h1>Insertar un Autor</h1>";
        
     echo form_open_multipart("Autor/InsertarAutor");


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
            

            for ($i = 0; $i < count($listaAutores); $i++) {
                $autor = $listaAutores[$i];

                echo form_open("Autores/ModificarAutor");
                echo "
                <div class='info'>
                <input type='text' name='id' value='$autor->id'>
                <input type='text' name='nombre' value='$autor->nombre'>
                <input type='hidden' name='do' value='ModificarPeliculas' />
                <input type='Submit' name='Modificar' value='Modificar'/>
                     
                " ;
              
                
                 //echo "<img src='".base_url($peliculas->cartel)."' width='100px'>";
                
               

                  echo "<button><a href='".site_url('Administrador/EliminarAutor/'.$autor->id)."'>Eliminar</a></button>
                  </div>

                  </form>
                  ";
            }
   
            echo "<div>
                
            <a href='".site_url("Autor/cerrar_sesion")."'>Cerrar sesión</a>

            </div>";