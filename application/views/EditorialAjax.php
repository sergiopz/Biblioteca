<?php
     echo    "<div class='formularioInsercion' style='display:inline'>
              <h1>Insertar una Editorial</h1>";
     //Aqui comienza el formulario de insercion
     echo form_open_multipart("Editoriales/InsertarEditorial");

     echo "          <fieldset>
                            nombre : <input type='text' name='nombre'/><br/><br/>
                     </fieldset>    
                            <input  type='submit' name='Enviar' value='Insertar'/>
                     </form><br>
              </div>
              <a href='#' id='btnNuevoUsuario'>Nuevo</a>
              <span>id</span>
              <span>nombre</span>  <br><br>";   
            
       //Aqui comienza la creacion de las tablas
       for ($i = 0; $i < count($listaEditoriales); $i++) {
              $editorial = $listaEditoriales[$i];

       echo form_open("Editoriales/ModificarEditorial");
       echo "<div class='info'>
                     <input type='text' name='id' value='$editorial->id'>
                     <input type='text' name='nombre' value='$editorial->nombre'>
                     <input type='hidden' name='do' value='ModificarPeliculas' />
                     <input type='Submit' name='Modificar' value='Modificar'/>" ;

       echo          "<button><a href='".site_url('Editoriales/EliminarEditorial/'.$editorial->id)."'>Eliminar</a></button>
              </div>

              </form>";
            }
   
       echo   "<div>
              <a href='".site_url("Editoriales/cerrar_sesion")."'>Cerrar sesión</a>
              </div>";