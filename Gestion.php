<?php
require('Php/Seguridad.php');
require('Php/Conexion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <title>Talento Humano</title>
  <?php
  require('Paginas/estructura/Head.php');
  ?>
  <!-- Script Usuarios -->
  <script src="Js/gestion/gestion.js"></script>



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
              <h1 class="m-0">Parametrizar Gestión </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="Dashboard.Php">Inicio</a></li>
                <li class="breadcrumb-item active">Perfiles</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- Main content -->
      <section class="content">
        <div id="tablagestion"></div>

        <!-- Modal para registros nuevos -->
        <!-- <a class="btn btn-primary btn-lg" href='javascript:;' id="Enviar" onclick="">Prueba envio </a> -->

        <div class="modal fade" id="cargomodal">
          <div class="modal-dialog modal-lg">

            <div class="modal-content">
              <div class="modal-header bg-info">
                <h4 class="modal-title">Gestión</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-6">

                    <form method="POST" id="contactogestion" name="contactogestion" role="form" enctype="multipart/form-data" class="needs-validation" novalida>
                      <div class="">
                        <label>Nombre de la gestión</label>
                        <input type="text" name="descripcion" id="descripcion" autocomplete="off" class="form-control input-sm" placeholder="Nombre de la Gestión" required>

                      </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="txtRuta">Director</label>
                      <input type="text" class="form-control" name="director" autocomplete="off" class="form-control input-sm" name="ruta" id="director" placeholder="director" required>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="">
                      <label for="txtRuta">Observaciones</label>
                      <input type="text" class="form-control" name="observaciones" autocomplete="off" class="form-control input-sm" name="ruta" id="observaciones" placeholder="Observaciones de la gestión" required>
                    </div>

                  </div>


                </div>
              </div>
              <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                <button type="submit" class="btn btn-info" data-dismiss="modal" id="submit12" onclick="nuevagestion()" value=" enviar">
                  Guardar
                </button>
              </div>
              </form>
            </div>
          </div>

        </div>
        <!-- Modal Edicion   modalEdicion -->
        <div class="modal fade" id="modalEdicion">
          <div class="modal-dialog modal-lg">

            <div class="modal-content">
              <div class="modal-header bg-info">
                <h4 class="modal-title">Actualizar Gestión</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-6">

                    <form method="POST" id="actualizargestion" name="actualizargestion" role="form" enctype="multipart/form-data" class="needs-validation" novalida>
                      <div class="">
                        <label>Gestión</label>
                        <input type="hidden" name="id" id="id" autocomplete="off" class="form-control input-sm" required>
                        <input type="text" name="descripcion1" id="descripcion1" autocomplete="off" class="form-control input-sm" placeholder="Nombre de la Gestión" required>

                      </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="txtRuta">Director</label>
                      <input type="text" class="form-control" name="director1" autocomplete="off" class="form-control input-sm"  id="director1" placeholder="director" required>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="">
                      <label for="txtRuta">Observaciones</label>
                      <input type="text" class="form-control" name="observaciones1" autocomplete="off" class="form-control input-sm"  id="observaciones1" placeholder="Observaciones de la gestión" required>
                    </div>

                  </div>


                </div>
              </div>
              <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                <button type="submit" class="btn btn-info" data-dismiss="modal" id="submit12" onclick="actualizarcargo()" value=" enviar">
                  Guardar
                </button>
              </div>
              </form>
            </div>
          </div>

        </div>







        <script>
          /*
$(document).ready(function() {
    $('#submit').on('click', function(e) {
        e.preventDefault();
        var dataString = $('#contactForm').serialize();
        alert('Datos serializados: '+dataString);
    }); 
}); */
        </script>

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