<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryMaterialize.js"></script>
<script>
  $("document").ready(function(){

       $(".borrarcategoria").click(function() {

              var idInstituto=$(this).attr("value");

              $("."+idInstituto).remove();

              cadena = "<?php echo site_url('Categorias/EliminarCategoria'); ?>/"+idInstituto;

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

       var nombrecategoria=$("."+iddiv+ " input[name='nombre']").val();

       var datos="id="+iddiv+"&nombre="+nombrecategoria;

       var cadena="<?php echo site_url("Categorias/ModificarCategoria/"); ?>";

       $.ajax({
              type:"POST",
              url: cadena,
              data:datos
       });

    });
  });
</script>
<script>
  $(document).ready( function () {
    $('#Dtabla').DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });
} );
</script>
<style>
  .flotante {
    display:scroll;
    position:fixed;
    top:-50.5%;
    right:5%;
  }
</style>
<a href="#insert" id="mover" class="flotante btn btn-large pulse #00e676 green accent-3 modal-trigger "><i class="material-icons" title="Insertar">add_box</i></a>

       <table id="Dtabla" class="highlight responsive-table #536dfe indigo accent-2 ">
              <thead>
                     <tr class="#536dfe indigo accent-2">
                            <th class="#000000 black-text">Nombre</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                     </tr>
              </thead>
              <tbody>
                  
       <?php
              
       for ($i = 0; $i < count($listaCategorias); $i++) {
              $categoria = $listaCategorias[$i];
        
       echo "<div class='info'>
                     <tr  class='$categoria->id'>
                            <input hidden type='text' name='id' value='$categoria->id'>
                            <td style='width:60%' class='colorFila'><P hidden>$categoria->nombre</p><input class='#ffffff ' type='text' name='nombre' value='$categoria->nombre'></td>
                            <td class='colorFila'><button class='btn waves-effect waves-light #e65100 orange darken-4 z-depth-0 clasemodificar' value='$categoria->id' type='submit' name='action'>Modificar<i class='material-icons right'>create</i></button></td>
                            <td class='colorFila'><a value='$categoria->id' class='btn-flat waves-effect waves-light #d32f2f red darken-2 white-text borrarcategoria' >Eliminar<i class='material-icons right' title='Eliminar'>delete</i></a></td>
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

        <div id="insert" class="modal tamañoVModal">
         <?php    echo form_open_multipart("Categorias/InsertarCategoria");?>
        
          <h5 class="modal-close">&#10005;</h5>
          <div class="modal-content center">

              <h4 class="flow-text #00e676 green-text text-accent-3">Insertar Registro</h4>
              <div class="input-field">
                <i class="material-icons prefix" style="color:royalblue">person</i>
                <input type="text" id="nombre" name="nombre">
                <label for="nombre" style="color:royalblue">Nombre</label>
              </div>
              

              <div><input style="background-color:royalblue" type="submit" value="Insertar" class="btn btn-large"></div>
              <br>
              <br>

            </form>
          </div>
        </div>

