<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato|PT+Sans" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function() {
        $("#administracion").click(function() {
            $("#capaAdmin").load("<?php echo site_url("
                Administrador / main "); ?>",
                function() {});
        });
        //$("#btnNuevoUsuario".click(function() {alert("Boton nuevo usuario");}));

        $("#categoria").click(function() {
            $("#capaAdmin").load("<?php echo site_url("
                Categorias / main "); ?>",
                function() {
                    alert("holaa");
                });
        });

        /* Descomentar cuando se cree EditorialAjax y AutorAjax

          $("#editorial").click(function() {
            $("#capaAdmin").load("<?php echo site_url("Editoriales/VistaAjax"); ?>", function() {alert("Funka1"); });
          });

        */
        $("#autor").click(function() {
            $("#capaAdmin").load("<?php echo site_url("
                Autores / VistaAjax "); ?>",
                function() {
                    alert("Funka2");
                });
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
                    <a class="nav-link" href="#" id="editoriales">Editorial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="autores">Autores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="institutos">Institutos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
        </div>