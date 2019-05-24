<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="https://iescelia.org/web/wp-content/uploads/2015/05/escudo.png">

    
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/datatablesCSS.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
   
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style3.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<!--Selects-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/css/bootstrap-select.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administración</title>
</head>

<body>

        <div id="mySidenav" class="sidenav">
	        <a href="javascript:void(0)" id='closeMenuAdmin' class="closebtn" >&times;</a>
	        <a href="<?php echo site_url('Libros/VistaAjax');?>" class='libro'>Libros</a>
	        <a href="<?php echo site_url("Autores/VistaAjax"); ?>" class='autor'>Autores</a>
	        <a href="<?php echo site_url("Categorias/VistaAjax"); ?>" class='categoria'>Categorías</a>
	        <a href="<?php echo site_url("Editoriales/VistaAjax"); ?>" class='editorial'>Editoriales</a>
            <?php  
                if($this->session->userdata('tipoUsuario')==0){
            ?>
	                <a href='<?php echo site_url('Institutos/VistaAjax'); ?>' class='instituto'>Institutos</a>
                    <a href='<?php echo site_url('Usuarios/VistaAjax'); ?>' class='usuario'>Usuarios</a>
            <?php
                }
            ?>
        </div>
        <div class="jumbotron text-center mainColor" id="">
  	        <h1>Administración CambiarNombrePorVariable</h1>
        </div>
        
            <div class='container'> 
                <div class='row'>
                <div class='botonesPrincipales'>
		            <button id='menuAdmin' class='btn btn-primary'>
			            Administración
		            </button>
                </div>

                <div class='botonesPrincipales'>
                    <button id='botonInsert' type='button' class='btn btn-success' data-toggle='modal' data-target='#insertModal'>
                        Insertar registro
                    </button>
                </div>
    
                <div id='botonCerrarSesion' class='botonesPrincipales '>
                        <a id='cerrarsesion'  href="<?php echo site_url("Libros/salir");?>" class='btn btn-danger'>Cerrar Sesión</a>
                </div>
                <?php 
                      if($this->session->userdata('tipoUsuario')==0){
                        echo "<div class='botonesPrincipales nombreAdmin'>";
                            echo $this->session->userdata('nombreUsuario') ." (Administrador)";
                        echo "</div>";
                      }else if($this->session->userdata('tipoUsuario nombreAdmin')==1){
                        echo "<div class='botonesPrincipales'>";
                            echo $this->session->userdata('nombreUsuario') ." (Bibliotecario)";
                        echo "</div>";
                      }
                    ?>
                </div>
            </div>    



        
