<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryMaterialize.js"></script>
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
<script type="text/javascript">
  $(document).ready(function(){
    $('.clasemodificar').click(function(){

      var iddiv=$(this).attr("value");

      var nombre=$("."+iddiv+ " input[name='nombre']").val();

      var datos="id="+iddiv+"&nombre="+nombre;

      var cadena="<?php echo site_url("Editoriales/ModificarEditorial/"); ?>";


      $.ajax({
        type:"POST",
        url: cadena,
        data:datos
      });

    });
  });
</script>

  <table class="highlight responsive-table #536dfe indigo accent-2 ">
    <thead>
      <tr class="#536dfe indigo accent-2">
        <th class="#000000 black-text">Nombre</th>
        <th></th>
        <th class="#000000 black-text"><a href="#insert" id="mover" class="btn btn-large pulse #00e676 green accent-3 modal-trigger "><i class="material-icons" title="Insertar">add_box</i></a></th>
      </tr>
    </thead>
    <tbody>
    <?php
      for ($i = 0; $i < count($listaEditoriales); $i++) {
          $editorial = $listaEditoriales[$i];
       
          echo "<div class='info'>
                <tr class='$editorial->id'>
                  <input hidden type='text' name='id' value='$editorial->id'>
                  <td><input class='#ffffff white-text' type='text' name='nombre' value='$editorial->nombre'></td>
                  <td>
                    <button class='btn waves-effect waves-light #e65100 orange darken-4 z-depth-0 clasemodificar' value='$editorial->id' type='submit' name='action'>Modificar<i class='material-icons right'>create</i></button>
                    <a value='$editorial->id' class='btn-flat waves-effect waves-light #d32f2f  red darken-2 white-text borrarInstituto' >Eliminar<i class='material-icons right' title='Eliminar'>delete</i></a>
                  </td>
                </tr>
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
