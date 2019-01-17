<?php
      
      echo "<div class='formularioInsercion' id='oculto' style='display:none'>
            <h1>Insertar un Usuarios</h1>";
        
        echo form_open_multipart("Administrador/InsertarUsuarios");
        //echo form_open("peliculas/insertPeliculas");
        //id : <input type='text' name='id'/><br/>
         ?>




         <script>
         	 $(document).ready(function (){
              $("#btnNuevoUsuario1").click(function() {
       

                $('#oculto').toggle();
                if ($('#btnNuevoUsuario1').text()=="Ocultar") {
                  $('#btnNuevoUsuario1').text("Mostrar") ;
                  //alert("if");
                  //alert( $('#btnNuevoUsuario1').text("Mostrar"));
                }else{
                      $('#btnNuevoUsuario1').text("Ocultar") ;
                      //alert("else");
                      //alert( $('#btnNuevoUsuario1').text("Ocultar"));
                }
                


            });

                $("#borrar").click(function() {

                   $("input").remove();

                  });



         });  
         
         </script>

         <?php

        echo "
            <fieldset>
                
                nombre : <input type='text' name='nombre'/><br/>
                apellidos: <input type='text'name='apellidos'/><br/>
                nick: <input type='text' name='nick'/><br/>
                contrasena: <input type='text' name='contrasena'/><br/> 
                corrreo: <input type='text' name='correo'/><br/>
                telefono: <input type='text' name='telefono'/><br/>
                tipo: <input type='text' name='tipo'/><br/>
                idInstituto: <input type='text' name='Idinstituto'/><br/>";
              
            echo "<br/>
                </fieldset>
            ";

       

        echo"       
                <input type='hidden' name='do' value='InsertPelicula'/>
                <input  type='submit' name='Enviar' value='Insertar'/>
                </form>
        ";
            echo "<br></div>";

        echo "<br/> <a href='#' id='btnNuevoUsuario1'>Mostrar</a>";
        echo "<br/> <a href='#' id='borrar'>borrar</a>";
      
         
         echo " 
                <span>id</span>
                <span>nombre</span>
                <span>apellidos</span>
                <span>nick</span>
                <span>contrasena</span>
                <span>correo</span>
                <span>telefono</span>
                <span>tipo</span>
                <span>idInstituto</span>  
                         
                 ";

          echo "<br>";   
          echo " <table id='tabla' border=1>
        <tr>
            <td>primera columma</td>
            <td>segundo columna</td>
            
        </tr>
    </table>";   
            

            for ($i = 0; $i < count($listaUsuarios); $i++) {
                $usuario = $listaUsuarios[$i];

                echo form_open("Administrador/ModificarUsuarios");
                echo "

                <table id='tabla' border=1>
        <tr>
            <td><input type='text' name='id' value='$usuario->id'></td>
            <td><input type='text' name='nombre' value='$usuario->nombre'></td>
            <td> <input type='text' name='apellidos'value='$usuario->apellidos'></td>
            <td> <input type='text' name='nick'value='$usuario->nick'></td>
            <td> <input type='text' name='contrasena'value='$usuario->contrasena'></td>
            <td><input type='text' name='correo'value='$usuario->correo'></td>
            <td><input type='text' name='telefono'value='$usuario->telefono'></td>
            <td><input type='text' name='tipo'value='$usuario->tipo'></td>
            <td><input type='text' name='idInstituto'value='$usuario->idInstituto'></td>
            
        </tr>



                
                     
                " ;
              
                
                 //echo "<img src='".base_url($peliculas->cartel)."' width='100px'>";
                
               

                  echo "<button><a href='".site_url('Administrador/EliminarUsuarios/'.$usuario->id)."'>Eliminar</a></button>
                  </div>

                  </form>
                  ";
            }
            echo"</table>";
   
            echo "<div>
                
            <a href='".site_url("Usuarios/cerrar_sesion")."'>Cerrar sesión</a>

            </div>";
              
