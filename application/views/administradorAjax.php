<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryMaterialize.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>js/jqueryInstitutos.js"></script>-->
<script>
  $("document").ready(function(){

$(".borrarInstituto").click(function() {

   var idInstituto=$(this).attr("value");

    $("."+idInstituto).remove();

    cadena = "<?php echo site_url('Administrador/EliminarUsuarios'); ?>/"+idInstituto;

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
  


       
       
       var nombreusuario=$("."+iddiv+ " input[name='nombre']").val();
       

       var apellidousuario=$("."+iddiv+ " input[name='apellidos']").val();
       

       var nickusuario=$("."+iddiv+ " input[name='nick']").val();
     
       var contrasenausuario=$("."+iddiv+ " input[name='contrasena']").val();
       
       var correousuario=$("."+iddiv+ " input[name='correo']").val();
    
       var telefonousuario=$("."+iddiv+ " input[name='telefono']").val();
      
       var tipousuario=$("."+iddiv+ " input[name='tipo']").val();
       
       var idInstitutousuario=$("."+iddiv+ " option:selected").val();
       
      
        


      var datos="id="+iddiv+"&nombre="+nombreusuario+"&apellidos="+apellidousuario+"&nick="+nickusuario+"&contrasena="+contrasenausuario+"&correo="+correousuario+"&telefono="+telefonousuario+"&tipo="+tipousuario+"&idInstituto="+idInstitutousuario+"&codigoConfirmacion= ";
       


      var cadena="<?php echo site_url("Administrador/ModificarUsuarios/"); ?>";
 


  
 //var xhttp = new XMLHttpRequest();
   //     xhttp.open("GET", cadena , true);
     //   xhttp.send(null);
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
                  <th class="#000000 black-text">Apellidos</th>
                  <th class="#000000 black-text">Nick</th>
                  <th class="#000000 black-text">contrasena</th>
                  <th class="#000000 black-text">correo</th>
                  <th class="#000000 black-text">telefono</th>
                  <th class="#000000 black-text">tipo</th>
                  <th class="#000000 black-text">Idinstituto</th>
              <th><a href="#insert" class="btn btn-large pulse #00e676 green accent-3 modal-trigger"><i class="material-icons" title="Insertar">add_box</i></a></th>
            </tr>
          </thead>
          <tbody>
            
            <?php
             for ($i = 0; $i < count($listaUsuarios); $i++) {
                $usuario = $listaUsuarios[$i];
               
                echo "<div class='info'>

              <tr class='$usuario->id'>
                <input type='text' hidden name='id' value='$usuario->id'>
                <td><input class='#ffffff white-text' type='text' name='nombre' value='$usuario->nombre'></td>
                <td><input class='#ffffff white-text' type='text' name='apellidos'value='$usuario->apellidos'></td>
                <td><input class='#ffffff white-text' type='text' name='nick'value='$usuario->nick'></td>
                <td><input class='#ffffff white-text'  type='text' name='contrasena'value='$usuario->contrasena'></td>
                <td><input class='#ffffff white-text' type='text' name='correo'value='$usuario->correo'></td>
                <td><input class='#ffffff white-text' type='text' name='telefono'value='$usuario->telefono'></td>
                <td><input class='#ffffff white-text' type='text' name='tipo'value='$usuario->tipo'></td>
                <td><select name='idInstituto'>";
                for ($j = 0; $j < count($listaInstitutos); $j++) {
                  $instituto = $listaInstitutos[$j];
                  if( $usuario->idInstituto==$instituto->id ){ 
      echo      "<option  value='$instituto->id' selected>$instituto->nombre</option> ";

                           }else{
      echo      "<option  value='$instituto->id' >$instituto->nombre</option> ";
                           }
                }
      echo"    </select>
                </td>
                <td><button class='btn waves-effect waves-light z-depth-0 clasemodificar' value='$usuario->id' type='submit' name='action'>Modificar<i class='material-icons right'>create</i></button></td>";
          echo "<td><a value='$usuario->id' class='btn-flat waves-effect waves-light #d32f2f  red darken-2 white-text borrarInstituto' >Eliminar<i class='material-icons right' title='Eliminar'>delete</i></a><td>
                  
                  
                  
                  </tr>
                  </div>
                ";
              }
        ?>

       <!-- 
            <tr class="">
              <td><input type="text" name="nombre"></td>
              <td><input type="text" name="localidad"></td>
              <td><input type="text" name="direccion"></td>
              <td><input type="text" name="cp"></td>
              <td><input type="text" name="provincia"></td>
              <td><a class="btn btn-floating #d32f2f red darken-2 botonD"><i class="material-icons" title="Eliminar">delete</i></a></td>
              <td><a class="btn btn-floating #e65100 orange darken-4"><i class="material-icons" title="Modificar">create</i></a></li></td>
            </tr>-->
           
          </tbody>
        </table>

      </div>

    </div>

        <!--Contenido de la ventana modal de insercion-->


        <div id="insert" class="modal" style="overflow-y: scroll">
         <?php    echo form_open_multipart("Administrador/InsertarUsuarios");?>
        
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
                <input type='text' name='apellido' id='apellido'>
                <label style="color:royalblue" for="apellido">Apellido</label>
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
                <i class="material-icons prefix" style="color:royalblue">add_box</i>
                 
                 <select name="idInstituto" id="idInstituto">
                <?php
                for ($j = 0; $j < count($listaInstitutos); $j++) {
                  $instituto = $listaInstitutos[$j];
                  if( $usuario->id==$instituto->id ){ 
      echo      "<option  value='$instituto->id' selected >$instituto->nombre</option> ";                      
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



<?php

/*
  
 <?php

 echo form_open_multipart("Administrador/InsertarUsuarios");

 echo"
<div class='formularioInsercion' id='oculto' style='display:'>
<fieldset>
  <form id='frmajax' method='get'>
    <label>Nombre</label>
    <p></p>
    <input type='text' name='nombre' id='nombre'>
    <p></p>
    <label>apellido</label>
    <p></p>
    <input type='text' name='apellido' id='apellido'>
    <p></p>
    <label>nick</label>
    <p></p>
    <input type='text' name='nick' id='nick'>
    <p></p>
    <label>contrasena</label>
    <p></p>
    <input type='text' name='contrasena' id='contrasena'>
    <p></p>
     <label>correo</label>
    <p></p>
    <input type='text' name='correo' id='correo'>
    <p></p>
     <label>telefono</label>
    <p></p>
    <input type='text' name='telefono' id='telefono'>
    <p></p>
     <label>tipo</label>
    <p></p>
    <input type='text' name='tipo' id='tipo'>
    <p></p>
     <label>Idinstituto</label>
    <p></p>
    <input type='text' name='idInstituto' id='idInstituto'>
    <p></p>
     <p></p>
    <input type='text' name='codigoConfirmacion' id='codigoConfirmacion'>
    <p></p>
    <input  type='submit' name='Enviar' value='Insertar'/>
    <button id='btnguardar'>Guardar datos</button>
  </form>
</fieldset>
</div>";

?>


<script type="text/javascript">
  $(document).ready(function(){
    $('#btnguardar').click(function(){
      var datos=$('#frmajax').serialize();
      var cadena="<?php echo site_url("Administrador/InsertarUsuarios/"); ?>";
      alert(cadena);


  
 //var xhttp = new XMLHttpRequest();
   //     xhttp.open("GET", cadena , true);
     //   xhttp.send(null);
    $.ajax({
                  type:"POST",
                  url: cadena,
                  data:datos
                   });


                 


     
    });
  });
</script>















         <script>
           $(document).ready(function (){
              $("#btnNuevoUsuario1").click(function() {
       

                $('#oculto').toggle();
                if ($('#btnNuevoUsuario1').text()=="Ocultar") {
                  $('#btnNuevoUsuario1').text("Mostrar") ;
                  //alert("if");
                  //alert( $('#btnNuevoUsuario1').text("Mostrar"));
                }else{
                      $('#btnNuevoUsuario1').text("Ocultar") ;
                      //alert("else");
                      //alert( $('#btnNuevoUsuario1').text("Ocultar"));
                }
                


            });

                  //var variable=$usuario->id;

                $("#18").click(function() {

                  //alert(variable);

                   $(".18").remove();

                  });



         });  
         
         </script>




         <?php

        
       

       
        echo "<br/> <a href='#' id='btnNuevoUsuario1'>Mostrar</a>";
        echo "<br/> <a href='#' id='borrar'>borrar</a>";
      
         
         echo " 
                <span>id</span>
                <span>nombre</span>
                <span>apellidos</span>
                <span>nick</span>
                <span>contrasena</span>
                <span>correo</span>
                <span>telefono</span>
                <span>tipo</span>
                <span>idInstituto</span>  
                         
                 ";

          echo "<br>";   
          echo " <table id='tabla' border=1>
        <tr>
            <td>primera columma</td>
            <td>segundo columna</td>
            
        </tr>
    </table>";   
            

            for ($i = 0; $i < count($listaUsuarios); $i++) {
                $usuario = $listaUsuarios[$i];

               
                echo "


                <form id='fr' method='get'>



                <table id='tabla' border=1>
        <tr class='$usuario->id'>
            <td><input type='text' name='id' value='$usuario->id'></td>
            <td><input type='text' name='nombre' value='$usuario->nombre'></td>
            <td> <input type='text' name='apellidos'value='$usuario->apellidos'></td>
            <td> <input type='text' name='nick'value='$usuario->nick'></td>
            <td> <input type='text' name='contrasena'value='$usuario->contrasena'></td>
            <td><input type='text' name='correo'value='$usuario->correo'></td>
            <td><input type='text' name='telefono'value='$usuario->telefono'></td>
            <td><input type='text' name='tipo'value='$usuario->tipo'></td>
            <td><input type='text' name='idInstituto'value='$usuario->idInstituto'></td>
            <td><button class='borrarUsuario' value='$usuario->id'>id='$usuario->id'</button></td>
            <td></td><button id='guardar'>Guardar datos</button></td>


           
            
        </tr>
             </form>



                
                     
                " ;

                // echo"<input type='Submit' name='Modificar' value='modificar'/> ";
              
                
                 //echo "<img src='".base_url($peliculas->cartel)."' width='100px'>";

                //echo "<button id='$usuario->id'>Borrar info</button>";
                ?>

<script type="text/javascript">
  $(document).ready(function(){
    $('#guardar').click(function(){
      var datos=$('#fr').serialize();
      alert(datos);
     
                 


     
    });
  });
</script>



            <script>

              

                $(".borrarUsuario").click(function() {


                  //alert("hola");

                 var idUsuario=$(this).attr("value");

                 //alert(idUsuario);


                  $("."+idUsuario).remove();



                  cadena="<?php echo site_url("Administrador/EliminarUsuarios"); ?>/"+idUsuario;
                  alert(cadena);

                  $.ajax({
                  url: cadena
                   });


                 });


                 $(".modificarUsuario").click(function() {


                  //alert("hola");

                 var idUsuario=$(this).attr("value");

                 //alert(idUsuario);


                  //$("."+idUsuario).remove();



                  cadena="<?php echo site_url("Administrador/EliminarUsuarios"); ?>/"+idUsuario;
                  //alert(cadena);

                  $.ajax({
                  url: cadena
                   });


                 });

            





                  

           </script>




                    <?php
                
               //<button><a href='".site_url('Administrador/EliminarUsuarios/'.$usuario->id)."'>Eliminar</a></button>

                  echo "
                  </div>

                  </form>
                  ";
            }
            echo"</table>";
   
            echo "<div>
                
            <a href='".site_url("Usuarios/cerrar_sesion")."'>Cerrar sesión</a>

            </div>";
              

*/