<script>
$("document").ready(function() {
    $(".claseBorrar").click(function(e) {

        var r = confirm("Vas a eliminar un registro!\n¿Estás seguro?");
        if (r == false) {

            e.preventDefault();

        } else {

            var id = $(this).attr("value");

            $("." + id).remove();

            cadena = "<?php echo site_url('Libros/EliminarLibro'); ?>/" + id;

            $.ajax({
                url: cadena
            });
        }
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
            dataType: "text"
        }).done(function(data) {
            window.location = "<?php echo base_url('index.php/Libros/VistaAjax'); ?>";
        });

    });


});
</script>

<div class="container-fluid">

        <table id="Dtabla" class="table table-striped table-bordered ">
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
                     <td><select class='selectpicker' name='idInstituto' >";

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
          
  

       echo   "<td><select class='selectpicker' name='idEditorial' >";  

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
               <td><select class='selectpicker' required multiple name='idAutor[]' >";


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
               <td><select class='selectpicker' type='hidden' class='elementoOculto' required multiple name='idCategoria[]' >";

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
                    <td><button id='lupa$libro->id'class='btn btn-info'>Detalles</button></td>
                    <td><a value='$libro->id'class='btn btn-danger claseBorrar'>Eliminar</a></td>
                    <td><a class='btn btn-primary' href='".site_url("Libros/showintadmin/$libro->id")."'>Subir libro</a></td>
                    <td><a class='btn btn-primary' href='".site_url("Libros/ModificarPaginas/$libro->id")."'>Modificar páginas</a></td>


                </tr>

    </div>";

    //Aqui comienza la modal de modificar

    echo"<div id='lupa$libro->id' class='modal tamañoVModal'>";
   
        echo" <h5 class='modal-close'>&#10005;</h5>
        <div class='modal-content center'>
            <h4 class='flow-text #00e676 green-text text-accent-3'>Modificar libros</h4>
            <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>event_note</i>
                <input type='hidden' name='id' value='$libro->id' >
                <input type='text' name='isbn' id='isbn' value='$libro->isbn'>
                <label class='active' style='color:royalblue' for='isbn'>Isbn</label>
            </div>
            <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>collections_bookmark</i>
                <input type='text' name='titulo' id='titulo' value='$libro->titulo'>
                <label class='active' style='color:royalblue' for='titulo'>Titulo</label>
            </div>
            <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>description</i>
                <input type='text' name='descripcion' id='descripcion' value='$libro->descripcion'>
                <label class='active' style='color:royalblue' for='descripcion'>Descripcion</label>
            </div>
            <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>add_box</i>
                <input type='text' name='paginas' id='paginas' value='$libro->paginas'>
                <label class='active' style='color:royalblue' for='Paginas'>Paginas</label>
            </div>
            <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue'>date_range</i>
                <input type='text' name='fecha' id='fecha' value='$libro->fecha'>
                <label class='active' style='color:royalblue' for='fecha'>Fecha</label>
            </div>
            <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue' hidden>add_box</i>
                <select class='selectpicker' name='idInstituto' class='active'>";
                    for ($j = 0; $j < count($listaInstitutos); $j++) { 
                        $instituto=$listaInstitutos[$j]; 
                            if( $libro-> idInstituto==$instituto->id ){
                                echo"<option value='$instituto->id' selected>$instituto->nombre</option> ";
                            }else{
                                echo"<option value='$instituto->id'>$instituto->nombre</option> ";
                            }
                        }
                        echo"</select>
            </div> 
            <div class='input-field'>
                    <i class='material-icons prefix' style='color:royalblue' hidden>add_box</i>
                    <select class='selectpicker'  name='idUsuario' class='active user$libro->id'>";
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
                <div class='input-field'>
                <i class='material-icons prefix' style='color:royalblue' hidden>add_box</i>
                <select class='selectpicker' name='idEditorial' class='active'>";
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
            <div>
                <i class='material-icons prefix' style='color:royalblue' hidden>add_box</i>
                <select class='selectpicker' multiple name='idAutor[]' class='active'>";

                     //Recorremos la lista de Autores y dentro recorremos la tabla Autores Libros y si el id del autor
                    //de la tabla ajena coincide con el id del autor y del libro actual lo saca selected sino lo desactivamos
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
            <div>
                <i class='material-icons prefix' style='color:royalblue' hidden>add_box</i>
                <select class='selectpicker' multiple name='idCategoria[]' class='active'>";

        //Recorremos la lista de categorias y dentro recorremos la tabla Libros Categorias y si el id de la categoria
        //de la tabla ajena coincide con el id de la categoria y del libro actual lo saca selected sino lo desactivamos     
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

                     

          echo " </select>
            </div>
            <div>";
                      if ($libro->pdf=='si') {

                   
                
                     echo" <select  name='pdfModificar' class='active selectpicker' >
                      <option value='$libro->pdf'>Si</option>
                      <option value='no'>No</option>
                      
                      
                  </select>"; 

                       }
                          else {

                   
                
                     echo" <select name='pdfModificar' class='active selectpicker' >
                      <option value='$libro->pdf'>No</option>
                      <option value='si'>Si</option>
                      
                      
                  </select>"; 

                       }
                       echo "
            </div>

            <br>
            <button class='btn btn-large waves-effect waves-light #e65100 orange darken-4 z-depth-0 claseModificar'
                value='$libro->id'  name='Modificar'><i class='material-icons '>create</i></button>
        </div>
        </div>";

    //Aqui cierra el for de libros
    }
    ?>

            </tbody>
        </table>
        </div>
    

        <div id="insert" class="modal tamañoVModal">
            <?php  echo form_open_multipart("Libros/InsertarLibro");?>
            <h5 class="modal-close">&#10005;</h5>
            <div class="modal-content center">
                <h4 class="flow-text #00e676 green-text text-accent-3">Insertar Registro</h4>
                <div class="input-field">
                    <i class="material-icons prefix" style="color:royalblue">person</i>
                    <input type='text' name='isbn' id='isbn'>
                    <label style="color:royalblue" for="isbn">isbn</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" style="color:royalblue">add_box</i>
                    <input type='text' name='titulo' id='titulo'>
                    <label style="color:royalblue" for="titulo">Titulo</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" style="color:royalblue">add_box</i>
                    <input type='text' name='descripcion' id='descripcion'>
                    <label style="color:royalblue" for="descripcion">Descripcion</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" style="color:royalblue">add_box</i>
                    <input type='text' name='fecha' id='fecha'>
                    <label style="color:royalblue" for="fecha">Fecha</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" style="color:royalblue">add_box</i>
                    <input type='text' name='paginas' id='paginas'>
                    <label style="color:royalblue" for="paginas">Paginas</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" class='selectpicker' style="color:royalblue" hidden>add_box</i>
                    <select name="idInstituto" id="idInstituto">
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
                    <label style="color:royalblue" for="idInstituto">IdInstituto</label>
                </div>

                <div class="input-field">
                    <i class="material-icons prefix" style="color:royalblue" hidden>add_box</i>
                    <select class='selectpicker' name="idEditorial" id="idEditorial">
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
                    <label style="color:royalblue" for="idEditorial">Editorial</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" style="color:royalblue" hidden>add_box</i>
                    <select class='selectpicker' multiple name="idAutor[]" id="idAutor">
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
                    <label style="color:royalblue" for="idAutor">Autor</label>
                </div>
                <div class="input-field">
                    <i class="material-icons prefix" style="color:royalblue" hidden>add_box</i>
                    <select class='selectpicker' multiple name="idCategoria[]" id="idCategoria">
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
                    <label style="color:royalblue" for="idCategoria">Categoria</label>
                </div>
<div>
                  <select class='selectpicker' name="pdf" >
                      <option value="no">No</option>
                      <option value="si">Si</option>}
                      
                      
                  </select>
                    
                </div>
                <div><input style="background-color:royalblue" type="submit" value="Insertar" class="btn btn-large">
                </div>
                
            </div>

            </form>

        </div>

