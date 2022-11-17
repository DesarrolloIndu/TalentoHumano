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




  <!-- Script Solicitudes -->
  <script src="Js/solicitud/sol.js"></script>




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
              <h1 class="m-0">Gestión de Solicitudes</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="Dashboard.Php">Inicio</a></li>
                <li class="breadcrumb-item active">solicitudes</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- Main content -->


      <section class="content">
        <div class="row">
          <div class="col-md-12">

            <div id="tablaprueba">

            </div>

            <div class="modal fade" id="solicitudmodal">
              <div class="modal-dialog modal-lg">

                <div class="modal-content">
                  <div class="modal-header bg-info">
                    <h4 class="modal-title">Gestionar Solicitudes</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-4">

                        <form method="POST" id="formulariosol" name="formulariosol" role="form" enctype="multipart/form-data" class="needs-validation" novalida>
                          <div class="">
                            <label>registro kawak</label>
                            <input type="number" min="0" name="registro" id="registro" autocomplete="off" class="form-control input-sm" placeholder="registro kawak" required>

                          </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">Fecha solicitud</label>
                          <input type="text" class="form-control" name="fechasol" autocomplete="off" class="form-control input-sm" id="fechasol" placeholder="Fecha solicitud" readonly>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="">
                          <label>cargo</label>
                          <select class="form-control" id="cargo" name="cargo">
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM cargos ORDER BY Id_Cargo desc;");
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
                          <label for="txtRuta">Cantidad personal</label>
                          <input type="number" class="form-control" min="1" max="10" name="cantidad" autocomplete="off" class="form-control input-sm" id="cantidad" placeholder="Personal solicitado" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">Salario</label>
                          <input type="number" class="form-control" min="1000000" name="salario" autocomplete="off" class="form-control input-sm" id="salario" placeholder="Salario del cargo" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">Fecha publicación</label>
                          <input type="text" class="form-control" name="fechap" autocomplete="off" class="form-control input-sm" id="fechap" placeholder="Fecha publicación kawak" readonly>

                        </div>
                      </div>
                      <div class="col-sm-8">
                        <div class="form-group">
                          <label for="txtRuta">Link computrabajo</label>
                          <input type="text" class="form-control" name="link" autocomplete="off" class="form-control input-sm" name="ruta" id="link" placeholder="Link computrabajo" required>
                        </div>
                      </div>
                      <input type="hidden" class="form-control" name="estado" autocomplete="off" class="form-control input-sm" name="ruta" id="estado" value="0" placeholder="Link computrabajo" required>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">Fecha limite</label>
                          <input type="text" class="form-control" name="fechal" autocomplete="off" class="form-control input-sm" name="ruta" id="fechal" placeholder="Fecha limite" readonly>
                        </div>
                      </div>

                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="txtRuta">Observaciones</label>
                          <textarea type="text" class="form-control" name="observaciones" autocomplete="off" class="form-control input-sm" id="observaciones" placeholder="Observaciones" required></textarea>
                          <input type="hidden" class="form-control" name="contrato" autocomplete="off" class="form-control input-sm" id="contrato" placeholder="Observaciones" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-info" data-dismiss="modal" id="submit12" onclick="nuevasolocitud()" value=" enviar">
                      Guardar
                    </button>
                  </div>
                  </form>
                </div>


              </div>

            </div>
            <!-- Modal Edicion   modalEdicion -->
            <div class="modal fade" id="solicitudactualizar">
              <div class="modal-dialog modal-lg">

                <div class="modal-content">
                  <div class="modal-header bg-info">
                    <h4 class="modal-title">Actualizar Solicitud</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-4">

                        <form method="POST" id="actualizarsolicitud" name="actualizarsolicitud" role="form" enctype="multipart/form-data" class="needs-validation" novalida>
                          <div class="">
                            <input type="hidden" min="0" name="registro1" id="registro1" autocomplete="off" class="form-control input-sm" placeholder="registro kawak" required>
                            <div class="form-group">
                              <label for="txtRuta">Fecha solicitud</label>
                              <input type="text" class="form-control" name="fechasol1" autocomplete="off" class="form-control input-sm" id="fechasol1" placeholder="Fecha solicitud" readonly>
                            </div>

                          </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="">
                          <label>cargo</label>
                          <select class="form-control" id="cargo1" name="cargo1">
                            <option value="0">Seleccione:</option>
                            <?php
                            $resultado = mysqli_query($conn, "SELECT * FROM cargos");
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
                          <label for="txtRuta">Cantidad personal</label>
                          <input type="number" class="form-control" min="1" max="10" name="cantidad1" autocomplete="off" class="form-control input-sm" id="cantidad1" placeholder="Personal solicitado" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">Salario</label>
                          <input type="number" class="form-control" min="1000000" name="salario1" autocomplete="off" class="form-control input-sm" id="salario1" placeholder="Salario del cargo" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">Fecha publicación</label>
                          <input type="text" class="form-control" name="fechap1" autocomplete="off" class="form-control input-sm" id="fechap1" placeholder="Fecha publicación kawak" readonly>

                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">Link computrabajo</label>
                          <input type="text" class="form-control" name="link1" autocomplete="off" class="form-control input-sm" id="link1" placeholder="Link computrabajo" required>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">Fecha limite</label>
                          <input type="text" class="form-control" name="fechal1" autocomplete="off" class="form-control input-sm" id="fechal1" placeholder="Fecha limite" readonly>
                        </div>
                      </div>

                      <div class="col-sm-8">
                        <div class="form-group">
                          <label for="txtRuta">Observaciones</label>
                          <textarea type="text" class="form-control" name="observaciones1" autocomplete="off" class="form-control input-sm" id="observaciones1" placeholder="Observaciones" required></textarea>
                          <input type="hidden" class="form-control" name="contrato1" autocomplete="off" class="form-control input-sm" id="contrato1" placeholder="Observaciones" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-info" id="Btn_Actualizar" data-dismiss="modal" onclick="actualizar_solicitud()" value=" enviar">
                      Guardar
                    </button>
                  </div>
                  </form>
                </div>


              </div>

            </div>


            <!-- Modal Informe -->
            <div class="modal fade" id="Informe_sol">
              <div class="modal-dialog modal-lg">

                <div class="modal-content">
                  <div class="modal-header bg-info">
                    <h4 class="modal-title">Reporte De Solicitudes</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <form method="POST" id="reporte_solicitud" name="reporte_solicitud" role="form" enctype="multipart/form-data" class="needs-validation" novalida>
                          <div class="card text-center">
                            <div class="card-body ">
                              <div class="container">
                                <div class="row justify-content-start">
                                  <div class="col-4">
                                    <img src="Archivos/Imagenes/Talento.jpeg" alt="..." class="rounded-circle" width="80" height="80" style="float:left;">
                                  </div>
                                  <div class="col-4">
                                    <p>
                                      <!-- <input type="text" class="form-control" autocomplete="off" class="form-control input-sm" id="titulo" placeholder="Observaciones" required> -->
                                    <h5 id="titulo" class="text-capitalize font-weight-bold font-italic"></h5>
                                    </p>
                                  </div>
                                </div>
                                <p id="kawak" class="card-text text-capitalize">
                                </p>
                                <p id="cuerpo2" class="card-text text-capitalize">
                                </p>
                                <p id="cuerpo5" step="any" class="card-text text-capitalize ">
                                </p>
                                <p id="cuerpo6" class="card-text text-capitalize ">
                                </p>
                                <p id="cuerpo7" class="card-text text-capitalize ">
                                </p>
                                <p id="cuerpo3" class="card-text text-capitalize ">
                                </p>
                                <p id="cuerpo8" class="card-text text-capitalize ">
                                </p>
                                <p id="cuerpo4" class="card-text text-capitalize">
                                </p>
                                <p id="cuerpo1" class="card-text text-capitalize ">
                                  
                                </p>
                              </div>
                            </div>

                            <div class="modal-footer justify-content-end">
                              <button type="button" class="btn btn-info" data-dismiss="modal">cerrar</button>
                            </div>
                        </form>
                      </div>

                    </div>

                  </div>

                  
                  <!-- modal para actualizar solo el estado  -->

                  <div class="modal fade" id="act_est">
                    <div class="modal-dialog modal-sm">

                      <div class="modal-content">
                        <div class="modal-header bg-info">
                          <h4 class="modal-title">Cerrar solicitud</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <div class="modal-body">
                          <div class="row">
                            <div class="col-sm-12">

                              <form method="POST" id="actu_estado" name="actu_estado" role="form" enctype="multipart/form-data" class="needs-validation" novalida>
                                <div class="">
                                  <div class="card border-info text-center">

                                    <input type="hidden" name="registro2" id="registro2">
                                    <input type="hidden" name="estado2" id="estado2" value="1">
                                    <input type="text" id="cargo2">
                                    <input type="text" id="pendientes2">
                                    <div class="card-footer text-muted">
                                      La solicitud no se podra abrir nuevamente

                                    </div>
                                  </div>


                                </div>
                            </div>

                          </div>
                        </div>
                          <div class="modal-footer justify-content-end">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                          <button type="button" class="btn btn-info" data-dismiss="modal" onclick="actualizarestado()">CERRAR SOLICITUD</button>

                        </div>
                        </form>
                      </div>


                    </div>

                  </div>

                  <script>
                    function actualizares() {
                      var data = $("#actu_estado").serialize();
                      $.ajax({
                        type: "POST",
                        url: "Php/Solicitudes/actualizar_estado.php",
                        data: data,
                        success: function(e) {
                          if (e == 1) {
                            $('#solicitudactualizar').modal('hide')
                            $('#tablaprueba').load('Php/solicitudes/prueba.php');
                          } else {
                            alert("Error al cerrar la solicitud");
                          }
                        },
                      });
                      return false;
                    }

                    function estado(data) {
                      d = data.split('||');
                      $("#registro2").val(d[0]);
                      $("#cargo2").val(d[2]);
                      $("#pendientes2").val(d[5]);
                      var numero = d[0];
                      var estado = d[6];
                      if (estado == 1) { 
                        Swal.fire({
                          icon: 'info',
                          title: 'La solicitud n° ' + numero + ' ya se encuentra cerrada.',
                          showConfirmButton: false,
                        })
                      } else {
                        registro = document.getElementById("registro2").value;
                        estado2 = document.getElementById("estado2").value;
                        cargo2 = document.getElementById("cargo2").value;
                        pendientes2 = document.getElementById("pendientes2").value;
                        Swal.fire({
                          title: 'Cerrar solicitud',
                          text: '¿Esta seguro de cerrar la solicitud ' + registro + ' correspondiente al cargo ' + cargo2 + '?.  En el momento hay ' + pendientes2 + ' vacante(s) por contratar. ' + ' Recuerda que una vez cerrada la solicitud no se podra habilitar nuevamente.',
                          confirmButtonColor: '#3085d6',
                          showDenyButton: true,
                          confirmButtonText: 'Cerrar Solicitud',
                          denyButtonText: `Cancelar`,
                        }).then((result) => {
                          /* Read more about isConfirmed, isDenied below */
                          if (result.isConfirmed) {
                            actualizares()
                            Swal
                              .fire({
                                title: 'Solicitud N° ' + registro + ' Cerrada correctamente.',
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: "Aceptar"
                              })
                          } else if (result.isDenied) {
                            alertify.error('Se cancelo el cierre de la Solicitud');
                          }
                        })
                      }
                    }


                    function actualizarestado() {
                      registro = document.getElementById("registro2").value;
                      estado2 = document.getElementById("estado2").value;
                      if (estado2 == 1) {

                      }

                    }
                  </script>


                  <!--........................................ -->


                  <script>
                    $(function() {
                      $("#fechasol").datepicker({
                        dateFormat: "yy-mm-dd",
                        changeMonth: true,
                        closeText: 'Cerrar',
                        currentText: 'Hoy',
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                          'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                        ],
                        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                          'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
                        ],
                        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
                        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                        weekHeader: 'Sm',
                        firstDay: 1,
                        isRTL: false,
                        showMonthAfterYear: false,
                        yearSuffix: ''
                      });

                    });


                    $(function() {
                      $("#fechap").datepicker({
                        dateFormat: "yy-mm-dd",
                        changeMonth: true,
                        closeText: 'Cerrar',
                        currentText: 'Hoy',
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                          'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                        ],
                        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                          'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
                        ],
                        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
                        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                        weekHeader: 'Sm',
                        firstDay: 1,
                        isRTL: false,
                        showMonthAfterYear: false,
                        yearSuffix: ''
                      });

                    });

                    $(function() {
                      $("#fechal").datepicker({
                        dateFormat: "yy-mm-dd",
                        changeMonth: true,
                        closeText: 'Cerrar',
                        currentText: 'Hoy',
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                          'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                        ],
                        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                          'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
                        ],
                        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
                        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                        weekHeader: 'Sm',
                        firstDay: 1,
                        isRTL: false,
                        showMonthAfterYear: false,
                        yearSuffix: ''
                      });

                    });

                    $(function() {
                      $("#fechac").datepicker({
                        dateFormat: "yy-mm-dd",
                        changeMonth: true,
                        closeText: 'Cerrar',
                        currentText: 'Hoy',
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                          'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                        ],
                        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                          'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
                        ],
                        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
                        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                        weekHeader: 'Sm',
                        firstDay: 1,
                        isRTL: false,
                        showMonthAfterYear: false,
                        yearSuffix: ''
                      });

                    });
                  </script>
                  <script>
                    $(function() {
                      $("#fechasol1").datepicker({
                        dateFormat: "yy-mm-dd",
                        changeMonth: true,
                        closeText: 'Cerrar',
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                          'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                        ],
                        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                          'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
                        ],
                        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
                        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                        weekHeader: 'Sm',
                        firstDay: 1,
                        isRTL: false,
                        showMonthAfterYear: false,
                        yearSuffix: ''
                      });

                    });


                    $(function() {
                      $("#fechap1").datepicker({
                        dateFormat: "yy-mm-dd",
                        changeMonth: true,
                        closeText: 'Cerrar',
                        currentText: 'Hoy',
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                          'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                        ],
                        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                          'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
                        ],
                        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
                        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                        weekHeader: 'Sm',
                        firstDay: 1,
                        isRTL: false,
                        showMonthAfterYear: false,
                        yearSuffix: ''
                      });

                    });

                    $(function() {
                      $("#fechal1").datepicker({
                        dateFormat: "yy-mm-dd",
                        changeMonth: true,
                        closeText: 'Cerrar',
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                          'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                        ],
                        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                          'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
                        ],
                        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
                        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                        weekHeader: 'Sm',
                        firstDay: 1,
                        isRTL: false,
                        showMonthAfterYear: false,
                        yearSuffix: ''
                      });

                    });
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