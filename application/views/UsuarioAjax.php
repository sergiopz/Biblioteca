<script>
$("document").ready(function() {

    //Ejecutar eliminar el registro al hacer click en el boton Eliminar
    $(".claseBorrar").click(function(e) {

    e.preventDefault();
    Swal.fire({
      title: '¿Estás Seguro?',
      text: "Vas a eliminar un registro.",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, bórralo!',
      cancelButtonText: 'No, no lo borres!'
    }).then((r) => {
      if (r.value) {

        var idUsuario = $(this).attr("value");
        $("." + idUsuario).remove();
        cadena = "<?php echo site_url('Usuarios/EliminarUsuarios'); ?>/" + idUsuario;

        $.ajax({
            url: cadena
        });
      }

    });

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
        var idInstitutousuario = $("#lupa" + iddiv + " select[name='idInstituto'] ").val();
        var valorInstitutousuario = $("." + iddiv + " option:selected").text();

        var json = {
            'id': iddiv,
            'nombre': nombreusuario,
            'apellidos': apellidousuario,
            'nick': nickusuario,
            'contrasena': contrasenausuario,
            'correo': correousuario,
            'telefono': telefonousuario,
            'tipo': tipousuario,
            'idInstituto': idInstitutousuario,
            'codigoConfirmacion': 0
        };
        
        var cadena = "<?php echo site_url("Usuarios/ModificarUsuarios/"); ?>";

        $.ajax({
            type: "POST",
            url: cadena,
            data: json,
            success:function(data) {
              Swal.fire({
                type: 'success',
                title: 'Perfecto!',
                text: 'Modificación efectuada con éxito.'
              })  
            }
           }).done(function (data) { setTimeout(function(){location.reload();}, 1500); });

    });
});
</script>
<div class='container-fluid'>
<table id="Dtabla" class="table hover compact table-striped table-bordered">
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
              <td>$usuario->nombre</td>
              <td>$usuario->apellidos</td>
              <td>$usuario->nick</td>
              <td>$usuario->tipo</td>";

        for ($j = 0; $j < count($listaInstitutos); $j++) {
              $instituto = $listaInstitutos[$j];

            if( $usuario->idInstituto==$instituto->id ){ 
        echo"<td>$instituto->nombre</td>";
             $j=count($listaInstitutos);

            }else if($j==count($listaInstitutos)-1){
        echo"<td><p  name='idInstituto'></p></td>";
              $j=count($listaInstitutos);
            }
        }
        echo" <td ><button id='lupa$usuario->id' type='button' class='btn btn-info' data-toggle='modal' data-target='#lupa$usuario->id'><i class='fas fa-info'></button></td>
              <td ><button class='btn btn-danger claseBorrar ' value='$usuario->id' type='submit' name='action'><i class='fas fa-trash-alt'></i></button></td>
              </tr>";
              echo"

              <div class='modal fade' id='lupa$usuario->id' class='$usuario->id'>
              <div class='modal-dialog'>
                <div class='modal-content'>
            
                  <!-- Modal Header -->
                  <div class='modal-header'>
                  <h4 class='flow-text #00e676 green-text text-accent-3'>Modificar Registro</h4>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                  </div>
            
                  <!-- Modal body -->
                  <div class='modal-body'>
                    
                  
                        <div class='form-group'>
                            <label for='nombre'>Nombre</label>
                            <input type='text' class='$usuario->id-nombre form-control' id='nombre'form-control name='nombre' value='$usuario->nombre'>
                        </div>
  
                        <div class='form-group'>
                          <label for='apellido'>Apellidos</label>
                          <input type='text' id='apellido'class='$usuario->id-apellidos form-control' name='apellidos' value='$usuario->apellidos'>
                        </div>
  
                        <div class='form-group'>
                          <label for='nick'>Nick</label>
                          <input type='text' class='$usuario->id-nick form-control' id='nick' name='nick' value='$usuario->nick'>
                        </div>
  
                        <div class='form-group'>
                          <label for='contrasena'>Contraseña</label>
                          <input type='text' id='contrasena' class='$usuario->id-contrasena form-control' name='contrasena' value='$usuario->contrasena'>
                        </div>
  
                        <div class='form-group'>
                          <label for='correo'>E-Mail</label>
                          <input type='text' id='correo' class='$usuario->id-correo form-control' name='correo' value='$usuario->correo'>
                        </div>
  
                        <div class='form-group'>
                          <label for='telefono'>Telefono</label>
                          <input type='text' id='telefono' class='$usuario->id-telefono form-control' name='telefono' value='$usuario->telefono'>
                        </div>
  
                        <div class='form-group'>
                          <label for='tipo'>Tipo de usuario</label>
                          <input type='text' id='tipo' class='$usuario->id-tipo form-control' name='tipo' value='$usuario->tipo'>
                        </div>
  
                        <div hidden class='form-group' >
                          <label for='codigoConfirmacion'>Codigo de confirmacion</label>
                          <input type='text' id='codigoConfirmacion' class='$usuario->id-codigoConfirmacion form-control' name='codigoConfirmacion' value='$usuario->codigoConfirmacion'>
                        </div>
  
                        <div class='form-group'>
                          <label for='idInstituto'>Instituto</label>
                          <select data-live-search='true' id='idInstituto' class='$usuario->id-instituto selectpicker form-control' name='idInstituto'>";
  
                            for ($j = 0; $j < count($listaInstitutos); $j++) {
                              $instituto = $listaInstitutos[$j];
                              if( $usuario->idInstituto==$instituto->id ){ 
                                echo"<option value='$instituto->id' selected>$instituto->nombre</option> ";
                              }else{
                                echo"<option value='$instituto->id' >$instituto->nombre</option> ";
                              }
                            }
  
                            echo"
                            </select>
                        </div>
                       
                        <button class='btn btn-primary claseModificar form-control' value='$usuario->id' type='submit' name='action'>Modificar</button>
            
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



<div class="modal fade" id="insertModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
      <h4 class="flow-text #00e676 green-text text-accent-3">Insertar Registro</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <?php    echo form_open_multipart("Usuarios/InsertarUsuarios");?>
        
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class='form-control' id="nombre" name="nombre" placeholder="Nombre">
            </div>

            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" class='form-control' id="apellidos" name="apellidos" placeholder="Apellidos">
            </div>

            <div class="form-group">
                <label for="nick">Nick</label>
                <input type="text" class='form-control' id="nick" name="nick" placeholder="Nick">
            </div>

            <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input type="text" class='form-control' id="contrasena" name="contrasena" placeholder="Contraseña">
            </div>

            <div class="form-group">
                <label for="correo">E-Mail</label>
                <input type="text" class='form-control' id="correo" name="correo" placeholder="E-Mail">
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class='form-control' id="telefono" name="telefono" placeholder="Teléfono">
            </div>

            <div class="form-group">
                <label for="tipo">Tipo de usuario</label>
                <input type="text" class='form-control' id="tipo" name="tipo" placeholder="Tipo de usuario">
            </div>

            <div class="form-group">
                <label for="IdInstituto">Instituto</label>
                <select data-live-search='true' name="idInstituto" class='selectpicker form-control' id="idInstituto">
                <?php
                for ($j = 0; $j < count($listaInstitutos); $j++) {
                  $instituto = $listaInstitutos[$j];
                  if( $usuario->id==$instituto->id ){ 
              echo "<option value='$instituto->id' selected >$instituto->nombre</option> ";                      
                           }else{
              echo "<option  value='$instituto->id' >$instituto->nombre</option> ";
                           }
                }
                ?>
            </select>
            </div>

            <div class="form-group" hidden>
                <label for="codigoConfirmacion">Codigo de confirmación</label>
                <input type="text" id="codigoConfirmacion" name="codigoConfirmacion" class='form-control' placeholder="Codigo de confirmación">
            </div>

            <button  type="submit" value="Insertar" class="btn btn-primary form-control">Insertar</button>

        </form>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
