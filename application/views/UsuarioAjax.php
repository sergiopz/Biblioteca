<script>
$("document").ready(function() {

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
        var nombreusuario = $("." + iddiv + "-nombre").val();
        var apellidousuario = $("." + iddiv + "-apellidos").val();
        var nickusuario = $("." + iddiv + "-nick").val();
        var contrasenausuario = $("." + iddiv + "-contrasena").val();
        var correousuario = $("." + iddiv + "-correo").val();
        var telefonousuario = $("." + iddiv + "-telefono").val();
        var tipousuario = $("." + iddiv + "-tipo").val();
        var idInstitutousuario = $("." + iddiv + "-instituto").val();
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
        }).done(function (data) { location.reload(); });

    });
});
</script>
<div class='container-fluid'>
<table id="Dtabla" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Nick</th>
            <th>Tipo</th>
            <th>Instituto</th>
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
              <td><p name='nombre'>$usuario->nombre</p></td>
              <td><p  name='apellidos'>$usuario->apellidos</p></td>
              <td><p name='nick'>$usuario->nick</p></td>
              <td><p name='tipo'>$usuario->tipo</p></td>";

        for ($j = 0; $j < count($listaInstitutos); $j++) {
              $instituto = $listaInstitutos[$j];

            if( $usuario->idInstituto==$instituto->id ){ 
        echo"<td class='colorFila'><p name='idInstituto'>$instituto->nombre</p></td>";
             $j=count($listaInstitutos);

            }else if($j==count($listaInstitutos)-1){
        echo"<td class='colorFila'><p  name='idInstituto'></p></td>";
              $j=count($listaInstitutos);
            }
        }
        echo" <td ><button id='lupa$usuario->id' type='button' class='btn btn-info' data-toggle='modal' data-target='#lupa$usuario->id'>Detalles</button></td>
              <td ><button class='btn btn-danger claseBorrar ' value='$usuario->id' type='submit' name='action'>Eliminar</button></td>
              </tr>";
              echo"

              <div class='modal' id='lupa$usuario->id' class='$usuario->id'>
              <div class='modal-dialog'>
                <div class='modal-content'>
            
                  <!-- Modal Header -->
                  <div class='modal-header'>
                  <h4 class='flow-text #00e676 green-text text-accent-3'>Insertar Registro</h4>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                  </div>
            
                  <!-- Modal body -->
                  <div class='modal-body'>
                    
                  
                        <div class='form-group'>
                            <label for='nombre'>Nombre</label>
                            <input type='text' class='$usuario->id-nombre' id='nombre' name='nombre' value='$usuario->nombre'>
                        </div>
  
                        <div class='form-group'>
                          <label for='apellido'>Apellidos</label>
                          <input type='text' id='apellido'class='$usuario->id-apellidos' name='apellidos' value='$usuario->apellidos'>
                        </div>
  
                        <div class='form-group'>
                          <label for='nick'>Nick</label>
                          <input type='text' class='$usuario->id-nick' id='nick' name='nick' value='$usuario->nick'>
                        </div>
  
                        <div class='form-group'>
                          <label for='contrasena'>Contraseña</label>
                          <input type='text' id='contrasena' class='$usuario->id-contrasena' name='contrasena' value='$usuario->contrasena'>
                        </div>
  
                        <div class='form-group'>
                          <label for='correo'>E-Mail</label>
                          <input type='text' id='correo' class='$usuario->id-correo' name='correo' value='$usuario->correo'>
                        </div>
  
                        <div class='form-group'>
                          <label for='telefono'>Telefono</label>
                          <input type='text' id='telefono' class='$usuario->id-telefono' name='telefono' value='$usuario->telefono'>
                        </div>
  
                        <div class='form-group'>
                          <label for='tipo'>Tipo de usuario</label>
                          <input type='text' id='tipo' class='$usuario->id-tipo' name='tipo' value='$usuario->tipo'>
                        </div>
  
                        <div class='form-group' >
                          <label for='codigoConfirmacion'>Codigo de confirmacion</label>
                          <input type='text' id='codigoConfirmacion' class='$usuario->id-codigoConfirmacion' name='codigoConfirmacion' value='$usuario->codigoConfirmacion'>
                        </div>
  
                        <div class='form-group'>
                          <label for='idInstituto'>Instituto</label>
                          <select id='idInstituto' class='$usuario->id-instituto' name='idInstituto'>";
  
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
                       
                        <button class='btn btn-primary claseModificar' value='$usuario->id' type='submit' name='action'>Modificar</button>
            
                  </div>
            
                  <!-- Modal footer -->
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                  </div>
            
                </div>
              </div>
            </div>
                  ";
      }
      ?>
    </tbody>
</table>

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