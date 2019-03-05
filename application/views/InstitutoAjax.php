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
    $(".borrarInstituto").click(function() {

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
            <th class="black-text">Nombre</th>
            <th class="black-text">Provincia</th>
            <th class="black-text">Localidad</th>
            <th class="black-text">Dirección</th>
            <th class="black-text">Código postal</th>
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
            <td class='colorFila'><p hidden>$instituto->nombre</p><input class='#ffffff ' type='text' name='nombre' value='$instituto->nombre'></td>
            <td class='colorFila'><p hidden>$instituto->provincia</p><input  class='#ffffff ' type='text' name='provincia'value='$instituto->provincia'></td>
            <td class='colorFila'><p hidden>$instituto->localidad</p><input  class='#ffffff ' type='text' name='localidad'value='$instituto->localidad'></td>
            <td class='colorFila'><p hidden>$instituto->direccion</p><input  class='#ffffff' type='text' name='direccion'value='$instituto->direccion'></td>
            <td class='colorFila'><p hidden>$instituto->cp</p><input  class='#ffffff' type='text' name='cp'value='$instituto->cp'></td>
            <td class='colorFila'><button class='btn waves-effect waves-light #e65100 orange darken-4 z-depth-0 clasemodificar' value='$instituto->id' type='submit' name='action'>Modificar<i class='material-icons right'>create</i></button></td>
            <td class='colorFila'><button class='btn-flat waves-effect waves-light #d32f2f  red darken-2 white-text borrarInstituto' value='$instituto->id' type='submit' name='action'>Eliminar<i class='material-icons right' title='Eliminar'>delete</i></button></td>
        </tr>
       ";
      }
      ?>
    </tbody>
</table>

</div>
</div>

<!--Contenido de la ventana modal de insercion-->

<div id="insert" class="modal tamañoVModal">
    <?php echo form_open_multipart("Institutos/InsertarInstituto");?>
    <h5 class="modal-close">&#10005;</h5>
    <div class="modal-content center">
        <h4 class="flow-text #00e676 green-text text-accent-3">Insertar Registro</h4>

        <div class="input-field">
            <i class="material-icons prefix" style="color:royalblue">person</i>
            <input type="text" id="nombre" name="nombre">
            <label style="color:royalblue" for="nombre">Nombre</label>
        </div>

        <div class="input-field">
            <i class="material-icons prefix" style="color:royalblue">map</i>
            <input type="text" id="provincia" name="provincia">
            <label style="color:royalblue" for="provincia">Provincia</label>
        </div>


        <div class="input-field">
            <i class="material-icons prefix" style="color:royalblue">location_city</i>
            <input type="text" id="localidad" name="localidad">
            <label style="color:royalblue" for="localidad">Localidad</label>
        </div>

        <div class="input-field">
            <i class="material-icons prefix" style="color:royalblue">home</i>
            <input type="text" id="direccion" name="direccion">
            <label style="color:royalblue" for="direccion">Direccion</label>
        </div>

        <div class="input-field">
            <i class="material-icons prefix" style="color:royalblue">place</i>
            <input type="text" id="cp" name="cp">
            <label style="color:royalblue" for="cp">Codigo Postal</label>
        </div>

        <div><input style="background-color:royalblue" type="submit" value="Insertar" class="btn btn-large"></div>
        <br>
        <br>

        </form>
    </div>
</div>