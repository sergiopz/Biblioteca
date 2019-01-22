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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function (){

          $(".administracion").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Administrador/main"); ?>", function() { });
          });
          //$("#btnNuevoUsuario".click(function() {alert("Boton nuevo usuario");}));
           $(".categoria").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Categorias/VistaAjax"); ?>", function() { });
          });

          $(".editorial").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Editoriales/VistaAjax"); ?>", function() { });
          });

        
          $(".autor").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Autores/VistaAjax"); ?>", function() { });
          });


          $(".institutos").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Institutos/VistaAjax"); ?>", function() { });

          });

          $(".libro").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Libros/VistaAjax"); ?>", function() { });
          });
  
      });
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administracion</title>
</head>
<body class="#424242 grey darken-3">

  <nav>
    <div class="nav-wrapper #616161 grey darken-2">
      <ul class="center">
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down administracion" >Usuarios</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down institutos">Institutos</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down autor">Autores</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down libro">Libros</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down categoria">Categorias</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down editorial">Editorial</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down autoreslibros">AutoresLib</a></li>
        <li><a class="waves-effect waves-light btn #8c9eff indigo accent-1 hide-on-med-and-down libroscategorias">LibrosCat</a></li>
      </ul>
      <ul class=" hide-on-med-and-up show-on-medium-and-down">
        <li><a class="dropdown-trigger waves-effect waves-light btn #8c9eff indigo accent-1" data-target="dropdown1">Administracion</a></li>
      </ul>

      <ul id='dropdown1' class='dropdown-content #8c9eff indigo accent-1'>
        <li><a class=" btn #8c9eff indigo accent-1 administracion" style="color:white" >Usuarios</a></li>
        <li><a class=" btn #8c9eff indigo accent-1 institutos" style="color:white">Institutos</a></li>
        <li><a class=" btn #8c9eff indigo accent-1 autores" style="color:white">Autores</a></li>
        <li><a class=" btn #8c9eff indigo accent-1 libros" style="color:white">Libros</a></li>
        <li><a class=" btn #8c9eff indigo accent-1 categorias" style="color:white">Categorias</a></li>
        <li><a class=" btn #8c9eff indigo accent-1 editorial" style="color:white">Editorial</a></li>
        <li><a class=" btn #8c9eff indigo accent-1 autoreslibros" style="color:white">AutoresLib</a></li>
        <li><a class=" btn #8c9eff indigo accent-1 libroscategorias" style="color:white">LibrosCat</a></li>
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
