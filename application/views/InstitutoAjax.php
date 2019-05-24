<script>

    $("document").ready(function() {

    //Ejecutar eliminar el registro al hacer click en el boton Eliminar
    $(".borrarInstituto").click(function(e) {

          var r = confirm("Vas a eliminar un registro!\n¿Estás seguro?");

    if (r == false) {
   
        e.preventDefault();

    }else{


        var idInstituto = $(this).attr("value");

        $("." + idInstituto).remove();

        cadena = "<?php echo site_url('Institutos/EliminarInstituto'); ?>/" + idInstituto;

        $.ajax({
            url: cadena
        });

    }

    });

    //Ejecutar modificar el registro al hacer click en el boton Modificar
    $('.clasemodificar').click(function() {
        var iddiv = $(this).attr("value");

        var nombre = $("." + iddiv + " input[name='nombre']").val();

        var provincia = $("." + iddiv + " input[name='provincia']").val();

        var localidad = $("." + iddiv + " input[name='localidad']").val();

        var direccion = $("." + iddiv + " input[name='direccion']").val();

        var cp = $("." + iddiv + " input[name='cp']").val();

        var datos = "id=" + iddiv + "&nombre=" + nombre + "&provincia=" + provincia + "&localidad=" +
            localidad + "&direccion=" + direccion + "&cp=" + cp;

        var cadena = "<?php echo site_url("Institutos/ModificarInstituto/"); ?>";

        $.ajax({
            type: "POST",
            url: cadena,
            data: datos,
            success:function(data) {
              Swal.fire({
                type: 'success',
                title: 'Perfecto!',
                text: 'Modificación efectuada con éxito.'
              })
            }
        });
    });

});
</script>

<div class='container-fluid'>

<table id="Dtabla" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Provincia</th>
            <th>Localidad</th>
            <th>Dirección</th>
            <th>Código postal</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <?php

    /*Recorremos los institutos y los mostramos*/
  for ($i = 0; $i < count($listaInstitutos); $i++) {
        $instituto = $listaInstitutos[$i];

        echo"<tr  class='$instituto->id colorFila '>
            <td><p hidden>$instituto->nombre</p><input type='text' name='nombre' value='$instituto->nombre'></td>
            <td><p hidden>$instituto->provincia</p><input type='text' name='provincia'value='$instituto->provincia'></td>
            <td><p hidden>$instituto->localidad</p><input type='text' name='localidad'value='$instituto->localidad'></td>
            <td><p hidden>$instituto->direccion</p><input type='text' name='direccion'value='$instituto->direccion'></td>
            <td><p hidden>$instituto->cp</p><input type='text' name='cp'value='$instituto->cp'></td>
            <td><button class='btn  btn-info  clasemodificar' value='$instituto->id' type='submit' name='action'><i class='fas fa-pencil-alt'></i></button></td>
            <td><button class='btn btn-danger borrarInstituto' value='$instituto->id' type='submit' name='action'><i class='fas fa-trash-alt'></i></button></td>
        </tr>
       ";
      }
      ?>
    </tbody>
</table>

</div>

<!--Contenido de la ventana modal de insercion-->

<div class="modal" id="insertModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
      <h4 class="flow-text #00e676 green-text text-accent-3">Insertar Registro</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <?php    echo form_open_multipart("Institutos/InsertarInstituto");?>
        
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre">
                <small id="nameHelp" class="form-text text-muted">Comprueba si el instituto ya existe!</small>
            </div>

            <div class="form-group">
                <label for="provincia">Provincia</label>
                <input type="text" id="provincia" name="provincia" placeholder="Provincia">
            </div>

            <div class="form-group">
                <label for="localidad">Localidad</label>
                <input type="text" id="localidad" name="localidad" placeholder="Localidad">
            </div>

            <div class="form-group">
                <label for="nombre">Dirección</label>
                <input type="text" id="direccion" name="direccion" placeholder="Dirección">
            </div>

            <div class="form-group">
                <label for="cp">Código postal</label>
                <input type="text" id="cp" name="cp" placeholder="Código postal">
            </div>

            <button  type="submit" value="Insertar" class="btn btn-primary">Insertar</button>

        </form>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>