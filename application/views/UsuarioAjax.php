<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryMaterialize.js"></script>

<script>
$("document").ready(function() {
    //Plugin de jquery para las tablas
    $('#table_id').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    //Ejecutar eliminar el registro al hacer click en el boton Eliminar
    $(".claseBorrar").click(function() {

        var r = confirm("Vas a eliminar un registro!\n¿Estás seguro?");
  if (r == false) {
   
    e.preventDefault();

  }else{


        var idUsuario = $(this).attr("value");

        $("." + idUsuario).remove();

        cadena = "<?php echo site_url('Usuarios/EliminarUsuarios'); ?>/" + idUsuario;

        $.ajax({
            url: cadena
        });
      }

    });

    //Ejecutar modificar el registro al hacer click en el boton Modificar
    $('.claseModificar').click(function() {

        var iddiv = $(this).attr("value");
        var nombreusuario = $("." + iddiv + " input[name='nombre']").val();
        var apellidousuario = $("." + iddiv + " input[name='apellidos']").val();
        var nickusuario = $("." + iddiv + " input[name='nick']").val();
        var contrasenausuario = $("." + iddiv + " input[name='contrasena']").val();
        var correousuario = $("." + iddiv + " input[name='correo']").val();
        var telefonousuario = $("." + iddiv + " input[name='telefono']").val();
        var tipousuario = $("." + iddiv + " input[name='tipo']").val();
        var idInstitutousuario = $("." + iddiv + " option:selected").val();
        var valorInstitutousuario = $("." + iddiv + " option:selected").text();

        $("." + iddiv + " p[name='nombre']").text(nombreusuario);
        $("." + iddiv + " p[name='apellidos']").text(apellidousuario);
        $("." + iddiv + " p[name='nick']").text(nickusuario);
        $("." + iddiv + " p[name='tipo']").text(tipousuario);
        $("." + iddiv + " p[name='idInstituto']").text(valorInstitutousuario);
        var datos = "id=" + iddiv + "&nombre=" + nombreusuario + "&apellidos=" + apellidousuario +
            "&nick=" + nickusuario + "&contrasena=" + contrasenausuario + "&correo=" + correousuario +
            "&telefono=" + telefonousuario + "&tipo=" + tipousuario + "&idInstituto=" +
            idInstitutousuario + "&codigoConfirmacion= ";
        var cadena = "<?php echo site_url("Usuarios/ModificarUsuarios/"); ?>";

        $.ajax({
            type: "POST",
            url: cadena,
            data: datos
        });

    });
});
</script>

<a href="#insert" id="mover" class="flotante btn btn-large pulse #00e676 green accent-3 modal-trigger "><i
        class="material-icons" title="Insertar">add_box</i></a>
<table id="table_id" class="">
    <thead>
        <tr>
            <th class="#000000 black-text">Nombre</th>
            <th class="#000000 black-text">Apellidos</th>
            <th class="#000000 black-text">Nick</th>
            <th class="#000000 black-text">Tipo</th>
            <th class="#000000 black-text">Instituto</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>

    </thead>
    <tbody>
        <?php
  //Recorremos el array de datos de la tabla Usuarios y para cada usuario recorremos los arrays de datos necesarios
  for ($i = 0; $i < count($listaUsuarios); $i++) {
          $usuario = $listaUsuarios[$i];

        echo" <tr class='$usuario->id'>  
              <td class='colorFila'><p class='#ffffff black-text' name='nombre'>$usuario->nombre</p></td>
              <td class='colorFila'><p class='#ffffff black-text' name='apellidos'>$usuario->apellidos</p></td>
              <td class='colorFila'><p class='#ffffff black-text' name='nick'>$usuario->nick</p></td>
              <td class='colorFila'><p class='#ffffff black-text' name='tipo'>$usuario->tipo</p></td>";

        for ($j = 0; $j < count($listaInstitutos); $j++) {
              $instituto = $listaInstitutos[$j];

            if( $usuario->idInstituto==$instituto->id ){ 
        echo"<td class='colorFila'><p class='#ffffff black-text' name='idInstituto'>$instituto->nombre</p></td>";
             $j=count($listaInstitutos);

            }else if($j==count($listaInstitutos)-1){
        echo"<td class='colorFila'><p class='#ffffff black-text' name='idInstituto'></p></td>";
              $j=count($listaInstitutos);
            }
        }
        echo" <td class='colorFila'><button href='#lupa$usuario->id'  class='btn waves-effect waves-light #e65100 orange darken-4 z-depth-0 modal-trigger'>Modificar</button></td>
              <td class='colorFila'><button class='btn-flat waves-effect waves-light #d32f2f  red darken-2 white-text anchuraBoton2 claseBorrar ' value='$usuario->id' type='submit' name='action'>Eliminar<i class='material-icons right' title='Eliminar'>delete</i></button></td>
              </tr>";
        echo"
        <div id='lupa$usuario->id' class='modal $usuario->id'>  
         <h5 class='modal-close'>&#10005;</h5>
          <div class='modal-content center tamañoVModal'>
            <h4 class='flow-text #00e676 green-text text-accent-3'>Modificar Usuarios</h4>
        
              <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>person</i>
                <input type='text' name='nombre' id='nombre'  value='$usuario->nombre'>
                <label class='active' style='color:royalblue' for='nombre'>Nombre</label>
              </div>
              <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>person</i>
                <input type='text' name='apellidos' id='apellido'   value='$usuario->apellidos'>
                <label class='active' style='color:royalblue' for='apellido'>Apellidos</label>
              </div>
              <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>face</i>
                <input type='text' name='nick' id='nick' value='$usuario->nick'>
                <label class='active' style='color:royalblue' for='nick'>Nick</label>
              </div>
              <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>lock</i>
                <input type='text' name='contrasena' id='contrasena' value='$usuario->contrasena'>
                <label class='active' style='color:royalblue' for='contrasena'>Contraseña</label>
              </div>
              <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>mail</i>
                <input type='text' name='correo' id='correo' value='$usuario->correo'>
                <label class='active' style='color:royalblue' for='correo'>E-Mail</label>
              </div>
               <div class='input-field'>
                  <i class='material-icons prefix' style='color:royalblue'>phone</i>
                  <input type='text' name='telefono' id='telefono' value='$usuario->telefono'>
                  <label class='active' style='color:royalblue' for='telefono'>Teléfono</label>
              </div>
              <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>add_box</i>
                <input type='text' name='tipo' id='tipo' value='$usuario->tipo'>
                <label class='active' style='color:royalblue' for='tipo'>Tipo de Usuario</label>
              </div>
              <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>add_box</i>
                <input type='text' name='codigoConfirmacion' id='codigoConfirmacion'>
                <label class='active' style='color:royalblue' for='codigoConfirmacion'>Código de confirmación</label>
              </div>
              <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue' hidden>add_box</i>
                <select name='idInstituto' class=''>";
                  for ($j = 0; $j < count($listaInstitutos); $j++) {
                    $instituto = $listaInstitutos[$j];
                    if( $usuario->idInstituto==$instituto->id ){ 
                      echo"<option  value='$instituto->id' selected>$instituto->nombre</option> ";
                    }else{
                      echo"<option  value='$instituto->id' >$instituto->nombre</option> ";
                    }
                  }
                echo"
                </select>
              </div>

              <!--<div><input style='background-color:royalblue' type='submit' value='Modificar' class='btn btn-large'></div>-->

              <button class='btn waves-effect waves-light #e65100 orange darken-4 z-depth-0 claseModificar' value='$usuario->id' type='submit' name='action'><i class='material-icons '>create</i></button>
              <br>
              <br>


          
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

<div id="insert" class="modal tamañoVModal">
    <?php    echo form_open_multipart("Usuarios/InsertarUsuarios");?>

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
            <input type='text' name='apellidos' id='apellidos'>
            <label style="color:royalblue" for="apellidos">Apellido</label>
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
            <i class="material-icons prefix" style="color:royalblue" hidden>add_box</i>

          <!-- Campo de la tabla ajena de la tabla Institutos-->
            <select name="idInstituto" id="idInstituto">
                <?php
                for ($j = 0; $j < count($listaInstitutos); $j++) {
                  $instituto = $listaInstitutos[$j];
                  if( $usuario->id==$instituto->id ){ 
      echo      "<option value='$instituto->id' selected >$instituto->nombre</option> ";                      
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