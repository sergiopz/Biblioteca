<?php
       echo  "<div class='formularioInsercion' style='display:inline'>
              <h1>Insertar un Autor</h1>";

       /*Aqui comienza el formulario de insercion */
       echo form_open_multipart("Autores/InsertarAutor");

       echo          "<fieldset>
                            nombre : <input type='text' name='nombre'/><br/><br/>
                     </fieldset>
                            <input  type='submit' name='Enviar' value='Insertar'/>
                     </form><br>
              </div>
              <a href='#' id='btnNuevoUsuario'>Nuevo</a>       
              <span>id</span>
              <span>nombre</span>  <br><br>";   
            
       /*Aqui comienza la creacion de las tablas*/
       for ($i = 0; $i < count($listaAutores); $i++) {
              $autor = $listaAutores[$i];

       echo form_open("Autores/ModificarAutor");
       echo  "<div class='info'>
                     <input type='text' name='id' value='$autor->id'>
                     <input type='text' name='nombre' value='$autor->nombre'>
                     <input type='hidden' name='do' value='ModificarPeliculas' />
                     <input type='Submit' name='Modificar' value='Modificar'/>";                
                                 
       echo          "<button><a href='".site_url('Autores/EliminarAutor/'.$autor->id)."'>Eliminar</a></button>
              </div>

              </form>";
       }
   
       echo   "<div>               
              <a href='".site_url("Autor/cerrar_sesion")."'>Cerrar sesión</a>
              </div>";