<?php
require('Php/Seguridad.php');
require('Php/Conexion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


  <!-- Minified JS library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Minified Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <script src="js/bootstrap-datetimepicker.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <title>Talento Humano</title>
  <?php
  require('Paginas/estructura/Head.php');
  ?>

</head>

<body onload="Vertabla();" class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">
    <?php
    include('Paginas/Estructura/Nav.php');

    ?>

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    <?php
    include('Paginas/Estructura/aside.php');
    ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Entrevistas y pruebas.</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="Dashboard.Php">Inicio</a></li>
                <li class="breadcrumb-item active">Pruebas</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- Main content -->
      <section class="content">

        


      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <?php
      include('Paginas/Estructura/Footer.php');
      ?>
    </footer>






</html>