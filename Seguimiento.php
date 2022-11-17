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




    <!-- Script Usuarios -->
    <script src="Js/Seleccion/Seleccion.js"></script>




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
                            <h1 class="m-0">Seguimiento Procesos de Seleción</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="Dashboard.Php">Inicio</a></li>
                                <li class="breadcrumb-item active">Seguimiento</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- Main content -->


         <section class="content">
        <div class="row">
          <div class="col-md-12">

            <div id="Tabla_Seleccion">
              <!-- Tabla a mostrar -->
            </div>

            <div class="modal fade" id="predmodalac">
              <div class="modal-dialog modal-lg">

                <div class="modal-content">
                  <div class="modal-header bg-warning">
                    <h4 class="modal-title">Actualización de Aspirante</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-4">

                        <form method="POST" id="formularioactualizar" name="formulariopre" role="form" enctype="multipart/form-data" class="needs-validation" novalida>
                          <div class="">
                            <label>Documento</label>
                            <input type="text" min="0" name="documento1" id="documento1" autocomplete="off" class="form-control input-sm" placeholder="Documento de identificación" readonly>

                          </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="">
                          <label>Tipo de documento</label>
                          <select class="form-control" id="tipo1" name="tipo1">
                            <option value="0">Seleccione:</option>
                            <option value="Tarjeta_Identidad">Tarjeta de Identidad</option>
                            <option value="Cedula_ciudadania">Cedula de ciudadania</option>
                            <option value="Cedula_extrangeria">Cedula extrangeria</option>
                            <option value="Pasaporte">Pasaporte</option>

                          </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">Apellidos y Nombres</label>
                          <input type="text" spellcheck="true" class="form-control" name="nombre1" autocomplete="off" class="form-control input-sm" id="nombre1" placeholder="Apellidos y Nombres" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="">
                          <label>Nacionalidad</label>
                          <select class="form-control" id="nacionalidad2" name="nacionalidad2">
                            <option value="0">Seleccione:</option>
                            <?php
                            $resultado = mysqli_query($conn, "call vernacionalidad()");
                            while ($veer = mysqli_fetch_row($resultado)) {

                              $datoos = $veer[0] . "||" .
                                $veer[1] . "||";
                              echo '<option value="' . $veer[0] . '">' . $veer[1] . '</option>';

                              mysqli_next_result($conn);
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">Ocupación</label>
                          <input type="text" class="form-control" name="ocupacion1" autocomplete="off" class="form-control input-sm" id="ocupacion1" placeholder="ocupación" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="">
                          <label>Escolaridad</label>
                          <select class="form-control" id="escolaridad1" name="escolaridad1">
                            <option value="0">Seleccione:</option>
                            <?php
                            $result = mysqli_query($conn, "call verescolaridad()");
                            while ($ver = mysqli_fetch_row($result)) {

                              $datos = $ver[0] . "||" .
                                $ver[1] . "||";
                              echo '<option value="' . $ver[0] . '">' . $ver[1] . '</option>';

                              mysqli_next_result($conn);
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">Ciudad</label>
                          <input type="text" class="form-control" name="ciudad1" autocomplete="off" class="form-control input-sm" id="ciudad1" placeholder="ciudad" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="txtRuta">
                          <label for="inputAddress">Dirección</label>
                          <input type="text" class="form-control" name="direccion1" autocomplete="off" class="form-control input-sm" id="direccion1" placeholder="Dirección" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">Telefono</label>
                          <input type="text" class="form-control" name="tel1" autocomplete="off" class="form-control input-sm" id="tel1" placeholder="Telefono" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">Email</label>
                          <input type="email" class="form-control" name="email1" autocomplete="off" class="form-control input-sm" id="email1" placeholder="email" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="">
                          <label>Cargo</label>
                          <select class="form-control" id="cargoo" name="cargoo">
                            <option value="0">Seleccione:</option>
                            <?php
                            $result = mysqli_query($conn, "CALL sp_solicitudespreseleccion();");
                            while ($ver = mysqli_fetch_row($result)) {

                              $datos = $ver[0] . "||" .
                                $ver[1] . "||";
                              echo '<option value="' . $ver[0] . '">' . $ver[1] . '</option>';
                            }



                            ?>
                          </select>
                          <script>
                            var callee = $('#kawak');

                            $('#cargoo').change(function() {
                              $.ajax({
                                data: "kawa=" + $('#cargoo').val(),

                                type: 'POST',
                                url: 'kawak.php',
                                //  
                              }).done(function(data) {
                                callee.html(data);
                                var Caja_Sol = document.getElementById("txt_Solicitud");
                                Caja_Sol.value = data;
                              });

                            });

                            ;
                          </script>
                        </div>
                      </div>


                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">N° Solicitud Kawak</label>
                          <input class="form-control" class="form-control input-sm" id="txt_Solicitud" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal" id="submit12" onclick="actualizar_pre()" value=" enviar">
                      Guardar
                    </button>
                  </div>
                  </form>
                </div>


              </div>

            </div>







            <div class="modal fade" id="esta">
              <div class="modal-dialog modal-sm">

                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <h4 class="modal-title">Actualizar estado</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12">

                        <form method="POST" id="estad" name="estad" role="form" enctype="multipart/form-data" class="needs-validation" novalida>
                          <div class="">
                            <div class="card border-info text-center">

                              <input type="text" name="id" id="id">
                              <input type="text" name="nom" id="nom">
                              <input type="text" name="sol" id="sol">
                              
                                <div class="">
                                  <label>Estado</label>
                                  <select class="form-control" id="aplica" name="aplica">
                                    <option value="9">Seleccione:</option>
                                    <option value="1">Aplica</option>
                                    <option value="0">No aplica</option>
                                    
                                  </select>
                                </div>
                             
                            </div>


                          </div>
                      </div>

                    </div>
                  </div>
                  <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">cerrar</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="actualizarestado()">Guardar cambios</button>

                  </div>
                  </form>
                </div>


              </div>

            </div>




          </div>
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