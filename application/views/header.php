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
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootsnav.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administración</title>

</head>

<body>
    <nav id='navegacionAdmin' class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
       <a style='color:white' class="nav-link btn-demo" data-toggle="modal" data-target="#leftModal" href="#"><i class="fas fa-cogs"></i></a>
            <style>
            #mover{
                float: right;
            }
                
            </style> <div class="container">

            <a class="navbar-brand" href="#">
                <img id='imglogo' src="<?php echo base_url(); ?>imgs/logoadmin.png" alt="">
            </a>
            <a class="navbar-brand" id='nombreAdministrador' href="#">
                <?php 
                      if($this->session->userdata('tipoUsuario')==0){
                            echo $this->session->userdata('nombreUsuario') ." (Administrador)";
                      }else if($this->session->userdata('tipoUsuario')==1){
                            echo $this->session->userdata('nombreUsuario') ." (Bibliotecario)";
                      }
                    ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" id='botonInsert' data-toggle='modal' data-target='#insertModal' href="#"><i class="fas fa-plus-circle"></i> Insertar registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"id='cerrarsesion'  href="<?php echo site_url("Libros/salir");?>"><i class="fas fa-door-open"></i> Cerrar sesión</a>
                    </li>
                    <li>
                    <a class="nav-link" id='salirInicio'  href="<?php echo site_url("Administrador/Index");?>"><i class="fas fa-home"></i> Biblioteca</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        <div id="mySidenav" class="sidenav">
	        <a href="javascript:void(0)" id='closeMenuAdmin' class="closebtn" >&times;</a>
	        
        </div>
       
           


        <div  class="modal left fade" id="leftModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="nav flex-sm-column flex-row">
                        <a class="nav-item nav-link ElementoAdmin" href="<?php echo site_url('Libros/VistaAjax');?>" class='libro'>Libros</a>
	                    <a class="nav-item nav-link ElementoAdmin" href="<?php echo site_url("Autores/VistaAjax"); ?>" class='autor'>Autores</a>
	                    <a class="nav-item nav-link ElementoAdmin" href="<?php echo site_url("Categorias/VistaAjax"); ?>" class='categoria'>Categorías</a>
	                    <a class="nav-item nav-link ElementoAdmin" href="<?php echo site_url("Editoriales/VistaAjax"); ?>" class='editorial'>Editoriales</a>
                        <?php  if($this->session->userdata('tipoUsuario')==0){ ?>
	                        <a class="nav-item nav-link ElementoAdmin" href='<?php echo site_url('Institutos/VistaAjax'); ?>' class='instituto'>Institutos</a>
                            <a class="nav-item nav-link ElementoAdmin" href='<?php echo site_url('Usuarios/VistaAjax'); ?>' class='usuario'>Usuarios</a>
                        <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
