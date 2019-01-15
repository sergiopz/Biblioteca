<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>formulario_verano</title>
    <link rel="stylesheet" href="<?php echo base_url('css/estilos.css');?>">
    

</head>
<body>





<?php


            //session_destroy();
            if (isset($data["msj"])) echo "<h2 style='color:red'>".$data["msj"]."</h2>";

?>
       

        <div class="contenedor-form">
        
        
        <div class="formulario">
            <h2>Iniciar Sesión</h2>
     <?php
            echo form_open("Usuarios/ComprobarUsario");
     ?>

            
                Usuario: <input type="text" name="nombre" id="nombre"/><span id="mensaje"></span><br/>
            Contraseña: <input type="text" name="password"/><br/>
            <input type="hidden" name="do" value="ComprobarUsario"/>
            <input type="submit" value="Entrar"/>
        </div>
        
     
        
    </div>

</body>
</html>

