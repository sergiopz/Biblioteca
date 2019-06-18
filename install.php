<?php
/*
  Este archivo es parte de la aplicación web Celia360.
  Celia 360 es software libre: usted puede redistribuirlo y/o modificarlo
  bajo los términos de la GNU General Public License tal y como está publicada por
  la Free Software Foundation en su versión 3.
  Celia 360 se distribuye con el propósito de resultar útil,
  pero SIN NINGUNA GARANTÍA de ningún tipo.
  Véase la GNU General Public License para más detalles.
  Puede obtener una copia de la licencia en <http://www.gnu.org/licenses/>.
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Install Biblioteca Celia Viñas</title>
        <!-- Fuente externa -->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <!-- Estilos del formulario de instalación -->
        <style>
            .container{
                margin: auto;
                max-width: 1300px;
            }
            .bg-secondary {
                background-color: black;
                border-radius: 118px 24px 24px 24px;
-moz-border-radius: 118px 24px 24px 24px;
-webkit-border-radius: 118px 24px 24px 24px;
border: 2px solid #c21d1d;
            }
            .col-md-6{
                width: 50%;
            }
            .col-md-12{
                width: 100%;
            }
            .mx-auto{
                margin: auto!important;
            }
            h1, h4, p, label{
                color: white;
                font-family:"Lato";
            }
            input, label{
                display: block;
            }
            .text-center{
                text-align: center;
            }
            label{
                margin-bottom: 10px;
                font-size: 1.25rem;
                margin-top: 10px;
            }
            .form-group{
                margin-bottom: 1rem;
                margin: auto;
                width: 90%;
            }
            .btn-primary {
                color: #fff;
                background-color: red;
                border: none;
                width: auto;
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
            }
            .mt-3{
                margin-top: 15px; 
            }
            .pb-3{
                padding-bottom: 15px; 
            }
            body{
                background-color: white;
            }
            .text-justify{
                text-align: justify;
            }
            p{
                margin: 20px;
            }
            input {
                width: 100%;
                display: block;
                margin: auto;
                padding: 0.375rem;
            }
            h1{
                font-size: 2.5rem;
            }
            h4{
                font-size: 1.5rem;
            }
            .text-white {
                color: white;
            }
            #contenedorMSG{
                width: 50%;
                margin: 0 auto;
                margin-top: 15%;

                
            }
            .msg{
                text-align: center;
                
            }
        </style>         
    </head>
    <body>

        <?php
        ini_set("display_errors", 0);
       
      if (isset($_REQUEST["host"])) {
            // Procesar el formulario
            $host = $_REQUEST["host"];
            $userdb = $_REQUEST["nameuse"];
            $passdb = $_REQUEST["passbd"];
            $nombredb = $_REQUEST["namebd"];
            $baseurl = $_REQUEST["base"];
            $username = $_REQUEST["username"];
            $pass = $_REQUEST["pass"];
            $pass2 = $_REQUEST["pass2"];
            $emailadmin = $_REQUEST["emailadmin"];
            //Comprobamos que las dos contraseñas sean iguales
            if (strcmp($pass, $pass2) !== 0) {
            echo 'Las dos contraseñas no son iguales, son consideradas mayúsculas y minúsculas';
            }else{
            // Creamos la estructura de la BD
			$db = new mysqli($host, $userdb, $passdb, $nombredb);
	
            $db->query("CREATE TABLE `autores` (
                `id` int(11) NOT NULL,
                `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;");

            $db->query("INSERT INTO `autores` (`id`, `nombre`) VALUES
              (1, 'Miguel de Cervantes'),
              (2, 'Victor Hugo'),
              (3, 'Charles Dickens'),
              (4, 'Herman Melville'),
              (5, 'Franz Kafka'),
              (6, 'Johann Wolfgang von Goethe'),
              (7, 'Mary Shelley'),
              (8, 'Fiódor Dostoyevsk'),
              (9, 'Julio Verne'),
              (10, 'Bram Stoker'),
              (11, 'Oscar Wilde'),
              (12, 'M. Gómez Moreno'),
              (13, 'Otros'),
              (14, 'D. José Luis Ruiz Márquez'),
              (15, 'F. Castro Guisasola');");

            $db->query("CREATE TABLE `autoreslibros` (
                `idAutor` int(11) NOT NULL,
                `idLibro` int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;");
    
            $db->query("INSERT INTO `autoreslibros` (`idAutor`, `idLibro`) VALUES
                (0, 0);");

            $db->query("CREATE TABLE `busqueda` (
                `id` int(11) DEFAULT NULL,
                `titulo` varchar(50) DEFAULT NULL
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

            $db->query("CREATE TABLE `categoria` (
                `id` int(11) NOT NULL,
                `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;");

            $db->query("INSERT INTO `categoria` (`id`, `nombre`) VALUES
                (5, 'Novela'),
                (9, 'Historia'),
                (12, 'Horror'),
                (14, 'Poesía');");

            $db->query("CREATE TABLE `editorial` (
                `id` int(11) NOT NULL,
                `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;");


			$db->query("INSERT INTO `editorial` (`id`, `nombre`) VALUES
                (1, 'Gallimard'),
                (2, 'Alianza'),
                (3, 'Juventud'),
                (4, 'Anaya'),
                (5, 'Planeta'),
                (6, 'Galaxia'),
                (7, 'Otros');");
            
            $db->query("CREATE TABLE `instituto` (
                `id` int(11) NOT NULL,
                `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
                `localidad` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
                `direccion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
                `cp` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL,
                `provincia` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;");

            $db->query("INSERT INTO `instituto` (`id`, `nombre`, `localidad`, `direccion`, `cp`, `provincia`) VALUES
                (1, 'IES Celia Viñas', 'Almería', 'C/ Javier Sanz, 15', '04004', 'Almería'),
                (2, 'Otro', 'Almería', ' ', '04006', 'Almería');");

            $db->query("CREATE TABLE `librocategoria` (
                `idLibro` int(11) NOT NULL,
                `idCategoria` int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;");

            $db->query(" INSERT INTO `librocategoria` (`idLibro`, `idCategoria`) VALUES (0, 0),");

            $db->query("CREATE TABLE `favoritos` (
                `idUsuario` int(200) NOT NULL,
                `idLibro` int(200) NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
              
            $db->query("CREATE TABLE `libros` (
                `id` int(11) NOT NULL,
                `isbn` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
                `titulo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
                `descripcion` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
                `fecha` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
                `paginas` int(11) NOT NULL,
                `idInstituto` int(11) NOT NULL,
                `idUsuario` int(11) NOT NULL,
                `idEditorial` int(11) NOT NULL,
                `pdf` varchar(900) COLLATE utf8mb4_spanish_ci NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;");

            $db->query("CREATE TABLE `usuarios` (
                `id` int(11) NOT NULL,
                `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
                `apellidos` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
                `nick` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
                `contrasena` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
                `correo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
                `telefono` int(11) NOT NULL,
                `tipo` int(11) NOT NULL,
                `idInstituto` int(11) NOT NULL,
                `codigoConfirmacion` int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;");

			$db->query("INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `nick`, `contrasena`, `correo`, `telefono`, `tipo`, `idInstituto`, `codigoConfirmacion`) VALUES
                    (1, 'admin', 'admin', 'admin', 'admin', 'admin@mail.com', 666666666, 0, 1, 0);");
            
            $db->query("ALTER TABLE `autores` ADD PRIMARY KEY (`id`);");

            $db->query("ALTER TABLE `categoria` ADD PRIMARY KEY (`id`);");

            $db->query("ALTER TABLE `editorial` ADD PRIMARY KEY (`id`);");

            $db->query("ALTER TABLE `instituto` ADD PRIMARY KEY (`id`);");

            $db->query("ALTER TABLE `libros` ADD PRIMARY KEY (`id`);");

            $db->query("ALTER TABLE `usuarios` ADD PRIMARY KEY (`id`);");

            $db->query("ALTER TABLE `autores` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;");

            $db->query("ALTER TABLE `categoria` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;");

            $db->query("ALTER TABLE `editorial` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;");

            $db->query("ALTER TABLE `instituto` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;");

            $db->query("ALTER TABLE `libros` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;");

            $db->query("ALTER TABLE `usuarios` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;");

          
            // Creamos el archivo de configuración
            $nombre_archivo = ".env.development";
            if (file_exists($nombre_archivo)) {
                $mensaje = "El Archivo " . $nombre_archivo . " se ha modificado.";
            } else {
                $mensaje = "El Archivo " . $nombre_archivo . " se ha creado.";
            }
            if ($archivo = fopen($nombre_archivo, "w")) {
                fwrite($archivo, "DB_HOSTNAME='" . $host . "'\n 
        								DB_USERNAME='" . $userdb . "'\n 
        								DB_PASSWORD='" . $passdb . "'\n 
        								DB_DATABASE='" . $nombredb . "'\n 
        								BASE_URL='" . $baseurl . "'\n 
        								SESSION_DIR='/tmp'");
            } else {
                echo "El programa de instalación no ha podido crear el archivo de configuración. Debe crearlo usted manualmente en el directorio raíz de su aplicación.<br>"
                . "El archivo debe ser de texto plano y tener el nombre .env.develpment. Su contenido debe ser el siguiente (cópielo y péguelo para evitar errores):<br><br>"
                . "DB_HOSTNAME='" . $host . "'<br> 
        								DB_USERNAME='" . $userdb . "'<br> 
        								DB_PASSWORD='" . $passdb . "'<br>
        								DB_DATABASE='" . $nombredb . "<br> 
        								BASE_URL='" . $baseurl . "'<br>
        								SESSION_DIR='/tmp'<br><br><br>
                                                                        Cuando haya creado el archivo puede visitar <a href='$baseurl'>$baseurl</a> para comenzar a administrar su visita virtual. Pida ayuda a su administrador de sistemas si no sabe cómo hacer todo esto.";
            }
            fclose($archivo);
			//creación de directorios 
			
			
			
            echo "<div><div id='contenedorMSG'><span class=' msg'>La instalación ha finalizado.<br><br> <strong>IMPORTANTE: elimine ahora el archivo de instalación (install.php) del servidor para evitar posibles ataques a su base de datos.</strong><br>"
            . "<br>Visite <strong><a style='color:black' href='$baseurl'>$baseurl</a></strong> para comenzar a introducir los datos de la Biblioteca.
            
                <br><br>Puede acceder a la administración del sitio web con los siguientes datos:<br><br> User: admin<br> Pass: admin</span></div></div>";
         }
     }
         // fin del if
        else {
            // Mostramos formulario
            ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto bg-secondary">
            <form action="install.php">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">Instalaci&oacute;n de la Biblioteca Celia Viñas</h1>

                        <h4 class="text-center">Configuración del host</h4>
                        <div class="form-group">
                            <label for="host">Nombre del host</label>
                            <input type='text' name='host' id="host" required>
                        </div>
                        <div class="form-group">
                            <label for="namebd">Nombre de la base de datos</label>
                            <input type='text' id="namebd" name='namebd' required>
                        </div>
                        <div class="form-group">
                            <label for="nameuse">Usuario de la base de datos</label>
                            <input type='text' name='nameuse' id="nameuse" required>
                        </div>
                        <div class="form-group">
                            <label for="passbd">Contraseña de la base de datos</label>
                            <input type='password' name='passbd' id="passbd">            
                        </div>
                        <div class="form-group">
                            <label for="base">Base URL del sitio</label>
                            <input type='text' name='base' id="base" placeholder="http://ejemplo.com" required>            
                        </div>
                    </div>
                </div>
                <div class="row mt-3 pb-3">
                    <div class="col-md-12">
                        <input type='submit' value='Aceptar' class="btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><!-- Final de container -->
            <?php
        }
        ?>
    </body>
</html>