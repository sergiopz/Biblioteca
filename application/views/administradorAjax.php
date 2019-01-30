<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryMaterialize.js"></script>
<script>
  $("document").ready(function(){

$(".borrarInstituto").click(function() {

   var idInstituto=$(this).attr("value");

    $("."+idInstituto).remove();

    cadena = "<?php echo site_url('Administrador/EliminarUsuarios'); ?>/"+idInstituto;

    $.ajax({
    url: cadena
     });


   });

});
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.clasemodificar').click(function(){

      var iddiv=$(this).attr("value");
  
      var nombreusuario=$("."+iddiv+ " input[name='nombre']").val();
       
      var apellidousuario=$("."+iddiv+ " input[name='apellidos']").val();
       
      var nickusuario=$("."+iddiv+ " input[name='nick']").val();
     
      var contrasenausuario=$("."+iddiv+ " input[name='contrasena']").val();
       
      var correousuario=$("."+iddiv+ " input[name='correo']").val();
    
      var telefonousuario=$("."+iddiv+ " input[name='telefono']").val();
      
      var tipousuario=$("."+iddiv+ " input[name='tipo']").val();
       
      var idInstitutousuario=$("."+iddiv+ " option:selected").val();
       
      var datos="id="+iddiv+"&nombre="+nombreusuario+"&apellidos="+apellidousuario+"&nick="+nickusuario+"&contrasena="+contrasenausuario+"&correo="+correousuario+"&telefono="+telefonousuario+"&tipo="+tipousuario+"&idInstituto="+idInstitutousuario+"&codigoConfirmacion= ";

      var cadena="<?php echo site_url("Administrador/ModificarUsuarios/"); ?>";

      $.ajax({
        type:"POST",
        url: cadena,
        data:datos
      });

    });
  });
 

 $('input').focus(function(){

    $(this).css({'width':' 250px'});

     

 $(this).blur(function(){
     $(this).css({'width':'100%'});
  });
   
   });

</script>

<style>

input{width: 150px
}
  
</style>

<table class="highlight responsive-table #536dfe indigo accent-2 ">
  <thead>
    <tr class="#536dfe indigo accent-2">
      <th class="#000000 black-text">Nombre</th>
      <th class="#000000 black-text">Apellidos</th>
      <th class="#000000 black-text">Nick</th>
      <th class="#000000 black-text">Contraseña</th>
      <th class="#000000 black-text">E-Mail</th>
      <th class="#000000 black-text">Teléfono</th>
      <th class="#000000 black-text">Tipo</th>
      <th class="#000000 black-text">Instituto</th>
      <th><a href="#insert" class="btn btn-large pulse #00e676 green accent-3 modal-trigger"><i class="material-icons" title="Insertar">add_box</i></a></th>
    </tr>
  </thead>
  <tbody>
            
  <?php
    for ($i = 0; $i < count($listaUsuarios); $i++) {
          $usuario = $listaUsuarios[$i];
            echo "<div class='info'>
              <tr class='$usuario->id'>
                <input type='text' hidden name='id' value='$usuario->id'>
                <td><input class='#ffffff white-text' type='text' name='nombre' value='$usuario->nombre'></td>
                <td><input class='#ffffff white-text' type='text' name='apellidos'value='$usuario->apellidos'></td>
                <td><input class='#ffffff white-text' type='text' name='nick'value='$usuario->nick'></td>
                <td><input class='#ffffff white-text' type='text' name='contrasena'value='$usuario->contrasena'></td>
                <td><input class='#ffffff white-text' type='text' name='correo'value='$usuario->correo'></td>
                <td><input class='#ffffff white-text' type='text' name='telefono'value='$usuario->telefono'></td>
                <td><input class='#ffffff white-text' type='text' name='tipo'value='$usuario->tipo'></td>
                <td><select name='idInstituto'>";
                for ($j = 0; $j < count($listaInstitutos); $j++) {
                  $instituto = $listaInstitutos[$j];
                  if( $usuario->idInstituto==$instituto->id ){ 
                    echo"<option  value='$instituto->id' selected>$instituto->nombre</option> ";
                  }else{
                    echo"<option  value='$instituto->id' >$instituto->nombre</option> ";
                  }
                }
                echo"</select></td>
                <td><a href='#$usuario->id' class='btn btn-large pulse #00e676 green accent-3 modal-trigger'><i class='material-icons' title='Insertar'>add_box</i></a></td>

                <td><button class='btn waves-effect waves-light #e65100 orange darken-4 z-depth-0 clasemodificar' value='$usuario->id' type='submit' name='action'>Modificar<i class='material-icons right'>create</i></button></td>";
                echo"<td><a value='$usuario->id' class='btn-flat waves-effect waves-light #d32f2f  red darken-2 white-text borrarInstituto' >Eliminar<i class='material-icons right' title='Eliminar'>delete</i></a><td>
                </tr>
            </div>
          ";


          echo"<div id='$usuario->id' class='modal' style='overflow-y: scroll'>
           
        
          <h5 class='modal-close'>&#10005;</h5>
          <div class='modal-content center'>
            <h4 class='flow-text #00e676 green-text text-accent-3'>Insertar Registro</h4>
        
              <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>person</i>
               
                <input type='text' name='nombre' id='nombre' readonly value='$usuario->nombre'>
                
              </div>
              <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>person</i>
                <input type='text' name='apellido' id='apellido'  readonly value='$usuario->apellidos'>
               
              </div>
              <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>face</i>
                <input type='text' name='nick' id='nick'  readonly value='$usuario->nick'>
             
              </div>
              <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>lock</i>
                <input type='text' name='contrasena' id='contrasena'  readonly value='$usuario->contrasena'>
             
              </div>
              <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>mail</i>
                <input type='text' name='correo' id='correo' readonly value='$usuario->correo'>
           
              </div>
               <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>phone</i>
                 <input type='text' name='telefono' id='telefono'  readonly value='$usuario->telefono'>
               
              </div>
              <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>add_box</i>
               <input type='text' name='tipo' id='tipo'  readonly value='$usuario->tipo'>

              </div>
              <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>add_box</i>
                 <input type='text' name='tipo'   readonly value='$usuario->tipo'>
                 
                 
              </div>
              <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>add_box</i>
                <input type='text' name='codigoConfirmacion'  readonly id='codigoConfirmacion'>
                
              </div>

              
              <br>
              <br>


            </form>
          </div>
        </div>
          ";


    }
    ?>


    </tbody>
  </table>

      </div>
    </div>

        <!--Contenido de la ventana modal de insercion-->

        <div id="insert" class="modal" style="overflow-y: scroll">
         <?php    echo form_open_multipart("Administrador/InsertarUsuarios");?>
        
          <h5 class="modal-close">&#10005;</h5>
          <div class="modal-content center">
            <h4 class="flow-text #00e676 green-text text-accent-3">Insertar Registro</h4>
        
              <div class="input-field">
                <i class="material-icons prefix" style="color:royalblue">person</i>
               
                <input type='text' name='nombre' id='nombre'>
                <label style="color:royalblue" for="nombre">Nombre</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix" style="color:royalblue">person</i>
                <input type='text' name='apellido' id='apellido'>
                <label style="color:royalblue" for="apellido">Apellido</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix" style="color:royalblue">face</i>
                <input type='text' name='nick' id='nick'>
                <label style="color:royalblue" for="nick">Nick</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix" style="color:royalblue">lock</i>
                <input type='text' name='contrasena' id='contrasena'>
                <label style="color:royalblue" for="contrasena">Contrasena</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix" style="color:royalblue">mail</i>
                <input type='text' name='correo' id='correo'>
                <label style="color:royalblue" for="correo">Correo</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix" style="color:royalblue">phone</i>
                 <input type='text' name='telefono' id='telefono'>
                <label style="color:royalblue" for="telefono">Telefono</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix" style="color:royalblue">add_box</i>
               <input type='text' name='tipo' id='tipo'>
                <label style="color:royalblue" for="tipo">Tipo</label>
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
              <div class="input-field">
                <i class="material-icons prefix" style="color:royalblue">add_box</i>
                <input type='text' name='codigoConfirmacion' id='codigoConfirmacion'>
                <label style="color:royalblue" for="Codigo de Confirmacion">codigoConfirmacion</label>
              </div>

              <div><input style="background-color:royalblue" type="submit" value="Insertar" class="btn btn-large"></div>
              <br>
              <br>


            </form>
          </div>
        </div>