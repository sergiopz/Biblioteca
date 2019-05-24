<script>
$("document").ready(function() {
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

                var id = $(this).attr("value");
                $("." + id).remove();
                cadena = "<?php echo site_url('Libros/EliminarLibro'); ?>/" + id;

                $.ajax({
                    url: cadena
                });
            }
        });
    });

    $('.claseModificar').click(function() {
        //Recoge los valores de la moda y cuando pulsa el boton los enviamos con un json por ajax
        
        var iddiv = $(this).attr("value");
        var isbn = $("#lupa" + iddiv + " input[name='isbn']").val();
        var titulo = $("#lupa" + iddiv + " input[name='titulo']").val();
        var descripcion = $("#lupa" + iddiv + " input[name='descripcion']").val();
        var paginas = $("#lupa" + iddiv + " input[name='paginas']").val();
        var fecha = $("#lupa" + iddiv + " input[name='fecha']").val();
        var instituto = $("#lupa" + iddiv + " select[name='idInstituto'] ").val();
        var usuario = $(".user" + iddiv).val();
        var editorial = $("#lupa" + iddiv + " select[name='idEditorial'] ").val();
        var autor = $("#lupa" + iddiv + " select[name='idAutor[]'] ").val();
        var categoria = $("#lupa" + iddiv + " select[name='idCategoria[]'] ").val();
        var pdf = $("#lupa" + iddiv + " select[name='pdfModificar'] ").val();
      

        var json = {
            'id': iddiv,
            'isbn': isbn,
            'titulo': titulo,
            'descripcion': descripcion,
            'paginas': paginas,
            'fecha': fecha,
            'instituto': instituto,
            'usuario': usuario,
            'editorial': editorial,
            'autor': autor,
            'categoria': categoria,
            'pdf': pdf
        };

        var cadena = "<?php echo site_url("Libros/ModificarLibro/"); ?>";

        $.ajax({
            type: "POST",
            url: cadena,
            data: json,
            dataType: "text",
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

<div class="container-fluid">

        <table id="Dtabla" class="table hover compact table-striped table-bordered">
            <thead>
                <tr>
                    <th>Isbn</th>
                    <th>Titulo</th>
                    <th hidden>Descripcion</th>
                    <th hidden>Fecha</th>
                    <th hidden>Paginas</th>
                    <th>Instituto</th>
                    <th>Editorial</th>
                    <th>Autor</th>
                    <th>Categoria</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    <th>Subir</th>
                    <th>Páginas</th>
                </tr>
            </thead>
            <tbody>
    <?php

        //Recorremos la lista de los libros 1 por 1    
        for ($i = 0; $i < count($listaLibros); $i++) { 
              $libro = $listaLibros[$i];
         echo"<div class='info'>
                <tr class='$libro->id'>
                     <input type='hidden' name='id' value='$libro->id' readonly>
                     <td><p hidden>$libro->isbn</p><input class='#ffffff' type='text' name='isbn' value='$libro->isbn'></td>
                     <td><p hidden>$libro->titulo</p><input class='#ffffff' type='text' name='titulo' value='$libro->titulo'></td>
                     <td hidden><input type='text' name='descripcion' value='$libro->descripcion'></td>
                     <td hidden><input type='text' name='fecha' value='$libro->fecha'></td>
                     <td hidden><input type='text' name='paginas' value='$libro->paginas'></td>
                     <td><select class='selectpicker' data-live-search='true' name='idInstituto' >";

        //Dentro de cada libro recorremos la lsita de Institutos y si el campo de idInstituto del libro coincide
        //con el id de la tabla instituos sacamos ese campo selected
        for ($j = 0; $j < count($listaInstitutos); $j++) {
            $instituto = $listaInstitutos[$j]; 
            if( $libro->idInstituto==$instituto->id ){ 
        echo "<option  value='$instituto->id' selected >$instituto->nombre</option>";                      
            }else{
        echo "<option  value='$instituto->id' disabled >$instituto->nombre</option>";
            }
        }

        echo  "</select></td>";
          
  

       echo   "<td><select data-live-search='true' class='selectpicker' name='idEditorial' >";  

        //Si el campo idEditorial coincide con el id de la tabla editoriales sacamos ese campo selected
        for ($j = 0; $j < count($listaEditoriales); $j++) {
            $editorial = $listaEditoriales[$j]; 
            if( $libro->idEditorial==$editorial->id ){ 
        echo          "<option  value='$editorial->id' selected >$editorial->nombre</option> ";                      
            }else{
        echo          "<option  value='$editorial->id' disabled>$editorial->nombre</option> ";
            }
        }

       echo   "</select></td>
               <td><select data-live-search='true' class='selectpicker' required multiple name='idAutor[]' >";


        //Recorremos la lista de Autores y dentro recorremos la tabla Autores Libros y si el id del autor
        //de la tabla ajena coincide con el id del autor y del libro actual lo saca selected sino lo desactivamos
        for ($j = $cont=0; $j < count($listaAutores); $j++) {
            $autor = $listaAutores[$j];

            for ($k = 0; $k < count($listaAutoresLibros); $k++) {
                $autorlibro = $listaAutoresLibros[$k];

                if(($autorlibro->idAutor==$autor->id)&&($autorlibro->idLibro==$libro->id)){
                    echo "<option  value='$autor->id' selected >$autor->nombre</option> "; 
                    $k=count($listaAutoresLibros); 
                }else if ($k==count($listaAutoresLibros)-1)  {
                    echo "<option  value='$autor->id'  disabled >$autor->nombre</option> ";
                    $k=count($listaAutoresLibros);
                }
            }
        }
      
       echo   "</select></td>
               <td><select data-live-search='true' class='selectpicker' type='hidden' class='elementoOculto' required multiple name='idCategoria[]' >";

        //Recorremos la lista de categorias y dentro recorremos la tabla Libros Categorias y si el id de la categoria
        //de la tabla ajena coincide con el id de la categoria y del libro actual lo saca selected sino lo desactivamos     
        for ($j = 0; $j < count($listaCategorias); $j++) {
                $categoria = $listaCategorias[$j];

            for ($k = 0; $k < count($listaLibrosCategorias); $k++) {
                    $librocategoria = $listaLibrosCategorias[$k];

                if(($librocategoria->idCategoria==$categoria->id)&&($librocategoria->idLibro==$libro->id)){
                    echo "<option  value='$categoria->id' selected >$categoria->nombre</option> "; 
                    $k=count($listaLibrosCategorias);
                }else if($k==count($listaLibrosCategorias)-1) {
                    echo "<option  value='$categoria->id' disabled >$categoria->nombre</option> ";
                    $k=count($listaLibrosCategorias);
                }
            }
        }

                    echo"</select></td>
                    <td><button id='lupa$libro->id'class='btn btn-info' data-toggle='modal' data-target='#lupa$libro->id'><i class='fas fa-info'></i></button></td>
                    <td><a value='$libro->id'class='btn btn-danger claseBorrar'><i style='color:white' class='fas fa-trash-alt'></i></a></td>
                    <td><a class='btn btn-primary' href='".site_url("Libros/showintadmin/$libro->id")."'><i class='fas fa-file-upload'></i></a></td>
                    <td><a class='btn btn-primary' href='".site_url("Libros/ModificarPaginas/$libro->id")."'><i class='fab fa-leanpub'></i></a></td>


                </tr>

    </div>";

    //Aqui comienza la modal de modificar----------------------------------------------------------


    echo"  <div class='modal' id='lupa$libro->id'>
                <div class='modal-dialog'>
                    <div class='modal-content'>

                    <!-- Modal Header -->
                    <div class='modal-header'>
                        <h4 class='flow-text #00e676 green-text text-accent-3'>Modificar Registro</h4>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class='modal-body'>";

        
    echo"   <div class='form-group'>
                <label for='isbn'>ISBN</label>
                <input type='text' class='form-control' name='isbn' id='isbn' value='$libro->isbn'>
                <input type='hidden' class='form-control' name='id' value='$libro->id' >
                
            </div>
            <div class='form-group'>
                <label for='Titulo'>Título</label>
                <input type='text' class='form-control' name='titulo' id='titulo' value='$libro->titulo'>
            </div>
            <div class='form-group'>
                <label for='descripcion'>Descripción</label>
                <input type='text' class='form-control' name='descripcion' id='descripcion' value='$libro->descripcion'>
            </div>
            <div class='form-group'>
                <label for='fecha'>Fecha</label>
                <input type='text' class='form-control' name='fecha' id='fecha' value='$libro->fecha'>
            </div>
            <div class='form-group'>
                <label for='paginas'>Páginas</label>
                <input type='text' class='form-control' name='paginas' id='paginas'>
            </div>
            <div class='form-group'>
                <label for='idInstituto'>Instituto</label>
                <select data-live-search='true' class='selectpicker form-control' name='idInstituto' id='idInstituto'>";
                

                for ($j = 0; $j < count($listaInstitutos); $j++) { 
                    $instituto=$listaInstitutos[$j]; 
                        if( $libro->idInstituto==$instituto->id ){
                            echo"<option value='$instituto->id' selected>$instituto->nombre</option> ";
                        }else{
                            echo"<option value='$instituto->id'>$instituto->nombre</option> ";
                        }
                    }
          
        echo"     </select>
            </div>
            <div class='form-group'>
            <label for='idUsuario'>Usuarios</label>
            <select data-live-search='true' class='selectpicker form-control'  name='idUsuario' class='active user$libro->id'>";
                for ($j = 0; $j < count($listaUsuarios); $j++) { 
                    $usuario=$listaUsuarios[$j];
                    if($this->session->userdata('tipoUsuario')==0){
                        if(($libro->idUsuario==$usuario->id)){
                            echo"<option value='$usuario->id' selected >$usuario->nombre</option> ";
                        }else{
                            echo"<option value='$usuario->id'  >$usuario->nombre</option> ";
                        }
                    }else if( ($libro->idUsuario==$usuario->id)&&($this->session->userdata('tipoUsuario')!=0) ){
                        echo"<option value='$usuario->id' selected >$usuario->nombre</option> ";
                    }
                }
        echo"</select>
        </div>
            <div class='form-group'>
                <label for='idEditorial'>Editorial</label>
                <select data-live-search='true' class='selectpicker form-control' name='idEditorial' id='idEditorial'>";
                
                for ($j = 0; $j < count($listaEditoriales); $j++) { 
                    $editorial=$listaEditoriales[$j]; 
                    if( $libro->idEditorial==$editorial->id ){
                        echo"<option value='$editorial->id' selected>$editorial->nombre</option> ";
                    }else{
                        echo"<option value='$editorial->id'>$editorial->nombre</option> ";
                    }
                }
               
               echo" </select>
                </div>
                <div class='form-group'>
                    <label for='idAutor'>Autor/es</label>
                        <select data-live-search='true' class='selectpicker form-control' multiple name='idAutor[]'' id='idAutor'>";
              
                        for ($j = $cont=0; $j < count($listaAutores); $j++) {
                            $autor=$listaAutores[$j]; 
   
                           for ($k=0; $k < count($listaAutoresLibros); $k++) {
                               $autorlibro=$listaAutoresLibros[$k]; 
   
                               if(($autorlibro->idAutor==$autor->id)&&($autorlibro->idLibro==$libro->id)){
                                   echo "<option value='$autor->id' selected>$autor->nombre</option> ";
                                   $k=count($listaAutoresLibros);
                               }else if ($k==count($listaAutoresLibros)-1) {
                                   echo "<option value='$autor->id'>$autor->nombre</option> ";
                                   $k=count($listaAutoresLibros);
                               }
                           }
                       }
              
         echo" </select>
            </div>
            <div class='form-group'>
                <label for='idCategoria'>Categorias</label>
                <select data-live-search='true' class='selectpicker form-control' multiple name='idCategoria[]' id='idCategoria'>";
               
                for ($j = 0; $j < count($listaCategorias); $j++) { 
                    $categoria=$listaCategorias[$j]; 
                    for ($k=0; $k < count($listaLibrosCategorias); $k++) {
                        $librocategoria=$listaLibrosCategorias[$k];
                        if(($librocategoria->idCategoria==$categoria->id)&&($librocategoria->idLibro==$libro->id)){
                            echo "<option value='$categoria->id' selected>$categoria->nombre</option> ";
                            $k=count($listaLibrosCategorias);
                        }else if($k==count($listaLibrosCategorias)-1) {
                            echo "<option value='$categoria->id'>$categoria->nombre</option> ";
                            $k=count($listaLibrosCategorias);
                        }
                    }
                }
               
            echo "    </select>
            </div>
            <div class='form-group'>
                <label for='pdf'>PDF</label>
                ";
                if ($libro->pdf=='si') {

                echo" <select  name='pdfModificar' class='selectpicker form-control' >
                    <option value='$libro->pdf'>Si</option>
                    <option value='no'>No</option>
                </select>"; 

                 }

                else {

                echo"<select name='pdfModificar' class='selectpicker form-control' >
                        <option value='$libro->pdf'>No</option>
                        <option value='si'>Si</option>
                    </select>";

                }
              
            echo "</div>
            
            <button class='btn btn-info claseModificar form-control' value='$libro->id'  name='Modificar'>
                Modificar
            </button>
            </div>
      <!-- Modal footer -->
      <div class='modal-footer'>
        <button type='button' class='btn btn-danger ' data-dismiss='modal'>Close</button>
      </div>

    </div>
  </div>
</div>";

    }
    ?>

            </tbody>
        </table>
        </div>
    
<div class='modal' id='insertModal'>
  <div class='modal-dialog'>
    <div class='modal-content'>

      <!-- Modal Header -->
      <div class='modal-header'>
      <h4 class='flow-text #00e676 green-text text-accent-3'>Insertar Registro</h4>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>

      <!-- Modal body -->
      <div class='modal-body'>
        <?php  echo form_open_multipart('Libros/InsertarLibro');?>
        
            <div class='form-group'>
                <label for='isbn'>ISBN</label>
                <input type='text' class='form-control' name='isbn' id='isbn'>
            </div>
            <div class='form-group'>
                <label for='Titulo'>Título</label>
                <input type='text' class='form-control' name='titulo' id='titulo'>
                
            </div>
            <div class='form-group'>
                <label for='descripcion'>Descripción</label>
                <input type='text' class='form-control' name='descripcion' id='descripcion'>
            </div>
            <div class='form-group'>
                <label for='fecha'>Fecha</label>
                <input type='text' class='form-control' name='fecha' id='fecha'>
            </div>
            <div class="form-group">
                <label for="paginas">Páginas</label>
                <input type='text' class='form-control' name='paginas' id='paginas'>
            </div>
            <div class='form-group'>
                <label for='idInstituto'>Instituto</label>
                <select data-live-search='true' class='selectpicker form-control' name='idInstituto' id='idInstituto'>
                <?php
                    for ($j = 0; $j < count($listaInstitutos); $j++) {
                        $instituto = $listaInstitutos[$j];
                        if($j==0){
                            echo"<option  value='$instituto->id' selected >$instituto->nombre</option> ";                      
                        }else{
                            echo"<option  value='$instituto->id'>$instituto->nombre</option> ";                  
                        }
                    }
                ?>
                </select>
            </div>
            <div class='form-group'>
                <label for='idEditorial'>Editorial</label>
                <select data-live-search='true' class='selectpicker form-control' name='idEditorial' id='idEditorial'>
                <?php
                    for ($j = 0; $j < count($listaEditoriales); $j++) {
                        $editorial = $listaEditoriales[$j];
                        if($j==0){
                            echo "<option  value='$editorial->id' selected >$editorial->nombre</option> ";                      
                        }else{
                            echo"<option  value='$editorial->id'>$editorial->nombre</option> ";                  
                        }
                    }
                ?>
                </select>
            </div>
            <div class='form-group'>
                <label for='idAutor'>Autor/es</label>
                <select data-live-search='true' class='selectpicker form-control' multiple name='idAutor[]'' id='idAutor'>
                <?php
                    for ($j = 0; $j < count($listaAutores); $j++) {
                        $autor = $listaAutores[$j];
                        if($j==0){
                            echo "<option  value='$autor->id' selected >$autor->nombre</option> ";                      
                        }else{
                            echo "<option  value='$autor->id'>$autor->nombre</option> ";                  
                        }
                    }
                ?>
                </select>
            </div>
            <div class='form-group'>
                <label for='idCategoria'>Categorias</label>
                <select data-live-search='true' class='selectpicker form-control' multiple name='idCategoria[]' id='idCategoria'>
                <?php
                    for ($j = 0; $j < count($listaCategorias); $j++) {
                        $categoria = $listaCategorias[$j];
                        if($j==0){
                            echo "<option  value='$categoria->id' selected >$categoria->nombre</option> ";                      
                        }else{
                            echo "<option  value='$categoria->id'>$categoria->nombre</option> ";                  
                        }
                    }
                ?>
                </select>
            </div>
            <div class='form-group'>
                <label for='pdf'>PDF</label>
                <select  class='selectpicker form-control' name='pdf' id='pdf' >
                    <option value='no'>No</option>
                    <option value='si'>Si</option>     
                </select>  
            </div>
            
            <button  type='submit' value='Insertar' class='btn btn-primary form-control'>Insertar</button>

        </form>

      </div>

      <!-- Modal footer -->
      <div class='modal-footer'>
        <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
      </div>

    </div>
  </div>
</div>


