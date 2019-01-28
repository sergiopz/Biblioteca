<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryMaterialize.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryInstitutos.js"></script>-->
<script>
  $("document").ready(function(){

$(".borrarInstituto").click(function() {

   var idInstituto=$(this).attr("value");

    $("."+idInstituto).remove();

    cadena = "<?php echo site_url('Editoriales/EliminarEditorial'); ?>/"+idInstituto;

    $.ajax({
    url: cadena
     });


   });



});
</script>
<table class="highlight responsive-table #536dfe indigo accent-2 ">
          <thead>
            <tr class="#536dfe indigo accent-2">

              <th class="#000000 black-text" >Nombre</th>
              
              
              <th><a href="#insert" id="mover" class="btn btn-large pulse #00e676 green accent-3 modal-trigger"><i class="material-icons" title="Insertar">add_box</i></a></th>
            </tr>
          </thead>

          <style>
            #mover{
              float: right;
        
              margin-right: 20%;
            }
          </style>

        </table>
      
            
            <?php
              for ($i = 0; $i < count($listaEditoriales); $i++) {
              $editorial = $listaEditoriales[$i];
       
             
              echo form_open("Editoriales/ModificarEditorial");
              echo" <table class='highlight responsive-table #536dfe indigo accent-2'>
                <div class='info'>
              
                <tbody>
                <tr class='$editorial->id'>
                <input hidden type='text' name='id' value='$editorial->id'>
                <td><input class='#ffffff white-text' type='text' name='nombre' value='$editorial->nombre'></td>
                <td><input type='Submit' name='Modificar' value='Modificar'/></td>

                 
                 
                <td><a value='$editorial->id' class='btn btn-floating #d32f2f red darken-2 borrarInstituto' ><i class='material-icons' title='Eliminar'>delete</i></a><td>
                  </div>
               
                  </tr>
                  </tbody>
                   </table>
                   </form>
                ";
              }
        ?>
            <script>
              $("document").ready(function(){
                $("#prueba").click(function(){
                  var datos=$("#pf").serialize();
                  alert(datos);
                });
              });

              </script>
       <!-- 
            <tr class="">
              <td><input type="text" name="nombre"></td>
              <td><input type="text" name="localidad"></td>
              <td><input type="text" name="direccion"></td>
              <td><input type="text" name="cp"></td>
              <td><input type="text" name="provincia"></td>
              <td><a class="btn btn-floating #d32f2f red darken-2 botonD"><i class="material-icons" title="Eliminar">delete</i></a></td>
              <td><a class="btn btn-floating #e65100 orange darken-4"><i class="material-icons" title="Modificar">create</i></a></li></td>
            </tr>-->
  

      </div>

    </div>

        <!--Contenido de la ventana modal de insercion-->


        <div id="insert" class="modal" style="overflow-y: scroll">
         <?php    echo form_open_multipart("Editoriales/InsertarEditorial");?>
        
          <h5 class="modal-close">&#10005;</h5>
          <div class="modal-content center">
            <h4 class="flow-text #00e676 green-text text-accent-3">Insertar Registro</h4>
        
              <div class="input-field">
                <i class="material-icons prefix" style="color:royalblue">person</i>
                <input type="text" name="nombre" id="nombre">
                <label for="nombre"  style="color:royalblue">Nombre</label>
              </div>

              <div><input style="background-color:royalblue" type="submit" value="Insertar" class="btn btn-large"></div>
              <br>
              <br>

            </form>
          </div>
        </div>



<?php

/*
  
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
*/