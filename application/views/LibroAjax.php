<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryMaterialize.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryMaterialize.js"></script>
<link rel="stylesheet" href="<?php echo base_url('css/estiloMaterialize.css');?>">
<script>
$("document").ready(function() {
    
    $(".claseBorrar").click(function() {
 

 var id=$(this).attr("value");

 $("."+id).remove();

 cadena = "<?php echo site_url('Libros/EliminarLibro'); ?>/"+id;

 $.ajax({
 url: cadena
  });


});

});
</script>
<style>
.barraScroll,#lupa{
       overflow-y: scroll;
}
</style>
<div class="row"></div>
<div class="row container">
    <div class="col s12 m12 #536dfe indigo accent-2 z-depth-1 " id="capaAdmin">
        <!-- Hasta aqui los divs de Vistausuario-->

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
                    <th><a href="#insert" class="btn btn-large pulse #00e676 green accent-3 modal-trigger"><i
                                class="material-icons" title="Insertar">add_box</i></a></th>
                </tr>
            </thead>
            <tbody>
                <?php
       for ($i = 0; $i < count($listaLibros); $i++) {
              $libro = $listaLibros[$i];

       echo form_open_multipart("Libros/ModificarLibro");
       echo   "<div class='info'>
              <tr class='$libro->id'>
                     <input type='hidden' name='id' value='$libro->id' readonly>
                     <td><input class='#ffffff white-text' type='text' name='isbn' value='$libro->isbn'></td>
                     <td><input class='#ffffff white-text' type='text' name='titulo' value='$libro->titulo'></td>
                     <td><input class='#ffffff white-text' type='text' name='descripcion' value='$libro->descripcion'></td>
                     <td><input class='#ffffff white-text' type='text' name='fecha' value='$libro->fecha'></td>
                     <td><input class='#ffffff white-text' type='text' name='paginas' value='$libro->paginas'></td>
                     <td><select name='idInstituto' class='browser-default'>";
       for ($j = 0; $j < count($listaInstitutos); $j++) {
              $instituto = $listaInstitutos[$j]; 
              if( $libro->idInstituto==$instituto->id ){ 
       echo          "<option  value='$instituto->id' selected >$instituto->nombre</option> ";                      
              }else{
       echo          "<option  value='$instituto->id' >$instituto->nombre</option> ";
              }
       }

       echo  "</select></td>";
          
       for ($j = 0; $j < count($listaUsuarios); $j++) {
              $usuario = $listaUsuarios[$j]; 
              if( $libro->idUsuario==$usuario->id ){ 
       echo          "<td><input class='#ffffff white-text' type='text'  value='$usuario->nombre' readonly></td>";
       echo          "<input class='#ffffff white-text' type='hidden' name='idUsuario' value='$usuario->id' />";                      
              }
       }

       echo   "<td><select name='idEditorial' class='browser-default'>";  

       for ($j = 0; $j < count($listaEditoriales); $j++) {
              $editorial = $listaEditoriales[$j]; 
              if( $libro->idEditorial==$editorial->id ){ 
       echo          "<option  value='$editorial->id' selected >$editorial->nombre</option> ";                      
              }else{
       echo          "<option  value='$editorial->id' >$editorial->nombre</option> ";
              }
       }

       echo   "</select></td>
               <td><select required multiple name='idAutor[]' class='browser-default'>";


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
               <td><select required multiple name='idCategoria[]' class='browser-default'>";
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
       echo"</select></td>
       <td><button href='#lupa' class='btn waves-effect waves-light #9fa8da indigo lighten-3 z-depth-0 modal-trigger'><i class='material-icons' title='Detalles'>info</i></button></td>
       <td><button class='btn waves-effect waves-light #e65100 orange darken-4 z-depth-0 clasemodificar' value='$libro->id' type='submit' name='action'>Modificar<i class='material-icons right'>create</i></button></td>";
       echo"<td><a value='$libro->id' class='btn-flat waves-effect waves-light #d32f2f  red darken-2 white-text claseBorrar' >Eliminar<i class='material-icons right' title='Eliminar'>delete</i></a></td>
       </tr>

   </div>
             </form>";
    //Aqui comienza la modal de modificar
    
    echo"<div id='lupa' class='modal $libro->id' style='overflow-y: scroll;max-height: 450px;'>
            <h5 class='modal-close'>&#10005;</h5>
            <div class='modal-content center'>
                <h4 class='flow-text #00e676 green-text text-accent-3'>Modificar libros</h4>
                <div class='input-field'>
                    <i class='material-icons prefix' style='color:royalblue'>person</i>               
                    <input type='text' name='isbn' id='isbn'  value='$libro->isbn'>
                    <label class='active' style='color:royalblue' for='isbn'>Isbn</label>
                </div>
                <div class='input-field'>
                    <i class='material-icons prefix' style='color:royalblue'>person</i>               
                    <input type='text' name='titulo' id='titulo'  value='$libro->titulo'>
                    <label class='active' style='color:royalblue' for='titulo'>Titulo</label>
                </div>
                <div class='input-field'>
                    <i class='material-icons prefix' style='color:royalblue'>person</i>               
                    <input type='text' name='descripcion' id='descripcion'  value='$libro->descripcion'>
                    <label class='active' style='color:royalblue' for='descripcion'>Descripcion</label>
                </div>
                <div class='input-field'>
                    <i class='material-icons prefix' style='color:royalblue'>person</i>               
                    <input type='text' name='fecha' id='fecha'  value='$libro->fecha'>
                    <label class='active' style='color:royalblue' for='fecha'>Fecha</label>
                </div>
                <div class='input-field'>
                    <i class='material-icons prefix' style='color:royalblue'>person</i>               
                    <input type='text' name='paginas' id='paginas'  value='$libro->paginas'>
                    <label class='active' style='color:royalblue' for='paginas'>Paginas</label>
                </div>
                <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue' hidden>add_box</i>
                <select name='idInstituto' >";
                  for ($j = 0; $j < count($listaInstitutos); $j++) {
                    $instituto = $listaInstitutos[$j];
                    if( $usuario->idInstituto==$instituto->id ){ 
                      echo"<option  value='$instituto->id' selected>$instituto->nombre</option> ";
                    }else{
                      echo"<option  value='$instituto->id' >$instituto->nombre</option> ";
                    }
                  }
                echo"</select>
                </div>
                <div class='input-field'>
                    <i class='material-icons prefix' style='color:royalblue'>person</i>";
                    for ($j = 0; $j < count($listaUsuarios); $j++) {
                        $usuario = $listaUsuarios[$j]; 
                        if( $libro->idUsuario==$usuario->id ){ 
                 echo          "<input type='text' name='usuario' id='usuario'  value='$usuario->nombre'>";
                 echo          "<input type='hidden' name='idUsuario' id='idUsuario'  value='$usuario->id'>";
                 echo          "<label class='active' style='color:royalblue' for='paginas'>Paginas</label>";                      
                        }
                 }
        echo"   </div>
                <div class='input-field'>
                    <i class='material-icons prefix' style='color:royalblue' hidden>add_box</i>
                    <select name='idEditorial' >";
                        for ($j = 0; $j < count($listaEditoriales); $j++) {
                        $editorial = $listaEditoriales[$j];
                            if( $libro->idEditorial==$editorial->id ){ 
                        echo"<option  value='$editorial->id' selected>$editorial->nombre</option> ";
                            }else{
                        echo"<option  value='$editorial->id' >$editorial->nombre</option> ";
                            }
                        }
        echo"       </select>
                </div>
                <div>
                    <i class='material-icons prefix' style='color:royalblue' hidden>add_box</i>
                    <select multiple name='idAutor[]'>";
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

        echo"       </select>
                </div>
                <div>
                    <i class='material-icons prefix' style='color:royalblue' hidden>add_box</i>
                    <select multiple name='idCategoria[]'>";
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

        echo"       </select>
                </div>
                <button class='btn waves-effect waves-light #e65100 orange darken-4 z-depth-0 claseModificar' value='$usuario->id' type='submit' name='action'><i class='material-icons '>create</i></button>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>";


       } 
       ?>

            </tbody>
        </table>

        <div id="insert" class="modal barraScroll">
            <?php    echo form_open_multipart("Libros/InsertarLibro");?>
            <h5 class="modal-close">&#10005;</h5>
            <div class="modal-content center">
                <h4 class="flow-text #00e676 green-text text-accent-3">Insertar Registro</h4>
                <div class="input-field">
                    <i class="material-icons prefix" style="color:royalblue">person</i>
                    <input type='text' name='isbn' id='isbn'>
                    <label style="color:royalblue" for="isbn">isbn</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" style="color:royalblue">add_box</i>
                    <input type='text' name='titulo' id='titulo'>
                    <label style="color:royalblue" for="titulo">Titulo</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" style="color:royalblue">add_box</i>
                    <input type='text' name='descripcion' id='descripcion'>
                    <label style="color:royalblue" for="descripcion">Descripcion</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" style="color:royalblue">add_box</i>
                    <input type='text' name='fecha' id='fecha'>
                    <label style="color:royalblue" for="fecha">Fecha</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" style="color:royalblue">add_box</i>
                    <input type='text' name='paginas' id='paginas'>
                    <label style="color:royalblue" for="paginas">Paginas</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" style="color:royalblue" hidden>add_box</i>
                    <select name="idInstituto" id="idInstituto">
                        <?php
                                          for ($j = 0; $j < count($listaInstitutos); $j++) {
                                           $instituto = $listaInstitutos[$j];
                                                 if($j==0){
                                          echo      "<option  value='$instituto->id' selected >$instituto->nombre</option> ";                      
                                                  }else{
                                          echo      "<option  value='$instituto->id'>$instituto->nombre</option> ";                  
                                                  }
                                          }?>
                    </select>
                    <label style="color:royalblue" for="idInstituto">IdInstituto</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" style="color:royalblue" hidden>add_box</i>
                    <select name="idUsuario" id="idUsuario">
                        <?php
                                          for ($j = 0; $j < count($listaUsuarios); $j++) {
                                           $usuario = $listaUsuarios[$j];
                                                 if($j==0){
                                          echo      "<option  value='$usuario->id' selected >$usuario->nombre</option> ";                      
                                                  }else{
                                          echo      "<option  value='$usuario->id'>$usuario->nombre</option> ";                  
                                                  }
                                          }?>
                    </select>
                    <label style="color:royalblue" for="idUsuario">Usuario</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" style="color:royalblue" hidden>add_box</i>
                    <select name="idEditorial" id="idEditorial">
                        <?php
                                          for ($j = 0; $j < count($listaEditoriales); $j++) {
                                           $editorial = $listaEditoriales[$j];
                                                 if($j==0){
                                          echo      "<option  value='$editorial->id' selected >$editorial->nombre</option> ";                      
                                                  }else{
                                          echo      "<option  value='$editorial->id'>$editorial->nombre</option> ";                  
                                                  }
                                          }?>
                    </select>
                    <label style="color:royalblue" for="idEditorial">Editorial</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" style="color:royalblue" hidden>add_box</i>
                    <select multiple name="idAutor[]" id="idAutor">
                        <?php
                                          for ($j = 0; $j < count($listaAutores); $j++) {
                                           $autor = $listaAutores[$j];
                                                 if($j==0){
                                          echo      "<option  value='$autor->id' selected >$autor->nombre</option> ";                      
                                                  }else{
                                          echo      "<option  value='$autor->id'>$autor->nombre</option> ";                  
                                                  }
                                          }?>
                    </select>
                    <label style="color:royalblue" for="idAutor">Autor</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" style="color:royalblue" hidden>add_box</i>
                    <select multiple name="idCategoria[]" id="idCategoria">
                        <?php
                                          for ($j = 0; $j < count($listaCategorias); $j++) {
                                           $categoria = $listaCategorias[$j];
                                                 if($j==0){
                                          echo      "<option  value='$categoria->id' selected >$categoria->nombre</option> ";                      
                                                  }else{
                                          echo      "<option  value='$categoria->id'>$categoria->nombre</option> ";                  
                                                  }
                                          }?>
                    </select>
                    <label style="color:royalblue" for="idCategoria">Categoria</label>
                </div>
                
                <div><input style="background-color:royalblue" type="submit" value="Insertar" class="btn btn-large"></div>
                <br>
                <br>
            </div>

            </form>
        </div>

        <!--Esto cierra Vista usuario-->
    </div>
</div>