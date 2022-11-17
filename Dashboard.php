<?php
require('Php/Seguridad.php');
require('Php/Conexion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- jQuery UI 1.11.4 -->
  <!-- jQuery UI 1.11.4 -->
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <title>Talento Humano</title>
  <?php
  require('Paginas/estructura/Head.php');
  ?>
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="plugins/datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader 
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

    <!-- Navbar -->

    <?php
    include('Paginas/Estructura/Nav.php');
    ?>

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    <?php
    include('Paginas/Estructura/aside.php');
    ?>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Solicitudes y Preselección de Personal </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="Dashboard.Php">Inicio</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <?php
      $result = mysqli_query($conn, "call Solicitudes_abiertas()");
      $Dato = mysqli_fetch_assoc($result);
      $pendientes = $Dato['solicitudes_Abiertas'];
      mysqli_next_result($conn);
      ?>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner" data-toggle="modal" data-target="#modal_solicitudes_abiertas">
                  <h3><?php echo $pendientes; ?></h3>
                  <?php
                  //mysqli_close($conn);
                  ?>
                  <p>Solicitudes  </br> abiertas </p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="./Solicitudes.php" id="Solicitudes_Abiertas" class="small-box-footer">Mas Información &nbsp; <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!--==========================-->
              <?php
              $resultado = mysqli_query($conn, "call Cerradasmes()");
              $Datos = mysqli_fetch_assoc($resultado);
              $cerradas = $Datos['Cerradomes'];
              mysqli_next_result($conn);
              ?>

              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner" data-toggle="modal" data-target="#modal_solicitudes_Cerradas">
                  <h3><?php echo $cerradas; ?></h3>
                  <p>Solicitudes  </br> cerradas el ultimo mes </p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="./Solicitudes.php" id="Solicitudes_Cerradas" class="small-box-footer">Mas Información &nbsp; <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- traer Datos-->
              <?php
              $resultado = mysqli_query($conn, "call Preselec_open()");
              $Datos = mysqli_fetch_assoc($resultado);
              $Preseleccion_Open = $Datos['Preseleccion_Abiertas'];
              mysqli_next_result($conn);
              ?>
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner" data-toggle="modal" data-target="#modal_Preselecciones_abiertas">
                  <h3>
                    <?php echo $Preseleccion_Open; ?>
                  </h3>
                  <p>Preselección </br> Pendientes Revisión</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="./Preseleccion.php" class="small-box-footer">Mas Información &nbsp; <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">

              <?php
              $resultado = mysqli_query($conn, "call Sp_Seleccion_open()");
              $Datos = mysqli_fetch_assoc($resultado);
              $Seguimiento = $Datos['Seleccion_Open'];
              mysqli_next_result($conn);
              ?>


              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner" data-toggle="modal" data-target="#modal_Seguimiento_abiertas">
                  <h3>
                    <?php echo $Seguimiento; ?>
                  </h3>
                  <p>Procesos  </br> Pendientes</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="./Seguimiento.php" class="small-box-footer">Mas Información &nbsp; <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->





          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->


            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <section>
        <!--Modales  ===============================================-->

        <style>
          /* .modal-xm { max-width: 35% !important;  margin-left: 33.3%; } */
        </style>
        <!-- solicitudes abiertas -->
        <div class="modal fade" id="modal_solicitudes_abiertas">
          <div class="modal-dialog modal-xm ">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <h5 class="modal-title">Solicitudes Abiertas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!--Body-->
              <?php
                  include('php/Dashboard/Sol_abiertas.Php');
                  ?>
              <!--===========-->
                </div>
              </div>
              <!--Footer-->
              <div class="modal-footer justify-content-end">
                <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> -->
                <button type="button" id="btnGuardar--" data-dismiss="modal" class="btn bg-info">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
       

         <!-- solicitudes abiertas -->
         <div class="modal fade" id="modal_solicitudes_Cerradas">
          <div class="modal-dialog modal-xm ">
            <div class="modal-content">
              <div class="modal-header bg-warning">
                <h5 class="modal-title">Solicitudes Cerradas Ultimo Mes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!--Body-->
              <?php
                  include('php/Dashboard/Sol_Cerradas.Php');
                  ?>
              <!--===========-->
                </div>
              </div>
              <!--Footer-->
              <div class="modal-footer justify-content-end">
                <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> -->
                <button type="button" id="btnGuardar_-" data-dismiss="modal" class="btn bg-warning">Cerrar</button>
              </div>
            </div>
          </div>
        </div>

        <!-- solicitudes abiertas -->
        <div class="modal fade" id="modal_Preselecciones_abiertas">
          <div class="modal-dialog modal-xm">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <h4 class="modal-title"> Preselección Pendientes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!--Body-->
              
                  <!--===========-->
                  <?php
                  include('php/Dashboard/seleccion.php');
                  ?>
                  <!--===========-->
                </div>
              </div>
              <!--Footer-->
              <div class="modal-footer justify-content-end">
                <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> -->
                <button type="button" id="btnGuardar_" data-dismiss="modal" class="btn bg-info">Aceptar</button>
              </div>
            </div>
          </div>
        </div>


        <!-- seguimiento abiertas -->
        <div class="modal fade" id="modal_Seguimiento_abiertas">
          <div class="modal-dialog modal-xm">
            <div class="modal-content">
              <div class="modal-header bg-info">
                <h4 class="modal-title">Procesos de Seleción Pendientes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!--Body-->
              <!-- <div class="modal-body">
                <div class="col-auto"> -->
                  <!--===========-->
                  <?php
                  include('php/Dashboard/Seguimiento.php');
                  ?>
                  <!--===========-->
                <!-- </div>
              </div> -->
              <!--Footer-->
              <div class="modal-footer justify-content-end">
                <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> -->
                <button type="button" id="btnGuardar__" data-dismiss="modal" class="btn bg-info">Aceptar</button>
              </div>
            </div>
          </div>
        </div>
        
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <?php
      include('Paginas/Estructura/Footer.php');
      ?>
    </footer>

</body>

</html>