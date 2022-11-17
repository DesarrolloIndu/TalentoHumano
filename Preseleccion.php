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
  <script src="Js/preseleccion/pre.js"></script>
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
              <h1 class="m-0">Preselección de Aspirantes.</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="Dashboard.Php">Inicio</a></li>
                <li class="breadcrumb-item active">Preselección</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">

            <div id="mostrartablare">

            </div>
            <div class="modal fade" id="predmodal">
              <div class="modal-dialog modal-lg">

                <div class="modal-content">
                  <div class="modal-header bg-info">
                    <h4 class="modal-title">Registro de Aspirantes</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-4">

                        <form method="POST" id="formulariopre" name="formulariopre" role="form" enctype="multipart/form-data" class="needs-validation" novalida>
                          <div class="">
                            <label>Documento</label>
                            <input type="number" min="0" name="documento" id="documento" autocomplete="off" class="form-control input-sm" placeholder="Documento de identificación" required>

                          </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="">
                          <label>Tipo de documento</label>
                          <select class="form-control" id="tipo" name="tipo">
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
                          <input type="text" spellcheck="true" class="form-control" name="nombre" autocomplete="off" class="form-control input-sm" id="nombre" placeholder="Apellidos y Nombres" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="">
                          <label>Nacionalidad</label>
                          <select class="form-control" id="nacionalidad" name="nacionalidad">
                            <option value="0">Seleccione:</option>
                            <?php
                            $result = mysqli_query($conn, "call vernacionalidad()");
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
                          <label for="txtRuta">Ocupación</label>
                          <input type="text" class="form-control" name="ocupacion" autocomplete="off" class="form-control input-sm" id="ocupacion" placeholder="ocupación" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="">
                          <label>Escolaridad</label>
                          <select class="form-control" id="escolaridad" name="escolaridad">
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
                          <input type="text" class="form-control" name="ciudad" autocomplete="off" class="form-control input-sm" id="ciudad" placeholder="ciudad" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="txtRuta">
                          <label for="inputAddress">Dirección</label>
                          <input type="text" class="form-control" name="direccion" autocomplete="off" class="form-control input-sm" id="direccion" placeholder="Dirección" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">Telefono</label>
                          <input type="text" class="form-control" name="tel" autocomplete="off" class="form-control input-sm" id="tel" placeholder="Telefono" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">Email</label>
                          <input type="text" class="form-control" name="email" autocomplete="off" class="form-control input-sm" id="email" placeholder="email" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="">
                          <label>Cargo</label>
                          <select class="form-control" id="cargo" name="cargo">
                            <option value="0">Seleccione:</option>
                            <?php
                            $result_ = mysqli_query($conn, "CALL sp_solicitudespreseleccion();");
                            //####################################################################
                            if ($result_ > 0) {
                              while ($ver = mysqli_fetch_row($result_)) {
                                $datos = $ver[0] . "||" .
                                  $ver[1] . "||";
                                echo '<option value="' . $ver[0] . '">' . $ver[1] . '</option>';
                              }
                            } else {
                              echo '<option value=" 0"> No se sabe como funciona </option>';  //Validar vacio
                            }
                            // 
                            //#################################################################### 
                            mysqli_next_result($conn);
                            ?>
                          </select>
                          <script>
                            var calle = $('#kawak');

                            $('#cargo').change(function() {
                              $.ajax({
                                data: "kawa=" + $('#cargo').val(),

                                type: 'POST',
                                url: 'kawak.php',
                                //  
                              }).done(function(data) {
                                calle.html(data);
                                var Caja_Sol = document.getElementById("txt_Sol");
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
                          <input class="form-control" class="form-control input-sm" id="txt_Sol" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarmodal()">Cancelar</button>
                    <button type="submit" class="btn btn-info" data-dismiss="modal" id="submit12" onclick="nuevopre()" value=" enviar">
                      Guardar
                    </button>
                  </div>
                  </form>
                </div>


              </div>

            </div>


            <div class="modal fade" id="predmodalac">
              <div class="modal-dialog modal-lg">

                <div class="modal-content">
                  <div class="modal-header bg-info">
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
                            });;
                          </script>
                        </div>
                      </div>


                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">N° Solicitud Kawak</label>
                          <input class="form-control" class="form-control input-sm" id="txt_Solicitud" readonly>
                        </div>
                      </div>
                      <div class="col-sm-4" id="div_" hidden>
                        <div class="form-group">
                          <label for="txt_Estado_">Estado Validacion</label>
                          <input class="form-control" class="form-control input-sm" id="txt_Estado_" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-success"  data-toggle="modal" id="Mod_Estado" onclick="ValidarEstado()"> Modificar Estado </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cancelar</button>
                    <button type="submit" class="btn btn-info" data-dismiss="modal" id="submit12" onclick="actualizar_pre()" value=" enviar">
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
                    <h4>Aplicación al cargo</h4>
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

                              <input type="" name="id" id="id">
                              <input type="" name="nom" id="nom">
                              <input type="" name="sol" id="sol">
                              <input type="" name="em" id="em">

                              <div class="col-sm-12">
                                <label>Seleccionar Aspirante</label>
                                <select class="form-control" id="aplica" name="aplica">
                                  <option value="9">Seleccione:</option>
                                  <option value="1">Aplica</option>
                                  <option value="0">No aplica</option>

                                </select>
                              </div>
                              <br>
                              <div class="">
                                <input type="checkbox" class="form-check-input" id="lista2" name="circulo" value="0">
                                <label class="form-check-label" id="label" for="conditions">Enviar correo</label>
                              </div>
                            </div>

                            <script>
                              $(document).ready(function() {
                                document.getElementById("label").style.display = "none";
                                document.getElementById("lista2").style.display = "none";
                              });
                              $(document).ready(function() {
                                $('#aplica').on('change', function() {
                                  var c = document.getElementById("aplica").value;

                                  if (c == 1) {
                                    $("#lista2").show();
                                    $("#label").show();
                                  } else {
                                    $("#lista2").hide();
                                    $("#label").hide();
                                  }
                                });
                              });
                            </script>

                          </div>
                      </div>

                    </div>
                  </div>
                  <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="actualizarestado()">Guardar cambios</button>

                  </div>
                  </form>
                </div>


              </div>

            </div>



            <!-- Modal Activar-->
            <div class="modal fade" id="Activar_Estado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modificar Estado</h5>
                    <h5 class="modal-title" id="exampleModalLongTitle">session/h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <!-- <label for="message-text" class="col-form-label"> Data </label> -->
                    <?php
                    //session_start();


                    ?>
                    <div class="modal-body">
                      <p>Modal body text goes here.</p>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="Actualiza_Estado" class="btn btn-info" data-dismiss="modal" onclick="Reactivar();">Activar usuario</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end Modal Activar-->
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