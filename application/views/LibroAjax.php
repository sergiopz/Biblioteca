<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryMaterialize.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryMaterialize.js"></script>
<link rel="stylesheet" href="<?php echo base_url('css/estiloMaterialize.css');?>">
<script> $("document").ready(function() {
            $(".libro").removeClass("#8c9eff indigo accent-1").addClass("#304ffe indigo accent-4");
          });
</script>
<div class="row"></div>
    <div class="row">
      <div class="col s12 m12 #536dfe indigo accent-2 z-depth-1 " id="capaAdmin">
      <!-- Hasta aqui los divs de VistaAdministrador-->
<?php     
       echo  "<div class='formularioInsercion' style='display:inline'>
              <h1>Insertar un Libro</h1>";
       
       

       echo form_open_multipart("Libros/InsertarLibro");
       

       echo "        <fieldset>
                            Isbn : <input type='text' name='isbn'/><br/>
                            Titulo : <input type='text' name='titulo'/><br/>
                            Descripcion : <input type='text' name='descripcion'/><br/>
                            Fecha : <input type='text' name='fecha'/><br/>
                            Paginas : <input type='text' name='paginas'/><br/>
                            idInstituto : 
                            <select name='idInstituto'>";
                            for ($j = 0; $j < count($listaInstitutos); $j++) {
                            $instituto = $listaInstitutos[$j]; 
                                   if( $libro->idInstituto==$instituto->id ){ 
                            echo          "<option  value='$instituto->id' selected >$instituto->nombre</option> ";                      
                                   }else{
                            echo          "<option  value='$instituto->id' >$instituto->nombre</option> ";
                                   }
                             }
       echo"                </select><br/>
                            idUsuario : <input type='text' name='idUsuario'/><br/>
                            idEditorial : 
                                   <select name='idEditorial'>"; 
                                   for ($j = 0; $j < count($listaEditoriales); $j++) {
                                   $editorial = $listaEditoriales[$j]; 
                                          if( $libro->idEditorial==$editorial->id ){ 
       echo                               "<option  value='$editorial->id' selected >$editorial->nombre</option> ";                      
                                          }else{
       echo                               "<option  value='$editorial->id' >$editorial->nombre</option> ";
                                          }
                                   }
       echo"                       </select><br/>
                            Autores : 
                                   <select multiple name='idAutor[]'>";
                                   for ($j = $cont=0; $j < count($listaAutores); $j++) {
                                   $autor = $listaAutores[$j];
       echo                               "<option value='$autor->id' >$autor->nombre</option> ";
                                   }                      
       echo"                       </select><br/>
                            Categorias: 
                                   <select multiple name='idCategoria[]'>";
                                   for ($j = $cont=0; $j < count($listaCategorias); $j++) {
                                   $categoria = $listaCategorias[$j];
       echo                               "<option value='$categoria->id'>$categoria->nombre</option> ";
                                   }                                                         
       echo"                       </select><br/>
                     </fieldset>
                            <input  type='submit' name='Enviar' value='Insertar'/>
              </form><br>
              </div>
              <a href='#' id='btnNuevoUsuario'>Nuevo</a>
              <span>id</span>
              <span>nombre</span>  <br><br>";   
       
       //Aqui comienza la creacion de las tablas
       ?>
       <table class="highlight responsive-table #536dfe indigo accent-2 ">
              <thead>
                     <tr class="#536dfe indigo accent-2">
                            <th class="#000000 black-text">Isbn</th>
                            <th class="#000000 black-text">Titulo</th>
                            <th class="#000000 black-text">Descripcion</th>
                            <th class="#000000 black-text">Fecha</th>
                            <th class="#000000 black-text">Paginas</th>
                            <th class="#000000 black-text">Instituto</th>
                            <th class="#000000 black-text">Usuario</th>
                            <th class="#000000 black-text">Editorial</th>
                            <th class="#000000 black-text">Autor</th>
                            <th class="#000000 black-text">Categoria</th>
                            <th><a href="#insert" class="btn btn-large pulse #00e676 green accent-3 modal-trigger"><i class="material-icons" title="Insertar">add_box</i></a></th>
                     </tr>
              </thead>
              <tbody>
              <?php
       for ($i = 0; $i < count($listaLibros); $i++) {
              $libro = $listaLibros[$i];

       echo form_open("Libros/ModificarLibro");
       echo   "<div class='info'>
              <tr class='$libro->id'>
                     <input type='hidden' name='id' value='$libro->id' readonly>
                     <td><input class='#ffffff white-text' type='text' name='isbn' value='$libro->isbn'></td>
                     <td><input class='#ffffff white-text' type='text' name='titulo' value='$libro->titulo'></td>
                     <td><input class='#ffffff white-text' type='text' name='descripcion' value='$libro->descripcion'></td>
                     <td><input class='#ffffff white-text' type='text' name='fecha' value='$libro->fecha'></td>
                     <td><input class='#ffffff white-text' type='text' name='paginas' value='$libro->paginas'></td>
                     <td><select name='idInstituto'>";
       for ($j = 0; $j < count($listaInstitutos); $j++) {
              $instituto = $listaInstitutos[$j]; 
              if( $libro->idInstituto==$instituto->id ){ 
       echo          "<option  value='$instituto->id' selected >$instituto->nombre</option> ";                      
              }else{
       echo          "<option  value='$instituto->id' >$instituto->nombre</option> ";
              }
       }

       echo  "</select></td>";
          
       for ($j = 0; $j < count($listaAdministradores); $j++) {
              $administrador = $listaAdministradores[$j]; 
              if( $libro->idUsuario==$administrador->id ){ 
       echo          "<td><input class='#ffffff white-text' type='text'  value='$administrador->nombre' readonly></td>";
       echo          "<input class='#ffffff white-text' type='hidden' name='idUsuario' value='$administrador->id' />";                      
              }
       }

       echo   "<td><select name='idEditorial'>";  

       for ($j = 0; $j < count($listaEditoriales); $j++) {
              $editorial = $listaEditoriales[$j]; 
              if( $libro->idEditorial==$editorial->id ){ 
       echo          "<option  value='$editorial->id' selected >$editorial->nombre</option> ";                      
              }else{
       echo          "<option  value='$editorial->id' >$editorial->nombre</option> ";
              }
       }

       echo   "</select></td>
               <td><select required multiple name='idAutor[]'>";


       for ($j = $cont=0; $j < count($listaAutores); $j++) {
              $autor = $listaAutores[$j];
              for ($k = 0; $k < count($listaAutoresLibros); $k++) {
                      $autorlibro = $listaAutoresLibros[$k];
                            if(($autorlibro->idAutor==$autor->id)&&($autorlibro->idLibro==$libro->id)){
       echo          "<option  value='$autor->id' selected >$autor->nombre</option> "; 
                            $k=count($listaAutoresLibros); 
                     }else if ($k==count($listaAutoresLibros)-1)  {
       echo          "<option  value='$autor->id'  >$autor->nombre</option> ";
                            $k=count($listaAutoresLibros);
                     }
              }
       }
      
       echo   "</select></td>
               <td><select required multiple name='idCategoria[]'>";
       for ($j = 0; $j < count($listaCategorias); $j++) {
                     $categoria = $listaCategorias[$j];
              for ($k = 0; $k < count($listaLibrosCategorias); $k++) {
                     $librocategoria = $listaLibrosCategorias[$k];
                            if(($librocategoria->idCategoria==$categoria->id)&&($librocategoria->idLibro==$libro->id)){
       echo          "<option  value='$categoria->id' selected >$categoria->nombre</option> "; 
                            $k=count($listaLibrosCategorias);
                            }else if($k==count($listaLibrosCategorias)-1) {
       echo          "<option  value='$categoria->id'>$categoria->nombre</option> ";
                            $k=count($listaLibrosCategorias);
                     }
              }
       }

   
       
       
       
      
       echo   "</select></td>
                     <td><button class='btn waves-effect waves-light #e65100 orange darken-4 z-depth-0 clasemodificar' value='$libro->id' type='submit' name='action'>Modificar<i class='material-icons right'>create</i></button></td>
                     <td><a value='$libro->id' class='btn-flat waves-effect waves-light #d32f2f  red darken-2 white-text borrarInstituto' >Eliminar<i class='material-icons right' title='Eliminar'>delete</i></a><td>      
             </div>

             </form>";
       } 
       ?>

              </tbody>
       </table>
       

       <!--Aqui cierra la Vista Administrador-->
       <div id="insert" class="modal" style="overflow-y: scroll">
              <?php    echo form_open_multipart("Libros/InsertarLibros");?>
                     <h5 class="modal-close">&#10005;</h5>
                     <div class="modal-content center">
                     <h4 class="flow-text #00e676 green-text text-accent-3">Insertar Registro</h4>
                            <div class="input-field">
                                   <i class="material-icons prefix" style="color:royalblue">add_box</i>
                                   <input type='text' name='isbn' id='isbn'>
                                   <label style="color:royalblue" for="isbn">isbn</label>
                            </div>
                            <div class="input-field">
                                   <i class="material-icons prefix" style="color:royalblue">add_box</i>
                                   <input type='text' name='titulo' id='titulo'>
                                   <label style="color:royalblue" for="titulo">Titulo</label>
                            </div>
                            <div class="input-field">
                                   <i class="material-icons prefix" style="color:royalblue">description</i>
                                   <input type='text' name='descripcion' id='descripcion'>
                                   <label style="color:royalblue" for="descripcion">Descripcion</label>
                            </div>
                            <div class="input-field">
                                   <i class="material-icons prefix" style="color:royalblue">date_range</i>
                                   <input type='text' name='fecha' id='fecha'>
                                   <label style="color:royalblue" for="fecha">Fecha</label>
                            </div>
                            <div class="input-field">
                                   <i class="material-icons prefix" style="color:royalblue">add_box</i>
                                   <input type='text' name='paginas' id='paginas'>
                                   <label style="color:royalblue" for="paginas">Paginas</label>
                            </div>
                            <div class="input-field">
                                   <i class="material-icons prefix" style="color:royalblue">add_box</i>         
                                   <select name="idInstituto" id="idInstituto">
                                   <?php
                                   for ($j = 0; $j < count($listaInstitutos); $j++) {
                                          $instituto = $listaInstitutos[$j];
                                          if( $usuario->id==$instituto->id ){ 
                                          echo      "<option  value='$instituto->id' selected >$instituto->nombre</option> ";                      
                                          }else{
                                          echo      "<option  value='$instituto->id' >$instituto->nombre</option> ";
                                          }
                                   }
                                   ?>
                                   </select>
                                   <label style="color:royalblue" for="Id Instituto">IdInstituto</label>
                            </div>
                     </div>
              </form>
       </div>

      </div>  
  </div>
             