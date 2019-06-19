<script>
    $("document").ready(function(){
    //Ejecutar eliminar el registro al hacer click en el boton Eliminar
    $(".borrarInstituto").click(function(e) {

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

          var idInstituto = $(this).attr("value");
          $("." + idInstituto).remove();
          cadena = "<?php echo site_url('Editoriales/EliminarEditorial'); ?>/" + idInstituto;

          $.ajax({
            url: cadena
          });

  
        }
      }); 
    });
  

    //Ejecutar modificar el registro al hacer click en el boton Modificar
    $('.clasemodificar').click(function() {

        var iddiv = $(this).attr("value");

        var nombre = $("." + iddiv + " input[name='nombre']").val();

        var datos = "id=" + iddiv + "&nombre=" + nombre;

        var cadena = "<?php echo site_url("Editoriales/ModificarEditorial/"); ?>";


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

<div class='container'>
  <div id="colortitulo">
  <h2 id="tituloultimo" align="center">Editoriales</h2>  
  </div>

<table id="Dtabla" class="table hover compact table-striped table-bordered">

    <thead>
        <tr>
            <th>Nombre</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
    <!--Recorremos los editoriales y si el tipo del usuario es 0(Administrador) enseñamos los botones de 
      modificar y eliminar de todos las editoriales, si el tipo es es distinto solo enseñamos los 
      botones desactivados-->
    <?php
     
      for ($i = 0; $i < count($listaEditoriales); $i++) {
          $editorial = $listaEditoriales[$i];
       
          echo "<div class='info'>
                <tr class='$editorial->id'>
                  <input hidden type='text' name='id' value='$editorial->id'>
                  <td style='width:60%'><p hidden>$editorial->nombre</p><input class='#ffffff' type='text' name='nombre' value='$editorial->nombre'></td>";
                  if($this->session->userdata('tipoUsuario')==0){
                    echo"   <td><button class='btn btn-info clasemodificar btn-lg' value='$editorial->id' type='submit' name='action'><i class='fas fa-pencil-alt'></i></button></td>";
                    echo"<td><a value='$editorial->id' class='btn btn-danger btn-lg borrarInstituto' ><i style='color:white' class='fas fa-trash-alt'></i></a></td>";
                  }else{
                    echo"   <td><button class='btn btn-info btn-lg disabled' value='$editorial->id' type='submit' name='action'><i class='fas fa-pencil-alt'></i></button></td>";
                    echo"<td><a value='$editorial->id' class='btn btn-danger btn-lg borrarInstituto disabled' ><i style='color:white' class='fas fa-trash-alt'></i></a></td>";
                  }

          echo" </tr>
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
        <?php    echo form_open_multipart("Editoriales/InsertarEditorial");?>
        
            <div class="form-group">
                <label for="nombre">Editorial</label>
                <input type="text" class='form-control' id="nombre" name="nombre" placeholder="Editorial">
                <small id="nameHelp" class="form-text text-muted">Comprueba que la editorial no existe aún!</small>
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

