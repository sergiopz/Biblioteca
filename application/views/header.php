<!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
    <link rel="shortcut icon" href="https://iescelia.org/web/wp-content/uploads/2015/05/escudo.png">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url('css/estiloMaterialize.css');?>">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>



    <script type="text/javascript">
        $(document).ready(function (){

          $(".usuario").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Usuarios/VistaAjax"); ?>", function() { });
            $(".usuario").removeClass("#8c9eff indigo accent-1").addClass("#304ffe indigo accent-4");
            $(".categoria").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".editorial").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".autor").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".instituto").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".libro").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
          });
          //$("#btnNuevoUsuario".click(function() {alert("Boton nuevo usuario");}));
           $(".categoria").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Categorias/VistaAjax"); ?>", function() { });
            $(".categoria").removeClass("#8c9eff indigo accent-1").addClass("#304ffe indigo accent-4");
            $(".usuario").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".editorial").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".autor").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".instituto").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".libro").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
          });

          $(".editorial").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Editoriales/VistaAjax"); ?>", function() { });
            $(".editorial").removeClass("#8c9eff indigo accent-1").addClass("#304ffe indigo accent-4");
            $(".usuario").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".categoria").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".autor").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".instituto").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".libro").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
          });

        
          $(".autor").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Autores/VistaAjax"); ?>", function() { });
            $(".autor").removeClass("#8c9eff indigo accent-1").addClass("#304ffe indigo accent-4");
            $(".usuario").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".editorial").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".categoria").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".instituto").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".libro").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
          });


          $(".instituto").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Institutos/VistaAjax"); ?>", function() { });
            $(".instituto").removeClass("#8c9eff indigo accent-1").addClass("#304ffe indigo accent-4");
            $(".usuario").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".editorial").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".autor").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".categoria").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".libro").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");

          });

/*          $(".libro").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Libros/VistaAjax"); ?>", function() { });
            $(".libro").removeClass("#8c9eff indigo accent-1").addClass("#304ffe indigo accent-4");
            $(".administracion").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".editorial").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".autor").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".instituto").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
            $(".categoria").removeClass("#304ffe indigo accent-4").addClass("#8c9eff indigo accent-1");
          });
 */ 
      });
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administracion</title>
</head>
<body class="gradiente">

  <nav>
    <div class="nav-wrapper #616161 grey darken-2">
      <ul class="center">
      <?php  
        if($this->session->userdata('tipoUsuario')==0){
          echo"<li><a class='waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down usuario' >Usuarios</a></li>";
          echo "<li><a class='waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down instituto'>Institutos</a></li>";
      }
      ?>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down autor">Autores</a></li>
        <li><a href="<?php echo site_url('Libros/VistaAjax');?>" class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down libro">Libros</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down categoria">Categorias</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down editorial">Editorial</a></li>
        <li><?php 
  if($this->session->userdata('tipoUsuario')==0){
    echo $this->session->userdata('nombreUsuario') ." (Administrador)";
}else if($this->session->userdata('tipoUsuario')==1){
    echo $this->session->userdata('nombreUsuario') ." (Bibliotecario)";
}


            ?>
        </li>
        
        
      </ul>
      <ul class="right">
        <?php echo "<li><a  href='".site_url("Libros/salir")."' class=' waves-effect waves-light btn-small #8c9eff indigo accent-1 white-text z-depth-1 '><i class='material-icons right' title='Cerrar Sesion'>exit_to_app</i>Cerrar Sesión</a></li>";?>
      </ul>
      
      <ul class=" hide-on-med-and-up show-on-medium-and-down">
        <li><a class="dropdown-trigger waves-effect waves-light btn #8c9eff indigo accent-1" data-target="dropdown1">Administracion</a></li>
      </ul>

      <ul id='dropdown1' class='dropdown-content #8c9eff indigo accent-1'>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 usuario" style="color:white" >Usuarios</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 instituto" style="color:white">Institutos</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 autor" style="color:white">Autores</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 libro" style="color:white">Libros</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 categoria" style="color:white">Categorias</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 editorial" style="color:white">Editorial</a></li>
      
      </ul>
    </div>
  </nav>

  <!--
<!DOCTYPE html>
<html>
<head>

         Required meta tags 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

         Bootstrap CSS 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
                integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

         Css 
         Css  <link rel="stylesheet" href="estilos.css">

         Fuentes de google
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato|PT+Sans" rel="stylesheet">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
         <script type="text/javascript">
        $(document).ready(function (){
          $("#administracion").click(function() {
            $("#capaAdmin").load("<?php// echo site_url("Administrador/main"); ?>", function() { });
          });
          //$("#btnNuevoUsuario".click(function() {alert("Boton nuevo usuario");}));


           $("#categoria").click(function() {
            $("#capaAdmin").load("<?php //echo site_url("Categorias/VistaAjax"); ?>", function() { } );
          });

          

          $("#editorial").click(function() {
            $("#capaAdmin").load("<?php// echo site_url("Editoriales/VistaAjax"); ?>", function() { });
          });

        
          $("#autor").click(function() {
            $("#capaAdmin").load("<?php// echo site_url("Autores/VistaAjax"); ?>", function() { });
          });


          $("#institutos").click(function() {
            $("#capaAdmin").load("<?php// echo site_url("Institutos/VistaAjax"); ?>", function() { });

          });

          $("#libro").click(function() {
            $("#capaAdmin").load("<?php// echo site_url("Libros/VistaAjax"); ?>", function() { });

          });

          
        
          
    });
  </script>
  <title>Administracion</title>
</head>

<body>
  <div class="container-fluid">
    <div>
                          <ul class="nav nav-tabs">
                            <li class="nav-item">
                              <a class="nav-link active" id="administracion" href="#">administracion</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#" id="categoria">categoria</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#" id="editorial">Editorial</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#" id="autor">Autores</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#" id="institutos">Institutos</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#" id="libro">Libros</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link disabled" href="#">Disabled</a>
                            </li>
                          </ul>
    </div>
    -->
