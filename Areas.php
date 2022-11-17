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
  <script src="Js/areas/Areas.js"></script>



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
              <h1 class="m-0">Parametrizar Áreas </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="Dashboard.Php">Inicio</a></li>
                <li class="breadcrumb-item active">Áreas</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- Main content -->
      <section class="content">
        <div id="tabla_areas"></div>

        <!-- Modal para registros nuevos -->
        <!-- <a class="btn btn-primary btn-lg" href='javascript:;' id="Enviar" onclick="">Prueba envio </a> -->

        <div class="modal fade" id="areamodal">
          <div class="modal-dialog modal-lg">

            <div class="modal-content">
              <div class="modal-header bg-info">
                <h4 class="modal-title">Gestionar áreas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-6">

                    <form method="POST" id="contactoarea" name="contactoarea" role="form" enctype="multipart/form-data" class="needs-validation" novalida>
                      <label>Gestión</label>
                      <select class="form-control" id="Cmb_Gestion" name="Cmb_Gestion">
                        <option value="0">Seleccione:</option>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM gestion");
                        while ($ver = mysqli_fetch_row($result)) {

                          $datos = $ver[0] . "||" .
                            $ver[1] . "||";
                          echo '<option value="' . $ver[0] . '">' . $ver[1] . '</option>';
                        }
                        ?>
                      </select>

                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="txtRuta">Área</label>
                      <input type="text" class="form-control" name="area" autocomplete="off" class="form-control input-sm" id="area" placeholder="Área" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="">
                      <label for="txtRuta">Director</label>
                      <input type="text" class="form-control" name="director" autocomplete="off" class="form-control input-sm" id="director" placeholder="Director" required>
                    </div>

                  </div>
                  <div class="col-sm-6">
                    <div class="">
                      <label for="txtRuta">Correo</label>
                      <input type="text" class="form-control" name="corr" autocomplete="off" class="form-control input-sm" id="corr" placeholder="Correo electronico" required>
                    </div>

                  </div>
                  <div class="col-sm-12">
                    <div class="">
                      <label for="txtRuta">Observaciones</label>
                      <textarea type="text" class="form-control" name="observaciones" autocomplete="off" class="form-control input-sm" id="observaciones" placeholder="Observaciones del área" required></textarea>
                    </div>

                  </div>


                </div>
              </div>
              <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                <button type="submit" class="btn btn-info" data-dismiss="modal" id="submit12" onclick="nuevaarea()" value=" enviar">
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
                <h4 class="modal-title">Actualizar Áreas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-6">

                    <form method="POST" id="actualizar" name="actualizar" role="form" enctype="multipart/form-data" class="needs-validation" novalida>
                      <div class="">
                        <label>Gestion</label>
                        <input type="hidden" name="id" id="id" autocomplete="off" class="form-control input-sm" required>
                        <input type="text" name="gestion" id="gestion" autocomplete="off" class="form-control input-sm" placeholder="Descripción del Area" readonly>
                      </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="txtRuta">Área</label>
                      <input type="text" class="form-control" name="area1" autocomplete="off" class="form-control input-sm" id="area1" placeholder="director" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="">
                      <label for="txtRuta">Director</label>
                      <input type="text" class="form-control" name="director1" autocomplete="off" class="form-control input-sm" id="director1" placeholder="Observaciones de la gestión" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="">
                      <label for="txtRuta">Correo</label>
                      <input type="text" class="form-control" name="corr1" autocomplete="off" class="form-control input-sm" id="corr1" placeholder="Correo electronico" required>
                    </div>

                  </div>
                  <div class="col-sm-12">
                    <div class="">
                      <label for="txtRuta">Observaciones</label>
                      <textarea type="text" class="form-control" name="observaciones1" autocomplete="off" class="form-control input-sm" id="observaciones1" placeholder="Observaciones de la gestión" required></textarea>
                    </div>

                  </div>


                </div>
              </div>
              <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                <button type="submit" class="btn btn-info" data-dismiss="modal" id="submit12" onclick="actualizararea()" value=" enviar">
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