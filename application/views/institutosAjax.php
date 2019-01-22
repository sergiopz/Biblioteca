<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryMaterialize.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryInstitutos.js"></script>-->
<script>
  $("document").ready(function(){

$(".borrarInstituto").click(function() {

   var idInstituto=$(this).attr("value");

    $("."+idInstituto).remove();

    cadena = "<?php echo site_url('Institutos/EliminarInstituto'); ?>/"+idInstituto;

    alert(cadena);

    $.ajax({
    url: cadena
     });


   });



});
</script>
        <table class="highlight responsive-table #536dfe indigo accent-2 ">
          <thead>
            <tr class="#536dfe indigo accent-2">
              <th>Nombre</th>
              <th>Localidad</th>
              <th>Direccion</th>
              <th>CP</th>
              <th>Provincia</th>
              <th><a href="#insert" class="btn btn-large pulse #00e676 green accent-3 modal-trigger"><i class="material-icons" title="Insertar">add_box</i></a></th>
            </tr>
          </thead>
          <tbody>
            
            <?php
              for ($i = 0; $i < count($listaInstitutos); $i++) {
                $instituto = $listaInstitutos[$i];

                  echo form_open("Institutos/ModificarInstituto");
                  echo "<div class='info'>
                  <form id='pf'>
                  <tr class='$instituto->id'>
                  <input type='text' name='id' hidden value='$instituto->id'>
                  <td><input type='text' name='nombre' value='$instituto->nombre'></td>
                  <td><input type='text' name='localidad'value='$instituto->localidad'></td>
                  <td><input type='text' name='direccion'value='$instituto->direccion'></td>
                  <td><input type='text' name='cp'value='$instituto->cp'></td>
                  <td><input type='text' name='provincia'value='$instituto->provincia'></td>
                  <td><input id='prueba' type='Submit' name='Modificar' value='Modificar'></td>
                     
                " ;
            
                echo "<td><a value='$instituto->id' class='btn btn-floating #d32f2f red darken-2 borrarInstituto' ><i class='material-icons' title='Eliminar'>delete</i></a><td>
                  </div>
                  </form>
                  </tr>
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
           
          </tbody>
        </table>

      </div>

    </div>

        <!--Contenido de la ventana modal de insercion-->


        <div id="insert" class="modal" style="overflow-y: scroll">
        <?php echo form_open_multipart("Institutos/InsertarInstituto");?>
          <h5 class="modal-close">&#10005;</h5>
          <div class="modal-content center">
            <h4>Insert</h4>
        
            <form action="#">
              
              <div class="input-field">
                <i class="material-icons prefix" style="color:royalblue">person</i>
                <input type="text" id="nombre">
                <label for="nombre">Nombre</label>
              </div>

        
              <div class="input-field">
                <i class="material-icons prefix" style="color:royalblue">lock</i>
                <input type="text" id="localidad">
                <label for="localidad">Localidad</label>
              </div>

              <div class="input-field">
                <i class="material-icons prefix" style="color:royalblue">lock</i>
                <input type="text" id="direccion">
                <label for="direccion">Direccion</label>
              </div>
              
              <div class="input-field">
                <i class="material-icons prefix" style="color:royalblue">lock</i>
                <input type="text" id="cp">
                <label for="cp">Codigo Postal</label>
              </div>

              <div class="input-field">
                <i class="material-icons prefix" style="color:royalblue">lock</i>
                <input type="text" id="provincia">
                <label for="provincia">Provincia</label>
              </div>
                <div><input type="submit" value="Insertar" class="btn btn-large"></div>
              <br>
              <br>

            </form>
          </div>
        </div>



<?php

/*
    echo "<fieldset>
                
            nombre : <input type='text' name='nombre'/><br/>
            localidad: <input type='text'name='localidad'/><br/>
            direccion: <input type='text' name='direccion'/><br/>
            cp: <input type='text' name='cp'/><br/> 
            provincia: <input type='text' name='provincia'/><br/>
    ";
    echo "<br/>
            </fieldset>
    ";

    echo"<input  type='submit' name='Enviar' value='Insertar'/>
            </form>
    ";
           
    echo "<br></div>";

    echo "<a href='#' id='btnNuevoUsuario1'>Mostrar</a>";
      
         
    echo "<span>nombre</span>
            <span>localidad</span>
            <span>direccion</span>
            <span>cp</span>
            <span>provincia</span>                  
    ";

    echo "<br>";   
    echo "<br>";   
            
    for ($i = 0; $i < count($listaInstitutos); $i++) {
        $instituto = $listaInstitutos[$i];

        echo form_open("Institutos/ModificarInstituto");
        echo "<div class='info'>
            <input type='text' name='id' hidden value='$instituto->id'>
            <input type='text' name='nombre' value='$instituto->nombre'>
            <input type='text' name='localidad'value='$instituto->localidad'>
            <input type='text' name='direccion'value='$instituto->direccion'>
            <input type='text' name='cp'value='$instituto->cp'>
            <input type='text' name='provincia'value='$instituto->provincia'>
            <input type='Submit' name='Modificar' value='Modificar'/>
                     
         " ;
 
        echo "<button><a href='".site_url('Institutos/EliminarInstituto/'.$instituto->id)."'>Eliminar</a></button>
            </div>
            </form>
        ";
    }
   
    echo "<div>          
            <a href='".site_url("Usuarios/cerrar_sesion")."'>Cerrar sesión</a>
            </div>
    ";
              
*/